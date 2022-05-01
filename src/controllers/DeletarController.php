<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\AlbumHandler;
use \src\models\Album; // Funcionando
use \src\models\AlbumPhoto; // Funcionando
use \src\models\AlbumPhotoComment; // Funcionando
use \src\models\User;
use \src\models\Post; //Funcionando
use \src\models\UserRelation;
use \src\models\UserFa;
use \src\models\Depoimento; //Funcionando
use \src\models\Comunidade;
use \src\models\ComunidadeMembro;
use \src\models\ComunidadeTopico; // Funcionando
use \src\models\ComunidadeMensagen; // Funcionando
use \src\models\Recado; // Funcionando
use \src\models\Video; // Funcionando

class DeletarController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }
        // DELETAR VÍDEOS
    public function deletarVideo() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $delete = addslashes(intval(filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_STRING))); // id do vídeo

        // verificar se o id é o mesmo da pessoa logada
        if ($uid === $this->loggedUser->id) {
        Video::delete()
            ->where('id', $delete)
            ->where('id_user', $this->loggedUser->id)
            ->execute();

            // buscar total de VÍDEOS por usuario
            $total = Video::select()
            ->where('id_user', $this->loggedUser->id)
            ->count();
                // retorna o resultado

            // inserir quantidade de VÍDEOS na coluna somavideos do usuario
            User::update([
            'somavideos' => $total
            ])
            ->where('id', $this->loggedUser->id)
            ->execute();

        }
        
        $this->redirect('/videos/uid='.$uid); // retorna para página de origem

    }

    // DELETAR DEPOIMENTOS
    public function deletarDepoimento() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $delete = addslashes(intval(filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_STRING))); // id do DEPOIMENTO
        $return = addslashes(intval(filter_input(INPUT_GET, 'return', FILTER_SANITIZE_STRING))); // id do DEPOIMENTO
            // fase 1 deletar seus depoimentos 
        // verificar se o id é o mesmo da pessoa logada
        if ($uid === $this->loggedUser->id) {
            Depoimento::delete()
            ->where('id', $delete)
            ->where('id_user', $this->loggedUser->id)
            ->execute();
            
            
            // buscar total de DEPOIMENTOS por usuario
            $total = Depoimento::select()
            ->where('id_para', $return)
            ->count();
                // retorna o resultado

                // buscar total de DEPOIMENTOS por usuario
            $totalescrito = Depoimento::select()
            ->where('id_user', $return)
            ->count();
                // retorna o resultado

            // inserir quantidade de DEPOIMENTOS na coluna somavideos do usuario
            User::update([
            'somadepoimentos' => $total
            ])
            ->where('id', $return)
            ->execute();

            // inserir quantidade de DEPOIMENTOS na coluna somavideos do usuario
            User::update([
            'somadepoescrito' => $totalescrito
            ])
            ->where('id', $return)
            ->execute();

        }
            // varificação de depoimentos recebido
        $users = Depoimento::select()->where('id', $delete)->where('id_para', $this->loggedUser->id)->get();
        
            //fase 2 deletar atravez de quem recebeu
        // verificar se o id é o mesmo da pessoa logada
        if (!empty($users)) {
            Depoimento::delete()
            ->where('id', $delete)
            ->where('id_para', $return)
            ->execute();
            
            // buscar total de DEPOIMENTOS por usuario
            $total = Depoimento::select()
            ->where('id_user', $return)
            ->count();
                // retorna o resultado

                // buscar total de DEPOIMENTOS por usuario
            $totalescrito = Depoimento::select()
            ->where('id_user', $return)
            ->count();
                // retorna o resultado

            // inserir quantidade de DEPOIMENTOS na coluna somadepoimentos do usuario
            User::update([
            'somadepoimentos' => $total
            ])
            ->where('id', $return)
            ->execute();

            // inserir quantidade de DEPOIMENTOS na coluna somadepoescrito do usuario
            User::update([
            'somadepoescrito' => $totalescrito
            ])
            ->where('id', $return)
            ->execute();

        }
        
        $this->redirect('/depoimento/uid='.$return); // retorna para página de origem

    }

    // DELETAR RECADOS
    public function deletarRecado() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $delete = addslashes(intval(filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_STRING))); // id do Recado
        $return = addslashes(intval(filter_input(INPUT_GET, 'return', FILTER_SANITIZE_STRING))); // Id para retorna a página
            // fase 1 deletar seus recados
        // verificar se o id é o mesmo da pessoa logada
        if ($uid === $this->loggedUser->id) {
            Recado::delete()
            ->where('id', $delete)
            ->where('id_user', $this->loggedUser->id)
            ->execute();
            
            // buscar total de recados por usuario
            $total = Recado::select()
            ->where('id_para', $return)
            ->count();
                // retorna o resultado

            // inserir quantidade de recados na coluna somarecados do usuario
            User::update([
            'somarecados' => $total
            ])
            ->where('id', $return)
            ->execute();
        }
            // varificação de recados recebidos
        $users = Recado::select()->where('id', $delete)->where('id_para', $this->loggedUser->id)->get();
        
            //fase 2 deletar atravez de quem recebeu
        // verificar se o id é o mesmo da pessoa logada
        if (!empty($users)) {
            Recado::delete()
            ->where('id', $delete)
            ->where('id_para', $this->loggedUser->id)
            ->execute();
            
            // buscar total de recados por usuario
            $total = Recado::select()
            ->where('id_para', $return)
            ->count();
                // retorna o resultado

            // inserir quantidade de recados na coluna somarecados do usuario
            User::update([
            'somarecados' => $total
            ])
            ->where('id', $return)
            ->execute();

        }
        
        $this->redirect('/recados/uid='.$return); // retorna para página de origem

    }

    // DELETAR FEEDS
    public function deletarFeed() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $delete = addslashes(intval(filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_STRING))); // id do Recado
        $return = addslashes(intval(filter_input(INPUT_GET, 'return', FILTER_SANITIZE_STRING))); // Id para retorna a página

        // verificar se o id é o mesmo da pessoa logada
        if ($uid === $this->loggedUser->id) {
            Post::delete()
            ->where('id', $delete)
            ->where('id_user', $this->loggedUser->id)
            ->execute();
            
            // buscar total de feeds por usuario
            $total = Post::select()
            ->where('id_user', $return)
            ->count();
                // retorna o resultado

            // inserir quantidade de feeds na coluna somastatus do usuario
            User::update([
            'somastatus' => $total
            ])
            ->where('id', $return)
            ->execute();
        }
        
        $this->redirect('/'); // retorna para página de origem

    }

    // DELETAR Mensagen da Comunidade
    public function deletarComunidadeMensagen() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $delete = addslashes(intval(filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_STRING))); // id do Recado
        $return = addslashes(intval(filter_input(INPUT_GET, 'return', FILTER_SANITIZE_STRING))); // Id para retorna a página

        // verificar se o id é o mesmo da pessoa logada
        if ($uid === $this->loggedUser->id) {
            ComunidadeMensagen::delete()
            ->where('id', $delete)
            ->where('id_usuario', $this->loggedUser->id)
            ->execute();
            
                // buscar total de membros por usuario
            $total = ComunidadeMensagen::select()
            ->where('id_topico', $return)
            ->count();
            // retorna o resultado

            // inserir quantidade de mensagens nos topicos
            ComunidadeTopico::update([
            'somamensagens' => $total
            ])
            ->where('id', $return)
            ->execute();
            
        }

        // varificação de recados recebidos
        $donos = Comunidade::select()->where('id', $return)->where('id_usuario', $this->loggedUser->id)->get();
        
            //fase 2 deletar atravez do dono
        // verificar se o id é o mesmo da pessoa logada
        if (!empty($donos)) {
            ComunidadeMensagen::delete()
            ->where('id', $delete)
            ->execute();
            
                // buscar total de membros por usuario
            $total = ComunidadeMensagen::select()
            ->where('id_topico', $return)
            ->count();
            // retorna o resultado

            // inserir quantidade de mensagens nos topicos
            ComunidadeTopico::update([
            'somamensagens' => $total
            ])
            ->where('id', $return)
            ->execute();
            
        }
        
        $this->redirect('/comunidade/mensagens/uid='.$return); // retorna para página de origem

    }

    // DELETAR topicos e Mensagen da Comunidade
    public function deletarComunidadeTopico() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $delete = addslashes(intval(filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_STRING))); // id do Recado
        $return = addslashes(intval(filter_input(INPUT_GET, 'return', FILTER_SANITIZE_STRING))); // Id para retorna a página

        // verificar se o id é o mesmo da pessoa logada
        if ($uid === $this->loggedUser->id) {
            
            ComunidadeTopico::delete()
            ->where('id', $delete)
            ->where('id_usuario', $this->loggedUser->id)
            ->execute();
             // deletar as mensagens do topico a ser deletado
            ComunidadeMensagen::delete()
            ->where('id_topico', $delete)
            ->execute();
            
               // buscar total de topicos da comunidade
        $total = ComunidadeTopico::select()
        ->where('id_comunidade', $return)
        ->count();
        // retorna o resultado

        // inserir quantidade de topicos
        Comunidade::update([
        'somatopicos' => $total
        ])
        ->where('id', $return)
        ->execute();
        }

        // dono da comunidade deletar mensagens de outros membros
        $donos = Comunidade::select()->where('id', $return)->where('id_usuario', $this->loggedUser->id)->get();
        
            //fase 2 deletar atravez do dono
        // verificar se o dono existe e deletar
        if (!empty($donos)) {
            ComunidadeTopico::delete()
            ->where('id', $delete)
            ->execute();
             // deletar as mensagens do topico a ser deletado
            ComunidadeMensagen::delete()
            ->where('id_topico', $delete)
            ->execute();
            
               // buscar total de topicos da comunidade
        $total = ComunidadeTopico::select()
        ->where('id_comunidade', $return)
        ->count();
        // retorna o resultado

        // inserir quantidade de topicos
        Comunidade::update([
        'somatopicos' => $total
        ])
        ->where('id', $return)
        ->execute();
            
        }
        
        $this->redirect('/comunidade/topicos/uid='.$return); // retorna para página de origem

    }

    // DELETAR FOTO DOS ALBUNS DOS PERFIL
    public function deletarPhotoDoAlbum() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $album = addslashes(intval(filter_input(INPUT_GET, 'album', FILTER_SANITIZE_STRING))); // id do album
        $photo = addslashes(intval(filter_input(INPUT_GET, 'photo', FILTER_SANITIZE_STRING))); // id da foto

        $foto = AlbumPhoto::select()->where('id', $photo)->one(); // buscar link da foto antes de deletar do db
        $capaAlbum = Album::select()->where('id', $album)->one(); // buscar link da foto de capa do album
        $capa = 'album.jpg';

        // fase 1 deletar foto individual
        // verificar se o id é o mesmo da pessoa logada
        if ($uid === $this->loggedUser->id) {
            AlbumPhoto::delete()
            ->where('id', $photo)
            ->where('id_album', $album)
            ->where('id_user', $this->loggedUser->id) // só deletar se o id da pessoa logada for correspondido
            ->execute();
            
            AlbumPhotoComment::delete()
                ->where('id_album', $album)
                ->where('id_photo', $photo)
                ->execute();
                
                // buscar total de fotos por album
            $total = AlbumPhoto::select()
            ->where('id_user', $this->loggedUser->id)
            ->where('id_album', $album)
            ->count();
            // retorna o resultado

            // inserir quantidade de fotos na coluna somarfotos do album
            Album::update([
            'somarfotos' => $total
            ])
            ->where('id', $album)
            ->execute();

            // buscar total de fotos do usuario
            $totalfotos = AlbumPhoto::select()
            ->where('id_user', $this->loggedUser->id)
            ->count();
            // retorna o resultado

            // inserir quantidade de fotos na coluna somafotos do usuario
            User::update([
            'somafotos' => $totalfotos
            ])
            ->where('id', $this->loggedUser->id)
            ->execute();

             // verificar se a capa do álbum é a mesma da foto a ser deletada
             if ($foto['photo'] === $capaAlbum['capa']) {

                Album::update([
                    'capa' => $capa
                    ])
                    ->where('id', $album)
                    ->execute();

            }

            // fase 2 deletar a foto da pasta
            unlink('./media/uploads/'.$foto['photo']);

        }
            
        $this->redirect('/album/fotos/uid='.$this->loggedUser->id.'&album='.$album); // retorna para página de origem

    }

    // DELETAR FOTO DOS ALBUNS DOS PERFIL
    public function deletarAlbumPhotosPerfil() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $delet = addslashes(intval(filter_input(INPUT_GET, 'delet', FILTER_SANITIZE_STRING))); // id do album

        $fotos = AlbumPhoto::select()->where('id_album', $delet)->where('id_user', $this->loggedUser->id)->get(); // buscar link da foto antes de deletar do db
        

        // fase 1 deletar foto individual
        // verificar se o id é o mesmo da pessoa logada
        if ($uid === $this->loggedUser->id) {

            Album::delete()
            ->where('id', $delet)
            ->where('id_user', $this->loggedUser->id) // só deletar se o id da pessoa logada for correspondido
            ->execute();

            AlbumPhoto::delete()
            ->where('id_album', $delet)
            ->where('id_user', $this->loggedUser->id) // só deletar se o id da pessoa logada for correspondido
            ->execute();
            
            AlbumPhotoComment::delete()
                ->where('id_album', $delet)
                ->execute();

            // buscar total de fotos do usuario
            $totalfotos = AlbumPhoto::select()
            ->where('id_user', $this->loggedUser->id)
            ->count();
            // retorna o resultado

            // inserir quantidade de fotos na coluna somafotos do usuario
            User::update([
            'somafotos' => $totalfotos
            ])
            ->where('id', $this->loggedUser->id)
            ->execute();

            foreach($fotos as $foto) {
                unlink('./media/uploads/'.$foto['photo']);
            }

        }
            
        $this->redirect('/fotos'); // retorna para página de origem

    }


    // DELETAR COMENTARIOS DAS FOTOS DOS ALBUMS DO PERFIL
    public function deletAlbumPhotoComment() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $album = addslashes(intval(filter_input(INPUT_GET, 'album', FILTER_SANITIZE_STRING))); // id do ALBUM
        $photo = addslashes(intval(filter_input(INPUT_GET, 'photo', FILTER_SANITIZE_STRING))); // id da PHOTO
        $comment = addslashes(intval(filter_input(INPUT_GET, 'comment', FILTER_SANITIZE_STRING))); // id do COMMENT
        
            // fase 1 deletar seus comentarios 
        // verificar se o id é o mesmo da pessoa logada
        if ($uid === $this->loggedUser->id) {
            AlbumPhotoComment::delete()
            ->where('id', $comment)
            ->where('id_album', $album)
            ->where('id_photo', $photo)
            ->execute();
        }
            // varificação de depoimentos recebido
        $users = AlbumPhotoComment::select()->where('id', $comment)->where('id_user', $this->loggedUser->id)->get();
        
            //fase 2 deletar atravez de quem recebeu
        // verificar se o id é o mesmo da pessoa logada
        if (!empty($users)) {
            AlbumPhotoComment::delete()
            ->where('id', $comment)
            ->where('id_user', $this->loggedUser->id)
            ->where('id_album', $album)
            ->where('id_photo', $photo)
            ->execute();
        }
        
        $this->redirect('/album/foto/uid='.$uid.'&album='.$album.'&photo='.$photo); // retorna para página de origem

    }

}