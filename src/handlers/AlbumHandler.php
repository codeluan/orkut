<?php
namespace src\handlers;

use \src\models\Album;
use \src\models\AlbumPhoto;
use \src\models\AlbumPhotoComment;
use \src\models\User;
use \src\models\UserRelation;

class AlbumHandler {
        // adicionar Álbum ao banco de dados
    public static function addAlbum($idUser, $titulo_album, $descricao) {
        $titulo_album = trim($titulo_album);
        $descricao = trim($descricao);

        
        if(!empty($idUser) && !empty($titulo_album)) {
                // INSERIR O ÁLBUM NO DB
            Album::insert([
                'id_user' => $idUser,
                'titulo_album' => $titulo_album,
                'descricao' => $descricao,
                'created_at' => date('Y-m-d H:i:s')
            ])->execute();
        }
    }

    // adicionar Photo ao Álbum 
    public static function addAlbumPhoto($idUser, $id_album, $avatarName) {
        
        if(!empty($idUser)) {
                // INSERIR A FOTO NO ALBUM
            AlbumPhoto::insert([
                'id_user' => $idUser,
                'id_album' => $id_album,
                'photo' => $avatarName,
                'created_at' => date('Y-m-d H:i:s')
            ])->execute();

            // atualizar capa
            Album::update([
            'capa' => $avatarName
            ])
            ->where('id', $id_album)
            ->execute();

            // buscar total de fotos por album
        $total = AlbumPhoto::select()
        ->where('id_user', $idUser)
        ->where('id_album', $id_album)
        ->count();
        // retorna o resultado

        // inserir quantidade de fotos na coluna somarfotos do album
        Album::update([
        'somarfotos' => $total
        ])
        ->where('id', $id_album)
        ->execute();

        // buscar total de fotos por album
        $totalfotos = AlbumPhoto::select()
        ->where('id_user', $idUser)
        ->count();
        // retorna o resultado

        // inserir quantidade de fotos na coluna somarfotos do album
        User::update([
        'somafotos' => $totalfotos
        ])
        ->where('id', $idUser)
        ->execute();


        }
    }

    // adicionar comment na photo
    public static function addPhotoComment($idUser, $body, $id_user, $id_album, $id_photo) {
        
        if(!empty($idUser)) {
                // INSERIR o comment na foto
            AlbumPhotoComment::insert([
                'id_user' => $idUser,
                'id_album' => $id_album,
                'id_photo' => $id_photo,
                'body' => $body,
                'created_at' => date('Y-m-d H:i:s')
            ])->execute();

            
        }
    }

    public static function _albunsListToObject($postList , $loggedUserId) {
        $posts = [];
        foreach($postList as $postItem) {
            $newPost = new Album();
            $newPost->id = $postItem['id'];
            $newPost->titulo_album = $postItem['titulo_album'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->descricao = $postItem['descricao'];
            $newPost->capa = $postItem['capa'];
            $newPost->somarfotos = $postItem['somarfotos'];
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

    public static function getUserAlbuns($idUser, $page, $loggedUserId) {
        $perPage = 8; // Álbuns por página

        // .1 pegar Álbuns ordenado por data
        $postList = Album::select()
        ->where('id_user', $idUser)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = Album::select()
        ->where('id_user', $idUser)
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_albunsListToObject($postList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'perPage' => $perPage,
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalalbuns' => $total
        ];


    }

    public static function getUserAlbumEdit($id, $page, $album, $loggedUser) {
        $photosData = Album::select()
        ->where('id', $album)
        ->where('id_user', $loggedUser)
        ->get();

        $photos = [];

        foreach($photosData as $photo) {
            $newPost = new Album();
            $newPost->id = $photo['id'];
            $newPost->id_user = $photo['id_user'];
            $newPost->titulo_album = $photo['titulo_album'];
            $newPost->descricao = $photo['descricao'];
            $newPost->capa = $photo['capa'];
            $newPost->somarfotos = $photo['somarfotos'];
            $newPost->created_at = $photo['created_at'];



            $photos[] = $newPost;
        }

        return $photos;
    }


    public static function _albunsPhotosListToObject($postList , $loggedUserId) {
        $posts = [];
        foreach($postList as $postItem) {
            $newPost = new AlbumPhoto();
            $newPost->id = $postItem['id'];
            $newPost->photo = $postItem['photo'];
            $newPost->descricao = $postItem['descricao'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->id_album = $postItem['id_album'];
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

    public static function getUserAlbunsPhotos($idUser, $page, $album, $loggedUserId) {
        $perPage = 8; // Álbuns por página

        // .1 pegar Álbuns ordenado por data
        $postList = AlbumPhoto::select()
        ->where('id_user', $idUser)
        ->where('id_album', $album)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = AlbumPhoto::select()
        ->where('id_user', $idUser)
        ->where('id_album', $album)
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_albunsPhotosListToObject($postList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'perPage' => $perPage,
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalfotos' => $total
        ];


    }

    public static function getUserPhoto($id, $page, $album, $photo, $loggedUser) {
        $photosData = AlbumPhoto::select()
        ->where('id', $photo)
        ->where('id_album', $album)
        ->where('id_user', $id)
        ->get();

        $photos = [];

        foreach($photosData as $photo) {
            $newPost = new AlbumPhoto();
            $newPost->id = $photo['id'];
            $newPost->id_album = $photo['id_album'];
            $newPost->id_user = $photo['id_user'];
            $newPost->descricao = $photo['descricao'];
            $newPost->photo = $photo['photo'];
            $newPost->created_at = $photo['created_at'];



            $photos[] = $newPost;
        }

        return $photos;
    }

    public static function getUserAlbumTitulo($id, $album, $loggedUser) {
        $albumData = Album::select()
        ->where('id', $album)
        ->where('id_user', $id)
        ->get();

        $album = [];

        foreach($albumData as $album) {
            $newPost = new Album();
            $newPost->titulo_album = $album['titulo_album'];
            $album[] = $newPost;
        }

        return $album;
    }


    public static function _recadoListToObject($recadoList , $loggedUserId) {
        $posts = [];
        foreach($recadoList as $recadoItem) {
            $newPost = new AlbumPhotoComment();
            $newPost->id = $recadoItem['id'];
            $newPost->type = $recadoItem['id_album'];
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

    public static function getUserRecados($idUser, $page, $photo, $loggedUserId) {
        $perPage = 5;

        // .1 pegar postagens ordenado por data
        $recadoList = AlbumPhotoComment::select()
        ->where('id_photo', $photo)
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        // DESCARTADO PARA TESTE DE CONTAGEM NA POSTAGEM
        $total = AlbumPhotoComment::select()
        ->where('id_photo', $photo)
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


    public static function getUserAlbumPhotoEditComment($id, $album, $photo, $comment, $loggedUser) {
        $photosData = AlbumPhotoComment::select()
        ->where('id', $comment)
        ->where('id_user', $loggedUser)
        ->where('id_album', $album)
        ->where('id_photo', $photo)
        ->get();

        $photos = [];

        foreach($photosData as $recadoItem) {
            $newPost = new AlbumPhotoComment();
            $newPost->id = $recadoItem['id'];
            $newPost->type = $recadoItem['id_album'];
            $newPost->created_at = $recadoItem['created_at'];
            $newPost->body = $recadoItem['body'];

            $newUser = User::select()->where('id', $recadoItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            $photos[] = $newPost;
        }

        return $photos;
    }

    

}