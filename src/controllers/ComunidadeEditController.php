<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\ComunidadeHandler;
use \src\models\ComunidadeMembro;
use \src\models\User;
use \src\models\Comunidade;

class ComunidadeEditController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    //  EDITAR comunidades
    public function editarcomunidade($atts =[]) {
 
        $comunidades = ComunidadeHandler::getComunidades($atts);
        if(!$comunidades) {
            $this->redirect('/');
        }

        // Detectando a comunidade acessada
        $id = $comunidades->id;
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        }

        // Verificar se é membro da comunidade
        $comunidadeisFollowing = false;
        if($comunidades->id != $this->loggedUser->id) {
            $comunidadeisFollowing = ComunidadeHandler::comunidadeisFollowing($this->loggedUser->id, $comunidades->id);

        }

        // Verificar se é dono da comunidade
         if($comunidades->id_usuario != $this->loggedUser->id) {
            $this->redirect('/comunidade/uid='.$comunidades->id);

        }

            // carregar a página
        $this->render('comunidade_editar', [
            'loggedUser' => $this->loggedUser,
            'comunidadeisFollowing' => $comunidadeisFollowing,
            'comunidades' => $comunidades,
            
        ]);
    }

      public function updateEditarComunidade() {

        //Recebe os dados do formulário
        $comunidade = addslashes(intval(filter_input(INPUT_POST, 'comunidade', FILTER_SANITIZE_STRING)));
        $nome = addslashes(filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING));
        $avatarantigo = addslashes(filter_input(INPUT_POST,'avatarantigo', FILTER_SANITIZE_STRING));
        $descricao = addslashes(filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING));
        $cidade = addslashes(filter_input(INPUT_POST,'cidade', FILTER_SANITIZE_STRING));
        $estado = addslashes(filter_input(INPUT_POST,'estado', FILTER_SANITIZE_STRING));
        $cep = addslashes(filter_input(INPUT_POST,'cep', FILTER_SANITIZE_STRING));
        $pais = addslashes(filter_input(INPUT_POST,'pais', FILTER_SANITIZE_STRING));
        $idioma = addslashes(intval(filter_input(INPUT_POST, 'idioma', FILTER_SANITIZE_STRING)));
        $categoria = addslashes(intval(filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING)));
        $tipo = addslashes(intval(filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING)));
        $privacidade = addslashes(intval(filter_input(INPUT_POST, 'privacidade', FILTER_SANITIZE_STRING)));
        
        $comunidades = ComunidadeHandler::getComunidades($comunidade);
        if(!$comunidades) {
            $this->redirect('/');
        }

        if(!$nome) {
            $this->redirect('/comunidade/editar/uid='.$comunidade);
        }

        if($privacidade >= 2 or NULL or $tipo >= 2 or NULL or $categoria >= 28 or NULL or $idioma >= 13 or NULL) {
            $this->redirect('/');
        }

        
        if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])) {
            $newAvatar = $_FILES['avatar'];

            if(in_array($newAvatar['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
                $avatarWidth = 200;
                $avatarHeight = 200;

                list($widthOrig, $heightOrig) = getimagesize($newAvatar['tmp_name']);
                $ratio = $widthOrig / $heightOrig;

                $newWidth = $avatarWidth;
                $newHeight = $newWidth / $ratio;

                if($newHeight < $avatarHeight) {
                    $newHeight = $avatarHeight;
                    $newWidth = $newHeight * $ratio;
                }

                $x = $avatarWidth - $newWidth;
                $y = $avatarHeight - $newHeight;
                $x = $x<0 ? $x/2 : $x;
                $y = $y<0 ? $y/2 : $y;

                $finalImage = imagecreatetruecolor($avatarWidth, $avatarHeight);
                switch($newAvatar['type']) {
                    case 'image/jpeg':
                    case 'image/jpg':
                        $image = imagecreatefromjpeg($newAvatar['tmp_name']);
                    break;
                    case 'image/png':
                        $image = imagecreatefrompng($newAvatar['tmp_name']);
                    break;
                }

                imagecopyresampled(
                    $finalImage, $image,
                    $x, $y, 0, 0,
                    $newWidth, $newHeight, $widthOrig, $heightOrig
                );

                $avatarName = md5(time().rand(0,9999)).'.jpg';

                imagejpeg($finalImage, './media/avatars/'.$avatarName, 100);

                if(!empty($avatarantigo)) {

                    if ($avatarantigo !== 'avatar.jpg') {
                        unlink('./media/avatars/'.$avatarantigo);
                    }
                }

            }
        }

    ComunidadeHandler::updateComunidade($comunidade, $nome, $descricao, $cidade, $estado, $cep, $pais, $idioma, $categoria, $tipo, $privacidade, $avatarName);   
    $this->redirect('/comunidade/editar/uid='.$comunidade);   
    }

}