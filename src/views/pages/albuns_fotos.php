
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
                                <li><a href="<?=$base;?>/fotos/uid=<?=$user->id;?>">Álbuns</a></li>
                                <li><?=$albuns['titulo_album'];?></li>
                            </ul>
                    </div>
                    <div class="tabs">
                        <div class="tab-item active" data-for="minhasfotos">
				            Minhas fotos
                        </div>
                        <div class="tab-item" data-for="criaralbum">
                        Enviar nova Foto ao álbum
                        </div>
                    </div>
                    <div class="tab-content">
                        
                        <?php if ($loggedUser->id === $user->id): ?>
                            <div class="tab-body" data-item="minhasfotos" style="display: block;">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="full-user-photos">
                                            <?php foreach($photos['post'] as $feedItem): ?>
                                                <?=$render('albuns_photos', ['data' => $feedItem,'loggedUser' => $loggedUser, 'user' => $user, 'album' => $album]);?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php for($q=0;$q<$photos['pageCount'];$q++): ?>
                                <?php endfor; ?>
                                <?=$render('pagination', ['url' => 'album/fotos', 'conteudo' => $photos, 'quantidade'=>$photos['totalfotos'], 'id'=>$user->id]);?>
                            </div>
                        <?php endif; ?>

                        <?php if ($loggedUser->id != $user->id): ?>
                            <?php if ($user->viewphotos === '0'): ?>
                                <div class="tab-body" data-item="minhasfotos" style="display: block;">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="full-user-photos">
                                                <?php foreach($photos['post'] as $feedItem): ?>
                                                    <?=$render('albuns_photos', ['data' => $feedItem,'loggedUser' => $loggedUser, 'user' => $user, 'album' => $album]);?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php for($q=0;$q<$photos['pageCount'];$q++): ?>
                                    <?php endfor; ?>
                                    <?=$render('pagination', ['url' => 'album/fotos', 'conteudo' => $photos, 'quantidade'=>$photos['totalfotos'], 'id'=>$user->id]);?>
                                </div>
                            <?php endif; ?>

                            <?php if ($isFollowing && $user->viewphotos === '1'): ?>
                                <div class="tab-body" data-item="minhasfotos" style="display: block;">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="full-user-photos">
                                                <?php foreach($photos['post'] as $feedItem): ?>
                                                    <?=$render('albuns_photos', ['data' => $feedItem,'loggedUser' => $loggedUser, 'user' => $user, 'album' => $album]);?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php for($q=0;$q<$photos['pageCount'];$q++): ?>
                                    <?php endfor; ?>
                                    <?=$render('pagination', ['url' => 'album/fotos', 'conteudo' => $photos, 'quantidade'=>$photos['totalfotos'], 'id'=>$user->id]);?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="tab-body" data-item="criaralbum" style="display: none;">
                            <?php if ($loggedUser->id == $user->id): ?>
                                <form method="POST" enctype="multipart/form-data" action="<?=$base;?>/albumPhoto/new">
                                    <?php if(!empty($flash)): ?>
                                        <?php echo $flash; ?>
                                    <?php endif; ?>
                                    <div class="listInforma">
                                        <ul>
                                            <li><p class="textop1">Foto:</p> <p class="textop2"><input class="btn-eo" type="file" name="photo"></p></li>
                                            <li><center>
                                            <input type="hidden" name="id_album" value="<?=$album;?>" />
                                            <input class="btn-eo" type="submit" value="Adicionar Foto" /></center></li>
                                        </ul>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
				    <div class="menu-splitter"></div>
                </div>
			</div>		
		</div>
	</section>
</section>
<?=$render('footer');?>