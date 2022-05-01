
<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('perfil_sidebar', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs">Fãs de <?=$user->name;?> (<?=$user->somafas;?>)</h3>
							<ul class="breadcrumb hidden-xs">
								<li><a href="<?=$base;?>/home">Início</a></li>
								<li>Fãs de <?=$user->name;?></li>
							</ul>
            			<?php if($user->id != $loggedUser->id): ?>
								<div class="menu-splitter"></div>
							<a href="<?=$base;?>/fas/uid=<?=$user->id;?>/fasfollow">
								<div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/fas.png" width="16" height="16"></div>
								<div class="menu-item-text"><?=(!$fasisFollowing)?'Seja Fã':'Deixar de ser Fã';?></div></div>
							</a>
								<div class="menu-splitter"></div>
						<?php endif; ?>		
					</div>
					<div class="full-friend-list">
						<?php foreach($fas['fas'] as $membroItem): ?>
                        	<?=$render('listar_usuarios', ['data' => $membroItem, 'loggedUser' => $loggedUser]);?>
                        <?php endforeach; ?>
					</div>
					<?=$render('pagination', ['url' => 'fas', 'conteudo' => $fas, 'quantidade'=>$user->somafas, 'id'=>$user->id]);?>
				</div>
			</div>
		</div>
	</section>
</section>
<?=$render('footer');?>