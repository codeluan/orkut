<section id="mySidenav" class="coluna-2 mt-10 sidenav">
							<aside class="perfil">
								<nav class="p-5">
								
					<a href=""><img src="<?=$base;?>/media/avatars/avatar.jpg" class="img-perfil"></a>
<div class="menu-splitter"></div>
<p class="p-5"><a href=""><b><?=$user->name;?> <?=$user->sobrenome;?></b></a></p>

<p class="status pl-5">
masculino,
casado(a) </p>
<p class="status pl-5">
Brasil </p>
	
	<?php if($user->id != $loggedUser->id): ?>
		<div class="menu-splitter"></div>
				<a href="<?=$base;?>/MainProfile/uid=<?=$user->id;?>/follow">
				<div class="menu-item"><div class="menu-item-icon"><i class="icone-perfil"></i></div>
				<div class="menu-item-text"><?=(!$isFollowing)?'+ seguir':'deixar de seguir';?></div></div>
			</a>

	<?php endif; ?>

	<div class="menu-splitter"></div>
		<a href="<?=$base;?>/Home">
			<div class="menu-item <?=($activeMenu=='Home')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/home-run.png" width="16" height="16"></div>
			<div class="menu-item-text">Home</div></div>
		</a>
		<a href="<?=$base;?>/MainProfile/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='MainProfile')?'active':'';?>"><div class="menu-item-icon"><i class="icone-perfil"></i></div>
			<div class="menu-item-text">Perfil</div><div class="menu-item-badge">Editar</div></div>
		</a>
		<a href="<?=$base;?>/MainScrapbook/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='MainScrapbook')?'active':'';?>"><div class="menu-item-icon"><i class="icone-recados"></i></div>
			<div class="menu-item-text">Recados</div></div>
		</a>
		<a href="<?=$base;?>/MainAlbumList/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='MainAlbumList')?'active':'';?>"><div class="menu-item-icon"><i class="icone-album"></i></div>
			<div class="menu-item-text">Fotos</div></div>
		</a>
		<a href="<?=$base;?>/MainFavoriteVideos/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='MainFavoriteVideos')?'active':'';?>"><div class="menu-item-icon"><i class="icone-videos"></i></div>
			<div class="menu-item-text">Vídeos</div></div>
		</a>
		<a href="<?=$base;?>/MainTestimonial/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='MainTestimonial')?'active':'';?>"><div class="menu-item-icon"><i class="icone-depoimentos"></i></div>
			<div class="menu-item-text">Depoimentos</div></div>
		</a>
	<div class="menu-splitter"></div>
		<b>Apps</b>
		<a href="<?=$base;?>/MainAppDirectory/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='MainAppDirectory')?'active':'';?>"><div class="menu-item-icon"><i class="icone-addapps"></i></div>
			<div class="menu-item-text">Adicionar apps</div></div>
		</a>
	<div class="menu-splitter"></div>
		<a href="<?=$base;?>/">
			<div class="menu-item <?=($activeMenu=='Listas')?'active':'';?>"><div class="menu-item-icon"><i class="icone-listas"></i></div>
			<div class="menu-item-text">Listas</div></div>
		</a>
		<a href="<?=$base;?>/MainUpdates/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='MainUpdates')?'active':'';?>"><div class="menu-item-icon"><i class="icone-updates"></i></div>
			<div class="menu-item-text">Atualizações</div></div>
		</a>
		<a href="<?=$base;?>/MainConfig/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='MainConfig')?'active':'';?>"><div class="menu-item-icon"><i class="icone-configuracoes"></i></div>
			<div class="menu-item-text">Configurações</div></div>
		</a>
		<a href="<?=$base;?>/MainExit">
			<div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/power.png" width="16" height="16" /></div>
			<div class="menu-item-text">Sair</div></div>
		</a>
	</nav>
	</aside>
</section>