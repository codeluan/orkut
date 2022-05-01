<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('comunidade_sidebar', ['activeMenu'=>'Membros','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="box feed-item">
					<div class="p-10">
                    	<h3 class="hidden-xs">Comunidades Relacionadas</h3>
							<ul class="breadcrumb hidden-xs">
								<li><a href="<?=$base;?>/home">Início</a></li>
								<li><a href="<?=$base;?>/comunidades">Comunidades</a></li>
								<li><a href="<?=$base;?>/comunidade/uid=<?=$comunidades->id;?>"><?=$comunidades->nome;?></a></li>
								<li>Relacionadas</li>
							</ul>
							<div class="menu-splitter"></div>
						<div class="full-friend-list">
   							<?php foreach($relacionadas['relacionadas'] as $relacionadasItem): ?>
    							<?=$render('listar_comunidades', ['data' => $relacionadasItem, 'loggedUser' => $loggedUser]);?>
							<?php endforeach; ?>
                        </div>
						<?=$render('pagination', ['url' => 'comunidade/relacionadas', 'conteudo' => $relacionadas, 'quantidade'=>$comunidades->somarelacionadas, 'id'=>$comunidades->id]);?>
                        <?php if ($comunidades->id_usuario === $loggedUser->id): ?> <a class="btn-eo m-10" href="<?=$base;?>/comunidade/buscar/uid=<?=$comunidades->id;?>">Adicionar Comunidades</a> <?php endif; ?>
                    </div>
				</div>
			</div>					
		</div>				
	</section>
</section>
<?=$render('footer');?>