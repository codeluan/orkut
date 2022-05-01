<section id="mySidenav" class="coluna-2 mt-10 sidenav">
							<aside class="perfil">
								<nav class="p-5">
								
					<a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$user->avatar;?>" class="img-perfil"></a>
<div class="menu-splitter"></div>
<p class="p-5"><a href=""><b><?=$user->name;?> <?=$user->sobrenome;?></b></a></p>

<p class="status pl-5">

<?=($user->sexo=='1')?'female,':'male,';?>

<?=($user->geral_relacionamento=='1')?'single':'';?>
<?=($user->geral_relacionamento=='2')?'married':'';?>
<?=($user->geral_relacionamento=='3')?'dating':'';?>
</p>
<p class="status pl-5">
<?=$user->estado;?>
<?=($user->contato_pais != NULL)?", $user->contato_pais":'';?></p>
	
	<?php if($user->id != $loggedUser->id): ?>
		<div class="menu-splitter"></div>
				<a href="<?=$base;?>/perfil/uid=<?=$user->id;?>/follow">
				<div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/adduser.png" width="16" height="16"></div>
				<div class="menu-item-text"><?=(!$isFollowing)?'+ seguir':'deixar de seguir';?></div></div>
			</a>
	<?php endif; ?>

	<div class="menu-splitter"></div>
		<a href="<?=$base;?>/home">
			<div class="menu-item <?=($activeMenu=='Home')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/home-run.png" width="16" height="16"></div>
			<div class="menu-item-text">Home</div></div>
		</a>
		<a href="<?=$base;?>/perfil/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='Perfil')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/user.png" width="16" height="16" /></div>
			<div class="menu-item-text">Profile</div></div>
		</a>
		<a href="<?=$base;?>/recados/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='Recados')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/recados.png" width="16" height="16" /></div>
			<div class="menu-item-text">Scraps</div></div>
		</a>
		<a href="<?=$base;?>/fotos/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='Fotos')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/photo.png" width="16" height="16" /></div>
			<div class="menu-item-text">Photos</div></div>
		</a>
		<a href="<?=$base;?>/videos/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='Videos')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/video.png" width="16" height="16" /></div>
			<div class="menu-item-text">Videos</div></div>
		</a>
		<a href="<?=$base;?>/depoimento/uid=<?=$user->id;?>">
			<div class="menu-item <?=($activeMenu=='Depoimento')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/depoimentos.png" width="16" height="16" /></div>
			<div class="menu-item-text">Testimony</div></div>
		</a>
	<div class="menu-splitter"></div>
		
		
		
		
	</nav>
	</aside>
</section>