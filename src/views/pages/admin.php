<?=$render('header', ['loggedUser'=>$loggedUser,]);?>
<?=$render('admin_sidebar', ['activeMenu'=>'Home', 'user' => $user, 'loggedUser'=>$loggedUser,]);?>
<section id="centroAjudador" class="coluna-8 pr-10">
  <section class="feed mt-10">
    <div class="row">
      <div class="column">


<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs">Bem-vindo(a), Administrador <?=$loggedUser->name;?></h3>
	</div>
</div>



    <div class="box feed-item">
		<div class="p-10">









<style>.card {
  width: 150px;                 /* Set width of cards */
  display: flex;                /* Children use Flexbox */
  flex-direction: column;       /* Rotate Axis */
  box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
    border-radius: 5px;
    border-bottom: 1px hidden #fff;           /* Slightly Curve edges */
  overflow: hidden;             /* Fixes the corners */
  margin: 5px;                  /* Add space between cards */
}

.card-header {
  color: #fff;
  text-align: center;
  font-size: 12px;
  font-weight: 600;
  background: rgb(53,139,201);
    background: linear-gradient(0deg, rgba(53,139,201,1) 0%, rgba(56,136,199,1) 35%, rgba(94,157,210,1) 100%);
  padding: 5px 10px;
}

.card-main {
  display: flex;              /* Children use Flexbox */
  flex-direction: column;     /* Rotate Axis to Vertical */
  justify-content: center;    /* Group Children in Center */
  align-items: center;        /* Group Children in Center (on cross axis) */
  padding: 15px 0;            /* Add padding to the top/bottom */
}

.material-icons {
  font-size: 36px;
  color: #D32F2F;
  margin-bottom: 5px;
}

.main-description {
  color: #D32F2F;
  font-size: 12px;
  text-align: center;
}

.quadro {
    display: flex;              /* Children use Flexbox */
  flex-direction: row;
  flex-wrap: wrap;
}
</style>

<div class="quadro">

<a href="<?=$base;?>/admin/users">
<div class="card">
  <div class="card-header">Usuário</div>
  <div class="card-main">
    <i class="material-icons"><?=$allUsers;?></i>
    <div class="main-description">Total</div>
  </div>
</div>
</a>

<a href="<?=$base;?>/admin/feeds">
<div class="card">
  <div class="card-header">Timeline Feed</div>
  <div class="card-main">
    <i class="material-icons"><?=$allTimeline;?></i>
    <div class="main-description">Total</div>
  </div>
</div>
</a>

<div class="card">
  <div class="card-header">Users Fas</div>
  <div class="card-main">
    <i class="material-icons"><?=$allUserFa;?></i>
    <div class="main-description">Total</div>
  </div>
</div>

<a href="<?=$base;?>/admin/recados">
<div class="card">
  <div class="card-header">Recados</div>
  <div class="card-main">
    <i class="material-icons"><?=$allRecado;?></i>
    <div class="main-description">Ver Total</div>
  </div>
</div>
</a>

<a href="<?=$base;?>/admin/albuns">
<div class="card">
  <div class="card-header">Álbuns</div>
  <div class="card-main">
    <i class="material-icons"><?=$allAlbum;?></i>
    <div class="main-description">Total</div>
  </div>
</div>
</a>

<a href="<?=$base;?>/admin/photos">
<div class="card">
  <div class="card-header">Fotos</div>
  <div class="card-main">
    <i class="material-icons"><?=$allAlbumPhoto;?></i>
    <div class="main-description">Total</div>
  </div>
</div>
</a>

<div class="card">
  <div class="card-header">Comentários nas Fotos</div>
  <div class="card-main">
    <i class="material-icons"><?=$allAlbumPhotoComment;?></i>
    <div class="main-description">Total</div>
  </div>
</div>

<a href="<?=$base;?>/admin/videos">
<div class="card">
  <div class="card-header">Vídeos</div>
  <div class="card-main">
    <i class="material-icons"><?=$allVideo;?></i>
    <div class="main-description">Total</div>
  </div>
</div>
</a>

<a href="<?=$base;?>/admin/depoimentos">
<div class="card">
  <div class="card-header">Depoimentos</div>
  <div class="card-main">
    <i class="material-icons"><?=$allDepoimento;?></i>
    <div class="main-description">Total</div>
  </div>
</div>
</a>

<div class="card">
  <div class="card-header">Votos Confiável</div>
  <div class="card-main">
    <i class="material-icons"><?=$allVotoConfiavel;?></i>
    <div class="main-description">Total</div>
  </div>
</div>

<div class="card">
  <div class="card-header">Votos Legal</div>
  <div class="card-main">
    <i class="material-icons"><?=$allVotoLegal;?></i>
    <div class="main-description">Total</div>
  </div>
</div>

<div class="card">
  <div class="card-header">Votos Sexy</div>
  <div class="card-main">
    <i class="material-icons"><?=$allVotoSexy;?></i>
    <div class="main-description">Total</div>
  </div>
</div>

<a href="<?=$base;?>/admin/comunidades">
<div class="card">
  <div class="card-header">Comunidades</div>
  <div class="card-main">
    <i class="material-icons"><?=$allComunidade;?></i>
    <div class="main-description">Total</div>
  </div>
</div>
</a>

<div class="card">
  <div class="card-header">Comunidades Tópicos</div>
  <div class="card-main">
    <i class="material-icons"><?=$allComunidadeTopico;?></i>
    <div class="main-description">Total</div>
  </div>
</div>

<div class="card">
  <div class="card-header">Comunidades Mensagens</div>
  <div class="card-main">
    <i class="material-icons"><?=$allComunidadeMensagen;?></i>
    <div class="main-description">Total</div>
  </div>
</div>

</div>

            </div>
          </div>
        </div>  
      </div>
    </section>
  </section>
<?=$render('footer');?>