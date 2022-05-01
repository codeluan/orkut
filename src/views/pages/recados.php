<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('perfil_sidebar', ['activeMenu'=>'Recados','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
<section class="coluna-7">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs"><?=$user->name;?> <?=$user->sobrenome;?></h3>
							<ul class="breadcrumb hidden-xs">
								<li><a href="<?=$base;?>/">Início</a></li>
								<li>Recados para <?=$user->name;?></li>
							</ul>
					</div>

					<?php if ($loggedUser->id === $user->id): ?>
						<div class="box feed-new">
							<div class="box-body">
								<div class="feed-new-editor m-width-10 row newbordas">
									<div class="feed-new-avatar">
										<img src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" />
									</div>
									<div class="feed-new-input-placeholder">Olá <?=$loggedUser->name;?>, escreva um recado</div>
									<div class="feed-new-input" contenteditable="true"></div>
									<div class="feed-new-send">
										<img src="<?=$base;?>/assets/images/send.png" />
									</div>
									<form class="feed-new-form" method="POST" action="<?=$base;?>/recado/new">
										<input type="hidden" name="body" />
										<input  class="input" type="hidden" name="idpara" id="idpara" value="<?=$user->id;?>" />
									</form>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php if ($loggedUser->id != $user->id): ?>
						<?php if ($user->viewscraps === '0'): ?>
							<div class="box feed-new">
								<div class="box-body">
									<div class="feed-new-editor m-width-10 row newbordas">
										<div class="feed-new-avatar">
											<img src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" />
										</div>
										<div class="feed-new-input-placeholder">Olá <?=$loggedUser->name;?>, escreva um recado</div>
										<div class="feed-new-input" contenteditable="true"></div>
										<div class="feed-new-send">
											<img src="<?=$base;?>/assets/images/send.png" />
										</div>
										<form class="feed-new-form" method="POST" action="<?=$base;?>/recado/new">
											<input type="hidden" name="body" />
											<input  class="input" type="hidden" name="idpara" id="idpara" value="<?=$user->id;?>" />
										</form>
									</div>
								</div>
							</div>
						<?php endif; ?>

						<?php if ($isFollowing && $user->write_scraps === '1'): ?>
							<div class="box feed-new">
								<div class="box-body">
									<div class="feed-new-editor m-width-10 row newbordas">
										<div class="feed-new-avatar">
											<img src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" />
										</div>
										<div class="feed-new-input-placeholder">Olá <?=$loggedUser->name;?>, escreva um recado</div>
										<div class="feed-new-input" contenteditable="true"></div>
										<div class="feed-new-send">
											<img src="<?=$base;?>/assets/images/send.png" />
										</div>
										<form class="feed-new-form" method="POST" action="<?=$base;?>/recado/new">
											<input type="hidden" name="body" />
											<input  class="input" type="hidden" name="idpara" id="idpara" value="<?=$user->id;?>" />
										</form>
									</div>
								</div>
							</div>
						<?php endif; ?>
					<?php endif; ?>







					<script type="text/javascript">
						let feedInput = document.querySelector('.feed-new-input');
						let feedSubmit = document.querySelector('.feed-new-send');
						let feedForm = document.querySelector('.feed-new-form');

						feedSubmit.addEventListener('click', function(obj){
							let value = feedInput.innerText.trim();
							if (value != '') {
								feedForm.querySelector('input[name=body]').value = value;
								feedForm.querySelector('input[name=idpara]');
								feedForm.submit();
							}
						});
					</script>
					<?php if ($loggedUser->id === $user->id): ?>
						<?php foreach($recados['post'] as $feedItem): ?>
							<?=$render('recado', ['data' => $feedItem, 'loggedUser' => $loggedUser, 'id'=>$user->id]);?>
						<?php endforeach; ?>
						<?=$render('pagination', ['url' => 'recados', 'conteudo' => $recados, 'quantidade'=>$user->somarecados, 'id'=>$user->id]);?>
					<?php endif; ?>
						
					<?php if ($loggedUser->id != $user->id): ?>
						<?php if ($user->viewscraps === '0'): ?>
							<?php foreach($recados['post'] as $feedItem): ?>
								<?=$render('recado', ['data' => $feedItem, 'loggedUser' => $loggedUser, 'id'=>$user->id]);?>
							<?php endforeach; ?>
							<?=$render('pagination', ['url' => 'recados', 'conteudo' => $recados, 'quantidade'=>$user->somarecados, 'id'=>$user->id]);?>
						<?php endif; ?>

						<?php if ($isFollowing && $user->viewscraps === '1'): ?>
							<?php foreach($recados['post'] as $feedItem): ?>
								<?=$render('recado', ['data' => $feedItem, 'loggedUser' => $loggedUser, 'id'=>$user->id]);?>
							<?php endforeach; ?>
							<?=$render('pagination', ['url' => 'recados', 'conteudo' => $recados, 'quantidade'=>$user->somarecados, 'id'=>$user->id]);?>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>			
		</div>
	</section>
</section>
<?=$render('perfil_sidebar_direito', ['user'=>$user]);?>
<?=$render('footer');?>