<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('perfil_sidebar', ['activeMenu'=>'Sexy','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
<section class="coluna-7">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs">Status social para <?=$user->name;?></h3>
						<ul class="breadcrumb hidden-xs">
							<li><a href="<?=$base;?>/">Início</a></li>
							<li>Status social para <?=$user->name;?></li>
						</ul>
					</div>
					<div class="menu-splitter"></div>
					<div class="p-10">
						Nível de confiança
						<a href="<?=$base;?>/votoconfiavel?vid=<?=$user->id;?>&voto=1">
							<img src="<?=$base;?>/assets/images/idconfiavel.png" width="16" height="16" />
						</a>
						<a href="<?=$base;?>/votoconfiavel?vid=<?=$user->id;?>&voto=2">
							<img src="<?=$base;?>/assets/images/idconfiavel.png" width="16" height="16" />
						</a>
						<a href="<?=$base;?>/votoconfiavel?vid=<?=$user->id;?>&voto=3">
							<img src="<?=$base;?>/assets/images/idconfiavel.png" width="16" height="16" />
						</a>			
					</div>
						<div class="menu-splitter"></div>
					<div class="p-10">
						Nível legal
						<a href="<?=$base;?>/votolegal?vid=<?=$user->id;?>&voto=1">
							<img src="<?=$base;?>/assets/images/idlegal.png" width="16" height="16" />
						</a>
						<a href="<?=$base;?>/votolegal?vid=<?=$user->id;?>&voto=2">
							<img src="<?=$base;?>/assets/images/idlegal.png" width="16" height="16" />
						</a>
						<a href="<?=$base;?>/votolegal?vid=<?=$user->id;?>&voto=3">
							<img src="<?=$base;?>/assets/images/idlegal.png" width="16" height="16" />
						</a>
					</div>
						<div class="menu-splitter"></div>
					<div class="p-10">
							Nível sexy
						<a href="<?=$base;?>/votosexy?vid=<?=$user->id;?>&voto=1">
							<img src="<?=$base;?>/assets/images/idsexy.png" width="16" height="16" />
						</a>
						<a href="<?=$base;?>/votosexy?vid=<?=$user->id;?>&voto=2">
							<img src="<?=$base;?>/assets/images/idsexy.png" width="16" height="16" />
						</a>
						<a href="<?=$base;?>/votosexy?vid=<?=$user->id;?>&voto=3">
							<img src="<?=$base;?>/assets/images/idsexy.png" width="16" height="16" />
						</a>
					</div>
				</div>
			</div>		
		</div>
	</section>
</section>	
<?=$render('perfil_sidebar_direito', ['user'=>$user]);?>
<?=$render('footer');?>