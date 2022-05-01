<?php
namespace src\handlers;

use \src\models\Recado;
use \src\models\Chat;
use \src\models\User;
use \src\models\UserRelation;

class ChatHandler {
        // adiciona o recado ao banco de dados
    public static function addChat($idUser, $body, $idpara) {
        $body = trim($body);

        if(!empty($idUser) && !empty($body)) {

            Chat::insert([
                'id_user' => $idUser,
                'id_para' => $idpara,
                'created_at' => date('Y-m-d H:i:s'),
                'body' => $body
            ])->execute();
        }
    }

    public static function _recadoListToObject($recadoList) {
        $posts = [];
        foreach($recadoList as $recadoItem) {
            $newPost = new Chat();
            $newPost->id = $recadoItem['id'];
            $newPost->id_user = $recadoItem['id_user'];
            $newPost->id_para = $recadoItem['id_para'];
            $newPost->created_at = $recadoItem['created_at'];
            $newPost->body = $recadoItem['body'];

            // .3 preencher as informações adicionais no post
            $newUser = User::select()->where('id', $recadoItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            $posts[] = $newPost;
        }

        return $posts;

    }

    public static function getUserRecados($idUser, $page, $loggedUserId) {
        $perPage = 20;

        // .1 pegar postagens ordenado por data
        $recadoList = Chat::select()
        ->where('id_user', $idUser)
        ->where('id_para', $loggedUserId)
        ->orWhere('id_user', $loggedUserId)
        ->Where('id_para', $idUser)
        ->orderBy('created_at', 'asc')
        ->get();

        // 1.1 total de página - gerar paginação
        // DESCARTADO PARA TESTE DE CONTAGEM NA POSTAGEM
        $total = Chat::select()
        ->where('id_para', $idUser)
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_recadoListToObject($recadoList);

        // .3 retorna o resultado
        return [
            'perPage' => $perPage,
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalrecados' => $total,
            'postsporpage' => $perPage
        ];
    }
    

}