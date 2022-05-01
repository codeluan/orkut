<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('comunidade_sidebar', ['activeMenu'=>'Enquete','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="box feed-item pb-10">

                <div class="p-10">
		<h3 class="hidden-xs">Pesquisas</h3>
			<ul class="breadcrumb hidden-xs">
			<li><a href="<?=$base;?>/home">Início</a></li>
            <li><a href="<?=$base;?>/comunidades">Comunidades</a></li>
            <li><a href="<?=$base;?>/comunidade/uid=<?=$comunidades->id;?>"><?=$comunidades->nome;?></a></li>
			<li>Pesquisas</li>
			</ul>
            <div class="menu-splitter"></div>
            
							<div class="listInforma3 tabsContainer">
								<ul class="listover">
									<li style="background-color: transparent;">
										<p class="textop1"><b>pergunta</b></p>
										<p class="textop3full"><b>votos</b></p>
                                        <p class="textop4"><b>abrir data</b></p>
                                        <p class="textop5"><b>fechar data</b></p>
									</li>
								</ul>
                            
                            </div>
							<?php foreach($topicos['post'] as $feedItem): ?>
    							<?=$render('enquetes', ['data' => $feedItem, 'loggedUser' => $loggedUser, 'id'=>$comunidades->id, 'dono'=>$comunidades->id_usuario]);?>
							<?php endforeach; ?>
							<?=$render('pagination', ['url' => 'comunidade/topicos', 'conteudo' => $topicos, 'quantidade'=>$comunidades->somatopicos, 'id'=>$comunidades->id]);?>
					</div>	
        				<a class="btn-eo m-10" href="<?=$base;?>/comunidade/criarenquetes/uid=<?=$comunidades->id;?>">Nova enquete</a>
				</div>
			</div>					
		</div>				
	</section>
</section>		
<?=$render('footer');?>