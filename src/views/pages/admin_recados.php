<?=$render('header', ['loggedUser'=>$loggedUser,]);?>
<?=$render('admin_sidebar', ['activeMenu'=>'Recados', 'user' => $user, 'loggedUser'=>$loggedUser,]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs">Bem-vindo(a), Administrador <?=$loggedUser->name;?></h3>
					</div>
				</div>

				<div class="box feed-item">
					<div class="p-10">
						<h3 class="hidden-xs">Gerenciar todos os Recados</h3>
					</div>

				<div class="box feed-new">
					<?php foreach($recados['post'] as $recado): ?>
						<div class="box feed-item p-5">
							<div class="box-body bgcolor p-2">
								<div class="feed-item-head row mt-5 m-width-5">
									<div class="feed-item-head-photo">
										<a href="<?=$base;?>/perfil/uid=<?=$recado->user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$recado->user->avatar;?>" /></a>
									</div>
									<div class="feed-item-head-info">
										<a href="<?=$base;?>/perfil/uid=<?=$recado->user->id;?>"><span class="fidi-name"><?=$recado->user->name;?></span></a>
										<span class="fidi-action">
										<?php switch($recado->type) {
											case 'text': echo 'fez um post'; break;
											case 'photo': echo 'postou uma foto'; break;
											case 'video': echo 'postou um vídeo'; break;
											}
										?>
										</span>
										<br/>
									<span class="fidi-date"><?=date('d/m/Y H:i', strtotime($recado->created_at)-10800);?></span>
									</div>
									<?php if ($loggedUser->id === $user->id): ?>
										<div class="feed-item-head-btn menu">
											<span tabindex="0" class="selection"><img src="<?=$base;?>/assets/images/more.png" /></span>
												<ul>
													<li><a href="<?=$base;?>/admindeleterecado?uid=<?=$recado->user->id;?>&delete=<?=$recado->id;?>">Deletar</a></li> 
												</ul>
										</div>
									<?php endif; ?>
								</div>
							
								<div class="feed-item-body m-10 m-width-5">
								<?=nl2br($recado->body);?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<?=$render('pagination_links', ['url' => 'admin/recados', 'conteudo' => $recados, 'quantidade'=>$recados['totalrecados'], 'id'=>$user->id]);?>
				</div>			
			</div>
		</div>			
	</section>
</section>
<?=$render('footer');?>