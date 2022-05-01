<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('comunidade_sidebar', ['activeMenu'=>'Membros','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="box feed-item">
					<div class="p-10">
						<div class="full-friend-list">
   							<?php foreach($membros['membros'] as $membroItem): ?>
    							<?=$render('listar_usuarios', ['data' => $membroItem, 'loggedUser' => $loggedUser]);?>
							<?php endforeach; ?>
                        </div>
						<?=$render('pagination', ['url' => 'comunidade/membros', 'conteudo' => $membros, 'quantidade'=>$comunidades->somamembros, 'id'=>$comunidades->id]);?>
					</div>
				</div>
			</div>					
		</div>				
	</section>
</section>
<?=$render('footer');?>