<?php
namespace src\handlers;

use \src\models\Depoimento;
use \src\models\User;
use \src\models\UserRelation;
use \src\models\VotoSexy;

class DepoimentoHandler {
        // adiciona o Depoimento ao banco de dados
    public static function addDepoimento($idUser, $type, $body, $idpara) {
        $body = trim($body);

        if(!empty($idUser) && !empty($body)) {

            Depoimento::insert([
                'id_user' => $idUser,
                'id_para' => $idpara,
                'type' => $type,
                'created_at' => date('Y-m-d H:i:s'),
                'body' => $body
            ])->execute();

        // buscar total de depoimentos recebidos por usuario
       $total = Depoimento::select()
       ->where('id_para', $idpara)
       ->count();
       // retorna o resultado

        // inserir quantidade de depoimentos na coluna somadepoimentos do usuario
        User::update([
        'somadepoimentos' => $total
        ])
        ->where('id', $idpara)
        ->execute();

        // buscar total de depoimentos que escrevi
       $totalescrito = Depoimento::select()
       ->where('id_user', $idpara) // variavel padão por ser utilizada por quem escreveu ou recebeu
       ->count();
       // retorna o resultado

        // inserir quantidade de depoimentos escritos na coluna somadepoescrito do usuario
        User::update([
        'somadepoescrito' => $totalescrito
        ])
        ->where('id', $idpara)
        ->execute(); 

        }
    }

    public static function _postListToObject($depoimentoList , $loggedUserId) {
        $posts = [];
        foreach($depoimentoList as $depoimentoItem) {
            $newPost = new Depoimento();
            $newPost->id = $depoimentoItem['id'];
            $newPost->type = $depoimentoItem['type'];
            $newPost->created_at = $depoimentoItem['created_at'];
            $newPost->body = $depoimentoItem['body'];
            $newPost->mine = false;

            // verificar se o depoimento é do user logado
            if($depoimentoItem['id_user'] == $loggedUserId) {
                $newPost->mine = true;
            }

            // .3 preencher as informações adicionais do usuario
            $newUser = User::select()->where('id', $depoimentoItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];
            $newPost->user->somadepoimentos = $newUser['somadepoimentos'];
            $newPost->user->somadepoescrito = $newUser['somadepoescrito'];

            // 3.1 preencher informações like (desenvolver)
            $newPost->likeCount = 0;
            $newPost->liked = false;
            // 3.2 preemcher comentarios (desenvolver)
            $newPost->comments = [];

            $posts[] = $newPost;
        }

        return $posts;

    }

    public static function getUserDepoimento($idUser, $page, $loggedUserId) {
        $perPage = 2;

        // .1 pegar postagens ordenado por data
        $depoimentoList = Depoimento::select()
        ->where('id_para', $idUser)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = Depoimento::select()
        ->where('id_para', $idUser)
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_postListToObject($depoimentoList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalpost' => $total,
            'postsporpage' => $perPage
        ];

    }

    

        // GERANDO OS FAS E PAGINAÇÃO
    public static function getDepoimentos($idUser, $page, $loggedUserId) {
        $perPage = 6; // DEFINIR QUANTIDADE DE FAS POR PÁGINA

        // .1 pegar os fas
        $depoimentoList = Depoimento::select()
        ->where('id_para', $idUser)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = Depoimento::select()
        ->where('id_para', $idUser)
        ->count();
        
        $pageCount = ceil($total / $perPage);

        // 1.2 transformas os resultados em objetos dos models ( gerar os FAS)
        $depoimentos = self::_postListToObject($depoimentoList, $loggedUserId);

        // 1.3 retorna o resultado
        return [
            'perPage' => $perPage,
            'depoimentos' => $depoimentos,
            'pageCount' => $pageCount,
            'totalrecados' => $total,
            'postsporpage' => $perPage
        ];


    }

    // GERANDO OS FAS E PAGINAÇÃO
    public static function getDepoimentosEscrevi($idUser, $page, $loggedUserId) {
        $perPage = 6; // DEFINIR QUANTIDADE DE FAS POR PÁGINA

        // .1 pegar os fas
        $depoimentoList = Depoimento::select()
        ->where('id_user', $idUser)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = Depoimento::select()
        ->where('id_user', $idUser)
        ->count();
        $pageCount = ceil($total / $perPage);

        // 1.2 transformas os resultados em objetos dos models ( gerar os FAS)
        $depoimentos = self::_postListToObject($depoimentoList, $loggedUserId);

        // 1.3 retorna o resultado
        return [
            'perPage' => $perPage,
            'depoimentos' => $depoimentos,
            'pageCount' => $pageCount,
            'totalrecados' => $total,
            'postsporpage' => $perPage
        ];
    }

    // FUNÇÃO EDITAR DEPOIMENTO
    public static function getUserEditDepoimento($edit, $id, $loggedUser) {
        $photosData = Depoimento::select()
        ->where('id_user', $loggedUser)
        ->where('id', $edit)
        ->get();

        $photos = [];

        foreach($photosData as $photo) {
            $newPost = new Depoimento();
            $newPost->id = $photo['id'];
            $newPost->type = $photo['type'];
            $newPost->created_at = $photo['created_at'];
            $newPost->body = $photo['body'];

            $photos[] = $newPost;
        }

        return $photos;
    }

}