<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\RecadoHandler;

class PostRecadoController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }
        // recebe os dados do form na pagina de recados
    public function new() {
        $body = addslashes(filter_input(INPUT_POST, 'body', FILTER_SANITIZE_STRING));
        $idpara = addslashes(intval(filter_input(INPUT_POST, 'idpara', FILTER_SANITIZE_STRING)));
        if($body && $idpara) {
            RecadoHandler::addRecado(
                $this->loggedUser->id,
                'text',
                $body,
                $idpara
            );
        }
        
        $this->redirect('/recados/uid='.$idpara);

       
    }

}