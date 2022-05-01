<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\AdminHandler;
use \src\handlers\UserHandler;
use \src\handlers\PostHandler;
use \src\handlers\RecadoHandler;
use \src\handlers\VideoHandler;
use \src\handlers\AlbumHandler;
use \src\handlers\ComunidadeHandler;
use \src\models\Album; // funcionando
use \src\models\AlbumPhoto; // funcionando
use \src\models\AlbumPhotoComment;
use \src\models\User; // funcionando
use \src\models\Post; // funcionando
use \src\models\UserRelation;
use \src\models\UserFa;
use \src\models\VotoConfiavel;
use \src\models\VotoLegal;
use \src\models\VotoSexy;
use \src\models\Depoimento;
use \src\models\Comunidade;
use \src\models\ComunidadeMembro;
use \src\models\ComunidadeTopico;
use \src\models\ComunidadeMensagen;
use \src\models\Recado; // funcionando
use \src\models\Video;

class AdminController extends Controller {
    
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index() {

        if($this->loggedUser->id == 1) {
        
         // Detectando o usuário acessado
         $id = $this->loggedUser->id;
         if(!empty($atts['id'])) {
             $id = $atts['id'];
         }
 
         // Pegando informações do usuário
         $user = UserHandler::getUser($id, true);
         if(!$user) {
             $this->redirect('/');
         }
        $allAlbum = Album::select()->count();
        $allAlbumPhoto = AlbumPhoto::select()->count();
        $allAlbumPhotoComment = AlbumPhotoComment::select()->count();
        $allUsers = User::select()->count();
        $allTimeline = Post::select()->count();
        $allUserRelation = UserRelation::select()->count();
        $allRecado = Recado::select()->count();
        $allVideo = Video::select()->count();
        $allUserFa = UserFa::select()->count();
        $allVotoConfiavel = VotoConfiavel::select()->count();
        $allVotoLegal = VotoLegal::select()->count();
        $allVotoSexy = VotoSexy::select()->count();
        $allDepoimento = Depoimento::select()->count();
        $allComunidade = Comunidade::select()->count();
        $allComunidadeMembro = ComunidadeMembro::select()->count();
        $allComunidadeTopico = ComunidadeTopico::select()->count();
        $allComunidadeMensagen = ComunidadeMensagen::select()->count();
        
        $this->render('admin', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'allTimeline' => $allTimeline,
            'allAlbum' => $allAlbum,
            'allAlbumPhoto' => $allAlbumPhoto,
            'allAlbumPhotoComment' => $allAlbumPhotoComment,
            'allUsers' => $allUsers,
            'allRecado' => $allRecado,
            'allVideo' => $allVideo,
            'allUserRelation' => $allUserRelation,
            'allUserFa' => $allUserFa,
            'allVotoConfiavel' => $allVotoConfiavel,
            'allVotoLegal' => $allVotoLegal,
            'allVotoSexy' => $allVotoSexy,
            'allDepoimento' => $allDepoimento,
            'allComunidade' => $allComunidade,
            'allComunidadeMembro' => $allComunidadeMembro,
            'allComunidadeTopico' => $allComunidadeTopico,
            'allComunidadeMensagen' => $allComunidadeMensagen,
            
        ]);

        } else {$this->redirect('/home');
            }
    }

    public function recados() {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));
        if($this->loggedUser->id == 1) {

         // Detectando o usuário logado
         $id = $this->loggedUser->id;
         if(!empty($atts['id'])) {
             $id = $atts['id'];
         }
 
         // Pegando informações do usuário
         $user = UserHandler::getUser($id, true);
         if(!$user) {
             $this->redirect('/');
         }

         // Pegando todos os recados
        $recados = AdminHandler::getRecados($id, $page, $this->loggedUser->id);
        
        $this->render('admin_recados', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'recados' => $recados,
        ]);

        }
        else {$this->redirect('/');
        }

    }

    // DELETAR RECADOS do sistema
    public function deletarRecado() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $delete = addslashes(intval(filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_STRING))); // id do Recado

        // verificar se o id é o mesmo da pessoa logada
        if ($this->loggedUser->id == '1') { // 1 é o id do admin
            Recado::delete()
            ->where('id', $delete)
            ->where('id_user', $uid)
            ->execute();
            
            // buscar total de recados por usuario
            $total = Recado::select()
            ->where('id_para', $uid)
            ->count();
                // retorna o resultado

            // inserir quantidade de recados na coluna somarecados do usuario
            User::update([
            'somarecados' => $total
            ])
            ->where('id', $uid)
            ->execute();
        }
        
        $this->redirect('/admin/recados'); // retorna para página Gerenciar recados

    }

    // DELETAR FOTO DOS ALBUNS DOS PERFIL
    public function deletarPhotos() {
        $photo = addslashes(intval(filter_input(INPUT_GET, 'photo', FILTER_SANITIZE_STRING))); // id da foto

        $foto = AlbumPhoto::select()->where('id', $photo)->one(); // buscar link da foto antes de deletar do db
        $capaAlbum = Album::select()->where('id', $foto['id_album'])->one(); // buscar link da foto de capa do album
        $capa = 'album.jpg';

        // fase 1 deletar foto individual
        // verificar se o id é o mesmo da pessoa logada
        if ('1' === $this->loggedUser->id) {
            AlbumPhoto::delete()
            ->where('id', $photo)
            ->where('id_album', $foto['id_album'])
            ->execute();
            
            AlbumPhotoComment::delete()
                ->where('id_photo', $photo)
                ->execute();
                
                // buscar total de fotos por album
            $total = AlbumPhoto::select()
            ->where('id_user', $foto['id_user'])
            ->where('id_album', $foto['id_album'])
            ->count();
            // retorna o resultado

            // inserir quantidade de fotos na coluna somarfotos do album
            Album::update([
            'somarfotos' => $total
            ])
            ->where('id', $foto['id_album'])
            ->execute();

            // buscar total de fotos do usuario
            $totalfotos = AlbumPhoto::select()
            ->where('id_user', $foto['id_user'])
            ->count();
            // retorna o resultado

            // inserir quantidade de fotos na coluna somafotos do usuario
            User::update([
            'somafotos' => $totalfotos
            ])
            ->where('id', $foto['id_user'])
            ->execute();

             // verificar se a capa do álbum é a mesma da foto a ser deletada
             if ($foto['photo'] === $capaAlbum['capa']) {

                Album::update([
                    'capa' => $capa
                    ])
                    ->where('id', $foto['id_album'])
                    ->execute();

            }

            // fase 2 deletar a foto da pasta
            unlink('./media/uploads/'.$foto['photo']);

        }
            
        $this->redirect('/admin/photos');

    }

    // DELETAR FEEDS
    public function deletarFeed() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $del = addslashes(intval(filter_input(INPUT_GET, 'del', FILTER_SANITIZE_STRING))); // id do Recado

        // verificar se o id é o mesmo da pessoa logada
        if ('1' === $this->loggedUser->id) {
            Post::delete()
            ->where('id', $del)
            ->where('id_user', $uid)
            ->execute();
            
            // buscar total de feeds por usuario
            $total = Post::select()
            ->where('id_user', $uid)
            ->count();
                // retorna o resultado

            // inserir quantidade de feeds na coluna somastatus do usuario
            User::update([
            'somastatus' => $total
            ])
            ->where('id', $uid)
            ->execute();
        }
        
        $this->redirect('/admin/feeds'); // retorna para página de origem

    }

    // DELETAR FOTO DOS ALBUNS DOS PERFIL
    public function deletarAlbum() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $delet = addslashes(intval(filter_input(INPUT_GET, 'delet', FILTER_SANITIZE_STRING))); // id do album

        $fotos = AlbumPhoto::select()->where('id_album', $delet)->where('id_user', $uid)->get(); // buscar link da foto antes de deletar do db
        

        // fase 1 deletar foto individual
        // verificar se o id é o mesmo da pessoa logada
        if ('1' === $this->loggedUser->id) {

            Album::delete()
            ->where('id', $delet)
            ->execute();

            AlbumPhoto::delete()
            ->where('id_album', $delet)
            ->execute();
            
            AlbumPhotoComment::delete()
                ->where('id_album', $delet)
                ->execute();

            // buscar total de fotos por album
            $totalfotos = AlbumPhoto::select()
            ->where('id_user', $uid)
            ->count();
            // retorna o resultado

            // inserir quantidade de fotos na coluna somarfotos do album
            User::update([
            'somafotos' => $totalfotos
            ])
            ->where('id', $uid)
            ->execute();

            foreach($fotos as $foto) {
                unlink('./media/uploads/'.$foto['photo']);
            }

        }
            
        $this->redirect('/admin/albuns'); // retorna para página de origem

    }

    // DELETAR VÍDEOS
    public function deletarVideo() {
        $del = addslashes(intval(filter_input(INPUT_GET, 'del', FILTER_SANITIZE_STRING))); // id do vídeo

        $usuario = Video::select()->where('id', $del)->one(); // buscar link da foto antes de deletar do db

        // verificar se o id é o mesmo da pessoa logada
        if ('1' === $this->loggedUser->id) {
        Video::delete()
            ->where('id', $del)
            ->where('id_user', $usuario['id_user'])
            ->execute();

            // buscar total de VÍDEOS por usuario
            $total = Video::select()
            ->where('id_user', $usuario['id_user'])
            ->count();
                // retorna o resultado

            // inserir quantidade de VÍDEOS na coluna somavideos do usuario
            User::update([
            'somavideos' => $total
            ])
            ->where('id', $usuario['id_user'])
            ->execute();

        }
        
        $this->redirect('/admin/videos'); // retorna para página de origem

    }

    // DELETAR DEPOIMENTOS
    public function deletarDepoimentos() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $delete = addslashes(intval(filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_STRING))); // id do DEPOIMENTO

            // fase 1 deletar seus depoimentos 
        // verificar se o id é o mesmo da pessoa logada
        if ('1' === $this->loggedUser->id) {
            Depoimento::delete()
            ->where('id', $delete)
            ->where('id_user', $uid)
            ->execute();
            
            
            // buscar total de DEPOIMENTOS por usuario
            $total = Depoimento::select()
            ->where('id_para', $uid)
            ->count();
                // retorna o resultado

                // buscar total de DEPOIMENTOS por usuario
            $totalescrito = Depoimento::select()
            ->where('id_user', $uid)
            ->count();
                // retorna o resultado

            // inserir quantidade de DEPOIMENTOS na coluna somavideos do usuario
            User::update([
            'somadepoimentos' => $total
            ])
            ->where('id', $uid)
            ->execute();

            // inserir quantidade de DEPOIMENTOS na coluna somavideos do usuario
            User::update([
            'somadepoescrito' => $totalescrito
            ])
            ->where('id', $uid)
            ->execute();

        }
            
        $this->redirect('/admin/depoimentos'); // retorna para página de origem

    }

     // função gerar página de amigos
     public function users($atts = []) {

        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Pegando os membros da comunidade
       $users = AdminHandler::getUsers($page, $this->loggedUser->id);

        // Pegando informações do usuário
        $user = UserHandler::getUser($id, true);
        if(!$user) {
            $this->redirect('/');
        }

        $this->render('admin_users', [
            'loggedUser' => $this->loggedUser,
            'users' => $users,
            'user' => $user
        ]);
    }

    // função gerar página de photos dos albuns
    public function photos($atts = []) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Pegando informações do usuário
        $user = UserHandler::getUser($id, true);
        if(!$user) {
            $this->redirect('/');
        }

        $dateFrom = new \DateTime($user->birthdate);
        $dateTo = new \DateTime('today');
        $user->ageYears = $dateFrom->diff($dateTo)->y;

        // Verificar se EU sigo o usuário
        $isFollowing = false;
        if($user->id != $this->loggedUser->id) {
            $isFollowing = UserHandler::isFollowing($this->loggedUser->id, $user->id);

        }

         // Pegando as fotos do album
         $photos = AdminHandler::getPhotos($page, $this->loggedUser->id);

        $this->render('admin_photos', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'photos' => $photos,
            'isFollowing' => $isFollowing
        ]);
    }

    public function feeds() {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));
        if($this->loggedUser->id == 1) {

         // Detectando o usuário logado
         $id = $this->loggedUser->id;
         if(!empty($atts['id'])) {
             $id = $atts['id'];
         }
 
         // Pegando informações do usuário
         $user = UserHandler::getUser($id, true);
         if(!$user) {
             $this->redirect('/');
         }

         // Pegando todos os recados
        $feeds = AdminHandler::getFeeds($id, $page, $this->loggedUser->id);
        
        $this->render('admin_feeds', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'feeds' => $feeds,
        ]);

        }
        else {$this->redirect('/');
        }
    }

    // função gerar página de albuns
    public function albuns($atts = []) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Pegando informações do usuário
        $user = UserHandler::getUser($id, true);
        if(!$user) {
            $this->redirect('/');
        }

        $dateFrom = new \DateTime($user->birthdate);
        $dateTo = new \DateTime('today');
        $user->ageYears = $dateFrom->diff($dateTo)->y;

        // Verificar se EU sigo o usuário
        $isFollowing = false;
        if($user->id != $this->loggedUser->id) {
            $isFollowing = UserHandler::isFollowing($this->loggedUser->id, $user->id);

        }
         // Pegando os vídeos do usuário
         $albuns = AdminHandler::getAlbuns($id, $page, $this->loggedUser->id);

        $this->render('admin_albuns', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'albuns' => $albuns,
            'isFollowing' => $isFollowing
        ]);
    }

    public function videos($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Pegando informações do usuário
        $user = UserHandler::getUser($id, true);
        if(!$user) {
            $this->redirect('/');
        }

        $dateFrom = new \DateTime($user->birthdate);
        $dateTo = new \DateTime('today');
        $user->ageYears = $dateFrom->diff($dateTo)->y;

        // Verificar se EU sigo o usuário
        $isFollowing = false;
        if($user->id != $this->loggedUser->id) {
            $isFollowing = UserHandler::isFollowing($this->loggedUser->id, $user->id);

        }

        // Pegando os vídeos do usuário
        $video = AdminHandler::getVideos($id, $page, $this->loggedUser->id);

        // enviando informações para página vídeo
        $this->render('admin_videos', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'video' => $video,
            'isFollowing' => $isFollowing
        ]);
    }

    public function depoimentos($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Pegando informações do usuário
        $user = UserHandler::getUser($id, true);
        if(!$user) {
            $this->redirect('/');
        }

        $dateFrom = new \DateTime($user->birthdate);
        $dateTo = new \DateTime('today');
        $user->ageYears = $dateFrom->diff($dateTo)->y;

        // Verificar se EU sigo o usuário
        $isFollowing = false;
        if($user->id != $this->loggedUser->id) {
            $isFollowing = UserHandler::isFollowing($this->loggedUser->id, $user->id);

        }

        $depoimentos = AdminHandler::getDepoimentos($page, $this->loggedUser->id);

        $this->render('admini_depoimento', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'depoimentos' => $depoimentos,
            'isFollowing' => $isFollowing
        ]);
    }

    public function comunidades($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Pegando informações do usuário
        $user = UserHandler::getUser($id, true);
        if(!$user) {
            $this->redirect('/');
        }

        $dateFrom = new \DateTime($user->birthdate);
        $dateTo = new \DateTime('today');
        $user->ageYears = $dateFrom->diff($dateTo)->y;

        // Verificar se EU sigo o usuário
        $isFollowing = false;
        if($user->id != $this->loggedUser->id) {
            $isFollowing = UserHandler::isFollowing($this->loggedUser->id, $user->id);

        }

        $comunidades = AdminHandler::getComunidades($id, $page, $this->loggedUser->id);

        $this->render('admin_comunidades', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'comunidades' => $comunidades,
            'isFollowing' => $isFollowing
        ]);
    }

}