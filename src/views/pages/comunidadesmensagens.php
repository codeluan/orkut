<?=$render('header', ['loggedUser'=>$loggedUser]);?>

<?=$render('comunidade_sidebar', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>
					
	<section class="coluna-8 plr-10">
		<section class="feed mt-10">
			<div class="row">
				<div class="column">

	
					<div class="box feed-item pb-10">
						<div class="p-10">
						
							<h3 class="hidden-xs">Assunto: <?=$comunidadetopico->assunto;?></h3>
								<ul class="breadcrumb hidden-xs">
									<li><a href="<?=$base;?>/">Início</a></li>
									<li><a href="<?=$base;?>/">Comunidade</a></li>
									<li><a href="<?=$base;?>/comunidade/uid=<?=$comunidades->id;?>"><?=$comunidades->nome;?></a></li>
									<li><a href="<?=$base;?>/comunidade/topicos/uid=<?=$comunidades->id;?>">Fórum</a></li>
									<li><?=$comunidadetopico->assunto;?></li>
								</ul>
						
								▼ Mensagem: <b><?=$comunidadetopico->body;?></b>
							<div class="listInforma3">
								<ul>
									<li style="background-color: transparent;">
										<p class="textop1"><b>Mensagens</b></p>
										<p class="textop3 textop2"><b>Data e Hora</b></p>
									</li>
								</ul>
							</div>
							

							<?php foreach($topicos['post'] as $feedItem): ?>
								<?=$render('topicosmensagens', ['data' => $feedItem,
									'loggedUser' => $loggedUser
								]);?>
							<?php endforeach; ?>

						</div>	
						
						<?php for($q=0;$q<$topicos['pageCount'];$q++): ?><?php endfor; ?>
									<?php $p = 0;
										if (!empty($_GET['p'])) {$p = $_GET['p'];} 
									?>
													
						<div class="box feed-item">
							<div class="p-10">
								<div class="menu-splitter"></div>
									<div class="row">

												<div class="pl-10 tamanho50">
													<?php if ($p == 0): ?>Total<?php endif; ?>
													<?php if ($p > 0): ?>mostrando <b><?=$p*$topicos['perPage']+1;?></b> -<b>
														<?php if ($comunidadetopico->somamensagens > $p*$topicos['perPage']+$topicos['perPage']): ?><?=$p*$topicos['perPage']+$topicos['perPage'];?><?php endif; ?>
														<?php if ($comunidadetopico->somamensagens <= $p*$topicos['perPage']+$topicos['perPage']): ?><?=$comunidadetopico->somamensagens;?><?php endif; ?>
													</b> de<?php endif; ?>
													<b><?=$comunidadetopico->somamensagens;?></b>
												</div>
													
										<div class="tamanho50 textoDireito">
											<?php if ($p <= 0): ?> <img src="<?=$base;?>/assets/images/prevprevoff.png" height="20" width="20"> <?php endif; ?>
											<?php if ($p > 0): ?><a href="<?=$base;?>/comunidade/mensagens/uid=<?=$comunidadetopico->id;?>?p=<?=0;?>"><img src="<?=$base;?>/assets/images/prevprev.png" height="20" width="20"></a><?php endif; ?>
																
											<?php if ($p <= 0): ?> <img src="<?=$base;?>/assets/images/prevoff.png" height="20" width="20"> <?php endif; ?>
											<?php if ($p > 0): ?><a href="<?=$base;?>/comunidade/mensagens/uid=<?=$comunidadetopico->id;?>?p=<?=$p-1;?>"><img src="<?=$base;?>/assets/images/prev.png" height="20" width="20"></a><?php endif; ?>
																
											<?php if ($p < $topicos['pageCount'] -1): ?><a href="<?=$base;?>/comunidade/mensagens/uid=<?=$comunidadetopico->id;?>?p=<?=$p+1;?>"><img src="<?=$base;?>/assets/images/next.png" height="20" width="20"></a><?php endif; ?>
											<?php if ($topicos['pageCount'] -1 <= $p): ?><img src="<?=$base;?>/assets/images/nextoff.png" height="20" width="20"><?php endif; ?>
																
											<?php if ($p < $topicos['pageCount'] -1): ?><a href="<?=$base;?>/comunidade/mensagens/uid=<?=$comunidadetopico->id;?>?p=<?=$topicos['pageCount'] -1;?>"><img src="<?=$base;?>/assets/images/nextnext.png" height="20" width="20"></a><?php endif; ?>
											<?php if ($topicos['pageCount'] -1 <= $p): ?><img src="<?=$base;?>/assets/images/nextnextof.png" height="20" width="20"><?php endif; ?>
										</div>
									</div>
													
								<div class="menu-splitter"></div>
							</div>
						</div>
						
						<a class="btn-eo m-10" href="<?=$base;?>/comunidade/criarmensagens/uid=<?=$comunidadetopico->id;?>">Responder</a>
					</div>


				</div>									
			</div>					
		</section>
	</section>
					
<?=$render('footer');?>