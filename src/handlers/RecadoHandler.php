<?php
namespace src\handlers;

use \src\models\Recado;
use \src\models\User;
use \src\models\UserRelation;

class RecadoHandler {
        // adiciona o recado ao banco de dados
    public static function addRecado($idUser, $type, $body, $idpara) {
        $body = trim($body);

        if(!empty($idUser) && !empty($body)) {

            Recado::insert([
                'id_user' => $idUser,
                'id_para' => $idpara,
                'type' => $type,
                'created_at' => date('Y-m-d H:i:s'),
                'body' => $body
            ])->execute();

            // buscar total de RECADOS por usuario
       $total = Recado::select()
       ->where('id_para', $idpara)
       ->count();
       // retorna o resultado

        // inserir quantidade de RECADOS na coluna somarecados do usuario
        User::update([
        'somarecados' => $total
        ])
        ->where('id', $idpara)
        ->execute(); 
        }
    }

    public static function _recadoListToObject($recadoList , $loggedUserId) {
        $posts = [];
        foreach($recadoList as $recadoItem) {
            $newPost = new Recado();
            $newPost->id = $recadoItem['id'];
            $newPost->type = $recadoItem['type'];
            $newPost->created_at = $recadoItem['created_at'];
            $newPost->body = $recadoItem['body'];
            $newPost->mine = false;

            // verificar se o posto do recado é do user logado
            if($recadoItem['id_user'] == $loggedUserId) {
                $newPost->mine = true;
            }

            // .3 preencher as informações adicionais no post
            $newUser = User::select()->where('id', $recadoItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            // 3.1 preencher informações like
            $newPost->likeCount = 0;
            $newPost->liked = false;
            // 3.2 preemcher comentarios
            $newPost->comments = [];

            $posts[] = $newPost;
        }

        return $posts;

    }

    public static function getUserRecados($idUser, $page, $loggedUserId) {
        $perPage = 5;

        // .1 pegar postagens ordenado por data
        $recadoList = Recado::select()
        ->where('id_para', $idUser)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        // DESCARTADO PARA TESTE DE CONTAGEM NA POSTAGEM
        $total = Recado::select()
        ->where('id_para', $idUser)
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_recadoListToObject($recadoList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'perPage' => $perPage,
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalrecados' => $total,
            'postsporpage' => $perPage
        ];
    }

    public static function getUsersRecados($idUser, $page, $loggedUserId) {
        $perPage = 2;

        // .1 pegar postagens ordenado por data
        $recadoList = Recado::select()
        ->where('id_para', $idUser)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        // DESCARTADO PARA TESTE DE CONTAGEM NA POSTAGEM
        $total = Recado::select()
        ->where('id_para', $idUser)
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_recadoListToObject($recadoList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalrecados' => $total,
            'postsporpage' => $perPage
        ];
    }
        // FUNÇÃO EDITAR RECADOS
    public static function getUserEditRecado($edit, $page, $id, $return, $loggedUser) {
        $photosData = Recado::select()
        ->where('id_user', $loggedUser)
        ->where('id', $edit)
        ->get();

        $photos = [];

        foreach($photosData as $photo) {
            $newPost = new Recado();
            $newPost->id = $photo['id'];
            $newPost->type = $photo['type'];
            $newPost->created_at = $photo['created_at'];
            $newPost->body = $photo['body'];

            $photos[] = $newPost;
        }

        return $photos;
    }

}