<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('comunidade_sidebar', ['activeMenu'=>'Forum','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="box feed-item pb-10">
					<div class="p-10">
						<b>▼ fórum</b>
							<div class="listInforma3">
								<ul>
									<li style="background-color: transparent;">
										<p class="textop1"><b>tópico</b></p>
										<p class="textop2"><b>postagens</b></p>
										<p class="textop3"><b>última postagem</b></p>
									</li>
								</ul>
							</div>
							<?php foreach($topicos['post'] as $feedItem): ?>
    							<?=$render('topicos', ['data' => $feedItem, 'loggedUser' => $loggedUser, 'id'=>$comunidades->id, 'dono'=>$comunidades->id_usuario]);?>
							<?php endforeach; ?>
							<?=$render('pagination', ['url' => 'comunidade/topicos', 'conteudo' => $topicos, 'quantidade'=>$comunidades->somatopicos, 'id'=>$comunidades->id]);?>
					</div>	
        				<a class="btn-eo m-10" href="<?=$base;?>/comunidade/criartopicos/uid=<?=$comunidades->id;?>">novo tópico</a>
				</div>
			</div>					
		</div>				
	</section>
</section>		
<?=$render('footer');?>