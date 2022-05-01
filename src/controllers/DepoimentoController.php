<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\DepoimentoHandler;

class DepoimentoController extends Controller {

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

        $depoimentos = DepoimentoHandler::getDepoimentos($id, $page, $this->loggedUser->id);

        $this->render('depoimento', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'depoimentos' => $depoimentos,
            'isFollowing' => $isFollowing
        ]);
    }

    public function depoimentoescrevi($atts =[]) {
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

        $depoimentos = DepoimentoHandler::getDepoimentosEscrevi($id, $page, $this->loggedUser->id);

        $this->render('depoimento_que_escrevi', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'depoimentos' => $depoimentos,
            'isFollowing' => $isFollowing
        ]);
    }

    public function editDepoimento($atts =[]) {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING)));
        $edit = addslashes(intval(filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_STRING))); // id do depoimento

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
        $depoimento = DepoimentoHandler::getUserEditDepoimento($edit, $id, $this->loggedUser->id);

        if(empty($depoimento)) {
            $this->redirect('/depoimento');
        }

        $this->render('edit_depoimento', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'depoimento' => $depoimento,
            'isFollowing' => $isFollowing
        ]);
    }


}