<?=$render('header', ['loggedUser'=>$loggedUser]);?>

<?=$render('mainprofilesidebar', ['activeMenu'=>'MainProfile','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
						
						<section class="coluna-7 plr-10">
								
							<section class="feed mt-10">
								
								<div class="row">
									<div class="column">

<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs"><?=$user->name;?> <?=$user->sobrenome;?></h3>
			<ul class="breadcrumb hidden-xs">
			<li><a href="<?=$base;?>/">Início</a></li>
			<li>Meu perfil</li>
			</ul>

	<div class="perfil-status">
	<?=$user->frase;?>
	</div>
						<div class="row no-margin mt-20 mb-15 border-perfil hidden-xs">
						<div class="menu-middle-line">
						<div class="menu-middle">
						<p class="no-margin">recados</p>
						<a href="<?=$base;?>/MainScrapbook/uid=<?=$user->id;?>">
						<img src="<?=$base;?>/assets/images/recados.png" width="16" height="16" /> <span><?=count($user->recados);?></span>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">fotos</p>
						<a href="<?=$base;?>/MainAlbumList/uid=<?=$user->id;?>">
						<img src="<?=$base;?>/assets/images/photo.png" width="16" height="16" /> <span><?=count($user->photos);?></span>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">vídeos</p>
						<a href="<?=$base;?>/MainFavoriteVideos/uid=<?=$user->id;?>">
						<img src="<?=$base;?>/assets/images/video.png" width="16" height="16" /> <span><?=count($user->videos);?></span>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">fãs</p>
						<a href="<?=$base;?>/MainProfileF/uid=<?=$user->id;?>">
						<i class="icone-fas no-margin"></i> <span><?=count($user->fas);?></span>
						</a>
						</div>
						</div>
						<div class="menu-middle-line hidden-xs">
						<div class="menu-middle">
						<p class="no-margin">confiável</p>
						<div class="perfil-avaliacao">
						<div class="icone-confiavel icone-avaliar" data-tipo="1" title="0% confiável">
						<div class="perfil-avaliacao-posicao" style="width: 100%;"></div>
						</div>
						</div>
						</div>
						<div class="menu-middle">
						<p class="no-margin">legal</p>
						<div class="perfil-avaliacao">
						<div class="icone-legal icone-avaliar" data-tipo="2" title="0% legal">
						<div class="perfil-avaliacao-posicao" style="width: 100%;"></div>
						</div>
						</div>
						</div>
						<div class="menu-middle">
						<p class="no-margin">sexy</p>
						<div class="perfil-avaliacao">
						<div class="icone-sexy icone-avaliar" data-tipo="3" title="0% sexy">
						<div class="perfil-avaliacao-posicao" style="width: 100%;"></div>
						</div>
						</div>
						</div>
						</div>
						</div>
						
						
		
	</div>
	
	

	<div class="tabs">

		<div class="tab-item active" data-for="tabsatus">
		Status (<?=$feed['totalpost'];?>)
		</div>

		<div class="tab-item" data-for="tabfollowers">
		Seguidores (<?=count($user->followers);?>)
		</div>

		<div class="tab-item" data-for="tabsocial">
		Social
		</div>
	</div>
	
	<div class="tab-content">
                                <div class="tab-body" data-item="tabsatus" style="display: block;">

										<?php foreach($feed['post'] as $feedItem): ?>
                                            
											<?=$render('feed-item', [
												'data' => $feedItem,
												'loggedUser' => $loggedUser
											]);?>
									
										<?php endforeach; ?>
									
									
										<?php for($q=0;$q<$feed['pageCount'];$q++): ?>
											<?php endfor; ?>
									
										<?php $p = 0;
											if (!empty($_GET['p'])) {
											$p = $_GET['p']; 
											} 
										?>
									
									
										<div class="box feed-item">
											<div class="p-10">
												<div class="menu-splitter"></div>
													<div class="row">
														<div class="pl-10 tamanho50">
															<?php if ($p == 0): ?>Total<?php endif; ?>
															<?php if ($p > 0): ?>mostrando <b><?=$p+1+$p;?></b>-<b><?=$p+$p+2;?></b> de<?php endif; ?>
															<b><?=$feed['totalpost'];?></b>
														</div>
									
									
									
									
									<div class="tamanho50 textoDireito">
									
									
									<?php if ($p <= 0): ?> primeira <?php endif; ?>
									<?php if ($p > 0): ?><a href="<?=$base;?>/MainProfile/uid=<?=$user->id;?>?p=<?=0;?>">primeira</a><?php endif; ?> |
									
									<?php if ($p <= 0): ?> < anterior <?php endif; ?>
									<?php if ($p > 0): ?><a href="<?=$base;?>/MainProfile/uid=<?=$user->id;?>?p=<?=$p-1;?>">< anterior</a><?php endif; ?> |
									
									
									
									<?php if ($p < $feed['pageCount'] -1): ?><a href="<?=$base;?>/MainProfile/uid=<?=$user->id;?>?p=<?=$p+1;?>">próxima ></a><?php endif; ?>
									<?php if ($feed['pageCount'] -1 <= $p): ?>próxima ><?php endif; ?>
									 |
									
									
									<?php if ($p < $feed['pageCount'] -1): ?><a href="<?=$base;?>/MainProfile/uid=<?=$user->id;?>?p=<?=$feed['pageCount'] -1;?>">última</a><?php endif; ?>
									
									<?php if ($feed['pageCount'] -1 <= $p): ?>última<?php endif; ?>
									</div>
									</div>
									
										<div class="menu-splitter"></div>
										
										</div>
									</div>	




								</div>
								

			<div class="tab-body" data-item="tabfollowers" style="display: none;">
				
				<div class="full-friend-list">
					<?php for($q=0;$q<9;$q++):  ?>
                        <?php if(isset($user->followers[$q])): ?>
                            <div class="friend-icon">
                                <a href="<?=$base;?>/MainProfile/uid=<?=$user->followers[$q]->id;?>">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/<?=$user->followers[$q]->avatar;?>">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="<?=$base;?>/MainProfile/uid=<?=$user->followers[$q]->id;?>"><?=$user->followers[$q]->name;?></a>
                                    </div>
									<div class="friend-icon-name">
									<a href=""></a>
									</div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

				</div>
			</div>
			
			<div class="tab-body" data-item="tabsocial" style="display: none;">
                                    
                <div class="listInforma">
					<ul>
						<li><p class="textop1">aniversario:</p> <p class="textop2"> <?=date('d/m/Y', strtotime($user->birthdate));?> (<?=$user->ageYears;?> anos)</p></li>
						<li><p class="textop1">relacionamento:</p> <p class="textop2">Casado</p></li>
						<li><p class="textop1">interesses no EO:</p> <p class="textop2">amigos</p></li>
						<li><p class="textop1">fumo:</p> <p class="textop2">não</p></li>
						<li><p class="textop1">bebo:</p> <p class="textop2">não</p></li>
						<li><p class="textop1">cidade:</p> <p class="textop2">São Paulo</p></li>
						<li><p class="textop1">estado:</p> <p class="textop2">sp</p></li>
					</ul>
				</div>

            </div>
    </div>

                        
</div>

	
	
	<div class="box feed-item">
		<div class="p-10">
		
		<b>▼ depoimentos dele</b>

		<?php foreach($feeds['post'] as $feedItem): ?>
    <?=$render('depoimentos', ['data' => $feedItem,
							'loggedUser' => $loggedUser
							]);?>
	<?php endforeach; ?>
		

		</div>					
	</div>


									</div>
									
								</div>
								
								

							</section>
						</section>
					
					
                        <?=$render('mainprofilesidebardireito', ['user'=>$user]);?>

<?=$render('footer');?>