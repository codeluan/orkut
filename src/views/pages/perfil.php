<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('perfil_sidebar', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
<section class="coluna-7">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">

<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs"><?=$user->name;?> <?=$user->sobrenome;?></h3>
			<ul class="breadcrumb hidden-xs">
			<li><a href="<?=$base;?>/">Home</a></li>
			<li>
				<?php if ($user->id === $loggedUser->id): ?>My profile<?php endif; ?>
				<?php if ($user->id != $loggedUser->id): ?><?=$user->name;?><?php endif; ?>
			</li>
			</ul>

			<?php if ($user->frase != NULL): ?>	
				<div class="perfil-status">
					<?=$user->frase;?>
				</div>
			<?php endif; ?>
						<div class="row no-margin mt-20 mb-15 border-perfil hidden-xs">
						<div class="menu-middle-line">
						<div class="menu-middle">
						<p class="no-margin">Scraps</p>
						<a href="<?=$base;?>/recados/uid=<?=$user->id;?>">
						<img src="<?=$base;?>/assets/images/recados.png" width="16" height="16" /> <span><?=$user->somarecados;?></span>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">Photos</p>
						<a href="<?=$base;?>/fotos/uid=<?=$user->id;?>">
						<img src="<?=$base;?>/assets/images/photo.png" width="16" height="16" /> <span><?=$user->somafotos;?></span>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">Videos</p>
						<a href="<?=$base;?>/videos/uid=<?=$user->id;?>">
						<img src="<?=$base;?>/assets/images/video.png" width="16" height="16" /> <span><?=$user->somavideos;?></span>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">Fans</p>
						<a href="<?=$base;?>/fas/uid=<?=$user->id;?>">
						<img src="<?=$base;?>/assets/images/fas.png" width="16" height="16" /> <span><?=$user->somafas;?></span>
						</a>
						</div>
						</div>
						<div class="menu-middle-line hidden-xs">
						<div class="menu-middle">
						<p class="no-margin">Trustworthy</p>
						<a href="<?=$base;?>/votos/uid=<?=$user->id;?>">
						<div class="perfil-avaliacao">
						<div class="icone-confiavel icone-avaliar" title="<?=$user->votoconfiavel;?>% confiável">
						<div class="perfil-avaliacao-posicao" style="width: calc(100% - <?=$user->votoconfiavel;?>%);"></div>
						</div>
						</div>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">Cool</p>
						<a href="<?=$base;?>/votos/uid=<?=$user->id;?>">
						<div class="perfil-avaliacao">
						<div class="icone-legal icone-avaliar" title="<?=$user->votolegal;?>% legal">
						<div class="perfil-avaliacao-posicao" style="width: calc(100% - <?=$user->votolegal;?>%);"></div>
						</div>
						</div>
						</a>
						</div>
						<div class="menu-middle">
						<p class="no-margin">Sexy</p>
						<a href="<?=$base;?>/votos/uid=<?=$user->id;?>">
						<div class="perfil-avaliacao">
						<div class="icone-sexy icone-avaliar" title="<?=$user->votosexys;?>% sexy">
						<div class="perfil-avaliacao-posicao" style="width: calc(100% - <?=$user->votosexys;?>%);"></div>
						</div>
						</div>
						</a>
						</div>
						</div>
						</div>

	</div>
	
	

	<div class="tabsContainer">
	<div class="tabs">
		<div class="tab-item active" data-for="tabsatus">
		Status (<?=$user->somastatus;?>)
		</div>

		<div class="tab-item" data-for="tabfollowers">
		Followers (<?=$user->somaseguidores;?>)
		</div>

		<div class="tab-item" data-for="tabsocial">
		Social
		</div>

		<div class="tab-item" data-for="tabContato">
		Contact
		</div>

		<?php if ($user->profis_escolaridade != NULL or $user->profis_ensinomedio != NULL or $user->profis_faculdade != NULL or $user->profis_curso != NULL or $user->profis_diploma != NULL or $user->profis_ano != NULL or $user->profis_profissao != NULL or $user->profis_setor != NULL or $user->profis_empresa != NULL): ?>
		<div class="tab-item" data-for="tabProfissional">
		Professional
		</div><?php endif; ?>

		<?php if ($user->pessoal_titulo != NULL or $user->pessoal_atencao != NULL or $user->pessoal_altura != NULL or $user->pessoal_olhos != NULL or $user->pessoal_cabelo != NULL or $user->pessoal_fisico != NULL or $user->pessoal_corpo != NULL or $user->pessoal_aparencia != NULL or $user->pessoal_gostoemmim != NULL): ?>
		<div class="tab-item" data-for="tabPessoal">
		Folks
		</div><?php endif; ?>
		</div>

	</div>
	
							<div class="tab-content">
                                <div class="tab-body" data-item="tabsatus" style="display: block;">
										<?php foreach($feed['post'] as $feedItem): ?>
											<?=$render('feed-item', [
												'data' => $feedItem,
												'loggedUser' => $loggedUser, 'id'=>$user->id
											]);?>
										<?php endforeach; ?>
										<?=$render('pagination', ['url' => 'perfil', 'conteudo' => $feed, 'quantidade'=>$user->somastatus, 'id'=>$user->id]);?>
								</div>
								
			<div class="tab-body" data-item="tabfollowers" style="display: none;">
				
				<div class="full-friend-list">
					<?php for($q=0;$q<7;$q++):  ?>
                        <?php if(isset($user->followers[$q])): ?>
                            <div class="friend-icon">
                                <a href="<?=$base;?>/perfil/uid=<?=$user->followers[$q]->id;?>">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/<?=$user->followers[$q]->avatar;?>">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="<?=$base;?>/perfil/uid=<?=$user->followers[$q]->id;?>"><?=$user->followers[$q]->name;?></a>
                                    </div>
									<div class="friend-icon-name">
									<a href="">(<?=$user->followers[$q]->somamigos;?>)</a>
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
						<li><p class="textop1">birthday:</p> <p class="textop2"> <?=date('d/m/Y', strtotime($user->birthdate));?> (<?=$user->ageYears;?> anos)</p></li>
						<li><p class="textop1">sex:</p> <p class="textop2"><?=($user->sexo=='1')?'feminino':'masculino';?></p></li>
						<li><p class="textop1">relationship:</p> <p class="textop2">
							<?=($user->geral_relacionamento=='1')?'single':'';?>
							<?=($user->geral_relacionamento=='2')?'married':'';?>
							<?=($user->geral_relacionamento=='3')?'dating':'';?></p></li>
						<li><p class="textop1">sexual orientation:</p> <p class="textop2">
						<?=($user->social_orientsexual=='0')?'there is no answer':'';?>
						<?=($user->social_orientsexual=='1')?'heterossexual':'';?>
						<?=($user->social_orientsexual=='2')?'homossexual':'';?>
						<?=($user->social_orientsexual=='3')?'bissexual':'';?>
						<?=($user->social_orientsexual=='4')?'assexual':'';?>
						
						</p></li>
						<li><p class="textop1">quem sou eu:</p> <p class="textop2"><?=$user->social_quemsou;?></p></li>
						<li><p class="textop1">filhos:</p> <p class="textop2">
							<?=($user->social_filhos=='0')?'não há resposta':'';?>
							<?=($user->social_filhos=='1')?'não':'';?>
							<?=($user->social_filhos=='2')?'sim':'';?>
						</p></li>
						<li><p class="textop1">interesses no Espaço Online:</p> <p class="textop2">
						
						<?=($user->geral_interamigos=='1')?'amigos <br>':'';?>
						<?=($user->geral_intercompanheiros=='1')?'companheiros para atividades <br>':'';?>
						<?=($user->geral_intercontatos=='1')?'contatos profissionais <br>':'';?>
						<?=($user->geral_internamoro=='1')?'namoro':'';?>
						<?php if ($user->geral_internamoro == 1): ?>
						<?=($user->geral_intertipo=='1')?'(homem)':'';?>
						<?=($user->geral_intertipo=='2')?'(mulher)':'';?>
						<?=($user->geral_intertipo=='3')?'(homem e mulher)':'';?>
						<?php endif; ?>
						</p></li>
						<li><p class="textop1">estilo:</p> <p class="textop2"><?=$user->social_estilo;?></p></li>
						<li><p class="textop1">fumo:</p> <p class="textop2">
							<?=($user->social_fumo=='0')?'não há resposta':'';?>
							<?=($user->social_fumo=='1')?'não':'';?>
							<?=($user->social_fumo=='2')?'sim':'';?>
						</p></li>
						<li><p class="textop1">bebo:</p> <p class="textop2">
							<?=($user->social_bebo=='0')?'não há resposta':'';?>
							<?=($user->social_bebo=='1')?'não':'';?>
							<?=($user->social_bebo=='2')?'sim':'';?>						
						</p></li>
						<li><p class="textop1">cidade natal:</p> <p class="textop2"><?=$user->social_cidadenatal;?></p></li>
						<li><p class="textop1">animais de estimação:</p> <p class="textop2">
							<?=($user->social_aniestimacao=='0')?'não há resposta':'';?>
							<?=($user->social_aniestimacao=='1')?'gosto de animais de estimação':'';?>
							<?=($user->social_aniestimacao=='2')?'não gosto de animais de estimação':'';?>
						</p></li>
						<li><p class="textop1">página web:</p> <p class="textop2"><a href="<?=$user->social_paginaweb;?>" target="_blank"><?=$user->social_paginaweb;?></a></p></li>
						<li><p class="textop1">paixões:</p> <p class="textop2"><?=$user->social_paixoes;?></p></li>
						<li><p class="textop1">esportes:</p> <p class="textop2"><?=$user->social_esportes;?></p></li>
						<li><p class="textop1">atividades:</p> <p class="textop2"><?=$user->social_atividades;?></p></li>
						<li><p class="textop1">livros:</p> <p class="textop2"><?=$user->social_livros;?></p></li>
						<li><p class="textop1">música:</p> <p class="textop2"><?=$user->social_musica;?></p></li>
						<li><p class="textop1">programas de tv:</p> <p class="textop2"><?=$user->social_prodetv;?></p></li>
						<li><p class="textop1">preferências gastronômicas:</p> <p class="textop2"><?=$user->social_gastronomicas;?></p></li>
					</ul>
				</div>

            </div>

			<div class="tab-body" data-item="tabContato" style="display: none;">
                                    
                <div class="listInforma">
					<ul>
						<li><p class="textop1">telefone residencial:</p> <p class="textop2"><?=$user->contato_residencial;?></p></li>
						<li><p class="textop1">telefone celular:</p> <p class="textop2"><?=$user->contato_celular;?></p></li>
						<li><p class="textop1">endereço 1:</p> <p class="textop2"><?=$user->contato_endereco1;?></p></li>
						<li><p class="textop1">endereço 2:</p> <p class="textop2"><?=$user->contato_endereco2;?></p></li>
						<li><p class="textop1">cidade:</p> <p class="textop2"><?=$user->cidade;?></p></li>
						<li><p class="textop1">estado:</p> <p class="textop2"><?=$user->estado;?></p></li>
						<li><p class="textop1">cep:</p> <p class="textop2"><?=$user->contato_cep;?></p></li>
						<li><p class="textop1">país:</p> <p class="textop2"><?=$user->contato_pais;?></p></li>
					</ul>
				</div>

            </div>

			<div class="tab-body" data-item="tabProfissional" style="display: none;">
                                    
                <div class="listInforma">
					<ul>
						<li><p class="textop1">escolaridade:</p> <p class="textop2"><?=$user->profis_escolaridade;?></p></li>
						<li><p class="textop1">escola (ensino médio):</p> <p class="textop2"><?=$user->profis_ensinomedio;?></p></li>
						<li><p class="textop1">faculdade:</p> <p class="textop2"><?=$user->profis_faculdade;?></p></li>
						<li><p class="textop1">curso:</p> <p class="textop2"><?=$user->profis_curso;?></p></li>
						<li><p class="textop1">diploma:</p> <p class="textop2"><?=$user->profis_diploma;?></p></li>
						<li><p class="textop1">ano:</p> <p class="textop2"><?=$user->profis_ano;?></p></li>
						<li><p class="textop1">profissão:</p> <p class="textop2"><?=$user->profis_profissao;?></p></li>
						<li><p class="textop1">setor:</p> <p class="textop2"><?=$user->profis_setor;?></p></li>
						<li><p class="textop1">empresa/organização:</p> <p class="textop2"><?=$user->profis_empresa;?></p></li>
					</ul>
				</div>

            </div>

			<div class="tab-body" data-item="tabPessoal" style="display: none;">
                                    
                <div class="listInforma">
					<ul>
						<li><p class="textop1">título:</p> <p class="textop2"><?=$user->pessoal_titulo;?></p></li>
						<li><p class="textop1">o que mais chama atenção em mim:</p> <p class="textop2"><?=$user->pessoal_atencao;?></p></li>
						<li><p class="textop1">altura:</p> <p class="textop2"><?=$user->pessoal_altura;?></p></li>
						<li><p class="textop1">cor dos olhos:</p> <p class="textop2"><?=$user->pessoal_olhos;?></p></li>
						<li><p class="textop1">cor do cabelo:</p> <p class="textop2"><?=$user->pessoal_cabelo;?></p></li>
						<li><p class="textop1">tipo físico:</p> <p class="textop2"><?=$user->pessoal_fisico;?></p></li>
						<li><p class="textop1">arte no corpo:</p> <p class="textop2"><?=$user->pessoal_corpo;?></p></li>
						<li><p class="textop1">aparencia:</p> <p class="textop2"><?=$user->pessoal_aparencia;?></p></li>
						<li><p class="textop1">do que mais gosto em mim:</p> <p class="textop2"><?=$user->pessoal_gostoemmim;?></p></li>
					</ul>
				</div>
            			</div>
   					</div>      
				</div>
				<div class="box feed-item">
					<div class="p-10">
						<b>▼ depoimentos dele</b>
							<?php foreach($depoimentos['post'] as $feedItem): ?>
								<?=$render('depoimentos', ['data' => $feedItem,
								'loggedUser' => $loggedUser, 'id'=>$user->id
								]);?>
							<?php endforeach; ?>
					</div>					
				</div>
			</div>
		</div>
	</section>
</section>
<?=$render('perfil_sidebar_direito', ['user'=>$user]);?>
<?=$render('footer');?>