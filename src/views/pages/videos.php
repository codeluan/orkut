<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('perfil_sidebar', ['activeMenu'=>'Videos','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs"><?=$user->name;?> <?=$user->sobrenome;?></h3>
							<ul class="breadcrumb hidden-xs">
								<li><a href="<?=$base;?>/home">Início</a></li>
								<li><a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><?=$user->name;?></a></li>
								<li>Vídeos</li>
							</ul>
					</div>
					<?php if ($loggedUser->id == $user->id): ?>
						<form method="POST" action="<?=$base;?>/video/new">
							<?php if(!empty($flash)): ?>
								<?php echo $flash; ?>
							<?php endif; ?>
							<div class="listInforma">
								<ul>
									<li><p class="textop1">Título:</p> <p class="textop2"> <input placeholder="Título do vídeo" class="btn-eo" type="text" name="titulo_video" /></p></li>
									<li><p class="textop1">URL do vídeo no YouTube:</p> <p class="textop2"><input placeholder="colar Link do vídeo youtube" class="btn-eo" type="text" name="id_video" /></p></li>
									<li><center><input class="btn-eo" type="submit" value="Adicionar Vídeo" /></center></li>
								</ul>
							</div>
						</form>
					<?php endif; ?>
					<div class="tabs">
           				 <div class="tab-item active" data-for="minhasfotos">
							Meus Vídeos
            			</div>
					</div>

					<?php if ($loggedUser->id === $user->id): ?>
							<div class="tab-content">
								<div class="tab-body" data-item="minhasfotos" style="display: block;">
									<div class="full-user-videos">
										<?php if ($video['totalvideos'] <= 0): ?>
											nenhum vídeo
										<?php endif; ?>
										<?php foreach($video['post'] as $feedItem): ?>
											<?=$render('videos', ['data' => $feedItem,'loggedUser' => $loggedUser, 'user' => $user]);?>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
								<?php for($q=0;$q<$video['pageCount'];$q++): ?>
								<?php endfor; ?>
								
							<?=$render('pagination', ['url' => 'videos', 'conteudo' => $video, 'quantidade'=>$user->somavideos, 'id'=>$user->id]);?>
					<?php endif; ?>

					<?php if ($loggedUser->id != $user->id): ?>
						<?php if ($user->viewvideo === '0'): ?>
							<div class="tab-content">
								<div class="tab-body" data-item="minhasfotos" style="display: block;">
									<div class="full-user-videos">
										<?php if ($video['totalvideos'] <= 0): ?>
											nenhum vídeo
										<?php endif; ?>
										<?php foreach($video['post'] as $feedItem): ?>
											<?=$render('videos', ['data' => $feedItem,'loggedUser' => $loggedUser, 'user' => $user]);?>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
								<?php for($q=0;$q<$video['pageCount'];$q++): ?>
								<?php endfor; ?>
								
							<?=$render('pagination', ['url' => 'videos', 'conteudo' => $video, 'quantidade'=>$user->somavideos, 'id'=>$user->id]);?>
						<?php endif; ?>

						<?php if ($isFollowing && $user->viewvideo === '1'): ?>
							<div class="tab-content">
								<div class="tab-body" data-item="minhasfotos" style="display: block;">
									<div class="full-user-videos">
										<?php if ($video['totalvideos'] <= 0): ?>
											nenhum vídeo
										<?php endif; ?>
										<?php foreach($video['post'] as $feedItem): ?>
											<?=$render('videos', ['data' => $feedItem,'loggedUser' => $loggedUser, 'user' => $user]);?>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
								<?php for($q=0;$q<$video['pageCount'];$q++): ?>
								<?php endfor; ?>
								
							<?=$render('pagination', ['url' => 'videos', 'conteudo' => $video, 'quantidade'=>$user->somavideos, 'id'=>$user->id]);?>
						<?php endif; ?>

					<?php endif; ?>

				</div>
			</div>
		</div>
	</section>
</section>
<?=$render('footer');?>