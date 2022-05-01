<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\PostHandler;
use \src\handlers\AlbumHandler;

class PostController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function new() {
        $body = addslashes(filter_input(INPUT_POST, 'body', FILTER_SANITIZE_STRING));
        if($body) {
            PostHandler::addPost(
                $this->loggedUser->id,
                'text',
                $body
            );
        }
        
        $this->redirect('/');
    }

}