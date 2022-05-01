<img class="btnSidebarProfile" onclick="toggleRightMenu()" src="<?=$base;?>/assets/images/profilesidebar.png" />
<section class="coluna-2 mt-10 sidenav" id="mySidenav">
    <aside class="perfil">
        <nav class="p-5">
            <a href="<?=$base;?>/comunidade/uid=<?=$comunidades->id;?>"><img src="<?=$base;?>/media/avatars/<?=$comunidades->avatar;?>" class="img-perfil"></a>
                <div class="menu-splitter"></div>
                <p class="p-5"><a href="<?=$base;?>/comunidade/uid=<?=$comunidades->id;?>"><b><?=$comunidades->nome;?></b></a></p>
                <p class="status pl-5">(<?=$comunidades->somamembros;?>)</p>
                    <div class="menu-splitter"></div>
                        <a href="<?=$base;?>/comunidade/uid=<?=$comunidades->id;?>/comunidadefollow">
                            <div class="menu-item"><div class="menu-item-icon">
                                <?php if (!$comunidadeisFollowing): ?> <img src="<?=$base;?>/assets/images/participar.png" width="16" height="16"> <?php endif; ?>
                                <?php if ($comunidadeisFollowing): ?> <img src="<?=$base;?>/assets/images/deixar.png" width="16" height="16"> <?php endif; ?>
                            </div>
                            <div class="menu-item-text"><?=(!$comunidadeisFollowing)?'Associate':'Leave';?></div></div>
                        </a>
                    <div class="menu-splitter"></div>
                        <a href="<?=$base;?>/comunidade/topicos/uid=<?=$comunidades->id;?>">
                            <div class="menu-item <?=($activeMenu=='Forum')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/forum.png" width="16" height="16"></div>
                            <div class="menu-item-text">Forum</div></div>
                        </a>
                        <a href="<?=$base;?>/comunidade/membros/uid=<?=$comunidades->id;?>">
                            <div class="menu-item <?=($activeMenu=='Membros')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/membros.png" width="16" height="16" /></div>
                            <div class="menu-item-text">Members</div></div>
                        </a>
                    <div class="menu-splitter"></div>

                    <?php if ($comunidades->id_usuario === $loggedUser->id): ?>
                            <a href="<?=$base;?>/comunidade/editar/uid=<?=$comunidades->id;?>">
                                <div class="menu-item">
                                    <div class="menu-item-icon"><img src="<?=$base;?>/assets/images/edit.png" width="16" height="16"></div>
                                    <div class="menu-item-text">Edit</div>
                                </div>
                            </a>
                            <div class="menu-splitter"></div>
                    <?php endif; ?>
        </nav>
    </aside>
</section>