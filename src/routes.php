<?php
use core\Router;

$router = new Router();

$router->get('/home/uid={id}', 'HomeController@index');
$router->get('/home', 'HomeController@index');
$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');

$router->get('/cadastro', 'LoginController@signup');

// RECEBER
$router->post('/cadastro', 'LoginController@signupAction');
$router->post('/post/new', 'PostController@new');
$router->post('/recado/new', 'PostRecadoController@new');
$router->post('/depoimento/new', 'PostDepoimentoController@new');
$router->post('/video/new', 'PostVideoController@new');
$router->post('/album/new', 'PostAlbumController@newAlbum');
$router->post('/albumPhotoComment/new', 'PostAlbumController@newAlbumPhotoComment');
$router->post('/albumPhoto/new', 'PostAlbumController@newAlbumPhoto');
$router->post('/comunidade/editar', 'ComunidadeEditController@updateEditarComunidade');
$router->post('/comunidade/new', 'ComunidadeController@new');
$router->post('/comunidade/criartopicos/new', 'ComunidadeController@newtopico');
$router->post('/comunidade/criarmensagens/new', 'ComunidadeController@newmensagem');
$router->post('/addchat/new', 'ChatController@new');
//EDITAR
$router->post('/profile_config/new', 'ProfileEditController@configAction');
$router->post('/editar_perfil/new', 'ProfileEditController@editAction');
$router->post('/editar_recado/new', 'EditController@editRecado');
$router->post('/edit_depoimento/new', 'EditController@editDepoimento');
$router->post('/editar_feed/new', 'EditController@editFeed');
$router->post('/edit_album_photo/new', 'EditController@editAlbumPhoto');
$router->post('/edit_profile_album_photo_comment/new', 'EditController@editCommetProfilePhotoAlbum');
$router->post('/edit_profile_album/new', 'EditController@editProfileAlbum');

//DELETAR
$router->get('/deletevideo', 'DeletarController@deletarVideo');
$router->get('/deletedepoimento', 'DeletarController@deletarDepoimento');
$router->get('/deleterecado', 'DeletarController@deletarRecado');
$router->get('/deletefeed', 'DeletarController@deletarFeed');
$router->get('/deletarcomunidademensagen', 'DeletarController@deletarComunidadeMensagen');
$router->get('/deletarcomunidadetopico', 'DeletarController@deletarComunidadeTopico');
$router->get('/deletalbumfotocomment', 'DeletarController@deletAlbumPhotoComment');
$router->get('/deletalbumfoto', 'DeletarController@deletarPhotoDoAlbum');
$router->get('/deletalbum', 'DeletarController@deletarAlbumPhotosPerfil');


// PAGINAS
$router->get('/perfil/uid={id}/follow', 'ProfileController@follow');
$router->get('/perfil/uid={id}', 'ProfileController@index');
$router->get('/perfil', 'ProfileController@index');

$router->get('/fas/uid={id}/fasfollow', 'ProfileController@fasfollow');
$router->get('/fas/uid={id}', 'ProfileController@fas');
$router->get('/fas', 'ProfileController@fas');

$router->get('/seguidores/uid={id}', 'ProfileController@amigosSeguidores');
$router->get('/seguidores', 'ProfileController@amigosSeguidores');
$router->get('/seguindo/uid={id}', 'ProfileController@amigosSeguindo');
$router->get('/seguindo', 'ProfileController@amigosSeguindo');

$router->get('/album/foto/comment/edit/uid={id}', 'ProfileController@albunsPhotoCommetEditIndividual');
$router->get('/album/foto/edit/uid={id}', 'ProfileController@albunsPhotoEditIndividual');
$router->get('/album/foto/uid={id}', 'ProfileController@albunsPhotoIndividual');
$router->get('/album/fotos/uid={id}', 'ProfileController@albunsPhotos');
$router->get('/album/edit/uid={id}', 'ProfileController@albunsEdit');
$router->get('/fotos/uid={id}', 'ProfileController@albuns');
$router->get('/fotos', 'ProfileController@albuns');

$router->get('/videos/uid={id}', 'VideoController@index');
$router->get('/videos', 'VideoController@index');

$router->get('/recados/edit/uid={id}', 'RecadoController@editarRecados');
$router->get('/recados/uid={id}', 'RecadoController@index');
$router->get('/recados', 'RecadoController@index');

$router->get('/votoconfiavel', 'VotoController@votoconfiavel');
$router->get('/votolegal', 'VotoController@votolegal');
$router->get('/votosexy', 'VotoController@votosexy');
$router->get('/votos/uid={id}', 'VotoController@index');
$router->get('/votos', 'VotoController@index');

$router->get('/search-u', 'SearchController@searchUsers');
$router->get('/search-c', 'SearchController@searchCommunity');

$router->get('/perfilconfigutarion', 'ProfileEditController@profileConfiguration');
$router->get('/editar_perfil', 'ProfileEditController@index');
$router->get('/feed/uid={id}', 'ProfileController@editarFeeds');

$router->get('/depoimentoescrevi/uid={id}', 'DepoimentoController@depoimentoescrevi');
$router->get('/depoimentoescrevi', 'DepoimentoController@depoimentoescrevi');
$router->get('/depoimento/edit/uid={id}', 'DepoimentoController@editDepoimento');
$router->get('/depoimento/uid={id}', 'DepoimentoController@index');
$router->get('/depoimento', 'DepoimentoController@index');

$router->get('/comunidade/buscar/uid={id}', 'ComunidadeController@comunidadesbuscarelacionadas');
$router->get('/comunidade/criarenquetes/uid={id}', 'ComunidadeController@criarenquetes');
$router->get('/comunidade/enquetes/uid={id}', 'ComunidadeController@enquetes');
$router->get('/comunidade/criarmensagens/uid={id}', 'ComunidadeController@criarmensagens');
$router->get('/comunidade/mensagens/uid={id}', 'ComunidadeController@mensagens');
$router->get('/comunidade/criartopicos/uid={id}', 'ComunidadeController@criartopicos');
$router->get('/comunidade/topicos/uid={id}', 'ComunidadeController@topicos');
$router->get('/comunidade/membros/uid={id}', 'ComunidadeController@membros');
$router->get('/comunidade/relacionadas/uid={id}', 'ComunidadeController@comunidadesrelacionadas');
$router->get('/comunidade/uid={id}/comunidadefollow', 'ComunidadeController@comunidadefollow');
$router->get('/comunidaderelacionada', 'ComunidadeController@comunidaderelacionada');
$router->get('/comunidade/editar/uid={id}', 'ComunidadeEditController@editarcomunidade');
$router->get('/comunidade/criar', 'ComunidadeController@criar');
$router->get('/comunidade/uid={id}', 'ComunidadeController@index');
$router->get('/comunidades/uid={id}', 'ComunidadeController@comunidadeList');
$router->get('/comunidades', 'ComunidadeController@comunidadeList');
$router->get('/comunidadesoudono/uid={id}', 'ComunidadeController@comunidadeListDono');
$router->get('/comunidadesoudono', 'ComunidadeController@comunidadeListDono');

$router->get('/chat/uid={id}', 'ChatController@index');
$router->get('/chat', 'ChatController@index');

$router->get('/marketplace', 'MarketplaceController@index');

//ADMIN
$router->get('/admin/comunidades', 'AdminController@comunidades');
$router->get('/admindeldepoimento', 'AdminController@deletarDepoimentos');
$router->get('/admin/depoimentos', 'AdminController@depoimentos');
$router->get('/admindelvideo', 'AdminController@deletarVideo');
$router->get('/admin/videos', 'AdminController@videos');
$router->get('/admin/users', 'AdminController@users');
$router->get('/admindelalbum', 'AdminController@deletarAlbum');
$router->get('/admin/albuns', 'AdminController@albuns');
$router->get('/admindelfeed', 'AdminController@deletarFeed');
$router->get('/admin/feeds', 'AdminController@feeds');
$router->get('/admindelphoto', 'AdminController@deletarPhotos');
$router->get('/admin/photos', 'AdminController@photos');
$router->get('/admindeleterecado', 'AdminController@deletarRecado');
$router->get('/admin/recados', 'AdminController@recados');
$router->get('/admin', 'AdminController@index');

//PAGES
$router->get('/about', 'PageController@About');
$router->get('/news', 'PageController@News');
$router->get('/privacy', 'PageController@Privacy');
$router->get('/terms', 'PageController@Terms');
$router->get('/contact', 'PageController@Contact');

//SAIR
$router->get('/sair', 'LoginController@logout');