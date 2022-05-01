<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('perfil_sidebar', ['activeMenu'=>'Recados','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
<section class="coluna-7">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<?php foreach($feed as $feedItem): ?>
					<div class="box feed-item p-5">
						<div class="box-body bgcolor p-2">
							<div class="feed-item-head row mt-5 m-width-5">
								<div class="feed-item-head-photo">
									<a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$user->avatar;?>" /></a>
								</div>
								<div class="feed-item-head-info">
									<a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><span class="fidi-name"><?=$user->name;?></span></a>
									<span class="fidi-action">
										Editar Recado
									</span>
									<br/>
									<span class="fidi-date"><?=date('d/m/Y H:i', strtotime($feedItem->created_at)-10800);?></span>
								</div>
							</div>
								
								<?php if ($loggedUser->id === $user->id): ?>
									<div class="feed-item-body m-10 pr-10">
									<form method="POST" action="<?=$base;?>/editar_recado/new">
										<textarea class="btn-eo" name="body" maxlength="500"><?=nl2br($feedItem->body);?></textarea>
											<input class="btn-eo mt-10" type="submit" value="Atualizar">
												<input type="hidden" name="id" value="<?=$feedItem->id;?>" />
												<input type="hidden" name="id_user" value="<?=$user->id;?>" />
												<input type="hidden" name="return" value="<?=$return;?>" />
									</form>
									</div>
								<?php endif; ?> 
						</div>
					</div>
				<?php endforeach; ?>
			</div>			
		</div>
	</section>
</section>
<?=$render('perfil_sidebar_direito', ['user'=>$user]);?>
<?=$render('footer');?>