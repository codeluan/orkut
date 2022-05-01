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
                                <li><a href="<?=$base;?>/home">Início</a></li>
                                <li><a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><?=$user->name;?></a></li>
                                <li>Fotos</li>
                            </ul>
                    </div>
                    <?php foreach($albuns as $feedItem): ?>
    					<div class="album">
	                        <div class="fic-item row">
                                <div class="album-Img">
                                    <a href=""><img src="<?=$base;?>/media/uploads/<?=$feedItem->capa;?>" /></a>
                                </div>
                                <div class="fic-item-info album-content pr-5">
                                    <div class="album-content" href="<?=$base;?>/album/fotos/uid=1&album=<?=$feedItem->id;?>">
                                        <form method="POST" enctype="multipart/form-data" action="<?=$base;?>/edit_profile_album/new">
                                            <input value="<?=$feedItem->titulo_album;?>" class="btn-eo" type="text" name="titulo_album"> (<?=$feedItem->somarfotos;?> Fotos)
                                            <p><textarea class="btn-eo" name="descricao" maxlength="500"><?=nl2br($feedItem->descricao);?></textarea></p>
                                            <input class="btn-eo m-10-button" type="submit" value="Atualizar">
                                            <input type="hidden" name="id_album" value="<?=$feedItem->id;?>"/>
                                            <input type="hidden" name="id_user" value="<?=$user->id;?>"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
			</div>		
		</div>
	</section>
</section>
<?=$render('footer');?>