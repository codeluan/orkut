<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\ComunidadeHandler;

class SearchController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function searchUsers($atts =[]) {
        $searchTerm = addslashes(filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING));

        if(empty($searchTerm)) {
            $this->redirect('/');
        }

        $users = UserHandler::searchUser($searchTerm);
        
        $this->render('pesquisa_users', [
            'loggedUser' => $this->loggedUser,
            'searchTerm' => $searchTerm,
            'users' => $users
        ]);
    }

    public function searchCommunity($atts =[]) {
        $searchTerm = addslashes(filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING));

        if(empty($searchTerm)) {
            $this->redirect('/');
        }

        $comunidades = ComunidadeHandler::searchComunidades($searchTerm);

        $this->render('pesquisa_comunidade', [
            'loggedUser' => $this->loggedUser,
            'searchTerm' => $searchTerm,
            'comunidades' => $comunidades
        ]);
    }

}