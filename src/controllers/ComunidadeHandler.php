<?php
namespace src\handlers;

use \src\models\Comunidade;
use \src\models\ComunidadeTopico;
use \src\models\ComunidadeMensagen;
use \src\models\ComunidadeMembro;
use \src\models\User;


class ComunidadeHandler {

    //verificar se id existe
    public static function idExists($id) {
        $comunidade = Comunidade::select()->where('id', $id)->one();
        return $comunidade ? true : false;
    }

     //pegar informacoes da comunidade banco de dados não está passando para o controller
     public static function getComunidades($atts) {
        $data = Comunidade::select()->where('id', $atts)->one();

        if($data) {
            $comunidades = new Comunidade();
            $comunidades->id = $data['id'];
            $comunidades->id_usuario = $data['id_usuario'];
            $comunidades->avatar = $data['avatar'];
            $comunidades->nome = $data['nome'];
            $comunidades->descricao = $data['descricao'];
            $comunidades->cidade = $data['cidade'];
            $comunidades->estado = $data['estado'];
            $comunidades->cep = $data['cep'];
            $comunidades->pais = $data['pais'];
            $comunidades->idioma = $data['idioma'];
            $comunidades->categoria = $data['categoria'];
            $comunidades->tipo = $data['tipo'];
            $comunidades->privacidade = $data['privacidade'];
            $comunidades->somamembros = $data['somamembros'];
            $comunidades->somatopicos = $data['somatopicos'];
            $comunidades->created_at = $data['created_at'];

         //gerar os Membros das comunidades
        $membros = ComunidadeMembro::select()->where('id_comunidade', $atts)->get();
        foreach($membros as $user) {
            $userData = User::select()->where('id', $user['id_usuario'])->one();

            $newMembro = new User();
            $newMembro->id = $userData['id'];
            $newMembro->name = $userData['name'];
            $newMembro->avatar = $userData['avatar'];
            $newMembro->somamigos = $userData['somamigos'];

            $comunidades->membros[] = $newMembro;

        }

        //Dono da comunidade
        $dono = Comunidade::select()->where('id', $atts)->get();
        foreach($dono as $user) {
            $donoData = User::select()->where('id', $user['id_usuario'])->one();

            $newDono = new User();
            $newDono->name = $donoData['name'];

            $comunidades->dono = $newDono->name;

        }
            return $comunidades;


        }
            return false;
    }

        // GERANDO OS TOPICOS NAS COMUNIDADES COM INFORMAÇÕES DIVERSAS
    public static function _postListToObject($postList , $loggedUserId) {
        $posts = [];
        foreach($postList as $postItem) {
            $newPost = new ComunidadeTopico();
            $newPost->id = $postItem['id'];
            $newPost->assunto = $postItem['assunto'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->body = $postItem['body'];
            $newPost->somamensagens = $postItem['somamensagens'];
            $newPost->ultimapostagem = $postItem['ultimapostagem'];
            $newPost->mine = false;

            // verificar se o topico é do user logado
            if($postItem['id_usuario'] == $loggedUserId) {
                $newPost->mine = true;
            }

            // .3 preencher as informações adicionais do user
            $newUser = User::select()->where('id', $postItem['id_usuario'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            $posts[] = $newPost;
        }

        return $posts;

    }
        // GERANDO OS TOPICOS Nos foruns das COMUNIDADES
    public static function getComunidadeTopicos($idUser, $page, $loggedUserId) {
        $perPage = 10;

        // .1 pegar postagens ordenado por data
        $postList = ComunidadeTopico::select()
        ->where('id_comunidade', $idUser)
        ->orderBy('ultimapostagem', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = ComunidadeTopico::select()
        ->where('id_comunidade', $idUser)
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_postListToObject($postList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalrecados' => $total,
            'postsporpage' => $perPage
        ];


    }

    // GERANDO OS TOPICOS NA INDEX DAS COMUNIDADES
    public static function getComunidadeTopicosIndex($idUser, $page, $loggedUserId) {
        $perPage = 5;

        // .1 pegar postagens ordenado por data
        $postList = ComunidadeTopico::select()
        ->where('id_comunidade', $idUser)
        ->orderBy('ultimapostagem', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = ComunidadeTopico::select()
        ->where('id_comunidade', $idUser)
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_postListToObject($postList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalrecados' => $total,
            'postsporpage' => $perPage
        ];


    }

    // GERANDO OS TOPICOS INDIVIDUAL DA COMUNIDADES
    public static function getComunidadeTopicoMensagens($atts) {
        $data = ComunidadeTopico::select()->where('id', $atts)->one();

        if($data) {
            $comunidades = new ComunidadeTopico();
            $comunidades->id = $data['id'];
            $comunidades->id_comunidade = $data['id_comunidade'];
            $comunidades->id_usuario = $data['id_usuario'];
            $comunidades->assunto = $data['assunto'];
            $comunidades->body = $data['body'];
            $comunidades->somamensagens = $data['somamensagens'];
            $comunidades->created_at = $data['created_at'];
            
            return $comunidades;

        }

            return false;
    }

    // GERANDO AS MENSAGENS NAS COMUNIDADES COM INFORMAÇÕES DIVERSAS
    public static function _topicoListToObject($postList , $loggedUserId) {
        $posts = [];
        foreach($postList as $postItem) {
            $newPost = new ComunidadeTopico();
            $newPost->id = $postItem['id'];
            $newPost->id_comunidade = $postItem['id_comunidade'];
            $newPost->id_usuario = $postItem['id_usuario'];
            $newPost->assunto = $postItem['assunto'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->body = $postItem['body'];
            $newPost->mine = false;

            // verificar se a mensagem é do user logado
            if($postItem['id_usuario'] == $loggedUserId) {
                $newPost->mine = true;
            }

            // .3 preencher as informações adicionais do usuario
            $newUser = User::select()->where('id', $postItem['id_usuario'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            // .4 preencher as informações adicionais da comunidades
            $newComunidade = Comunidade::select()->where('id', $postItem['id_comunidade'])->one();
            $newPost->comunidade = new Comunidade();
            $newPost->comunidade->id = $newComunidade['id'];
            $newPost->comunidade->name = $newComunidade['nome'];
            $newPost->comunidade->avatar = $newComunidade['avatar'];

            $posts[] = $newPost;
        }

        return $posts;

    }
        // GERANDO OS TOPICOS NA INICIAL DA COMUNIDADES
    public static function getComunidadeMensagens($idtopico, $page, $loggedUserId) {
        $perPage = 10;

        // .1 pegar postagens ordenado por data
        $postList = ComunidadeMensagen::select()
        ->where('id_topico', $idtopico)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        // DESCARTADO PARA TESTE DE CONTAGEM NA POSTAGEM
        $total = ComunidadeMensagen::select()
        ->where('id_topico', $idtopico)
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_topicoListToObject($postList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalrecados' => $total,
            'postsporpage' => $perPage
        ];


    }


        // criar Comunidade no banco de dados funcionando normal
    public static function addComunidade($idUser, $nome, $descricao) {
        $nome = trim($nome);

        if(!empty($idUser) && !empty($nome)) {

            Comunidade::insert([
                'id_usuario' => $idUser,
                'descricao' => $descricao,
                'created_at' => date('Y-m-d H:i:s'),
                'nome' => $nome
            ])->execute();
        }
    }

    // criar topicos da Comunidade no banco de dados
    public static function addTopico($idUser, $idcmm, $assunto, $mensagem) {
        $assunto = trim($assunto);

        if(!empty($idUser) && !empty($assunto)) {

            ComunidadeTopico::insert([
                'id_usuario' => $idUser,
                'id_comunidade' => $idcmm,
                'assunto' => $assunto,
                'body' => $mensagem,
                'created_at' => date('Y-m-d H:i:s')
            ])->execute();

            // buscar total de membros por usuario
        $total = ComunidadeTopico::select()
        ->where('id_comunidade', $idcmm)
        ->count();
        // retorna o resultado

        // inserir quantidade de topicos
        Comunidade::update([
        'somatopicos' => $total
        ])
        ->where('id', $idcmm)
        ->execute();
        }
    }


    // criar Mensagens nos topicos da Comunidade no banco de dados
    public static function addMensagemTopico($idUser, $idcmm, $idtopic, $assunto, $mensagem) {
        $assunto = trim($assunto);

        if(!empty($idUser) && !empty($assunto)) {

            ComunidadeMensagen::insert([
                'id_usuario' => $idUser,
                'id_comunidade' => $idcmm,
                'id_topico' => $idtopic,
                'assunto' => $assunto,
                'body' => $mensagem,
                'created_at' => date('Y-m-d H:i:s')
            ])->execute();

            // buscar total de membros por usuario
        $total = ComunidadeMensagen::select()
        ->where('id_topico', $idtopic)
        ->count();
        // retorna o resultado

        // inserir quantidade de mensagens nos topicos
        ComunidadeTopico::update([
        'somamensagens' => $total,
        'ultimapostagem' => date('Y-m-d H:i:s')
        ])
        ->where('id', $idtopic)
        ->execute();
        }
    }


    // Comunidades Membros
    public static function comunidadeIsFollowing($user, $comunidade) {
        $datas = ComunidadeMembro::select()
            ->where('id_comunidade', $comunidade)
            ->where('id_usuario', $user)
        ->one();

        if($datas) {
            return true;
        }
        return false;
    }

    // FUNÇÃO INSERIR Membros no db
    public static function comunidadeFollow($user, $comunidade) {
        ComunidadeMembro::insert([
            'id_comunidade' => $comunidade,
            'id_usuario' => $user
        ])->execute();

        // buscar total de membros por usuario
        $totalMembros = ComunidadeMembro::select()
        ->where('id_comunidade', $comunidade)
        ->count();
        // retorna o resultado

        // inserir quantidade de membros na coluna somamembros da comunidade
        Comunidade::update([
        'somamembros' => $totalMembros
        ])
        ->where('id', $comunidade)
        ->execute();

        // buscar total de comunidades por usuario
        $userComunidades = ComunidadeMembro::select()
        ->where('id_usuario', $user)
        ->count();
    
        // inserir quantidade de comunidade que o usuario é membro
        User::update([
        'somarcomunidades' => $userComunidades
        ])
        ->where('id', $user)
        ->execute();
            
    }

        // FUNÇÃO REMOVER MEMBROS NO DB
    public static function comunidadeUnfollow($user, $comunidade) {
        ComunidadeMembro::delete()
            ->where('id_comunidade', $comunidade)
            ->where('id_usuario', $user)
        ->execute();

        // buscar total de membros por usuario
        $totalMembros = ComunidadeMembro::select()
        ->where('id_comunidade', $comunidade)
        ->count();

        // inserir quantidade de membros na coluna somamembros da comunidade
        Comunidade::update([
        'somamembros' => $totalMembros
        ])
        ->where('id', $comunidade)
        ->execute();

        // buscar total de comunidades por usuario
        $userComunidades = ComunidadeMembro::select()
        ->where('id_usuario', $user)
        ->count();
    
        // inserir quantidade de comunidade que o usuario é membro
        User::update([
        'somarcomunidades' => $userComunidades
        ])
        ->where('id', $user)
        ->execute();
    }

    // EDITAR A COMUNIDADE
    public static function updateComunidade($comunidade, $nome, $descricao, $cidade, $estado, $cep, $pais, $idioma, $categoria, $tipo, $privacidade){
        
        Comunidade::update([
                'nome' => $nome,
                'descricao' => $descricao,
                'cidade' => $cidade,
                'estado' => $estado,
                'cep' => $cep,
                'pais' => $pais,
                'idioma' => $idioma,
                'categoria' => $categoria,
                'tipo' => $tipo,
                'privacidade' => $privacidade
                ])
                ->where('id', $comunidade)
                ->execute();
        
    }

    // PESQUISA DE COMUNIDADES
    public static function searchComunidades($term) {
        $data = Comunidade::select()->where('nome', 'like', '%'.$term.'%')->get();

        if($data) {
            foreach($data as $comunidade) {

                $newComunidade = new Comunidade();
                $newComunidade->id = $comunidade['id'];
                $newComunidade->nome = $comunidade['nome'];
                $newComunidade->avatar = $comunidade['avatar'];

                $comunidades[] = $newComunidade;

            }
        }

       if(!empty($comunidades)){
            return $comunidades;
        } 

    }

}