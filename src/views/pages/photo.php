<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('perfil_sidebar', ['activeMenu'=>'Fotos','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs"><?=$user->name;?> <?=$user->sobrenome;?></h3>
							<ul class="breadcrumb hidden-xs">
								<li><a href="<?=$base;?>/">Início</a></li>
                                <li><a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><?=$user->name;?></a></li>
                                <li><a href="<?=$base;?>/fotos/uid=<?=$user->id;?>">Álbuns</a></li>
								<li><a href="<?=$base;?>/album/fotos/uid=<?=$user->id;?>&album=<?=$album;?>"><?=$albuns['titulo_album'];?></a></li>
								<li>Foto</li>
							</ul>
                    </div>


					<?php if ($loggedUser->id === $user->id): ?>
						<?php foreach($photos as $feedItem): ?>
						<div class="user-photo m-10-button">
                            <img src="<?=$base;?>/media/uploads/<?=$feedItem->photo;?>" />
                        </div>
                        <div class="listInforma m-10-button">
							<ul>
								<?php if(!empty($feedItem->descricao)): ?>
									<li>
										<div class="listInforma m-10-button">
											<?=$feedItem->descricao;?>
										</div>
									</li>
								<?php endif; ?>
						<?php endforeach; ?>
									<?php if ($loggedUser->id === $user->id): ?>
										<li><center>
											<a class="btn-eo" href="<?=$base;?>/album/foto/edit/uid=<?=$user->id;?>&album=<?=$album;?>&photo=<?=$photo;?>">Editar</a>
											<a class="btn-eo" href="<?=$base;?>/deletalbumfoto?uid=<?=$user->id;?>&album=<?=$album;?>&photo=<?=$photo;?>">Deletar</a>
											</center>
										</li>
									<?php endif; ?>
								</ul>
							</div>
						<div class="box feed-new">
							<div class="box-body">
								<div class="feed-new-editor m-width-10 row newbordas">
									<div class="feed-new-avatar">
										<img src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" />
									</div>
									<div class="feed-new-input-placeholder">Olá <?=$loggedUser->name;?>, escreva um comentário</div>
									<div class="feed-new-input" contenteditable="true"></div>
									<div class="feed-new-send">
										<img src="<?=$base;?>/assets/images/send.png" />
									</div>
									<form class="feed-new-form" method="POST" action="<?=$base;?>/albumPhotoComment/new">
										<input type="hidden" name="body" />
										<input  class="input" type="hidden" name="id_user" id="id_user" value="<?=$user->id;?>" />
										<input  class="input" type="hidden" name="id_album" id="id_album" value="<?=$album;?>" />
										<input  class="input" type="hidden" name="id_photo" id="id_photo" value="<?=$photo;?>" />
									</form>
								</div>
							</div>
						</div>
						<script type="text/javascript">
							let feedInput = document.querySelector('.feed-new-input');
							let feedSubmit = document.querySelector('.feed-new-send');
							let feedForm = document.querySelector('.feed-new-form');

							feedSubmit.addEventListener('click', function(obj){
								let value = feedInput.innerText.trim();
								if (value != '') {
									feedForm.querySelector('input[name=body]').value = value;
									feedForm.querySelector('input[name=id_user]');
									feedForm.querySelector('input[name=id_album]');
									feedForm.querySelector('input[name=id_photo]');
									feedForm.submit();
								}
							});
						</script>
						<?php foreach($comments['post'] as $feedItem): ?>
							<?=$render('albuns_photos_comments', ['data' => $feedItem, 'loggedUser' => $loggedUser, 'id'=>$user->id, 'album'=>$album, 'photo'=>$photo]);?>
						<?php endforeach; ?>
						<?=$render('pagination_links', ['url' => 'album/foto/uid='.$user->id.'&album='.$album.'&photo='.$photo, 'conteudo' => $comments, 'quantidade'=>$comments['totalrecados'], 'id'=>$user->id]);?>
                    <?php endif; ?>

					<?php if ($loggedUser->id != $user->id): ?>
						<?php if ($user->viewphotos === '0'): ?>
							<?php foreach($photos as $feedItem): ?>
								<div class="user-photo m-10-button">
									<img src="<?=$base;?>/media/uploads/<?=$feedItem->photo;?>" />
								</div>
								<div class="listInforma m-10-button">
									<ul>
										<?php if(!empty($feedItem->descricao)): ?>
											<li>
												<div class="listInforma m-10-button">
													<?=$feedItem->descricao;?>
												</div>
											</li>
										<?php endif; ?>
							<?php endforeach; ?>
										<?php if ($loggedUser->id === $user->id): ?>
											<li><center>
												<a class="btn-eo" href="<?=$base;?>/album/foto/edit/uid=<?=$user->id;?>&album=<?=$album;?>&photo=<?=$photo;?>">Editar</a>
												<a class="btn-eo" href="<?=$base;?>/deletalbumfoto?uid=<?=$user->id;?>&album=<?=$album;?>&photo=<?=$photo;?>">Deletar</a>
												</center>
											</li>
										<?php endif; ?>
									</ul>
								</div>
							<div class="box feed-new">
								<div class="box-body">
									<div class="feed-new-editor m-width-10 row newbordas">
										<div class="feed-new-avatar">
											<img src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" />
										</div>
										<div class="feed-new-input-placeholder">Olá <?=$loggedUser->name;?>, escreva um comentário</div>
										<div class="feed-new-input" contenteditable="true"></div>
										<div class="feed-new-send">
											<img src="<?=$base;?>/assets/images/send.png" />
										</div>
										<form class="feed-new-form" method="POST" action="<?=$base;?>/albumPhotoComment/new">
											<input type="hidden" name="body" />
											<input  class="input" type="hidden" name="id_user" id="id_user" value="<?=$user->id;?>" />
											<input  class="input" type="hidden" name="id_album" id="id_album" value="<?=$album;?>" />
											<input  class="input" type="hidden" name="id_photo" id="id_photo" value="<?=$photo;?>" />
										</form>
									</div>
								</div>
							</div>
							<script type="text/javascript">
								let feedInput = document.querySelector('.feed-new-input');
								let feedSubmit = document.querySelector('.feed-new-send');
								let feedForm = document.querySelector('.feed-new-form');

								feedSubmit.addEventListener('click', function(obj){
									let value = feedInput.innerText.trim();
									if (value != '') {
										feedForm.querySelector('input[name=body]').value = value;
										feedForm.querySelector('input[name=id_user]');
										feedForm.querySelector('input[name=id_album]');
										feedForm.querySelector('input[name=id_photo]');
										feedForm.submit();
									}
								});
							</script>
							<?php foreach($comments['post'] as $feedItem): ?>
								<?=$render('albuns_photos_comments', ['data' => $feedItem, 'loggedUser' => $loggedUser, 'id'=>$user->id, 'album'=>$album, 'photo'=>$photo]);?>
							<?php endforeach; ?>
							<?=$render('pagination_links', ['url' => 'album/foto/uid='.$user->id.'&album='.$album.'&photo='.$photo, 'conteudo' => $comments, 'quantidade'=>$comments['totalrecados'], 'id'=>$user->id]);?>
						<?php endif; ?>

						<?php if ($isFollowing && $user->viewphotos === '1'): ?>
							<?php foreach($photos as $feedItem): ?>
								<div class="user-photo m-10-button">
									<img src="<?=$base;?>/media/uploads/<?=$feedItem->photo;?>" />
								</div>
								<div class="listInforma m-10-button">
									<ul>
										<?php if(!empty($feedItem->descricao)): ?>
											<li>
												<div class="listInforma m-10-button">
													<?=$feedItem->descricao;?>
												</div>
											</li>
										<?php endif; ?>
							<?php endforeach; ?>
										<?php if ($loggedUser->id === $user->id): ?>
											<li><center>
												<a class="btn-eo" href="<?=$base;?>/album/foto/edit/uid=<?=$user->id;?>&album=<?=$album;?>&photo=<?=$photo;?>">Editar</a>
												<a class="btn-eo" href="<?=$base;?>/deletalbumfoto?uid=<?=$user->id;?>&album=<?=$album;?>&photo=<?=$photo;?>">Deletar</a>
												</center>
											</li>
										<?php endif; ?>
									</ul>
								</div>
							<div class="box feed-new">
								<div class="box-body">
									<div class="feed-new-editor m-width-10 row newbordas">
										<div class="feed-new-avatar">
											<img src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" />
										</div>
										<div class="feed-new-input-placeholder">Olá <?=$loggedUser->name;?>, escreva um comentário</div>
										<div class="feed-new-input" contenteditable="true"></div>
										<div class="feed-new-send">
											<img src="<?=$base;?>/assets/images/send.png" />
										</div>
										<form class="feed-new-form" method="POST" action="<?=$base;?>/albumPhotoComment/new">
											<input type="hidden" name="body" />
											<input  class="input" type="hidden" name="id_user" id="id_user" value="<?=$user->id;?>" />
											<input  class="input" type="hidden" name="id_album" id="id_album" value="<?=$album;?>" />
											<input  class="input" type="hidden" name="id_photo" id="id_photo" value="<?=$photo;?>" />
										</form>
									</div>
								</div>
							</div>
							<script type="text/javascript">
								let feedInput = document.querySelector('.feed-new-input');
								let feedSubmit = document.querySelector('.feed-new-send');
								let feedForm = document.querySelector('.feed-new-form');

								feedSubmit.addEventListener('click', function(obj){
									let value = feedInput.innerText.trim();
									if (value != '') {
										feedForm.querySelector('input[name=body]').value = value;
										feedForm.querySelector('input[name=id_user]');
										feedForm.querySelector('input[name=id_album]');
										feedForm.querySelector('input[name=id_photo]');
										feedForm.submit();
									}
								});
							</script>
							<?php foreach($comments['post'] as $feedItem): ?>
								<?=$render('albuns_photos_comments', ['data' => $feedItem, 'loggedUser' => $loggedUser, 'id'=>$user->id, 'album'=>$album, 'photo'=>$photo]);?>
							<?php endforeach; ?>
							<?=$render('pagination_links', ['url' => 'album/foto/uid='.$user->id.'&album='.$album.'&photo='.$photo, 'conteudo' => $comments, 'quantidade'=>$comments['totalrecados'], 'id'=>$user->id]);?>
						<?php endif; ?>

					<?php endif; ?>
				</div>
			</div>			
		</div>
	</section>
</section>
<?=$render('footer');?>