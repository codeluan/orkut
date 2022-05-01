<?=$render('header', ['loggedUser'=>$loggedUser,]);?>
<?=$render('admin_sidebar', ['activeMenu'=>'Feeds', 'user' => $user, 'loggedUser'=>$loggedUser,]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs">Welcome, Administrator <?=$loggedUser->name;?></h3>
					</div>
				</div>

				<div class="box feed-item">
					<div class="p-10">
						<h3 class="hidden-xs">Manage all Feeds</h3>
					</div>

				<div class="box feed-new">
					<?php foreach($feeds['post'] as $feed): ?>
						<div class="box feed-item p-5">
							<div class="box-body bgcolor p-2">
								<div class="feed-item-head row mt-5 m-width-5">
									<div class="feed-item-head-photo">
										<a href="<?=$base;?>/perfil/uid=<?=$feed->user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$feed->user->avatar;?>" /></a>
									</div>
									<div class="feed-item-head-info">
										<a href="<?=$base;?>/perfil/uid=<?=$feed->user->id;?>"><span class="fidi-name"><?=$feed->user->name;?></span></a>
										<span class="fidi-action">
										<?php switch($feed->type) {
											case 'text': echo 'made a post'; break;
											case 'photo': echo 'posted a photo'; break;
											case 'video': echo 'posted a video'; break;
											}
										?>
										</span>
										<br/>
									<span class="fidi-date"><?=date('d/m/Y H:i', strtotime($feed->created_at)-10800);?></span>
									</div>
									<?php if ($loggedUser->id === $user->id): ?>
										<div class="feed-item-head-btn menu">
											<span tabindex="0" class="selection"><img src="<?=$base;?>/assets/images/more.png" /></span>
												<ul>
													<li><a href="<?=$base;?>/admindelfeed?uid=<?=$feed->user->id;?>&del=<?=$feed->id;?>">Delete</a></li> 
												</ul>
										</div>
									<?php endif; ?>
								</div>
							
								<div class="feed-item-body m-10 m-width-5">
								<?=nl2br($feed->body);?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<?=$render('pagination_links', ['url' => 'admin/feeds', 'conteudo' => $feeds, 'quantidade'=>$feeds['total'], 'id'=>$user->id]);?>
				</div>			
			</div>
		</div>			
	</section>
</section>
<?=$render('footer');?>