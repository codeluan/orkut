<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('comunidade_sidebar', ['activeMenu'=>'Forum','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>
<section class="coluna-7">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs">Nova Mensagem</h3>
							<ul class="breadcrumb hidden-xs">
								<li><a href="<?=$base;?>/">Início</a></li>
								<li><a href="<?=$base;?>/">Comunidade</a></li>
								<li><a href="<?=$base;?>/comunidade/uid=<?=$comunidades->id;?>"><?=$comunidades->nome;?></a></li>
								<li>Fórum</li>
								<li>Nova Mensagem</li>
							</ul>
					</div>
					<form method="POST" action="<?=$base;?>/comunidade/criarmensagens/new">
        				<?php if(!empty($flash)): ?>
            				<?php echo $flash; ?>
        				<?php endif; ?>
						<div class="listInforma2 m-10-button">
							<ul>
								<li><p class="textop1">Comunidade:</p> <p class="textop2"> <?=$comunidades->nome;?></p></li>
								<li><p class="textop1">Autor:</p> <p class="textop2"> <?=$loggedUser->name;?></p></li>
								<li><p class="textop1">Assunto:</p> <p class="textop2"> <input placeholder="Digite o Assunto" class="btn-eo" type="text" name="assunto" /></p></li>
								<li><p class="textop1">Mensagem:</p> <p class="textop2"><textarea class="btn-eo" id="social_prodetv" name="mensagem" maxlength="100"></textarea>
									<input type="hidden" name="id_comunidade" id="id_comunidade" value="<?=$comunidades->id;?>" />
									<input type="hidden" name="id_topico" id="id_topico" value="<?=$comunidadetopico->id;?>" /></p>
								</li>
								<li><center><input class="btn-eo" type="submit" value="Enviar Mensagem" /></center></li>
										
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