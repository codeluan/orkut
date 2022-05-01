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
								<li>Editar Comentário</li>
							</ul>
                    </div>
                    <?php foreach($photos as $feedItem): ?>
                        <div class="box feed-item p-5">
                            <div class="box-body bgcolor p-2">
                                <div class="feed-item-head row mt-5 m-width-5">
                                    <div class="feed-item-head-photo">
                                        <a href="<?=$base;?>/perfil/uid=<?=$feedItem->user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$feedItem->user->avatar;?>" /></a>
                                    </div>
                                    <div class="feed-item-head-info">
                                        <a href="<?=$base;?>/perfil/uid=<?=$feedItem->user->id;?>"><span class="fidi-name"><?=$feedItem->user->name;?></span></a>
                                        <span class="fidi-action">
                                            Editar comentário
                                        </span>
                                        <br/>
                                        <span class="fidi-date">Publicado: <?=date('d/m/Y H:i', strtotime($feedItem->created_at)-10800);?></span>
                                    </div>
                                </div>
                                    <?php if ($loggedUser->id === $feedItem->user->id): ?>
                                        <div class="feed-item-body m-10 m-width-5 pr-5">
                                            <form method="POST" action="<?=$base;?>/edit_profile_album_photo_comment/new">
                                                <textarea class="btn-eo" name="body" maxlength="500"><?=nl2br($feedItem->body);?></textarea>
                                                    <input class="btn-eo m-10-button" type="submit" value="Atualizar">
                                                    <input type="hidden" name="id" value="<?=$feedItem->id;?>" />
                                                    <input type="hidden" name="id_user" value="<?=$feedItem->user->id;?>" />
                                                    <input type="hidden" name="id_album" value="<?=$album;?>" />
                                                    <input type="hidden" name="id_photo" value="<?=$photo;?>" />
                                                    <input type="hidden" name="uid" value="<?=$user->id;?>" />
                                            </form>
                                        </div>
                                    <?php endif; ?> 
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
			</div>			
		</div>
	</section>
</section>
<?=$render('footer');?>