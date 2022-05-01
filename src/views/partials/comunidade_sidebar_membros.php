<section id="mySidenav2" class="coluna-3 sidenav2">
	<aside class="amigos">
		<div class="box pb-5">
            <div class="box-header m-10">
                <div class="box-header-text">
                Members <a href="<?=$base;?>/comunidade/membros/uid=<?=$comunidades->id;?>">(<?=$comunidades->somamembros;?>)</a>
                </div>
                            
            </div>
            <div class="box-body friend-list">
                <?php for($q=0;$q<9;$q++):  ?>
                    <?php if(isset($comunidades->membros[$q])): ?>
                        <div class="friend-icon">
                            <a href="<?=$base;?>/perfil/uid=<?=$comunidades->membros[$q]->id;?>">
                                <div class="friend-icon-avatar">
                                    <img src="<?=$base;?>/media/avatars/<?=$comunidades->membros[$q]->avatar;?>">
                                </div>
                                <div class="friend-icon-name">
                                    <a href="<?=$base;?>/perfil/uid=<?=$comunidades->membros[$q]->id;?>"><?=$comunidades->membros[$q]->name;?></a>
                                </div>
                                    <div class="friend-icon-name">
                                    <a href="<?=$base;?>/perfil/uid=<?=$comunidades->membros[$q]->id;?>">(<?=$comunidades->membros[$q]->somamigos;?>)</a>	
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
			<div class="box-header-buttons btn-footer">
                 <a href="<?=$base;?>/comunidade/membros/uid=<?=$comunidades->id;?>">See all</a>
            </div>
        </div>
	</aside>
	<aside class="amigos">
		<div class="box pb-5">
            <div class="box-header m-10">
                <div class="box-header-text">
                Related Communities <a href="<?=$base;?>/comunidade/relacionadas/uid=<?=$comunidades->id;?>">(<?=$comunidades->somarelacionadas;?>)</a>
                </div>        
            </div>
            <div class="box-body friend-list">
                <?php for($q=0;$q<9;$q++):  ?>
                    <?php if(isset($comunidades->relacionadas[$q])): ?>
                        <div class="friend-icon">
                            <a href="<?=$base;?>/comunidade/uid=<?=$comunidades->relacionadas[$q]->id;?>">
                                <div class="friend-icon-avatar">
                                    <img src="<?=$base;?>/media/avatars/<?=$comunidades->relacionadas[$q]->avatar;?>">
                                </div>
                                <div class="friend-icon-name">
                                    <a href="<?=$base;?>/comunidade/uid=<?=$comunidades->relacionadas[$q]->id;?>"><?=$comunidades->relacionadas[$q]->nome;?></a>
                                </div>
                                    <div class="friend-icon-name">
                                    <a href="<?=$base;?>/comunidade/uid=<?=$comunidades->relacionadas[$q]->id;?>">(<?=$comunidades->relacionadas[$q]->somamembros;?>)</a>	
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
                <div class="box-header-buttons btn-footer">
                    <a href="<?=$base;?>/comunidade/relacionadas/uid=<?=$comunidades->id;?>">See all</a>
                </div>
        </div>
	</aside>	
</section>