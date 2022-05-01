<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('comunidade_sidebar', ['activeMenu'=>'Forum','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>
<section class="coluna-8 pr-10">
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
								<?=$render('topicos_mensagens', ['data' => $feedItem,
									'loggedUser' => $loggedUser, 'id'=>$comunidadetopico->id, 'dono'=>$comunidades->id_usuario
								]);?>
							<?php endforeach; ?>
							<?=$render('pagination', ['url' => 'comunidade/mensagens', 'conteudo' => $topicos, 'quantidade'=>$comunidadetopico->somamensagens, 'id'=>$comunidadetopico->id]);?>
					</div>	
						<a class="btn-eo m-10" href="<?=$base;?>/comunidade/criarmensagens/uid=<?=$comunidadetopico->id;?>">Responder</a>
				</div>
			</div>									
		</div>					
	</section>
</section>				
<?=$render('footer');?>