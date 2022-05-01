<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;

class ProfileEditController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index($atts =[]) {

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

        $flash = '';
     if(!empty($_SESSION['flash'])) {
          $flash = $_SESSION['flash'];
          $_SESSION['flash'] = '';
       }

        $this->render('editar_perfil', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'isFollowing' => $isFollowing,
            'flash' => $flash
            
        ]);
    }

    public function profileConfiguration($atts =[]) {

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

        $flash = '';
     if(!empty($_SESSION['flash'])) {
          $flash = $_SESSION['flash'];
          $_SESSION['flash'] = '';
       }

        $this->render('profile_configutarion', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'isFollowing' => $isFollowing,
            'flash' => $flash
            
        ]);
    }

      public function editAction() {
        //Recebe os dados do formulário
        $avatarantigo = $this->loggedUser->avatar;
        $frase = addslashes(filter_input(INPUT_POST, 'frase', FILTER_SANITIZE_STRING));
        $name = addslashes(filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING));
        $sobrenome = addslashes(filter_input(INPUT_POST,'sobrenome', FILTER_SANITIZE_STRING));
        $sexo = addslashes(intval(filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING)));
        $geral_relacionamento = addslashes(intval(filter_input(INPUT_POST, 'geral_relacionamento', FILTER_SANITIZE_STRING)));
        $birthdate = addslashes(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_STRING));

        $geral_interamigos = addslashes(intval(filter_input(INPUT_POST, 'geral_interamigos', FILTER_SANITIZE_STRING)));
        $geral_intercompanheiros = addslashes(intval(filter_input(INPUT_POST, 'geral_intercompanheiros', FILTER_SANITIZE_STRING)));
        $geral_intercontatos = addslashes(intval(filter_input(INPUT_POST, 'geral_intercontatos', FILTER_SANITIZE_STRING)));
        $geral_internamoro = addslashes(intval(filter_input(INPUT_POST, 'geral_internamoro', FILTER_SANITIZE_STRING)));
        $geral_intertipo = addslashes(intval(filter_input(INPUT_POST, 'geral_intertipo', FILTER_SANITIZE_STRING)));

        $social_filhos = addslashes(intval(filter_input(INPUT_POST, 'social_filhos', FILTER_SANITIZE_STRING)));
        $social_orientsexual = addslashes(intval(filter_input(INPUT_POST, 'social_orientsexual', FILTER_SANITIZE_STRING)));
        $social_estilo = addslashes(filter_input(INPUT_POST, 'social_estilo', FILTER_SANITIZE_STRING));
        $social_fumo = addslashes(intval(filter_input(INPUT_POST, 'social_fumo', FILTER_SANITIZE_STRING)));
        $social_bebo = addslashes(intval(filter_input(INPUT_POST, 'social_bebo', FILTER_SANITIZE_STRING)));
        $social_aniestimacao = addslashes(intval(filter_input(INPUT_POST, 'social_aniestimacao', FILTER_SANITIZE_STRING)));
        $social_cidadenatal = addslashes(filter_input(INPUT_POST, 'social_cidadenatal', FILTER_SANITIZE_STRING));
        $social_paginaweb = addslashes(filter_input(INPUT_POST, 'social_paginaweb', FILTER_SANITIZE_STRING));
        $social_quemsou = addslashes(filter_input(INPUT_POST, 'social_quemsou', FILTER_SANITIZE_STRING));
        $social_paixoes = addslashes(filter_input(INPUT_POST, 'social_paixoes', FILTER_SANITIZE_STRING));
        $social_esportes = addslashes(filter_input(INPUT_POST, 'social_esportes', FILTER_SANITIZE_STRING));
        $social_atividades = addslashes(filter_input(INPUT_POST, 'social_atividades', FILTER_SANITIZE_STRING));
        $social_livros = addslashes(filter_input(INPUT_POST, 'social_livros', FILTER_SANITIZE_STRING));
        $social_musica = addslashes(filter_input(INPUT_POST, 'social_musica', FILTER_SANITIZE_STRING));
        $social_prodetv = addslashes(filter_input(INPUT_POST, 'social_prodetv', FILTER_SANITIZE_STRING));
        $social_gastronomicas = addslashes(filter_input(INPUT_POST, 'social_gastronomicas', FILTER_SANITIZE_STRING));

        $contato_residencial = addslashes(filter_input(INPUT_POST, 'contato_residencial', FILTER_SANITIZE_STRING));
        $contato_celular = addslashes(filter_input(INPUT_POST, 'contato_celular', FILTER_SANITIZE_STRING));
        $contato_endereco1 = addslashes(filter_input(INPUT_POST, 'contato_endereco1', FILTER_SANITIZE_STRING));
        $contato_endereco2 = addslashes(filter_input(INPUT_POST, 'contato_endereco2', FILTER_SANITIZE_STRING));
        $cidade = addslashes(filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING));
        $estado = addslashes(filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING));
        $contato_cep = addslashes(filter_input(INPUT_POST, 'contato_cep', FILTER_SANITIZE_STRING));
        $contato_pais = addslashes(filter_input(INPUT_POST, 'contato_pais', FILTER_SANITIZE_STRING));

        $profis_escolaridade = addslashes(filter_input(INPUT_POST, 'profis_escolaridade', FILTER_SANITIZE_STRING));
        $profis_ensinomedio = addslashes(filter_input(INPUT_POST, 'profis_ensinomedio', FILTER_SANITIZE_STRING));
        $profis_faculdade = addslashes(filter_input(INPUT_POST, 'profis_faculdade', FILTER_SANITIZE_STRING));
        $profis_curso = addslashes(filter_input(INPUT_POST, 'profis_curso', FILTER_SANITIZE_STRING));
        $profis_diploma = addslashes(filter_input(INPUT_POST, 'profis_diploma', FILTER_SANITIZE_STRING));
        $profis_ano = addslashes(intval(filter_input(INPUT_POST, 'profis_ano', FILTER_SANITIZE_STRING)));
        $profis_profissao = addslashes(filter_input(INPUT_POST, 'profis_profissao', FILTER_SANITIZE_STRING));
        $profis_setor = addslashes(filter_input(INPUT_POST, 'profis_setor', FILTER_SANITIZE_STRING));
        $profis_empresa = addslashes(filter_input(INPUT_POST, 'profis_empresa', FILTER_SANITIZE_STRING));

        $pessoal_titulo = addslashes(filter_input(INPUT_POST, 'pessoal_titulo', FILTER_SANITIZE_STRING));
        $pessoal_atencao = addslashes(filter_input(INPUT_POST, 'pessoal_atencao', FILTER_SANITIZE_STRING));
        $pessoal_altura = addslashes(filter_input(INPUT_POST, 'pessoal_altura', FILTER_SANITIZE_STRING));
        $pessoal_olhos = addslashes(filter_input(INPUT_POST, 'pessoal_olhos', FILTER_SANITIZE_STRING));
        $pessoal_cabelo = addslashes(filter_input(INPUT_POST, 'pessoal_cabelo', FILTER_SANITIZE_STRING));
        $pessoal_fisico = addslashes(filter_input(INPUT_POST, 'pessoal_fisico', FILTER_SANITIZE_STRING));
        $pessoal_corpo = addslashes(filter_input(INPUT_POST, 'pessoal_corpo', FILTER_SANITIZE_STRING));
        $pessoal_aparencia = addslashes(filter_input(INPUT_POST, 'pessoal_aparencia', FILTER_SANITIZE_STRING));
        $pessoal_gostoemmim = addslashes(filter_input(INPUT_POST, 'pessoal_gostoemmim', FILTER_SANITIZE_STRING));

        if($frase && $name && $sobrenome && $sexo && $geral_relacionamento && $birthdate && $geral_interamigos && $geral_intercompanheiros && $geral_intercontatos 
            && $geral_internamoro && $geral_intertipo && $social_filhos && $social_orientsexual && $social_estilo && $cidade && $estado && $social_fumo && $social_bebo 
            && $social_aniestimacao && $social_cidadenatal && $social_paginaweb && $social_quemsou && $social_paixoes && $social_esportes && $social_atividades && $social_livros 
            && $social_musica && $social_prodetv && $social_gastronomicas && $contato_residencial && $contato_celular && $contato_endereco1 && $contato_endereco2 && $contato_cep 
            && $contato_pais && $profis_escolaridade && $profis_ensinomedio && $profis_faculdade && $profis_curso && $profis_diploma && $profis_ano && $profis_profissao 
            && $profis_setor && $profis_empresa && $pessoal_titulo && $pessoal_atencao && $pessoal_altura && $pessoal_olhos && $pessoal_cabelo && $pessoal_fisico && $pessoal_corpo && $pessoal_aparencia && $pessoal_gostoemmim){
            $this->redirect("/editar_perfil");
        }
        //Pega os dados do usuário logado no BD
        $user = UserHandler::getUser($this->loggedUser->id, false);
        
        //Verificão da frase
        if(empty($frase)){$frase = $user->frase;}

        //Verificão do nome
        if(empty($name)){$name = $user->name;}

        //Verificão do sobrenome
        if(empty($sobrenome)){$sobrenome = $user->sobrenome;}

        //Verificão do sexo
        if(empty($sexo)){$sexo = $user->sexo;}

        //Verificão da cidade
        if(empty($cidade)){$cidade = $user->cidade;}

        //Verificão do estado
        if(empty($estado)){$estado = $user->estado;}

        //Verificão da Cidade natal
        if(empty($social_cidadenatal)){$social_cidadenatal = $user->social_cidadenatal;}

        //Verificão do relacionamento
        if(empty($geral_relacionamento)){$geral_relacionamento = $user->geral_relacionamento;}

        //Verificão da página web
        if(empty($social_paginaweb)){$social_paginaweb = $user->social_paginaweb;}

        //Verificar paixões
        if(empty($social_paixoes)){$social_paixoes = $user->social_paixoes;}

        //Verificão residencial
        if(empty($contato_residencial)){$contato_residencial = $user->contato_residencial;}

        //Verificão celular
        if(empty($contato_celular)){$contato_celular = $user->contato_celular;}

        //Verificão endereço 1
        if(empty($contato_endereco1)){$contato_endereco1 = $user->contato_endereco1;}

        //Verificão endereço 2
        if(empty($contato_endereco2)){$contato_endereco2 = $user->contato_endereco2;}

        //Verificão cep
        if(empty($contato_cep)){$contato_cep = $user->contato_cep;}

        //Verificão país
        if(empty($contato_pais)){$contato_pais = $user->contato_pais;}

        //Verificão profissão
        if(empty($profis_escolaridade)){$profis_escolaridade = $user->profis_escolaridade;}

        //Verificão profissão
        if(empty($profis_ensinomedio)){$profis_ensinomedio = $user->profis_ensinomedio;}

        //Verificão profissão
        if(empty($profis_faculdade)){$profis_faculdade = $user->profis_faculdade;}

        //Verificão profissão
        if(empty($profis_curso)){$profis_curso = $user->profis_curso;}

        //Verificão profissão
        if(empty($profis_diploma)){$profis_diploma = $user->profis_diploma;}

        //Verificão profissão
        if(empty($profis_ano)){$profis_ano = $user->profis_ano;}

        //Verificão profissão
        if(empty($profis_profissao)){$profis_profissao = $user->profis_profissao;}

        //Verificão profissão
        if(empty($profis_setor)){$profis_setor = $user->profis_setor;}

        //Verificão profissão
        if(empty($profis_empresa)){$profis_empresa = $user->profis_empresa;}

        //Verificão pessoal
        if(empty($pessoal_titulo)){$pessoal_titulo = $user->pessoal_titulo;}

        //Verificão pessoal
        if(empty($pessoal_atencao)){$pessoal_atencao = $user->pessoal_atencao;}

        //Verificão pessoal
        if(empty($pessoal_altura)){$pessoal_altura = $user->pessoal_altura;}

        //Verificão pessoal
        if(empty($pessoal_olhos)){$pessoal_olhos = $user->pessoal_olhos;}

        //Verificão pessoal
        if(empty($pessoal_cabelo)){$pessoal_cabelo = $user->pessoal_cabelo;}

        //Verificão pessoal
        if(empty($pessoal_fisico)){$pessoal_fisico = $user->pessoal_fisico;}

        //Verificão pessoal
        if(empty($pessoal_corpo)){$pessoal_corpo = $user->pessoal_corpo;}

        //Verificão pessoal
        if(empty($pessoal_aparencia)){$pessoal_aparencia = $user->pessoal_aparencia;}

        //Verificão pessoal
        if(empty($pessoal_gostoemmim)){$pessoal_gostoemmim = $user->pessoal_gostoemmim;}


        //Verificação da data
        if(empty($birthdate)){
            $birthdate = $user->birthdate;
        } else { 
            $birthdate = explode('/', $birthdate);
               if(count($birthdate) != 3) {
                    $_SESSION['flash'] = 'Data de nacimento inválida!';
                    $this->redirect('/editar_perfil');
               }
               
            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
               if(strtotime($birthdate) === false) {
                    $_SESSION['flash'] = 'Data de nacimento inválida!';
                    $this->redirect('/editar_perfil');
               }
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


            }


        }

        if(!empty($avatarName)){

            $avatarnovo = $avatarName;

            if(!empty($avatarantigo)) {

                if ($avatarantigo !== 'avatar.jpg') {
                    unlink('./media/avatars/'.$avatarantigo);
                }
            }

        } else {$avatarnovo = $avatarantigo;}


    UserHandler::updateUser($this->loggedUser->id, $frase, $name, $sobrenome, $sexo, $geral_relacionamento, $birthdate, $geral_interamigos, $geral_intercompanheiros, 
                                    $geral_intercontatos, $geral_internamoro, $geral_intertipo, $social_filhos, $social_orientsexual, $social_estilo, $social_fumo, $social_bebo, 
                                    $cidade, $estado, $social_aniestimacao, $social_cidadenatal, $social_paginaweb, $social_quemsou, $social_paixoes, $social_esportes, 
                                    $social_atividades, $social_livros, $social_musica, $social_prodetv, $social_gastronomicas, $contato_residencial, $contato_celular, 
                                    $contato_endereco1, $contato_endereco2, $contato_cep, $contato_pais, $profis_escolaridade, $profis_ensinomedio, $profis_faculdade, 
                                    $profis_curso, $profis_diploma, $profis_ano, $profis_profissao, $profis_setor, $profis_empresa, $pessoal_titulo, $pessoal_atencao, 
                                    $pessoal_altura, $pessoal_olhos, $pessoal_cabelo, $pessoal_fisico, $pessoal_corpo, $pessoal_aparencia, $pessoal_gostoemmim, $avatarnovo);   
    $this->redirect("/editar_perfil");   
    }

    public function configAction() {
        //Recebe os dados do formulário
        $password = addslashes(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $password_confirmation = addslashes(filter_input(INPUT_POST,'password_confirmation', FILTER_SANITIZE_STRING));
        $viewScraps = addslashes(intval(filter_input(INPUT_POST, 'viewscraps', FILTER_SANITIZE_STRING)));
        $write_scraps = addslashes(intval(filter_input(INPUT_POST, 'write_scraps', FILTER_SANITIZE_STRING)));
        $viewphotos = addslashes(intval(filter_input(INPUT_POST, 'viewphotos', FILTER_SANITIZE_STRING)));
        $viewvideo = addslashes(intval(filter_input(INPUT_POST, 'viewvideo', FILTER_SANITIZE_STRING)));
        $viewtestimonialreceived = addslashes(intval(filter_input(INPUT_POST, 'viewtestimonialreceived', FILTER_SANITIZE_STRING)));
        $viewtestimonialwrote = addslashes(intval(filter_input(INPUT_POST, 'viewtestimonialwrote', FILTER_SANITIZE_STRING)));

        if($password && $password_confirmation && $viewScraps && $write_scraps && $viewphotos && $viewvideo && $viewtestimonialreceived && $viewtestimonialwrote) {
            //Verificão da frase
            if(!empty($password)){
                if($password === $password_confirmation){
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $novopassword = $hash;
                } else {
                    $_SESSION['flash'] = 'As Senhas não batem!';
                        $this->redirect('/perfilconfigutarion');
                        exit;
                }
            }
        }
        
        UserHandler::configurationUser($this->loggedUser->id, $novopassword, $viewScraps, $write_scraps, $viewphotos, $viewvideo, $viewtestimonialreceived, $viewtestimonialwrote);   
        $this->redirect("/perfilconfigutarion");   
    }

}