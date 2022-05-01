<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\AlbumHandler;
use \src\handlers\PostHandler;
use \src\handlers\RecadoHandler;
use \src\handlers\VideoHandler;
use \src\handlers\DepoimentoHandler;

class ProfileController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }
        // gerar á página do perfil
    public function index($atts =[]) {
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

        // Pegando o feed do usuário
        $feed = PostHandler::getUserFeed($id, $page, $this->loggedUser->id);

        // Pegando os depoimentos do usuário
        $depoimentos = DepoimentoHandler::getUserDepoimento($id, $page, $this->loggedUser->id);

        // Pegando os recados do usuário
        $recados = RecadoHandler::getUserRecados($id, $page, $this->loggedUser->id);

        // Pegando os fas do usuário
        $fas = UserHandler::getUserFas($id, $this->loggedUser->id);

        // Pegando os amigos do usuário
        $amigos = UserHandler::getUserAmigos($id, $this->loggedUser->id);

        // Pegando os vídeos do usuário
        $video = VideoHandler::getUserFeed($id, $page, $this->loggedUser->id);

        // Verificar se EU sigo o usuário
        $isFollowing = false;
        if($user->id != $this->loggedUser->id) {
            $isFollowing = UserHandler::isFollowing($this->loggedUser->id, $user->id);

        }

        $this->render('perfil', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'feed' => $feed,
            'depoimentos' => $depoimentos,
            'recados' => $recados,
            'fas' => $fas,
            'amigos' => $amigos,
            'video' => $video,
            'isFollowing' => $isFollowing
        ]);
    }

    public function editarFeeds($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));
        $view = addslashes(intval(filter_input(INPUT_GET, 'view', FILTER_SANITIZE_STRING))); // id do feed

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

        // Pegando o feed específico
        $feed = PostHandler::getUserEditFeed($view, $page, $id, $this->loggedUser->id);

        $this->render('editar_feed', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'feed' => $feed,
            'isFollowing' => $isFollowing
        ]);
    }

    public function editarRecados($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));
        $view = addslashes(intval(filter_input(INPUT_GET, 'view', FILTER_SANITIZE_STRING))); // id do feed

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

        // Pegando o feed específico
        $feed = PostHandler::getUserEditFeed($view, $page, $id, $this->loggedUser->id);

        $this->render('editar_feed', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'feed' => $feed,
            'isFollowing' => $isFollowing
        ]);
    }

        // função remover e adicionar seguidores
    public function follow($atts) {
        $to = addslashes(intval($atts['id']));

        if(UserHandler::idExists($to)) {
            if(UserHandler::isFollowing($this->loggedUser->id, $to)) {
                //desseguir
                UserHandler::unfollow($this->loggedUser->id, $to);

            } else {
                // seguir
                UserHandler::follow($this->loggedUser->id, $to);

            }

        }

        $this->redirect('/perfil/uid='.$to);
    }
        // função adicionar e remover fãs
    public function fasfollow($atts) {
        $fasto = addslashes(intval($atts['id']));

        if(UserHandler::idExists($fasto)) {
            if(UserHandler::fasisFollowing($this->loggedUser->id, $fasto)) {
                //desseguir
                UserHandler::fasunfollow($this->loggedUser->id, $fasto);

            } else {
                // seguir
                UserHandler::fasfollow($this->loggedUser->id, $fasto);

            }

        }

        $this->redirect('/fas/uid='.$fasto);
    }
        // função gerar página de amigos
    public function amigosSeguidores($atts = []) {

        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Pegando os membros da comunidade
       $membros = UserHandler::getAmigos($atts, $page, $this->loggedUser->id);

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

        $this->render('amigos_seguidores', [
            'loggedUser' => $this->loggedUser,
            'membros' => $membros,
            'user' => $user,
            'isFollowing' => $isFollowing
        ]);
    }

    // função gerar página de amigos Seguidos
    public function amigosSeguindo($atts = []) {

        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Pegando os membros da comunidade
       $membros = UserHandler::getAmigosSeguidos($atts, $page, $this->loggedUser->id);

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

        $this->render('amigos_seguindo', [
            'loggedUser' => $this->loggedUser,
            'membros' => $membros,
            'user' => $user,
            'isFollowing' => $isFollowing
        ]);
    }
        // função gerar página de fãs
    public function fas($atts = []) {

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

        // Verificar se EU sou fa do usuário
        $fasisFollowing = false;
        if($user->id != $this->loggedUser->id) {
            $fasisFollowing = UserHandler::fasisFollowing($this->loggedUser->id, $user->id);

        }

        // Pegando os membros da comunidade
       $fas = UserHandler::getFasSeguidos($id, $page, $this->loggedUser->id);

        // Verificar se EU sigo o usuário
        $isFollowing = false;
        if($user->id != $this->loggedUser->id) {
            $isFollowing = UserHandler::isFollowing($this->loggedUser->id, $user->id);

        }
        
        $this->render('fas', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'fasisFollowing' => $fasisFollowing,
            'fas' => $fas,
            'isFollowing' => $isFollowing
        ]);
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
         $albuns = AlbumHandler::getUserAlbuns($id, $page, $this->loggedUser->id);

        $this->render('albuns', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'albuns' => $albuns,
            'isFollowing' => $isFollowing
        ]);
    }

    // função gerar página de albuns
    public function albunsEdit($atts = []) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));
        $album = addslashes(intval(filter_input(INPUT_GET, 'album', FILTER_SANITIZE_STRING)));

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
         $albuns = AlbumHandler::getUserAlbumEdit($id, $page, $album, $this->loggedUser->id);

         // Pegando as fotos do album
         $photos = AlbumHandler::getUserAlbunsPhotos($id, $page, $album, $this->loggedUser->id);

        $this->render('edit_profile_album', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'albuns' => $albuns,
            'photos' => $photos,
            'isFollowing' => $isFollowing
        ]);
    }

    // função gerar página de photos dos albuns
    public function albunsPhotos($atts = []) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));
        $album = addslashes(intval(filter_input(INPUT_GET, 'album', FILTER_SANITIZE_STRING)));

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

        // Pegando só o titulo
        $albuns = AlbumHandler::getUserAlbumTitulo($id, $album, $this->loggedUser->id);

         // Pegando as fotos do album
         $photos = AlbumHandler::getUserAlbunsPhotos($id, $page, $album, $this->loggedUser->id);

        $this->render('albuns_fotos', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'photos' => $photos,
            'albuns' => $albuns,
            'album' => $album,
            'isFollowing' => $isFollowing
        ]);
    }

    // função gerar página da photo individual 
    public function albunsPhotoIndividual($atts = []) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));
        $album = addslashes(intval(filter_input(INPUT_GET, 'album', FILTER_SANITIZE_STRING)));
        $photo = addslashes(intval(filter_input(INPUT_GET, 'photo', FILTER_SANITIZE_STRING)));

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

         // Pegando a foto
         $photos = AlbumHandler::getUserPhoto($id, $page, $album, $photo, $this->loggedUser->id);

         // Pegando só o titulo
         $albuns = AlbumHandler::getUserAlbumTitulo($id, $album, $this->loggedUser->id);

         $comments = AlbumHandler::getUserRecados($id, $page, $photo, $this->loggedUser->id);

        $this->render('photo', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'photos' => $photos,
            'comments' => $comments,
            'album' => $album,
            'albuns' => $albuns,
            'photo' => $photo,
            'isFollowing' => $isFollowing
        ]);
    }

    // função gerar página EDITAR da photo individual 
    public function albunsPhotoEditIndividual($atts = []) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));
        $album = addslashes(intval(filter_input(INPUT_GET, 'album', FILTER_SANITIZE_STRING)));
        $photo = addslashes(intval(filter_input(INPUT_GET, 'photo', FILTER_SANITIZE_STRING)));

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

         // Pegando a foto
         $photos = AlbumHandler::getUserPhoto($id, $page, $album, $photo, $this->loggedUser->id);

         // Pegando só o titulo
         $albuns = AlbumHandler::getUserAlbumTitulo($id, $album, $this->loggedUser->id);

        $this->render('edit_album_photo', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'photos' => $photos,
            'album' => $album,
            'albuns' => $albuns,
            'photo' => $photo,
            'isFollowing' => $isFollowing
        ]);
    }


    // função gerar página EDITAR comentario da photo dos albuns dos perfil individual 
    public function albunsPhotoCommetEditIndividual($atts = []) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));
        $album = addslashes(intval(filter_input(INPUT_GET, 'album', FILTER_SANITIZE_STRING))); // id do ALBUM
        $photo = addslashes(intval(filter_input(INPUT_GET, 'photo', FILTER_SANITIZE_STRING))); // id da PHOTO
        $comment = addslashes(intval(filter_input(INPUT_GET, 'comment', FILTER_SANITIZE_STRING))); // id do COMMENT

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

         // Pegando a foto
         $photos = AlbumHandler::getUserAlbumPhotoEditComment($id, $album, $photo, $comment, $this->loggedUser->id);

         // Pegando só o titulo
         $albuns = AlbumHandler::getUserAlbumTitulo($id, $album, $this->loggedUser->id);

        $this->render('edit_profile_album_photo_comment', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'photos' => $photos,
            'album' => $album,
            'albuns' => $albuns,
            'photo' => $photo,
            'isFollowing' => $isFollowing
        ]);
    }

    

}