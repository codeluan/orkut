<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\RecadoHandler;

class RecadoController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

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

        // Verificar se EU sigo o usuário
        $isFollowing = false;
        if($user->id != $this->loggedUser->id) {
            $isFollowing = UserHandler::isFollowing($this->loggedUser->id, $user->id);

        }

        // Pegando os recados do usuário
        $recados = RecadoHandler::getUserRecados($id, $page, $this->loggedUser->id);

        $this->render('recados', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'recados' => $recados,
            'isFollowing' => $isFollowing
        ]);
    }

    public function editarRecados($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));
        $view = addslashes(intval(filter_input(INPUT_GET, 'view', FILTER_SANITIZE_STRING))); // id do feed
        $return = addslashes(intval(filter_input(INPUT_GET, 'return', FILTER_SANITIZE_STRING))); // id do feed

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
        $feed = RecadoHandler::getUserEditRecado($view, $page, $id, $return, $this->loggedUser->id);

        if(empty($feed)) {
            $this->redirect('/recados');
        }

        $this->render('edit_recado', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'feed' => $feed,
            'return' => $return,
            'isFollowing' => $isFollowing
        ]);
    }


}