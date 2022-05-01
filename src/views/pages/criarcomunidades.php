<?=$render('header', ['loggedUser'=>$loggedUser]);?>

<?=$render('perfilsidebar', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'user'=>$user]);?>
						
						<section class="coluna-7 plr-10">
								
							<section class="feed mt-10">
								
								<div class="row">
									<div class="column">

<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs">Criar comunidade</h3>
			<ul class="breadcrumb hidden-xs">
			<li><a href="<?=$base;?>/">Início</a></li>
			<li>Criar comunidade</li>
			</ul>

	</div>
	




    <form method="POST" action="<?=$base;?>/comunidade/new">
        <?php if(!empty($flash)): ?>
            <?php echo $flash; ?>
        <?php endif; ?>

    <div class="listInforma">
					<ul>
						<li><p class="textop1">Nome:</p> <p class="textop2"> <input placeholder="Digite o nome" class="btn-eo" type="text" name="nome" /></p></li>
						<li><p class="textop1">Descrição:</p> <p class="textop2"><input placeholder="Digite a Descrição" class="btn-eo" type="text" name="descricao" /></p></li>
						<li><center><input class="btn-eo" type="submit" value="Criar Comunidade" /></center></li>
					</ul>
				</div>

        </form>

		
        
        </div>
									
								</div>
								
								

							</section>
						</section>
					
					
     <?=$render('perfilsidebardireito', ['user'=>$user]);?>

<?=$render('footer');?>