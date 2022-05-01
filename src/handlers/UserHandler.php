<?php
namespace src\handlers;

use \src\models\User;
use \src\models\UserRelation;
use \src\models\UserFa;
use \src\models\Comunidade;
use \src\models\ComunidadeMembro;
use \src\handlers\PostHandler;

class UserHandler {
        //checar o login
    public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();

            if(count($data) > 1) {
                
            $loggedUser = new User();
            $loggedUser->id = $data['id'];
            $loggedUser->sobrenome = $data['sobrenome'];
            $loggedUser->email = $data['email'];
            $loggedUser->name = $data['name'];
            $loggedUser->birthdate = $data['birthdate'];
            $loggedUser->avatar = $data['avatar'];
            $loggedUser->cover = $data['cover'];

            return $loggedUser;
            
            } return false;

        } 

        return false;
        
    }
        //verificar login
    public static function verifyLogin($email, $password) {
        $user = User::select()->where('email', $email)->one();

        if($user) {
            if(password_verify($password, $user['password'])) {
                $token = md5(time().rand(0,9999).time());
                User::update()
                    ->set('token', $token)
                    ->where('email', $email)
                ->execute();
                return $token;
            }

        }

        return false;
    }

        //verificar se id existe
    public static function idExists($id) {
        $user = User::select()->where('id', $id)->one();
        return $user ? true : false;
    }
        //verificar se e-mail digitado tem cadastrado
    public function emailExists($email) {
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }
        //pegar informacoes do usuario no banco de dados
    public static function getUser($id, $full = false) {
        $data = User::select()->where('id', $id)->one();

        if($data) {
            $user = new User();
            $user->id = $data['id'];
            $user->email = $data['email'];
            $user->name = $data['name'];
            $user->sobrenome = $data['sobrenome'];
            $user->avatar = $data['avatar'];
            $user->cover = $data['cover'];
            $user->frase = $data['frase'];
            $user->sexo = $data['sexo'];
            $user->birthdate = $data['birthdate'];
            $user->cidade = $data['cidade'];
            $user->estado = $data['estado'];
            $user->geral_relacionamento = $data['geral_relacionamento'];
            $user->geral_interamigos = $data['geral_interamigos'];
            $user->geral_intercompanheiros = $data['geral_intercompanheiros'];
            $user->geral_intercontatos = $data['geral_intercontatos'];
            $user->geral_internamoro = $data['geral_internamoro'];
            $user->geral_intertipo = $data['geral_intertipo'];
            $user->social_filhos = $data['social_filhos'];
            $user->social_orientsexual = $data['social_orientsexual'];
            $user->social_estilo = $data['social_estilo'];
            $user->social_fumo = $data['social_fumo'];
            $user->social_bebo = $data['social_bebo'];
            $user->social_aniestimacao = $data['social_aniestimacao'];
            $user->social_cidadenatal = $data['social_cidadenatal'];
            $user->social_paginaweb = $data['social_paginaweb'];
            $user->social_quemsou = $data['social_quemsou'];
            $user->social_paixoes = $data['social_paixoes'];
            $user->social_esportes = $data['social_esportes'];
            $user->social_atividades = $data['social_atividades'];
            $user->social_livros = $data['social_livros'];
            $user->social_musica = $data['social_musica'];
            $user->social_prodetv = $data['social_prodetv'];
            $user->social_gastronomicas = $data['social_gastronomicas'];
            $user->contato_residencial = $data['contato_residencial'];
            $user->contato_celular = $data['contato_celular'];
            $user->contato_endereco1 = $data['contato_endereco1'];
            $user->contato_endereco2 = $data['contato_endereco2'];
            $user->contato_cep = $data['contato_cep'];
            $user->contato_pais = $data['contato_pais'];
            $user->profis_escolaridade = $data['profis_escolaridade'];
            $user->profis_ensinomedio = $data['profis_ensinomedio'];
            $user->profis_faculdade = $data['profis_faculdade'];
            $user->profis_curso = $data['profis_curso'];
            $user->profis_diploma = $data['profis_diploma'];
            $user->profis_ano = $data['profis_ano'];
            $user->profis_profissao = $data['profis_profissao'];
            $user->profis_setor = $data['profis_setor'];
            $user->profis_empresa = $data['profis_empresa'];
            $user->pessoal_titulo = $data['pessoal_titulo'];
            $user->pessoal_atencao = $data['pessoal_atencao'];
            $user->pessoal_altura = $data['pessoal_altura'];
            $user->pessoal_olhos = $data['pessoal_olhos'];
            $user->pessoal_cabelo = $data['pessoal_cabelo'];
            $user->pessoal_fisico = $data['pessoal_fisico'];
            $user->pessoal_corpo = $data['pessoal_corpo'];
            $user->pessoal_aparencia = $data['pessoal_aparencia'];
            $user->pessoal_gostoemmim = $data['pessoal_gostoemmim'];
            $user->somamigos = $data['somamigos'];
            $user->somarcomunidades = $data['somarcomunidades'];
            $user->somarcomunidadesdono = $data['somarcomunidadesdono'];
            $user->somaseguidores = $data['somaseguidores'];
            $user->somafas = $data['somafas'];
            $user->somafotos = $data['somafotos'];
            $user->somarecados = $data['somarecados'];
            $user->somastatus = $data['somastatus'];
            $user->somavideos = $data['somavideos'];
            $user->somadepoimentos = $data['somadepoimentos'];
            $user->somadepoescrito = $data['somadepoescrito'];
            $user->votosexys = $data['votosexys'];
            $user->votoconfiavel = $data['votoconfiavel'];
            $user->votolegal = $data['votolegal'];
            $user->viewscraps = $data['viewscraps'];
            $user->write_scraps = $data['write_scraps'];
            $user->viewphotos = $data['viewphotos'];
            $user->viewvideo = $data['viewvideo'];
            $user->viewtestimonialreceived = $data['viewtestimonialreceived'];
            $user->viewtestimonialwrote = $data['viewtestimonialwrote'];

            if($full) {
                $user->followers = [];
                $user->following = [];
                $user->recados = [];
                $user->photos = [];
                $user->videos = [];
                $user->fas = [];

                //followers 
                $followers = UserRelation::select()->where('user_to', $id)->get();
                foreach($followers as $follower) {
                    $userData = User::select()->where('id', $follower['user_from'])->one();

                    $newUser = new User();
                    $newUser->id = $userData['id'];
                    $newUser->name = $userData['name'];
                    $newUser->avatar = $userData['avatar'];
                    $newUser->frase = $userData['frase'];
                    $newUser->somamigos = $userData['somamigos'];

                    $user->followers[] = $newUser;

                }

                //following 
                $following = UserRelation::select()->where('user_from', $id)->get();
                foreach($following as $followings) {
                    $userData = User::select()->where('id', $followings['user_to'])->one();

                    $newUser = new User();
                    $newUser->id = $userData['id'];
                    $newUser->name = $userData['name'];
                    $newUser->avatar = $userData['avatar'];
                    $newUser->frase = $userData['frase'];
                    $newUser->somamigos = $userData['somamigos'];

                    $user->following[] = $newUser;

                }

                //Fas Seguindo
                $fasfollowers = UserFa::select()->where('user_to', $id)->get();
                foreach($fasfollowers as $fasfollower) {
                    $userData = User::select()->where('id', $fasfollower['user_from'])->one();

                    $newUser = new User();
                    $newUser->id = $userData['id'];
                    $newUser->name = $userData['name'];
                    $newUser->avatar = $userData['avatar'];
                    $newUser->somamigos = $userData['somamigos'];

                    $user->fasfollowers[] = $newUser;

                }

                //gerar os Membros das comunidades
                $membros = ComunidadeMembro::select()->where('id_usuario', $id)->get();
                foreach($membros as $utilizador) {
                    $ComunidadeData = Comunidade::select()->where('id', $utilizador['id_comunidade'])->one();

                    $newComunidade = new Comunidade();
                    $newComunidade->id = $ComunidadeData['id'];
                    $newComunidade->nome = $ComunidadeData['nome'];
                    $newComunidade->avatar = $ComunidadeData['avatar'];
                    $newComunidade->somamembros = $ComunidadeData['somamembros'];

                    $user->comunidades[] = $newComunidade;
                }

                //photos
                $user->photos = PostHandler::getPhotosFrom($id);

            }

            return $user;

        }

            return false;
    }
        // EDITAR O PERFIL
    public function updateUser($id, $frase, $name, $sobrenome, $sexo, $geral_relacionamento, $birthdate, $geral_interamigos, $geral_intercompanheiros, $geral_intercontatos, 
                                $geral_internamoro, $geral_intertipo, $social_filhos, $social_orientsexual, $social_estilo, $social_fumo, $social_bebo, $cidade, $estado, 
                                $social_aniestimacao, $social_cidadenatal, $social_paginaweb, $social_quemsou, $social_paixoes, $social_esportes, $social_atividades, 
                                $social_livros, $social_musica, $social_prodetv, $social_gastronomicas, $contato_residencial, $contato_celular, $contato_endereco1, $contato_endereco2, 
                                $contato_cep, $contato_pais, $profis_escolaridade, $profis_ensinomedio, $profis_faculdade, $profis_curso, $profis_diploma, $profis_ano, 
                                $profis_profissao, $profis_setor, $profis_empresa, $pessoal_titulo, $pessoal_atencao, $pessoal_altura, $pessoal_olhos, $pessoal_cabelo, 
                                $pessoal_fisico, $pessoal_corpo, $pessoal_aparencia, $pessoal_gostoemmim, $avatarnovo){
    
         //Gera o hash da senha, caso a senha mude
        if(!empty($password)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            User::update([
                'frase' => $frase,
                'name' => $name,
                'sobrenome' => $sobrenome,
                'sexo' => $sexo,
                'geral_relacionamento' => $geral_relacionamento,
                'birthdate' => $birthdate,
                'geral_interamigos' => $geral_interamigos,
                'geral_intercompanheiros' => $geral_intercompanheiros,
                'geral_intercontatos' => $geral_intercontatos,
                'geral_internamoro' => $geral_internamoro,
                'geral_intertipo' => $geral_intertipo,
                'social_filhos' => $social_filhos,
                'social_orientsexual' => $social_orientsexual,
                'social_estilo' => $social_estilo,
                'social_fumo' => $social_fumo,
                'social_bebo' => $social_bebo,
                'social_aniestimacao' => $social_aniestimacao,
                'social_cidadenatal' => $social_cidadenatal,
                'social_paginaweb' => $social_paginaweb,
                'social_quemsou' => $social_quemsou,
                'social_paixoes' => $social_paixoes,
                'social_esportes' => $social_esportes,
                'social_atividades' => $social_atividades,
                'social_livros' => $social_livros,
                'social_musica' => $social_musica,
                'social_prodetv' => $social_prodetv,
                'social_gastronomicas' => $social_gastronomicas,
                'contato_residencial' => $contato_residencial,
                'contato_celular' => $contato_celular,
                'contato_endereco1' => $contato_endereco1,
                'contato_endereco2' => $contato_endereco2,
                'cidade' => $cidade,
                'estado' => $estado,
                'contato_cep' => $contato_cep,
                'contato_pais' => $contato_pais,
                'profis_escolaridade' => $profis_escolaridade,
                'profis_ensinomedio' => $profis_ensinomedio,
                'profis_faculdade' => $profis_faculdade,
                'profis_curso' => $profis_curso,
                'profis_diploma' => $profis_diploma,
                'profis_ano' => $profis_ano,
                'profis_profissao' => $profis_profissao,
                'profis_setor' => $profis_setor,
                'profis_empresa' => $profis_empresa,
                'pessoal_titulo' => $pessoal_titulo,
                'pessoal_atencao' => $pessoal_atencao,
                'pessoal_altura' => $pessoal_altura,
                'pessoal_olhos' => $pessoal_olhos,
                'pessoal_cabelo' => $pessoal_cabelo,
                'pessoal_fisico' => $pessoal_fisico,
                'pessoal_corpo' => $pessoal_corpo,
                'pessoal_aparencia' => $pessoal_aparencia,
                'pessoal_gostoemmim' => $pessoal_gostoemmim,
                'avatar' => $avatarnovo,
                ])
                ->where('id', $id)
                ->execute();

        } else {
            
            User::update([
                'frase' => $frase,
                'name' => $name,
                'sobrenome' => $sobrenome,
                'sexo' => $sexo,
                'geral_relacionamento' => $geral_relacionamento,
                'birthdate' => $birthdate,
                'geral_interamigos' => $geral_interamigos,
                'geral_intercompanheiros' => $geral_intercompanheiros,
                'geral_intercontatos' => $geral_intercontatos,
                'geral_internamoro' => $geral_internamoro,
                'geral_intertipo' => $geral_intertipo,
                'social_filhos' => $social_filhos,
                'social_orientsexual' => $social_orientsexual,
                'social_estilo' => $social_estilo,
                'social_fumo' => $social_fumo,
                'social_bebo' => $social_bebo,
                'social_aniestimacao' => $social_aniestimacao,
                'social_cidadenatal' => $social_cidadenatal,
                'social_paginaweb' => $social_paginaweb,
                'social_quemsou' => $social_quemsou,
                'social_paixoes' => $social_paixoes,
                'social_esportes' => $social_esportes,
                'social_atividades' => $social_atividades,
                'social_livros' => $social_livros,
                'social_musica' => $social_musica,
                'social_prodetv' => $social_prodetv,
                'social_gastronomicas' => $social_gastronomicas,
                'contato_residencial' => $contato_residencial,
                'contato_celular' => $contato_celular,
                'contato_endereco1' => $contato_endereco1,
                'contato_endereco2' => $contato_endereco2,
                'cidade' => $cidade,
                'estado' => $estado,
                'contato_cep' => $contato_cep,
                'contato_pais' => $contato_pais,
                'profis_escolaridade' => $profis_escolaridade,
                'profis_ensinomedio' => $profis_ensinomedio,
                'profis_faculdade' => $profis_faculdade,
                'profis_curso' => $profis_curso,
                'profis_diploma' => $profis_diploma,
                'profis_ano' => $profis_ano,
                'profis_profissao' => $profis_profissao,
                'profis_setor' => $profis_setor,
                'profis_empresa' => $profis_empresa,
                'pessoal_titulo' => $pessoal_titulo,
                'pessoal_atencao' => $pessoal_atencao,
                'pessoal_altura' => $pessoal_altura,
                'pessoal_olhos' => $pessoal_olhos,
                'pessoal_cabelo' => $pessoal_cabelo,
                'pessoal_fisico' => $pessoal_fisico,
                'pessoal_corpo' => $pessoal_corpo,
                'pessoal_aparencia' => $pessoal_aparencia,
                'pessoal_gostoemmim' => $pessoal_gostoemmim,
                'avatar' => $avatarnovo,
                ])
                ->where('id', $id)
                ->execute();
        }
    }

    public function configurationUser($id, $novopassword, $viewScraps, $write_scraps, $viewphotos, $viewvideo, $viewtestimonialreceived, $viewtestimonialwrote){
    
         //Gera o hash da senha, caso a senha mude
        if(!empty($novopassword)){
            User::update([
                'password' => $novopassword,
                'viewscraps' => $viewScraps,
                'write_scraps' => $write_scraps,
                'viewphotos' => $viewphotos,
                'viewvideo' => $viewvideo,
                'viewtestimonialreceived' => $viewtestimonialreceived,
                'viewtestimonialwrote' => $viewtestimonialwrote,
                ])
                ->where('id', $id)
                ->execute();

        } else {
            User::update([
                'viewscraps' => $viewScraps,
                'write_scraps' => $write_scraps,
                'viewphotos' => $viewphotos,
                'viewvideo' => $viewvideo,
                'viewtestimonialreceived' => $viewtestimonialreceived,
                'viewtestimonialwrote' => $viewtestimonialwrote,
                ])
                ->where('id', $id)
                ->execute();
        }
    }

        //adicionar usuario ao banco de dados
    public function addUser($name, $email, $password, $birthdate) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999).time());

        User::insert([
            'email' => $email,
            'password' => $hash,
            'name' => $name,
            'birthdate' => $birthdate,
            'token' => $token
        ])->execute();

        return $token;
    }

    public static function isFollowing($from, $to) {
        $data = UserRelation::select()
            ->where('user_from', $from)
            ->where('user_to', $to)
        ->one();

        if($data) {
            return true;
        }
        return false;
    }
        // fas relações
    public static function fasisFollowing($fasfrom, $fasto) {
        $datas = UserFa::select()
            ->where('user_from', $fasfrom)
            ->where('user_to', $fasto)
        ->one();

        if($datas) {
            return true;
        }
        return false;
    }

        // FUNÇÃO INSERIR USUARIO SEGUIDO NO DB
    public static function follow($from, $to) {
        UserRelation::insert([
            'user_from' => $from,
            'user_to' => $to
        ])->execute();

        // buscar total de amigos por usuario
       $totalamigos = UserRelation::select()
       ->where('user_from', $from)
       ->count();

        // inserir quantidade de amigos na coluna somamigos do usuario
        User::update([
        'somamigos' => $totalamigos
        ])
        ->where('id', $from)
        ->execute();

        // buscar total de amigos por usuario
       $totalseguidores = UserRelation::select()
       ->where('user_to', $to)
       ->count();
       // retorna o resultado

        User::update([
            'somaseguidores' => $totalseguidores
            ])
            ->where('id', $to)
            ->execute(); 
   
    }

        // FUNÇÃO REMOVER USUARIO SEGUIDO NO DB
    public static function unfollow($from, $to) {
        UserRelation::delete()
            ->where('user_from', $from)
            ->where('user_to', $to)
        ->execute();

        // buscar total de amigos por usuario
       $totalseguidores = UserRelation::select()
       ->where('user_to', $to)
       ->count();
       // retorna o resultado

        User::update([
            'somaseguidores' => $totalseguidores
            ])
            ->where('id', $to)
            ->execute(); 
    }

        // FUNÇÃO INSERIR FAS SEGUIDO NO DB
        public static function fasfollow($fasfrom, $fasto) {
            UserFa::insert([
                'user_from' => $fasfrom,
                'user_to' => $fasto
            ])->execute();

        // buscar total de amigos por usuario
        $total = UserFa::select()
        ->where('user_to', $fasto)
        ->count();
        // retorna o resultado

        // inserir quantidade de amigos na coluna somamigos do usuario
        User::update([
        'somafas' => $total
        ])
        ->where('id', $fasto)
        ->execute();
                
        }
    
            // FUNÇÃO REMOVER FAS SEGUIDO NO DB
        public static function fasunfollow($fasfrom, $fasto) {
            UserFa::delete()
                ->where('user_from', $fasfrom)
                ->where('user_to', $fasto)
            ->execute();

            // buscar total de amigos por usuario
        $total = UserFa::select()
        ->where('user_to', $fasto)
        ->count();
        // retorna o resultado

        // inserir quantidade de amigos na coluna somamigos do usuario
        User::update([
        'somafas' => $total
        ])
        ->where('id', $fasto)
        ->execute();
        }


        // PESQUISA DE USUARIOS
    public static function searchUser($term) {
        $data = User::select()->where('name', 'like', '%'.$term.'%')->andWhere('sobrenome', 'like', '%'.$term.'%')->get();

        if($data) {
            foreach($data as $user) {

                $newUser = new User();
                $newUser->id = $user['id'];
                $newUser->name = $user['name'];
                $newUser->avatar = $user['avatar'];

                $users[] = $newUser;
            } 
        }
        
        if(!empty($users)){
            return $users;
        } 
    }
    // VERIFICAR
        // FUNÇÕES UTILIZANDO SOMA DE RESULTADOS NAS COLUNAS USER
    public static function getUserFas($idUser, $loggedUserId) {
            // total fan por usuario
        $total = UserFa::select()
        ->where('user_to', $idUser)
        ->count();
            // retorna o resultado
        return [
            'totalfas' => $total
        ];
    }
    // VERIFICAR
        // FUNÇÕES UTILIZANDO SOMA DE RESULTADOS NAS COLUNAS USER
    public static function getUserAmigos($idUser, $loggedUserId) {
        // total fan por usuario
       $total = UserRelation::select()
       ->where('user_from', $idUser)
       ->count();
       // retorna o resultado
       return [
           'totalamigos' => $total
       ];
   }
   
    // GERANDO OS AMIGOS DO USUARIO
    public static function _amigosListToObject($amigosList , $loggedUserId) {
        $membros = [];
            foreach($amigosList as $user) {
                $userData = User::select()->where('id', $user['user_from'])->one();

                $newMembro = new User();
                $newMembro->id = $userData['id'];
                $newMembro->name = $userData['name'];
                $newMembro->avatar = $userData['avatar'];
                $newMembro->somamigos = $userData['somamigos'];

            $membros[] = $newMembro;
        }

        return $membros;

    }


        // GERANDO OS AMIGOS E PAGINAÇÃO
    public static function getAmigos($comunidade, $page, $loggedUserId) {
        $perPage = 14; // DEFINIR QUANTIDADE DE MEMBROS POR PÁGINA

        // .1 pegar membros na comunidade
        $amigosList = UserRelation::select()
        ->where('user_to', $comunidade)
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = UserRelation::select()
        ->where('user_to', $comunidade)
        ->count();
        $pageCount = ceil($total / $perPage);

        // 1.2 transformas os resultados em objetos dos models ( gerar os membros)
        $membros = self::_amigosListToObject($amigosList, $loggedUserId);

        // 1.3 retorna o resultado
        return [
            'perPage' => $perPage,
            'membros' => $membros,
            'pageCount' => $pageCount,
            'total' => $total
        ];


    }

    // GERANDO OS AMIGOS SEGUIDOS
    public static function _amigosSeguidosListToObject($amigosList , $loggedUserId) {
        $membros = [];
            foreach($amigosList as $user) {
                $userData = User::select()->where('id', $user['user_to'])->one();

                $newMembro = new User();
                $newMembro->id = $userData['id'];
                $newMembro->name = $userData['name'];
                $newMembro->avatar = $userData['avatar'];
                $newMembro->somamigos = $userData['somamigos'];

            $membros[] = $newMembro;
        }

        return $membros;

    }
        // GERANDO OS AMIGOS E PAGINAÇÃO
    public static function getAmigosSeguidos($comunidade, $page, $loggedUserId) {
        $perPage = 14; // DEFINIR QUANTIDADE DE MEMBROS POR PÁGINA

        // .1 pegar membros na comunidade
        $amigosList = UserRelation::select()
        ->where('user_from', $comunidade)
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = UserRelation::select()
        ->where('user_from', $comunidade)
        ->count();
        $pageCount = ceil($total / $perPage);

        // 1.2 transformas os resultados em objetos dos models ( gerar os membros)
        $membros = self::_amigosSeguidosListToObject($amigosList, $loggedUserId);

        // 1.3 retorna o resultado
        return [
            'perPage' => $perPage,
            'membros' => $membros,
            'pageCount' => $pageCount,
            'total' => $total
        ];


    }

    // GERANDO OS FAS SEGUIDOS
    public static function _fasListToObject($fasList , $loggedUserId) {
        $fas = [];
            foreach($fasList as $user) {
                $userData = User::select()->where('id', $user['user_from'])->one();

                $newFa = new User();
                $newFa->id = $userData['id'];
                $newFa->name = $userData['name'];
                $newFa->avatar = $userData['avatar'];
                $newFa->somamigos = $userData['somamigos'];

            $fas[] = $newFa;
        }

        return $fas;

    }

        // GERANDO OS FAS E PAGINAÇÃO
    public static function getFasSeguidos($fan, $page, $loggedUserId) {
        $perPage = 14; // DEFINIR QUANTIDADE DE FAS POR PÁGINA

        // .1 pegar os fas
        $fasList = UserFa::select()
        ->where('user_to', $fan)
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = UserFa::select()
        ->where('user_to', $fan)
        ->count();
        $pageCount = ceil($total / $perPage);

        // 1.2 transformas os resultados em objetos dos models ( gerar os FAS)
        $fas = self::_fasListToObject($fasList, $loggedUserId);

        // 1.3 retorna o resultado
        return [
            'perPage' => $perPage,
            'fas' => $fas,
            'pageCount' => $pageCount,
            'total' => $total
        ];


    }


    // GERANDO AS COMUNIDADES QUE PARTICIPO
    public static function _ComunidadesListToObjectParticipo($comunidadeList, $loggedUserId) {
        $comunidades = [];
            foreach($comunidadeList as $utilizador) {
                $ComunidadeData = Comunidade::select()
                ->where('id', $utilizador['id_comunidade'])
                ->one();

                $newComunidade = new Comunidade();
                $newComunidade->id = $ComunidadeData['id'];
                $newComunidade->nome = $ComunidadeData['nome'];
                $newComunidade->descricao = $ComunidadeData['descricao'];
                $newComunidade->avatar = $ComunidadeData['avatar'];
                $newComunidade->somamembros = $ComunidadeData['somamembros'];

                $comunidades[] = $newComunidade;
        }

        return $comunidades;

    }
        // GERANDO AS COMUNIDADES QUE PARTICIPO COM PAGINAÇÃO
    public static function getComunidadesParticipo($id, $page, $loggedUserId) {
        $perPage = 6; // DEFINIR QUANTIDADE DE COMUNIDADES POR PÁGINA

        // .1 pegar as comunidades
        $comunidadeList = ComunidadeMembro::select()
        ->where('id_usuario', $id)
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = ComunidadeMembro::select()
        ->where('id_usuario', $id)
        ->count();
        $pageCount = ceil($total / $perPage);

        // 1.2 transformas os resultados em objetos dos models ( gerar as comunidades)
        $comunidades = self::_ComunidadesListToObjectParticipo($comunidadeList, $loggedUserId);

        // 1.3 retorna o resultado
        return [
            'perPage' => $perPage,
            'comunidades' => $comunidades,
            'pageCount' => $pageCount,
            'total' => $total
        ];


    }


    // GERANDO AS COMUNIDADES QUE SOU DONO
    public static function _ComunidadesListToObjectDono($comunidadeList, $loggedUserId) {
        $comunidades = [];
            foreach($comunidadeList as $utilizador) {
                $ComunidadeData = Comunidade::select()
                ->where('id', $utilizador['id'])
                ->one();

                $newComunidade = new Comunidade();
                $newComunidade->id = $ComunidadeData['id'];
                $newComunidade->nome = $ComunidadeData['nome'];
                $newComunidade->descricao = $ComunidadeData['descricao'];
                $newComunidade->avatar = $ComunidadeData['avatar'];
                $newComunidade->somamembros = $ComunidadeData['somamembros'];

                $comunidades[] = $newComunidade;
        }

        return $comunidades;

    }
        // GERANDO AS COMUNIDADES QUE SOU DONO COM PAGINAÇÃO
    public static function getComunidadesDono($id, $page, $loggedUserId) {
        $perPage = 6; // DEFINIR QUANTIDADE DE COMUNIDADES POR PÁGINA

        // .1 pegar as comunidades
        $comunidadeList = Comunidade::select()
        ->where('id_usuario', $id)
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = Comunidade::select()
        ->where('id_usuario', $id)
        ->count();
        $pageCount = ceil($total / $perPage);

        // 1.2 transformas os resultados em objetos dos models ( gerar as comunidades)
        $comunidades = self::_ComunidadesListToObjectDono($comunidadeList, $loggedUserId);

        // 1.3 retorna o resultado
        return [
            'perPage' => $perPage,
            'comunidades' => $comunidades,
            'pageCount' => $pageCount,
            'total' => $total
        ];


    }

    // GERANDO AS COMUNIDADES QUE SOU DONO
    public static function _amigosChat($amigosList, $loggedUserId) {
        $amigos = [];
            foreach($amigosList as $utilizador) {
                $userData = User::select()->where('id', $utilizador['user_to'])->one();

                $newUser = new User();
                $newUser->id = $userData['id'];
                $newUser->name = $userData['name'];
                $newUser->avatar = $userData['avatar'];
                $newUser->frase = $userData['frase'];
                $newUser->somamigos = $userData['somamigos'];

                $amigos[] = $newUser;
        }

        return $amigos;

    }
        // GERANDO AS COMUNIDADES QUE SOU DONO COM PAGINAÇÃO
    public static function getAmigosChat($page, $loggedUserId) {
        $perPage = 6; // DEFINIR QUANTIDADE DE COMUNIDADES POR PÁGINA

        // .1 pegar as comunidades
        $amigosList = UserRelation::select()->where('user_from', $loggedUserId)->get();

        // 1.1 total de página - gerar paginação
        $total = UserRelation::select()
        ->where('user_from', $loggedUserId)
        ->count();
        $pageCount = ceil($total / $perPage);

        // 1.2 transformas os resultados em objetos dos models ( gerar as comunidades)
        $amigos = self::_amigosChat($amigosList, $loggedUserId);

        // 1.3 retorna o resultado
        return [
            'perPage' => $perPage,
            'amigos' => $amigos,
            'pageCount' => $pageCount,
            'total' => $total
        ];


    }

}