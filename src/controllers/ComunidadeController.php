<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\DepoimentoHandler;
use \src\handlers\ComunidadeHandler;
use \src\models\ComunidadeMembro;
use \src\models\User;

class ComunidadeController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }
    
        // página inicial das comunidades
    public function index($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        $comunidades = ComunidadeHandler::getComunidades($atts);
        if(!$comunidades) {
            $this->redirect('/');
        }

        // Detectando a comunidade acessada
        $id = $comunidades->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Verificar se EU sou membro da comunidade
        $comunidadeisFollowing = false;
        if($comunidades->id != $this->loggedUser->id) {
            $comunidadeisFollowing = ComunidadeHandler::comunidadeisFollowing($this->loggedUser->id, $comunidades->id);

        }
        
        // Pegando os topicos da comunidade
        $topicos = ComunidadeHandler::getComunidadeTopicosIndex($id, $page, $this->loggedUser->id);

        $this->render('comunidades', [
            'loggedUser' => $this->loggedUser,
            'topicos' => $topicos,
            'comunidadeisFollowing' => $comunidadeisFollowing,
            'comunidades' => $comunidades
        ]);
    }

    public function comunidadeList($atts =[]) {
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

        $comunidades = UserHandler::getComunidadesParticipo($id, $page, $this->loggedUser->id);

        $this->render('comunidade_list', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'comunidades' => $comunidades,
            'isFollowing' => $isFollowing
        ]);
    }

    public function comunidadeListDono($atts =[]) {
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

        $comunidades = UserHandler::getComunidadesDono($id, $page, $this->loggedUser->id);

        $this->render('comunidade_list_dono', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'comunidades' => $comunidades,
            'isFollowing' => $isFollowing
        ]);
    }

    // Exibir todos os topicos das comunidades
    public function topicos($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        $comunidades = ComunidadeHandler::getComunidades($atts);
        if(!$comunidades) {
            $this->redirect('/');
        }

        // Detectando a comunidade acessada
        $id = $comunidades->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Verificar se EU sou membro da comunidade
        $comunidadeisFollowing = false;
        if($comunidades->id != $this->loggedUser->id) {
            $comunidadeisFollowing = ComunidadeHandler::comunidadeisFollowing($this->loggedUser->id, $comunidades->id);

        }
        
        // Pegando os topicos da comunidade
        $topicos = ComunidadeHandler::getComunidadeTopicos( $id, $page, $this->loggedUser->id);

        $this->render('comunidades_topicos', [
            'loggedUser' => $this->loggedUser,
            'topicos' => $topicos,
            'comunidadeisFollowing' => $comunidadeisFollowing,
            'comunidades' => $comunidades
        ]);
    }

    // Exibir todas as mensagens dos topicos
    public function mensagens($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        $comunidadetopico = ComunidadeHandler::getComunidadeTopicoMensagens($atts);
        if(!$comunidadetopico) {
            $this->redirect('/');
        }

        // Pegando os topicos da comunidade
        $topicos = ComunidadeHandler::getComunidadeMensagens($comunidadetopico->id, $page, $this->loggedUser->id);
        $comunidades = ComunidadeHandler::getComunidades($comunidadetopico->id_comunidade);
        if(!$comunidades) {
            $this->redirect('/');
        }

        // Detectando a comunidade acessada
        $id = $comunidadetopico->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Verificar se EU sou membro da comunidade
        $comunidadeisFollowing = false;
        if($comunidades->id != $this->loggedUser->id) {
            $comunidadeisFollowing = ComunidadeHandler::comunidadeisFollowing($this->loggedUser->id, $comunidades->id);

        }
        
        $this->render('comunidades_mensagens', [
            'loggedUser' => $this->loggedUser,
            'topicos' => $topicos,
            'comunidades' => $comunidades,
            'comunidadeisFollowing' => $comunidadeisFollowing,
            'comunidadetopico' => $comunidadetopico
        ]);
    }

    // Exibir todas as enquetes das comunidades
    public function enquetes($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        $comunidades = ComunidadeHandler::getComunidades($atts);
        if(!$comunidades) {
            $this->redirect('/');
        }

        // Detectando a comunidade acessada
        $id = $comunidades->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Verificar se EU sou membro da comunidade
        $comunidadeisFollowing = false;
        if($comunidades->id != $this->loggedUser->id) {
            $comunidadeisFollowing = ComunidadeHandler::comunidadeisFollowing($this->loggedUser->id, $comunidades->id);

        }
        
        // Pegando os topicos da comunidade
        $topicos = ComunidadeHandler::getComunidadeTopicos( $id, $page, $this->loggedUser->id);

        $this->render('comunidades_enquetes', [
            'loggedUser' => $this->loggedUser,
            'topicos' => $topicos,
            'comunidadeisFollowing' => $comunidadeisFollowing,
            'comunidades' => $comunidades,
            
        ]);
    }

     // criar enquetes nas comunidades
     public function criarenquetes($atts =[]) {
 
        $comunidades = ComunidadeHandler::getComunidades($atts);
        if(!$comunidades) {
            $this->redirect('/');
        }

        // Detectando a comunidade acessada
        $id = $comunidades->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Verificar se EU sou membro da comunidade
        $comunidadeisFollowing = false;
        if($comunidades->id != $this->loggedUser->id) {
            $comunidadeisFollowing = ComunidadeHandler::comunidadeisFollowing($this->loggedUser->id, $comunidades->id);

        }
            // carregar a página
        $this->render('comunidades_criar_enquetes', [
            'loggedUser' => $this->loggedUser,
            'comunidadeisFollowing' => $comunidadeisFollowing,
            'comunidades' => $comunidades,
            
        ]);
    }

    // Exibir todos os MEMBROS da comunidade
    public function membros($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        $comunidades = ComunidadeHandler::getComunidades($atts);
        if(!$comunidades) {
            $this->redirect('/');
        }

        // Pegando os membros da comunidade
       $membros = ComunidadeHandler::getComunidadeMembros($atts, $page, $this->loggedUser->id);

        // Detectando a comunidade acessada
        $id = $comunidades->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Verificar se EU sou MEMBRO
        $comunidadeisFollowing = false;
        if($comunidades->id != $this->loggedUser->id) {
            $comunidadeisFollowing = ComunidadeHandler::comunidadeisFollowing($this->loggedUser->id, $comunidades->id);

        }

        $this->render('comunidades_membros', [
            'loggedUser' => $this->loggedUser,
            'membros' => $membros,
            'comunidadeisFollowing' => $comunidadeisFollowing,
            'comunidades' => $comunidades,
            
        ]);
    }

    // Exibir todas as comunidades relacionadas
    public function comunidadesrelacionadas($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        $comunidades = ComunidadeHandler::getComunidades($atts);
        if(!$comunidades) {
            $this->redirect('/');
        }

        // Pegando as comunidades relacionadas
       $relacionadas = ComunidadeHandler::getComunidadeRelacionadas($atts, $page, $this->loggedUser->id);

        // Detectando a comunidade acessada
        $id = $comunidades->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Verificar se EU sou MEMBRO
        $comunidadeisFollowing = false;
        if($comunidades->id != $this->loggedUser->id) {
            $comunidadeisFollowing = ComunidadeHandler::comunidadeisFollowing($this->loggedUser->id, $comunidades->id);

        }

        $this->render('comunidades_relacionadas', [
            'loggedUser' => $this->loggedUser,
            'relacionadas' => $relacionadas,
            'comunidadeisFollowing' => $comunidadeisFollowing,
            'comunidades' => $comunidades
        ]);
    }

    // Exibir todas as comunidades relacionadas
    public function comunidadesbuscarelacionadas($atts =[]) {
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        $comunidades = ComunidadeHandler::getComunidades($atts);
        if(!$comunidades) {
            $this->redirect('/');
        }

        // Detectando a comunidade acessada
        $id = $comunidades->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Verificar se EU sou MEMBRO
        $comunidadeisFollowing = false;
        if($comunidades->id != $this->loggedUser->id) {
            $comunidadeisFollowing = ComunidadeHandler::comunidadeisFollowing($this->loggedUser->id, $comunidades->id);

        }

        $searchTerm = addslashes(filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING));
        
        if(empty($searchTerm)) {
            $searchTerm = '0';
        }
        
        $resultados = ComunidadeHandler::searchComunidades($searchTerm);

        $this->render('comunidades_buscar', [
            'loggedUser' => $this->loggedUser,
            'comunidadeisFollowing' => $comunidadeisFollowing,
            'comunidades' => $comunidades,
            'resultados' => $resultados,
            'searchTerm' => $searchTerm
        ]);
    }

        // criar as comunidades
    public function criar($atts =[]) {
        
        // Detectando o usuário
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

       $this->render('criar_comunidades', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            
        ]);
    }
        // criar os topicos das comunidades
    public function criartopicos($atts =[]) {
 
        $comunidades = ComunidadeHandler::getComunidades($atts);
        if(!$comunidades) {
            $this->redirect('/');
        }

        // Detectando a comunidade acessada
        $id = $comunidades->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Verificar se EU sou membro da comunidade
        $comunidadeisFollowing = false;
        if($comunidades->id != $this->loggedUser->id) {
            $comunidadeisFollowing = ComunidadeHandler::comunidadeisFollowing($this->loggedUser->id, $comunidades->id);

        }
            // carregar a página
        $this->render('comunidades_criar_topico', [
            'loggedUser' => $this->loggedUser,
            'comunidadeisFollowing' => $comunidadeisFollowing,
            'comunidades' => $comunidades,
            
        ]);
    }

    public function criarmensagens($atts =[]) {
 
        $page = addslashes(intval(filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING)));

        $comunidadetopico = ComunidadeHandler::getComunidadeTopicoMensagens($atts);
        if(!$comunidadetopico) {
            $this->redirect('/');
        }

        // Pegando os topicos da comunidade
        $topicos = ComunidadeHandler::getComunidadeMensagens($comunidadetopico->id_comunidade, $page, $this->loggedUser->id);

        $comunidades = ComunidadeHandler::getComunidades($comunidadetopico->id_comunidade);
        if(!$comunidades) {
            $this->redirect('/');
        }

        // Detectando a comunidade acessada
        $id = $comunidadetopico->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Verificar se EU sou membro
        $comunidadeisFollowing = false;
        if($comunidades->id != $this->loggedUser->id) {
            $comunidadeisFollowing = ComunidadeHandler::comunidadeisFollowing($this->loggedUser->id, $comunidades->id);

        }
            // carregar a página
        $this->render('comunidades_criar_mensagens', [
            'loggedUser' => $this->loggedUser,
            'topicos' => $topicos,
            'comunidades' => $comunidades,
            'comunidadeisFollowing' => $comunidadeisFollowing,
            'comunidadetopico' => $comunidadetopico,
            
        ]);
    }


        // recebe os dados do form na pagina criar comunidades
        public function new() {
            $nome = addslashes(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
            $descricao = addslashes(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));
            if($nome && $descricao) {
                ComunidadeHandler::addComunidade(
                    $this->loggedUser->id,
                    $nome,
                    $descricao
                );
            }
            
            $this->redirect('/comunidades'); 
        }

        // recebe os dados do form na pagina criar topicos das comunidades
        public function newtopico() {

            $assunto = addslashes(filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING));
            $mensagem = addslashes(filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING));
            $comunidade = addslashes(intval(filter_input(INPUT_POST, 'comunidade', FILTER_SANITIZE_STRING)));
            if($assunto && $mensagem) {
                ComunidadeHandler::addTopico(
                    $this->loggedUser->id,
                    $comunidade,
                    $assunto,
                    $mensagem,
                );
            }
            
            $this->redirect('/comunidade/uid='.$comunidade); 
        }

        // recebe os dados do form na pagina criar mensagens dos topicos das comunidades
        public function newmensagem() {
            $idcmm = addslashes(intval(filter_input(INPUT_POST, 'id_comunidade', FILTER_SANITIZE_STRING)));
            $idtopic = addslashes(intval(filter_input(INPUT_POST, 'id_topico', FILTER_SANITIZE_STRING)));
            $assunto = addslashes(filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING));
            $mensagem = addslashes(filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING));
            
            if($assunto && $mensagem) {
                ComunidadeHandler::addMensagemTopico(
                    $this->loggedUser->id,
                    $idcmm,
                    $idtopic,
                    $assunto,
                    $mensagem,
                );
            }
            
            $this->redirect('/comunidade/mensagens/uid='.$idtopic); 
        }


        // função adicionar e remover membros
    public function comunidadefollow($atts) {
        $comunidade = addslashes(intval($atts['id']));

        if(ComunidadeHandler::idExists($comunidade)) {
            if(ComunidadeHandler::comunidadeIsFollowing($this->loggedUser->id, $comunidade)) {
                // Deixar de ser Membro
                ComunidadeHandler::comunidadeUnfollow($this->loggedUser->id, $comunidade);

            } else {
                // Torna Membro
                ComunidadeHandler::comunidadeFollow($this->loggedUser->id, $comunidade);

            }
        }

        $this->redirect('/comunidade/uid='.$comunidade);
    }

    // função adicionar e remover membros
    public function comunidaderelacionada() {
        $uid = addslashes(intval(filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING))); // id da comunidade
        $relacionar = addslashes(intval(filter_input(INPUT_GET, 'relacionar', FILTER_SANITIZE_STRING))); // id da comunidade a ser relacionar

        if(ComunidadeHandler::idExists($relacionar)) {
            if(ComunidadeHandler::comunidadeIsRelacionar($uid, $relacionar)) {
                // Deixar de ser Membro
                ComunidadeHandler::comunidadeRelacionarOff($uid, $relacionar);

            } else {
                // Torna Membro
                ComunidadeHandler::comunidadeRelacionarOn($uid, $relacionar);

            }
        }

        $this->redirect('/comunidade/uid='.$uid);
    }

}