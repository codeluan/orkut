
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
                    <div class="tabs">
                        <div class="tab-item active" data-for="minhasfotos">
                            Minhas fotos
                        </div>
                        <div class="tab-item" data-for="criaralbum">
                            Criar novo álbum
                        </div>
                    </div>
                    <div class="tab-content">

                        <div class="tab-body" data-item="minhasfotos" style="display: block;">
                        
                            <?php if ($loggedUser->id === $user->id): ?>
                                <?php foreach($albuns['post'] as $feedItem): ?>
                                    <?=$render('albuns', ['data' => $feedItem,'loggedUser' => $loggedUser, 'user' => $user]);?>
                                <?php endforeach; ?>
                                <?php for($q=0;$q<$albuns['pageCount'];$q++): ?>
                                <?php endfor; ?>
                                <?=$render('pagination', ['url' => 'fotos', 'conteudo' => $albuns, 'quantidade'=>$albuns['totalalbuns'], 'id'=>$user->id]);?>
                            <?php endif; ?>

                            <?php if ($loggedUser->id != $user->id): ?>

                                <?php if ($user->viewphotos === '0'): ?>
                                    <?php foreach($albuns['post'] as $feedItem): ?>
                                        <?=$render('albuns', ['data' => $feedItem,'loggedUser' => $loggedUser, 'user' => $user]);?>
                                    <?php endforeach; ?>
                                    <?php for($q=0;$q<$albuns['pageCount'];$q++): ?>
                                    <?php endfor; ?>
                                    <?=$render('pagination', ['url' => 'fotos', 'conteudo' => $albuns, 'quantidade'=>$albuns['totalalbuns'], 'id'=>$user->id]);?>
                                <?php endif; ?>
                                
                                <?php if ($isFollowing && $user->viewphotos === '1'): ?>
                                    <?php foreach($albuns['post'] as $feedItem): ?>
                                        <?=$render('albuns', ['data' => $feedItem,'loggedUser' => $loggedUser, 'user' => $user]);?>
                                    <?php endforeach; ?>
                                    <?php for($q=0;$q<$albuns['pageCount'];$q++): ?>
                                    <?php endfor; ?>
                                    <?=$render('pagination', ['url' => 'fotos', 'conteudo' => $albuns, 'quantidade'=>$albuns['totalalbuns'], 'id'=>$user->id]);?>
                                <?php endif; ?>
                            <?php endif; ?>
                            
                        </div>

                        <div class="tab-body" data-item="fotostimeline" style="display: none;">
                            <div class="full-user-photos">
                                <?php if(count($user->photos) === 0): ?>
                                    Este usuário não possui fotos
                                <?php endif; ?>
                                <?php foreach($user->photos as $photo): ?>
                                    <div class="user-photo-item">
                                        <a href="#modal-<?=$photo->id;?>" rel="modal:open">
                                            <img src="<?=$base;?>/media/uploads/<?=$photo->body;?>" />
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="tab-body" data-item="criaralbum" style="display: none;">
                            <?php if ($loggedUser->id == $user->id): ?>
						        <form method="POST" action="<?=$base;?>/album/new">
							        <?php if(!empty($flash)): ?>
								        <?php echo $flash; ?>
							        <?php endif; ?>
							        <div class="listInforma">
								        <ul>
									        <li><p class="textop1">Título:</p> <p class="textop2"> <input placeholder="Título do álbum" class="btn-eo" type="text" name="titulo_album" /></p></li>
									        <li><p class="textop1">Descrição:</p> <p class="textop2"><input placeholder="Descrição do álbum" class="btn-eo" type="text" name="descricao" /></p></li>
									        <li><center><input class="btn-eo" type="submit" value="Criar Álbum" /></center></li>
								        </ul>
							        </div>
						        </form>
                            <?php endif; ?>
                        </div>
                    </div>	
                </div>
			</div>		
		</div>
	</section>
</section>
<?=$render('footer');?>