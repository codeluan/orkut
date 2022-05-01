<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\AlbumHandler;
use \src\handlers\PostHandler;
use \src\handlers\ChatHandler;
use \src\handlers\VideoHandler;
use \src\handlers\DepoimentoHandler;

class ChatController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }
    
          // função gerar página de amigos
    public function index($atts = []) {

        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Pegando os membros da comunidade
       $membros = UserHandler::getAmigosChat($page, $this->loggedUser->id);

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
        $recados = ChatHandler::getUserRecados($id, $page, $this->loggedUser->id);

        $this->render('chat', [
            'loggedUser' => $this->loggedUser,
            'membros' => $membros,
            'user' => $user,
            'recados' => $recados,
            'isFollowing' => $isFollowing
        ]);
    }

    // recebe os dados do form na pagina do chat
    public function new() {
        $body = addslashes(filter_input(INPUT_POST, 'body', FILTER_SANITIZE_STRING));
        $idpara = addslashes(intval(filter_input(INPUT_POST, 'idpara', FILTER_SANITIZE_STRING)));
        if($body && $idpara) {
            ChatHandler::addChat(
                $this->loggedUser->id,
                $body,
                $idpara
            );
        }
        
        $this->redirect('/chat/uid='.$idpara);

       
    }

}