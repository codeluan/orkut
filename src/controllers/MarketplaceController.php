<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\VideoHandler;

class MarketplaceController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

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

        $dateFrom = new \DateTime($user->birthdate);
        $dateTo = new \DateTime('today');
        $user->ageYears = $dateFrom->diff($dateTo)->y;

        
        // enviando informações para página vídeo
        $this->render('marketplace', [
            'loggedUser' => $this->loggedUser,
            'user' => $user
        ]);
    }

}