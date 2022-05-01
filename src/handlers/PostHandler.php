<?php
namespace src\handlers;

use \src\models\Post;
use \src\models\User;
use \src\models\UserRelation;
use \src\models\Video;
use \src\models\Album;
use \src\models\AlbumPhoto;

class PostHandler {

    public static function addPost($idUser, $type, $body) {
        $body = trim($body);

        if(!empty($idUser) && !empty($body)) {

            Post::insert([
                'id_user' => $idUser,
                'type' => $type,
                'created_at' => date('Y-m-d H:i:s'),
                'body' => $body
            ])->execute();

            // buscar total de amigos por usuario
        $total = Post::select()
        ->where('id_user', $idUser)
        ->count();
        // retorna o resultado

        // inserir quantidade de amigos na coluna somamigos do usuario
        User::update([
        'somastatus' => $total
        ])
        ->where('id', $idUser)
        ->execute();
        }
    }

    public static function _postListToObject($postList , $loggedUserId) {
        $posts = [];
        foreach($postList as $postItem) {
            $newPost = new Post();
            $newPost->id = $postItem['id'];
            $newPost->type = $postItem['type'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->body = $postItem['body'];
            $newPost->mine = false;

            // verificar se o posto do feed é do user logado
            if($postItem['id_user'] == $loggedUserId) {
                $newPost->mine = true;
            }

            // .3 preencher as informações adicionais no post
            $newUser = User::select()->where('id', $postItem['id_user'])->one();
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

    public static function getUserFeed($idUser, $page, $loggedUserId) {
        // numeros de resultados por página
        $perPage = 4;

        // .1 pegar postas ordenado por data
        $postList = Post::select()
        ->where('id_user', $idUser)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = Post::select()
        ->where('id_user', $idUser)
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_postListToObject($postList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'perPage' => $perPage,
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalpost' => $total,
            'postsporpage' => $perPage
        ];


    }

    public static function getHomeFeed($idUser, $page) {
        // numeros de resultados por página
        $perPage = 6;

        // .1 lista de usuarios que sigo
        $userList = UserRelation::select()->where('user_from', $idUser)->get();
        $users = [];
        foreach($userList as $userItem) {
            $users[] = $userItem['user_to'];
        }
        $users[] = $idUser;

        // .2 pegar postas ordenado por data
        $postList = Post::select()
        ->where('id_user', 'in', $users)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 2.1 total de página - gerar paginação
        $total = Post::select()
        ->where('id_user', 'in', $users)
        ->count();
        $pageCount = ceil($total / $perPage);

        // .3 transformas os resultados em objetos dos models
        $posts = self::_postListToObject($postList, $idUser);

        // .4 retorna o resultado
        return [
            'perPage' => $perPage,
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalpost' => $total,
            'postsporpage' => $perPage
        ];
    }

    public static function getPhotosFrom($idUser) {
        $photosData = Post::select()
        ->where('id_user', $idUser)
        ->where('type', 'photo')
        ->get();

        $photos = [];

        foreach($photosData as $photo) {
            $newPost = new Post();
            $newPost->id = $photo['id'];
            $newPost->type = $photo['type'];
            $newPost->created_at = $photo['created_at'];
            $newPost->body = $photo['body'];

            $photos[] = $newPost;
        }

        return $photos;
    }

    public static function getUserEditFeed($edit, $page, $id, $loggedUser) {
        $photosData = Post::select()
        ->where('id_user', $id)
        ->where('id', $edit)
        ->get();

        $photos = [];

        foreach($photosData as $photo) {
            $newPost = new Post();
            $newPost->id = $photo['id'];
            $newPost->type = $photo['type'];
            $newPost->created_at = $photo['created_at'];
            $newPost->body = $photo['body'];

            $photos[] = $newPost;
        }

        return $photos;
    }

}