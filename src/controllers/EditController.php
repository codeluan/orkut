<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\AdminHandler;
use \src\handlers\UserHandler;
use \src\handlers\PostHandler;
use \src\handlers\RecadoHandler;
use \src\handlers\VideoHandler;
use \src\models\Album; // FUNCIONANDO
use \src\models\AlbumPhoto; // FUNCIONANDO
use \src\models\AlbumPhotoComment; // FUNCIONANDO
use \src\models\User;
use \src\models\Post; // FUNCIONANDO
use \src\models\UserRelation;
use \src\models\UserFa;
use \src\models\VotoConfiavel;
use \src\models\VotoLegal;
use \src\models\VotoSexy;
use \src\models\Depoimento; // FUNCIONANDO
use \src\models\Comunidade;
use \src\models\ComunidadeMembro;
use \src\models\ComunidadeTopico;
use \src\models\ComunidadeMensagen;
use \src\models\Recado; // FUNCIONANDO
use \src\models\Video;

class EditController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

            // FALTA FINALIZAR
        // EDITAR VÍDEOS 
    public function editVideo() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $edit = addslashes(intval(filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_STRING))); // id do vídeo

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

    //  EDITAR FEED USUARIO
    public function editFeed() {
        $body = addslashes(filter_input(INPUT_POST,'body', FILTER_SANITIZE_STRING));
        $id = addslashes(intval(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING))); // id do vídeo
        $id_user = addslashes(intval(filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_STRING)));

        // verificar se o id_user é o mesmo da pessoa logada
        if ($id_user === $this->loggedUser->id) {
            // inserir atualização do feed
            Post::update([
            'body' => $body
            ])
            ->where('id', $id)
            ->where('id_user', $this->loggedUser->id) // só atualizar se o id é da pessoa logada
            ->execute();
        }
        
        $this->redirect('/feed/uid='.$id_user.'&view='.$id); // retorna para página de origem
    }

    //  EDITAR FEED USUARIO
    public function editRecado() {
        $body = addslashes(filter_input(INPUT_POST,'body', FILTER_SANITIZE_STRING));
        $id = addslashes(intval(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING))); // id do vídeo
        $id_user = addslashes(intval(filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_STRING)));
        $return = addslashes(intval(filter_input(INPUT_POST, 'return', FILTER_SANITIZE_STRING)));
        

        // verificar se o id_user é o mesmo da pessoa logada
        if ($id_user === $this->loggedUser->id) {
            // inserir atualização do recado
            Recado::update([
            'body' => $body
            ])
            ->where('id', $id)
            ->where('id_user', $this->loggedUser->id) // só atualizar se o id é da pessoa logada
            ->execute();
        }
        
        $this->redirect('/recados/uid='.$return); // retorna para página de origem
    }

    //  EDITAR DEPOIMENTO DO USUARIO
    public function editDepoimento() {
        $body = addslashes(filter_input(INPUT_POST,'body', FILTER_SANITIZE_STRING));
        $id = addslashes(intval(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING))); // id do vídeo
        $id_user = addslashes(intval(filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_STRING)));    

        // verificar se o id_user é o mesmo da pessoa logada
        if ($id_user === $this->loggedUser->id) {
            // inserir atualização do depoimento
            Depoimento::update([
            'body' => $body
            ])
            ->where('id', $id)
            ->where('id_user', $this->loggedUser->id) // só atualizar se o id é da pessoa logada
            ->execute();
        }
        
        $this->redirect('/depoimento/uid='.$this->loggedUser->id); // retorna para página de origem
    }

    //  EDITAR PHOTO DO ALBUM USUARIO
    public function editAlbumPhoto() {
        $descricao = addslashes(filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING));
        $id_album = addslashes(intval(filter_input(INPUT_POST, 'id_album', FILTER_SANITIZE_STRING)));
        $id_user = addslashes(intval(filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_STRING)));
        $id_photo = addslashes(intval(filter_input(INPUT_POST, 'id_photo', FILTER_SANITIZE_STRING)));
        $capa = addslashes(intval(filter_input(INPUT_POST, 'capa', FILTER_SANITIZE_STRING)));

        $foto = AlbumPhoto::select()->where('id', $id_photo)->one(); // buscar link da foto para atualizar capa

        // verificar se o id_user é o mesmo da pessoa logada
        if ($id_user === $this->loggedUser->id) {
            // inserir atualização da photo
            AlbumPhoto::update([
            'descricao' => $descricao
            ])
            ->where('id', $id_photo)
            ->where('id_user', $this->loggedUser->id) // só atualizar se o id é da pessoa logada
            ->where('id_album', $id_album)
            ->execute();

            if ($capa === '1'){
            // inserir atualização da capa
            Album::update([
                'capa' => $foto['photo']
                ])
                ->where('id', $id_album)
                ->where('id_user', $this->loggedUser->id) // só atualizar se o id é da pessoa logada
                ->execute();
            }
        }
        
        $this->redirect('/album/foto/uid='.$this->loggedUser->id.'&album='.$id_album.'&photo='.$id_photo); // retorna para página de origem
    }

    //  EDITAR PHOTO DO ALBUM USUARIO
    public function editProfileAlbum() {
        $descricao = addslashes(filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING));
        $titulo_album = addslashes(filter_input(INPUT_POST,'titulo_album', FILTER_SANITIZE_STRING));
        $id_album = addslashes(intval(filter_input(INPUT_POST, 'id_album', FILTER_SANITIZE_STRING)));
        $id_user = addslashes(intval(filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_STRING)));

        // verificar se o id_user é o mesmo da pessoa logada
        if ($id_user === $this->loggedUser->id) {
            // inserir atualização da photo
            Album::update([
            'titulo_album' => $titulo_album,
            'descricao' => $descricao,
            
            ])
            ->where('id', $id_album)
            ->where('id_user', $this->loggedUser->id) // só atualizar se o id é da pessoa logada
            ->execute();
        }
        
        $this->redirect('/fotos/uid='.$this->loggedUser->id); // retorna para página de origem
    }

    //  EDITAR COMMETNS DAS FOTOS DOS ALGUNS DOS USUARIOS
    public function editCommetProfilePhotoAlbum() {
        $uid = addslashes(intval(filter_input(INPUT_POST, 'uid', FILTER_SANITIZE_STRING))); // id do usuario
        $id_user = addslashes(intval(filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_STRING))); // id do usuario
        $album = addslashes(intval(filter_input(INPUT_POST, 'id_album', FILTER_SANITIZE_STRING))); // id do ALBUM
        $photo = addslashes(intval(filter_input(INPUT_POST, 'id_photo', FILTER_SANITIZE_STRING))); // id da PHOTO
        $comment = addslashes(intval(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING))); // id do COMMENT
        $body = addslashes(filter_input(INPUT_POST, 'body', FILTER_SANITIZE_STRING)); // id do COMMENT

        // verificar se o id_user é o mesmo da pessoa logada
        if ($id_user === $this->loggedUser->id) {
            // inserir atualização do feed
            AlbumPhotoComment::update([
            'body' => $body
            ])
            ->where('id', $comment)
            ->where('id_user', $this->loggedUser->id) // só atualizar se o id é da pessoa logada
            ->where('id_album', $album)
            ->where('id_photo', $photo)
            ->execute();
        }
        
        $this->redirect('/album/foto/uid='.$uid.'&album='.$album.'&photo='.$photo); // retorna para página de origem
    }

}