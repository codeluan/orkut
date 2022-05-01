<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\AlbumHandler;

class PostAlbumController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    // recebe os dados do form na pagina CRIAR NOVO ÁLBUM
    public function newAlbum() {
        $titulo_album = addslashes(filter_input(INPUT_POST, 'titulo_album', FILTER_SANITIZE_STRING));
        $descricao = addslashes(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));
        if($titulo_album && $descricao) {
            AlbumHandler::addAlbum(
                $this->loggedUser->id,
                $titulo_album,
                $descricao
            );
        }
        
        $this->redirect('/fotos/uid='.$this->loggedUser->id);

       
    }

    // recebe os dados do form na pagina CRIAR NOVO ÁLBUM
    public function newAlbumPhoto() {
        $id_album = addslashes(intval(filter_input(INPUT_POST, 'id_album', FILTER_SANITIZE_STRING)));
        $photo = addslashes(filter_input(INPUT_POST, 'photo', FILTER_SANITIZE_STRING));
        

        if (isset($_FILES['photo']) && !empty($_FILES['photo']['tmp_name'])) {
            $newAvatar = $_FILES['photo'];

            if(in_array($newAvatar['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
                $avatarWidth = 800;
                $avatarHeight = 800;

                list($widthOrig, $heightOrig) = getimagesize($newAvatar['tmp_name']);
                $ratio = $widthOrig / $heightOrig;

                $newWidth = $avatarWidth;
                $newHeight = $newWidth / $ratio;

                if($newHeight < $avatarHeight) {
                    $newHeight = $avatarHeight;
                    $newWidth = $newHeight * $ratio;
                }

                $x = $avatarWidth - $newWidth;
                $y = $avatarHeight - $newHeight;
                $x = $x<0 ? $x/2 : $x;
                $y = $y<0 ? $y/2 : $y;

                $finalImage = imagecreatetruecolor($avatarWidth, $avatarHeight);
                switch($newAvatar['type']) {
                    case 'image/jpeg':
                    case 'image/jpg':
                        $image = imagecreatefromjpeg($newAvatar['tmp_name']);
                    break;
                    case 'image/png':
                        $image = imagecreatefrompng($newAvatar['tmp_name']);
                    break;
                }

                imagecopyresampled(
                    $finalImage, $image,
                    $x, $y, 0, 0,
                    $newWidth, $newHeight, $widthOrig, $heightOrig
                );

                $avatarName = md5(time().rand(0,9999)).'.jpg';

                imagejpeg($finalImage, './media/uploads/'.$avatarName, 100);

            }
        }

        if($id_album && $this->loggedUser->id) {
            AlbumHandler::addAlbumPhoto($this->loggedUser->id, $id_album, $avatarName);
        }
        
        $this->redirect('/album/fotos/uid='.$this->loggedUser->id.'&album='.$id_album);

       
    }

    // recebe os dados do form na pagina foto e inserir comment
    public function newAlbumPhotoComment() {
        $body = addslashes(filter_input(INPUT_POST, 'body', FILTER_SANITIZE_STRING));
        $id_user = addslashes(intval(filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_STRING)));
        $id_album = addslashes(intval(filter_input(INPUT_POST, 'id_album', FILTER_SANITIZE_STRING)));
        $id_photo = addslashes(intval(filter_input(INPUT_POST, 'id_photo', FILTER_SANITIZE_STRING)));
        if($body && $id_user && $id_album && $id_photo) {
            
            
                AlbumHandler::addPhotoComment(
                    $this->loggedUser->id, $body, $id_user, $id_album, $id_photo,
                );
            
        }
        
        $this->redirect('/album/foto/uid='.$id_user.'&album='.$id_album.'&photo='.$id_photo);

    }

}