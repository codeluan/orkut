<?=$render('header', ['loggedUser'=>$loggedUser,]);?>
<?=$render('admin_sidebar', ['activeMenu'=>'Videos', 'user' => $user, 'loggedUser'=>$loggedUser,]);?>
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
						<h3 class="hidden-xs">Gerenciar todos os Vídeos</h3>
					</div>
                    <div class="full-user-videos">
						<?php if ($video['total'] <= 0): ?>
							nenhum vídeo publicado
						<?php endif; ?>
                        <?php foreach($video['post'] as $feedItem): ?>
    						<div class="depoimento">
                                <div class="fic-item row">
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?=nl2br($feedItem->id_video);?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <center><?=nl2br($feedItem->titulo_video);?></center>
                                <?php if ($loggedUser->id == $user->id): ?>
                                    <a href="<?=$base;?>/admindelvideo?del=<?=$feedItem->id;?>">Deletar</a>
                                <?php endif; ?>
                            </div>
						<?php endforeach; ?>
					</div>
						<?php for($q=0;$q<$video['pageCount'];$q++): ?>
						<?php endfor; ?>
                        <?=$render('pagination_links', ['url' => 'admin/videos', 'conteudo' => $video, 'quantidade'=>$video['total'], 'id'=>$user->id]);?>
				</div>
			</div>
		</div>
	</section>
</section>
<?=$render('footer');?>