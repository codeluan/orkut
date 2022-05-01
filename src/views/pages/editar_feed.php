<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('perfil_sidebar', ['activeMenu'=>'Feed','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
<section class="coluna-7">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs"><?=$user->name;?> <?=$user->sobrenome;?></h3>
							<ul class="breadcrumb hidden-xs">
								<li><a href="<?=$base;?>/">Início</a></li>
                                <li><a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><?=$user->name;?></a></li>
								<li>Feed</li>
							</ul>
					</div>
					<?php foreach($feed as $feedItem): ?>
						<?=$render('feed_page', ['data' => $feedItem, 'loggedUser' => $loggedUser, 'id'=>$user->id, 'user'=>$user]);?>
					<?php endforeach; ?>
				</div>
			</div>			
		</div>
	</section>
</section>
<?=$render('perfil_sidebar_direito', ['user'=>$user]);?>
<?=$render('footer');?>