<img class="btnSidebarProfile2" onclick="toggleRightMenu2()" src="<?=$base;?>/assets/images/gruposidebar.png" />
<section id="mySidenav2" class="coluna-3 sidenav2">
	<aside class="amigos">
		<div class="box pb-5">
                        <div class="box-header m-10">
                            <div class="box-header-text">
                            Following <a href="<?=$base;?>/seguindo/uid=<?=$user->id;?>">(<?=$user->somamigos;?>)</a>
                            </div>
                        </div>
                    <div class="box-body friend-list">
                        <?php for($q=0;$q<9;$q++):  ?>
                            <?php if(isset($user->following[$q])): ?>
                                <div class="friend-icon">
                                    <a href="<?=$base;?>/perfil/uid=<?=$user->following[$q]->id;?>">
                                        <div class="friend-icon-avatar">
                                            <img src="<?=$base;?>/media/avatars/<?=$user->following[$q]->avatar;?>">
                                        </div>
                                        <div class="friend-icon-name">
                                            <a href="<?=$base;?>/perfil/uid=<?=$user->following[$q]->id;?>"><?=$user->following[$q]->name;?></a>
                                        </div>
                                        <div class="friend-icon-name">
                                        <a href="<?=$base;?>/perfil/uid=<?=$user->following[$q]->id;?>"><?=$user->following[$q]->somamigos;?></a>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                            <div class="box-header-buttons btn-footer">
                                <a href="<?=$base;?>/seguindo/uid=<?=$user->id;?>">See all</a>
                            </div>
        </div>
	</aside>

	<aside class="amigos">
		<div class="box pb-5">
                <div class="box-header m-10">
                    <div class="box-header-text">
                    My community <a href="<?=$base;?>/comunidades">(<?=$user->somarcomunidades;?>)</a>
                    </div>
                            
                </div>
            <div class="box-body friend-list">
                <?php for($q=0;$q<9;$q++):  ?>
                    <?php if(isset($user->comunidades[$q])): ?>
                        <div class="friend-icon">
                            <a href="<?=$base;?>/comunidade/uid=<?=$user->comunidades[$q]->id;?>">
                                <div class="friend-icon-avatar">
                                    <img src="<?=$base;?>/media/avatars/<?=$user->comunidades[$q]->avatar;?>">
                                </div>
                                <div class="friend-icon-name">
                                    <a href="<?=$base;?>/comunidade/uid=<?=$user->comunidades[$q]->id;?>"><?=$user->comunidades[$q]->nome;?></a>
                                </div>
                                    <div class="friend-icon-name">
                                    <a href="<?=$base;?>/comunidade/uid=<?=$user->comunidades[$q]->id;?>">(<?=$user->comunidades[$q]->somamembros;?>)</a>	
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
                    <div class="box-header-buttons btn-footer">
                        <a href="<?=$base;?>/comunidades">See all</a>
                    </div>
        </div>
	</aside>
</section>