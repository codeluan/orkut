<?php
namespace src\handlers;

use \src\models\Video;
use \src\models\User;
use \src\models\UserRelation;

class VideoHandler {
        // adicionar vídeos do youtube ao DB
    public static function addVideo($idUser, $id_video, $titulo_video) {
        $titulo_video = trim($titulo_video);

        $videoid = preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$id_video, $matches);
        $idVideo = $matches[1];
        
        if(!empty($idUser) && !empty($titulo_video)) {
                // INSERIR O VÍDEO NO DB
            Video::insert([
                'id_user' => $idUser,
                'id_video' => $idVideo,
                'titulo_video' => $titulo_video,
                'created_at' => date('Y-m-d H:i:s')
            ])->execute();

                // buscar total de VÍDEOS por usuario
            $total = Video::select()
            ->where('id_user', $idUser)
            ->count();
                // retorna o resultado

                // inserir quantidade de VÍDEOS na coluna somavideos do usuario
            User::update([
            'somavideos' => $total
            ])
            ->where('id', $idUser)
            ->execute(); 

        }
    }

    public static function _postListToObject($postList , $loggedUserId) {
        $posts = [];
        foreach($postList as $postItem) {
            $newPost = new Video();
            $newPost->id = $postItem['id'];
            $newPost->titulo_video = $postItem['titulo_video'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->id_video = $postItem['id_video'];
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
        $perPage = 2; // vídeos por página

        // .1 pegar vídeos ordenado por data
        $postList = Video::select()
        ->where('id_user', $idUser)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = Video::select()
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
            'totalvideos' => $total
        ];


    }

}