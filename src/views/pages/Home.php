<?=$render('header', ['loggedUser'=>$loggedUser,]);?>
<img class="btnSidebarProfile" onclick="toggleRightMenu()" src="<?=$base;?>/assets/images/profilesidebar.png" />
<section class="coluna-2 mt-10 sidenav" id="mySidenav">
    <aside class="perfil">
        <nav class="p-5">
            <a href=""><img src="<?=$base;?>/media/avatars/<?=$user->avatar;?>" class="img-perfil"></a>
<div class="menu-splitter"></div>
<p class="p-5"><a href=""><b><?=$loggedUser->name;?> <?=$loggedUser->sobrenome;?></b></a></p>

<p class="status pl-5">

<?=($user->sexo=='1')?'female,':'male,';?>

<?=($user->geral_relacionamento=='1')?'single':'';?>
<?=($user->geral_relacionamento=='2')?'married':'';?>
<?=($user->geral_relacionamento=='3')?'dating':'';?>
</p>
<p class="status pl-5">
<?=$user->estado;?>
<?=($user->contato_pais != NULL)?", $user->contato_pais":'';?></p>
    <div class="menu-splitter"></div>
        <a href="<?=$base;?>/home">
            <div class="menu-item active"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/home-run.png" width="16" height="16"></div>
            <div class="menu-item-text">Home</div></div>
        </a>
        <a href="<?=$base;?>/perfil/uid=<?=$loggedUser->id;?>">
            <div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/user.png" width="16" height="16" /></div>
            <div class="menu-item-text">Profile</div></div>
        </a>
        <a href="<?=$base;?>/recados">
            <div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/recados.png" width="16" height="16" /></div>
            <div class="menu-item-text">Scraps</div></div>
        </a>
        <a href="<?=$base;?>/fotos">
            <div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/photo.png" width="16" height="16" /></div>
            <div class="menu-item-text">Photos</div></div>
        </a>
        <a href="<?=$base;?>/videos">
            <div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/video.png" width="16" height="16" /></div>
            <div class="menu-item-text">Videos</div></div>
        </a>
        <a href="<?=$base;?>/depoimento">
            <div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/depoimentos.png" width="16" height="16" /></div>
            <div class="menu-item-text">Testimony</div></div>
        </a>
    <div class="menu-splitter"></div>
        <a href="<?=$base;?>/comunidades">
            <div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/comunidade.png" width="16" height="16" /></div>
            <div class="menu-item-text">Communities</div></div>
        </a>
        
        <a href="<?=$base;?>/perfilconfigutarion">
            <div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/settings.png" width="16" height="16" /></div>
            <div class="menu-item-text">Settings</div></div>
        </a>
        <a href="<?=$base;?>/editar_perfil">
            <div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/editprofile.png" width="16" height="16" /></div>
            <div class="menu-item-text">Edit profile</div></div>
        </a>
        <a href="<?=$base;?>/sair">
            <div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/power.png" width="16" height="16" /></div>
            <div class="menu-item-text">Exit</div></div>
        </a>
    </nav>
    </aside>
</section>			
				
						
        <section id="centroAjudador" class="coluna-7">
                
            <section class="feed mt-10">
                
                <div class="row">
                    <div class="column">


					<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs">Welcome to <?=$loggedUser->name;?></h3>
			

	
						<div class="row no-margin mt-20 mb-15 border-perfil hidden-xs">
						<div class="menu-middle-line">
						<div class="menu-middle">
						<p class="no-margin">Scraps</p>
						<a href="<?=$base;?>/recados">
						<img src="<?=$base;?>/assets/images/recados.png" width="16" height="16" /> <span><?=$user->somarecados;?></span>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">Photos</p>
						<a href="<?=$base;?>/fotos">
						<img src="<?=$base;?>/assets/images/photo.png" width="16" height="16" /> <span><?=$user->somafotos;?></span>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">Videos</p>
						<a href="<?=$base;?>/videos">
						<img src="<?=$base;?>/assets/images/video.png" width="16" height="16" /> <span><?=$user->somavideos;?></span>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">Fans</p>
						<a href="<?=$base;?>/fas">
						<img src="<?=$base;?>/assets/images/fas.png" width="16" height="16" /> <span><?=$user->somafas;?></span>
						</a>
						</div>
						</div>
						<div class="menu-middle-line hidden-xs">
						<div class="menu-middle">
						<p class="no-margin">Trustworthy</p>
						<a href="<?=$base;?>/votos/uid=<?=$user->id;?>">
						<div class="perfil-avaliacao">
						<div class="icone-confiavel icone-avaliar" title="<?=$user->votoconfiavel;?>% confiável">
						<div class="perfil-avaliacao-posicao" style="width: calc(100% - <?=$user->votoconfiavel;?>%);"></div>
						</div>
						</div>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">Cool</p>
						<a href="<?=$base;?>/votos/uid=<?=$user->id;?>">
						<div class="perfil-avaliacao">
						<div class="icone-legal icone-avaliar" title="<?=$user->votolegal;?>% legal">
						<div class="perfil-avaliacao-posicao" style="width: calc(100% - <?=$user->votolegal;?>%);"></div>
						</div>
						</div>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">Sexy</p>
						<a href="<?=$base;?>/votos/uid=<?=$user->id;?>">
						<div class="perfil-avaliacao">
						<div class="icone-sexy icone-avaliar" title="<?=$user->votosexys;?>% sexy">
						<div class="perfil-avaliacao-posicao" style="width: calc(100% - <?=$user->votosexys;?>%);"></div>
						</div>
						</div>
						</a>
						</div>
						</div>
						</div>
	</div>                 
</div>

	<?=$render('feed-editor', ['loggedUser'=>$loggedUser]);?>

	<?php foreach($feed['post'] as $feedItem): ?>
       <?=$render('feed-item', ['data' => $feedItem, 'loggedUser' => $loggedUser, 'id'=>$user->id]);?>
	<?php endforeach; ?>

    <?=$render('pagination', ['url' => 'Home', 'conteudo' => $feed, 'quantidade'=>$feed['totalpost'], 'id'=>$user->id]);?>
			</div>
		</div>
	</section>
</section>
<?=$render('perfil_sidebar_direito', ['loggedUser'=>$loggedUser, 'user'=>$user]);?>					
<?=$render('footer');?>