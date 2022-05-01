<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\PostHandler;
use \src\handlers\RecadoHandler;
use \src\handlers\VideoHandler;

class HomeController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        // page variavel P = o link na url
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        $feed = PostHandler::getHomeFeed(
            $this->loggedUser->id,
            $page
        );
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

        // Pegando os recados do usuário
        $recados = RecadoHandler::getUserRecados($id, $page, $this->loggedUser->id);

        // Pegando os fas do usuário
        $fas = UserHandler::getUserFas($id, $this->loggedUser->id);

        // Pegando os vídeos do usuário
        $video = VideoHandler::getUserFeed($id, $page, $this->loggedUser->id);

        // Verificar se EU sigo o usuário
        $isFollowing = false;
        if($user->id = $this->loggedUser->id) {
            $isFollowing = UserHandler::isFollowing($user->id, $this->loggedUser->id);

        }
        
        $this->render('home', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'feed' => $feed,
            'recados' => $recados,
            'fas' => $fas,
            'video' => $video,
            'isFollowing' => $isFollowing
            
        ]);
    }

}