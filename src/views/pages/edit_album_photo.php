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
                    <?php foreach($photos as $feedItem): ?>
						<div class="user-photo m-10-button">
                            <img src="<?=$base;?>/media/uploads/<?=$feedItem->photo;?>" />
                        </div>
                        <div class="listInforma m-10-button">
							<ul>
								<li>
									<div class="listInforma m-10-button">
                                        <div class="feed-item-body m-10 m-width-5">
                                        
                <form method="POST" action="<?=$base;?>/edit_album_photo/new">
                editar legenda:
                    <textarea class="btn-eo" name="descricao" maxlength="500"><?=$feedItem->descricao;?></textarea>


					

					<label>
<input type="checkbox" class="btn-eo" value="1" name="capa"> capa do álbum
</label>
						<input class="btn-eo m-10-button" type="submit" value="Atualizar">
						<input type="hidden" name="id_user" value="<?=$user->id;?>" />
                        <input type="hidden" name="id_album" value="<?=$album;?>" />
                        <input type="hidden" name="id_photo" value="<?=$photo;?>" />
                </form>
		        </div>
										</div>
									</li>
							</ul>
						</div>
                        <?php endforeach; ?>
					
                    </div>
			</div>			
		</div>
	</section>
</section>
<?=$render('footer');?>