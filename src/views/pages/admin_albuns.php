<?=$render('header', ['loggedUser'=>$loggedUser,]);?>
<?=$render('admin_sidebar', ['activeMenu'=>'Albuns', 'user' => $user, 'loggedUser'=>$loggedUser,]);?>
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
						<h3 class="hidden-xs">Manage all Albums</h3>
					</div>

				    <div class="box feed-new">
                            <?php foreach($albuns['post'] as $feedItem): ?>
    							<div class="album">
                                    <div class="fic-item row">
                                        <div class="album-Img">
                                            <a href="<?=$base;?>/album/fotos/uid=<?=$feedItem->user->id;?>&album=<?=$feedItem->id;?>"><img src="<?=$base;?>/media/uploads/<?=$feedItem->capa;?>" /></a>
                                        </div>
                                        <div class="fic-item-info album-content">
                                            <a class="album-content" href="<?=$base;?>/album/fotos/uid=<?=$feedItem->user->id;?>&album=<?=$feedItem->id;?>"><?=$feedItem->titulo_album;?> (<?=$feedItem->somarfotos;?> Photos)</a>
                                            <p><?=nl2br($feedItem->descricao);?></p>
                                            <p>creation date: <?=date('d/m/Y H:i', strtotime($feedItem->created_at));?></p>
                                        </div>
                                        <div class="fic-item-info ultimas">
                                            <div class="feed-item-head-btn menu">
                                                <span tabindex="0" class="selection"><img src="<?=$base;?>/assets/images/more.png" /></span>
                                                    <ul>
                                                        <li><a href="<?=$base;?>/admindelalbum?uid=<?=$feedItem->user->id;?>&delet=<?=$feedItem->id;?>">Delete</a></li> 
                                                    </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                                <?php for($q=0;$q<$albuns['pageCount'];$q++): ?>
                                <?php endfor; ?>
                                <?=$render('pagination_links', ['url' => 'admin/albuns', 'conteudo' => $albuns, 'quantidade'=>$albuns['total'], 'id'=>$user->id]);?>
                    </div>
                </div>
			</div>		
		</div>
	</section>
</section>
<?=$render('footer');?>