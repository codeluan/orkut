<?php if ($comunidades->id_usuario != $loggedUser->id): ?> 
    <?php $this->redirect('/'); ?>
<?php endif; ?>
<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('comunidade_sidebar', ['activeMenu'=>'Membros','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="box feed-item">
					<div class="p-10">
		                <h3 class="hidden-xs">Busca por comunidade</h3>
			                <ul class="breadcrumb hidden-xs">
                                <li><a href="<?=$base;?>/home">Início</a></li>
                                <li><a href="<?=$base;?>/comunidades">Comunidades</a></li>
                                <li><a href="<?=$base;?>/comunidade/uid=<?=$comunidades->id;?>"><?=$comunidades->nome;?></a></li>
                                <li>Pesquisas</li>
                            </ul>
                            <div class="menu-splitter"></div>
                        <?php if ($comunidades->id_usuario === $loggedUser->id): ?> 
                            <form method="GET" action="<?=$base;?>/comunidade/buscar/uid=3?s=<?=$searchTerm;?>">
                                buscar pelo nome: 
                                    <input type="text" name="s">
                                    <button type="submit" class="btn-eo">buscar</button>
                            </form>
                            <div class="menu-splitter"></div>
                            <div class="full-friend-list">
                                <?php if (!empty($searchTerm)): ?>       
                                    <?php foreach($resultados as $comunidade):  ?>
                                        <div class="friend-icon">
                                            <a href="<?=$base;?>/comunidade/uid=<?=$comunidade->id;?>">
                                                <div class="friend-icon-avatar">
                                                    <img src="<?=$base;?>/media/avatars/<?=$comunidade->avatar;?>">
                                                </div>
                                                <div class="friend-icon-name">
                                                    <a href="<?=$base;?>/comunidade/uid=<?=$comunidade->id;?>"><?=$comunidade->nome;?></a>
                                                </div>   
                                            </a>
                                            <a href="<?=$base;?>/comunidaderelacionada?uid=<?=$comunidades->id;?>&relacionar=<?=$comunidade->id;?>">
                                                <div class="menu-item"><div class="menu-item-icon">
                                                    <img src="<?=$base;?>/assets/images/participar.png" width="16" height="16">
                                                </div>
                                                <div class="menu-item-text ">Relacionar</div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>   
                            </div>
                            <?php if (empty($resultados)): ?> <h4 class="hidden-xs m-10">Nenhum resultado para mostrar</h4> <?php endif; ?>
                        <?php endif; ?>
					</div>
				</div>
			</div>					
		</div>				
	</section>
</section>
<?=$render('footer');?>