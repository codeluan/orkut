<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<section class="coluna-9 plr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
                <div class="profile-page">
                    <div class="p-10">
                        <h3 class="hidden-xs">Resultados de pesquisa para <?=$searchTerm;?></h3>
                            <ul class="breadcrumb hidden-xs">
                                <li><a href="<?=$base;?>/home">Início</a></li>
                                <li>Pesquisar Comunidades</li>
                            </ul>
                    </div>
                        <div class="tabsContainer m-10-button">
                            <div class="tabs">
                                <a href="<?=$base;?>/search-u?s=<?=$searchTerm;?>">
                                    <div class="tab-item" data-for="tabsatus">
                                        Pessoas
                                    </div>
                                </a>
                                <a href="<?=$base;?>/search-c?s=<?=$searchTerm;?>">
                                    <div class="tab-item active" data-for="tabfollowers">
                                    Comunidades
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="full-friend-list">
                            <?php if (!empty($comunidades)): ?>       
                                <?php foreach($comunidades as $comunidade):  ?>
                                    <div class="friend-icon">
                                        <a href="<?=$base;?>/comunidade/uid=<?=$comunidade->id;?>">
                                            <div class="friend-icon-avatar">
                                                <img src="<?=$base;?>/media/avatars/<?=$comunidade->avatar;?>">
                                            </div>
                                            <div class="friend-icon-name">
                                                <a href="<?=$base;?>/comunidade/uid=<?=$comunidade->id;?>"><?=$comunidade->nome;?></a>
                                            </div>   
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>   
                        </div>
                    <?php if (empty($comunidades)): ?> <h4 class="hidden-xs m-10">Nenhum resultado para mostrar</h4> <?php endif; ?>
                    <div class="menu-splitter"></div>
                </div>
			</div>
		</div>
	</section>
</section>
<?=$render('footer');?>