<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\RecadoHandler;
use \src\models\VotoConfiavel;
use \src\models\VotoLegal;
use \src\models\VotoSexy;
use \src\models\User;

class VotoController extends Controller {

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

        $this->render('votos', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'isFollowing' => $isFollowing
        ]);
    }

        // votos Confiavel com calculo e remoção de duplicados
    public function votoconfiavel() {
        $vid = addslashes(intval(filter_input(INPUT_GET, 'vid', FILTER_SANITIZE_STRING)));
        $voto = addslashes(intval(filter_input(INPUT_GET, 'voto', FILTER_SANITIZE_STRING)));
        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

            // deletar votos duplicados
        VotoConfiavel::delete()
            ->where('id_usuario', $id)
            ->where('id_para', $vid)
        ->execute();

            if($voto >= 1 && $voto <=3){
                // inserir o voto no db
            VotoConfiavel::insert([
                'id_usuario' => $id,
                'id_para' => $vid,
                'nota' => $voto,
                'created_at' => date('Y-m-d H:i:s')
            ])->execute();
                // quantidade de votos id 
            $soma = VotoConfiavel::select()
            ->where('id_para', $vid)
            ->count();

                // soma dos votos
            $total = VotoConfiavel::select ()
            ->where('id_para', $vid)
            ->SUM(nota);
                //calculo com resultado final em %
            $resultado = $total/$soma*100/3;
                // insedir o resultado na coluna sexy do usuario
            User::update([
                'votoconfiavel' => $resultado
               ])
               ->where('id', $vid)
               ->execute();   
            
            }
            // retorna para página de origem
            $this->redirect('/votos/uid='.$vid);
    }

    // votos Legal com calculo e remoção de duplicados
    public function votolegal() {
        $vid = addslashes(intval(filter_input(INPUT_GET, 'vid', FILTER_SANITIZE_STRING)));
        $voto = addslashes(intval(filter_input(INPUT_GET, 'voto', FILTER_SANITIZE_STRING)));
        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

            // deletar votos duplicados
        VotoLegal::delete()
            ->where('id_usuario', $id)
            ->where('id_para', $vid)
        ->execute();

            if($voto >= 1 && $voto <=3){
                // inserir o voto no db
            VotoLegal::insert([
                'id_usuario' => $id,
                'id_para' => $vid,
                'nota' => $voto,
                'created_at' => date('Y-m-d H:i:s')
            ])->execute();
                // quantidade de votos id 
            $soma = VotoLegal::select()
            ->where('id_para', $vid)
            ->count();

                // soma dos votos
            $total = VotoLegal::select ()
            ->where('id_para', $vid)
            ->SUM(nota);
                //calculo com resultado final em %
            $resultado = $total/$soma*100/3;
                // insedir o resultado na coluna sexy do usuario
            User::update([
                'votolegal' => $resultado
               ])
               ->where('id', $vid)
               ->execute();   
            
            }
            // retorna para página de origem
            $this->redirect('/votos/uid='.$vid);
    }

    // votos SEXY com calculo e remoção de duplicados
    public function votosexy() {
        $vid = addslashes(intval(filter_input(INPUT_GET, 'vid', FILTER_SANITIZE_STRING)));
        $voto = addslashes(intval(filter_input(INPUT_GET, 'voto', FILTER_SANITIZE_STRING)));
        // Detectando o usuário acessado
        $id = $this->loggedUser->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

            // deletar votos duplicados
        VotoSexy::delete()
            ->where('id_usuario', $id)
            ->where('id_para', $vid)
        ->execute();

            if($voto >= 1 && $voto <=3){
                // inserir o voto no db
            VotoSexy::insert([
                'id_usuario' => $id,
                'id_para' => $vid,
                'nota' => $voto,
                'created_at' => date('Y-m-d H:i:s')
            ])->execute();
                // quantidade de votos id 
            $soma = VotoSexy::select()
            ->where('id_para', $vid)
            ->count();

                // soma dos votos
            $total = VotoSexy::select ()
            ->where('id_para', $vid)
            ->SUM(nota);
                //calculo com resultado final em %
            $resultado = $total/$soma*100/3;
                // insedir o resultado na coluna sexy do usuario
            User::update([
                'votosexys' => $resultado
               ])
               ->where('id', $vid)
               ->execute();   
            
            }
            // retorna para página de origem
            $this->redirect('/votos/uid='.$vid);
    }

}