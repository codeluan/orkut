<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\VideoHandler;

class PostVideoController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }
        // recebe os dados do form na pagina postar vídeo
    public function new() {
        $titulo_video = addslashes(filter_input(INPUT_POST, 'titulo_video', FILTER_SANITIZE_STRING));
        $id_video = addslashes(filter_input(INPUT_POST, 'id_video', FILTER_SANITIZE_STRING));
        if($titulo_video && $id_video) {
            VideoHandler::addVideo(
                $this->loggedUser->id,
                $id_video,
                $titulo_video
            );
        }
        
        $this->redirect('/videos/uid='.$this->loggedUser->id);

       
    }

}