<?php
namespace src\handlers;

use \src\models\Album;
use \src\models\AlbumPhoto;
use \src\models\AlbumPhotoComment;
use \src\models\User;
use \src\models\Post;
use \src\models\UserRelation;
use \src\models\UserFa;
use \src\models\VotoConfiavel;
use \src\models\VotoLegal;
use \src\models\VotoSexy;
use \src\models\Depoimento;
use \src\models\Comunidade;
use \src\models\ComunidadeMembro;
use \src\models\ComunidadeTopico;
use \src\models\ComunidadeMensagen;
use \src\models\Recado;
use \src\models\Video;

class AdminHandler {
        
    public static function _recadosListObject($postList) {
        $posts = [];
        foreach($postList as $postItem) {
            $newPost = new Recado();
            $newPost->id = $postItem['id'];
            $newPost->type = $postItem['type'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->body = $postItem['body'];
            $newPost->mine = false;

            // .3 preencher as informações adicionais no post
            $newUser = User::select()->where('id', $postItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            $posts[] = $newPost;
        }

        return $posts;

    }
        // função lista / páginar todos os recados do sistema
    public static function getRecados($idUser, $page, $loggedUserId) {
        $perPage = 15;

        // .1 pegar os recados ordenado por data
        $postList = Recado::select()
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - para gerar paginação
        $total = Recado::select()
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 puxar todos os objetos 
        $posts = self::_recadosListObject($postList);

        // .3 retorna o resultado como array
        return [
            'perPage' => $perPage,
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalrecados' => $total,
            'postsporpage' => $perPage
        ];


    }

    public static function _PhotosListToObject($postList , $loggedUserId) {
        $posts = [];
        foreach($postList as $postItem) {
            $newPost = new AlbumPhoto();
            $newPost->id = $postItem['id'];
            $newPost->photo = $postItem['photo'];
            $newPost->descricao = $postItem['descricao'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->id_album = $postItem['id_album'];

            // .3 preencher as informações adicionais no post
            $newUser = User::select()->where('id', $postItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            $posts[] = $newPost;
        }

        return $posts;

    }

    public static function getPhotos($page, $loggedUserId) {
        $perPage = 4; // Álbuns por página

        // .1 pegar Álbuns ordenado por data
        $postList = AlbumPhoto::select()
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = AlbumPhoto::select()
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_PhotosListToObject($postList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'perPage' => $perPage,
            'post' => $posts,
            'pageCount' => $pageCount,
            'totalfotos' => $total
        ];


    }

    public static function _feedsListObject($postList) {
        $posts = [];
        foreach($postList as $postItem) {
            $newPost = new Post();
            $newPost->id = $postItem['id'];
            $newPost->type = $postItem['type'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->body = $postItem['body'];
            $newPost->mine = false;

            // .3 preencher as informações adicionais no feed
            $newUser = User::select()->where('id', $postItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            $posts[] = $newPost;
        }

        return $posts;

    }
        // função lista / páginar todos os feeds do sistema
    public static function getFeeds($idUser, $page, $loggedUserId) {
        $perPage = 15;

        // .1 pegar os recados ordenado por data
        $postList = Post::select()
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - para gerar paginação
        $total = Post::select()
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 puxar todos os objetos 
        $posts = self::_feedsListObject($postList);

        // .3 retorna o resultado como array
        return [
            'perPage' => $perPage,
            'post' => $posts,
            'pageCount' => $pageCount,
            'total' => $total,
            'postsporpage' => $perPage
        ];
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

            // .3 preencher as informações adicionais no post
            $newUser = User::select()->where('id', $postItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            $posts[] = $newPost;
        }

        return $posts;

    }

    public static function getAlbuns($idUser, $page, $loggedUserId) {
        $perPage = 8; // Álbuns por página

        // .1 pegar Álbuns ordenado por data
        $postList = Album::select()
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = Album::select()
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_albunsListToObject($postList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'perPage' => $perPage,
            'post' => $posts,
            'pageCount' => $pageCount,
            'total' => $total
        ];
    }

    // GERANDO OS USUARIO
    public static function _userListToObject($userList , $loggedUserId) {
        $users = [];
        foreach($userList as $postItem) {
            $newPost = new User();
            $newPost->id = $postItem['id'];
            $newPost->name = $postItem['name'];
            $newPost->avatar = $postItem['avatar'];
            $newPost->somamigos = $postItem['somamigos'];

            $users[] = $newPost;
        }
        return $users;
    }

        // GERANDO OS AMIGOS E PAGINAÇÃO
    public static function getUsers($page, $loggedUserId) {
        $perPage = 21; // DEFINIR QUANTIDADE DE MEMBROS POR PÁGINA

        // .1 pegar membros na comunidade
        $userList = User::select()
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = User::select()
        ->count();
        $pageCount = ceil($total / $perPage);

        // 1.2 transformas os resultados em objetos dos models ( gerar os membros)
        $users = self::_userListToObject($userList, $loggedUserId);

        // 1.3 retorna o resultado
        return [
            'perPage' => $perPage,
            'users' => $users,
            'pageCount' => $pageCount,
            'total' => $total
        ];
    }

    public static function _videoListToObject($postList , $loggedUserId) {
        $posts = [];
        foreach($postList as $postItem) {
            $newPost = new Video();
            $newPost->id = $postItem['id'];
            $newPost->titulo_video = $postItem['titulo_video'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->id_video = $postItem['id_video'];

            $posts[] = $newPost;
        }

        return $posts;
    }

    public static function getVideos($idUser, $page, $loggedUserId) {
        $perPage = 2; // vídeos por página

        // .1 pegar vídeos ordenado por data
        $postList = Video::select()
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = Video::select()
        ->count();
        $pageCount = ceil($total / $perPage);

        // .2 transformas os resultados em objetos dos models
        $posts = self::_videoListToObject($postList, $loggedUserId);

        // .3 retorna o resultado
        return [
            'perPage' => $perPage,
            'post' => $posts,
            'pageCount' => $pageCount,
            'total' => $total
        ];
    }

    public static function _depoimentosListToObject($depoimentoList , $loggedUserId) {
        $posts = [];
        foreach($depoimentoList as $depoimentoItem) {
            $newPost = new Depoimento();
            $newPost->id = $depoimentoItem['id'];
            $newPost->type = $depoimentoItem['type'];
            $newPost->created_at = $depoimentoItem['created_at'];
            $newPost->body = $depoimentoItem['body'];

            //preencher as informações adicionais do usuario
            $newUser = User::select()->where('id', $depoimentoItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];
            $newPost->user->somadepoimentos = $newUser['somadepoimentos'];
            $newPost->user->somadepoescrito = $newUser['somadepoescrito'];

            $posts[] = $newPost;
        }

        return $posts;

    }
    // GERANDO OS FAS E PAGINAÇÃO
    public static function getDepoimentos($page, $loggedUserId) {
        $perPage = 8; // DEFINIR QUANTIDADE DE FAS POR PÁGINA

        // .1 pegar os fas
        $depoimentoList = Depoimento::select()
        ->orderBy('created_at', 'desc')
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = Depoimento::select()->count();
        
        $pageCount = ceil($total / $perPage);

        // 1.2 transformas os resultados em objetos dos models ( gerar os FAS)
        $depoimentos = self::_depoimentosListToObject($depoimentoList, $loggedUserId);

        // 1.3 retorna o resultado
        return [
            'perPage' => $perPage,
            'depoimentos' => $depoimentos,
            'pageCount' => $pageCount,
            'total' => $total,
            'postsporpage' => $perPage
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
    public static function getComunidades($id, $page, $loggedUserId) {
        $perPage = 6; // DEFINIR QUANTIDADE DE COMUNIDADES POR PÁGINA

        // .1 pegar as comunidades
        $comunidadeList = Comunidade::select()
        ->page($page, $perPage)
        ->get();

        // 1.1 total de página - gerar paginação
        $total = Comunidade::select()
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

}