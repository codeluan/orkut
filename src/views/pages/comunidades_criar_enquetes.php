<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('comunidade_sidebar', ['activeMenu'=>'Enquete','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>
<section class="coluna-7">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs">Nova pesquisa</h3>
							<ul class="breadcrumb hidden-xs">
							<li><a href="<?=$base;?>/">Início</a></li>
							<li><a href="<?=$base;?>/comunidades">Comunidade</a></li>
							<li><a href="<?=$base;?>/comunidade/uid=<?=$comunidades->id;?>"><?=$comunidades->nome;?></a></li>
							<li><a href="<?=$base;?>/comunidade/enquetes/uid=<?=$comunidades->id;?>">Enquetes</a></li>
							<li>Nova pesquisa</li>
							</ul>
					</div>
						<form method="POST" action="<?=$base;?>/">
							<?php if(!empty($flash)): ?>
								<?php echo $flash; ?>
							<?php endif; ?>

							<div class="listInforma2 m-10-button">
								<ul>
									<li><p class="textop1">Pergunta:</p> <p class="textop2"> <input placeholder="Digite a Pergunta" class="btn-eo" type="text" name="titulo" /></p></li>
									<li><p class="textop1">Descrição:</p> <p class="textop2"> <textarea class="btn-eo" id="social_prodetv" name="descricao" maxlength="100"></textarea></p></li>
									<li><p class="textop1">Opção 1:</p> <p class="textop2"> <input placeholder="(obrigatório)" class="btn-eo" type="text" name="assunto" /></p></li>
                                    <li><p class="textop1">Opção 2:</p> <p class="textop2"><input placeholder="(obrigatório)" class="btn-eo" type="text" name="assunto" /></p></li>
                                    <li><p class="textop1">Opção 3:</p> <p class="textop2"><input class="btn-eo" type="text" name="assunto" /></p></li>
                                    <li><p class="textop1">Opção 4:</p> <p class="textop2"><input class="btn-eo" type="text" name="assunto" /></p></li>
                                    <li><p class="textop1">Opção 5:</p> <p class="textop2"><input class="btn-eo" type="text" name="assunto" /></p></li>
                                    <li><center><input class="btn-eo" type="submit" value="Criar Enquete" /></center></li>
									<input class="btn-eo" type="hidden" name="comunidade" id="comunidade" value="<?=$comunidades->id;?>" />
								</ul>
							</div>
						</form>
				</div>
			</div>						
		</div>				
	</section>
</section>
<?=$render('comunidade_sidebar_membros', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>   
<?=$render('footer');?>