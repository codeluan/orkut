<img class="btnSidebarProfile" onclick="toggleRightMenu()" src="<?=$base;?>/assets/images/profilesidebar.png" />
<section class="coluna-2 mt-10 sidenav" id="mySidenav">
    <aside class="perfil">
        <nav class="p-5">        
            <a href=""><img src="<?=$base;?>/media/avatars/<?=$user->avatar;?>" class="img-perfil"></a>
            <div class="menu-splitter"></div>
            <p class="p-5"><a href=""><b><?=$loggedUser->name;?> <?=$loggedUser->sobrenome;?></b></a></p>
            <p class="status pl-5">
                <?=($user->sexo=='1')?'feminino,':'masculino,';?>
                <?=($user->geral_relacionamento=='1')?'solteiro(a)':'';?>
                <?=($user->geral_relacionamento=='2')?'casado(a)':'';?>
                <?=($user->geral_relacionamento=='3')?'namorando':'';?>
            </p>
<p class="status pl-5">
<?=$user->estado;?>
<?=($user->contato_pais != NULL)?", $user->contato_pais":'';?></p>
    <div class="menu-splitter"></div>
        <a href="<?=$base;?>/admin">
            <div class="menu-item <?=($activeMenu=='Home')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/home-run.png" width="16" height="16"></div>
            <div class="menu-item-text">Home</div></div>
        </a>
        <div class="menu-splitter"></div>
        <a href="<?=$base;?>/admin/users">
            <div class="menu-item <?=($activeMenu=='Usuários')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/user.png" width="16" height="16" /></div>
            <div class="menu-item-text">Usuários</div></div>
        </a>
        <div class="menu-splitter"></div>
        <a href="<?=$base;?>/admin/recados">
            <div class="menu-item <?=($activeMenu=='Recados')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/recados.png" width="16" height="16" /></div>
            <div class="menu-item-text">Recados</div></div>
        </a>
        <a href="<?=$base;?>/admin/feeds">
            <div class="menu-item <?=($activeMenu=='Feeds')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/recados.png" width="16" height="16" /></div>
            <div class="menu-item-text">Feeds</div></div>
        </a>
        <div class="menu-splitter"></div>

        <a href="<?=$base;?>/admin/albuns">
            <div class="menu-item <?=($activeMenu=='Albuns')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/photo.png" width="16" height="16" /></div>
            <div class="menu-item-text">Álbuns</div></div>
        </a>

        <a href="<?=$base;?>/admin/photos">
            <div class="menu-item <?=($activeMenu=='Fotos')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/photo.png" width="16" height="16" /></div>
            <div class="menu-item-text">Fotos</div></div>
        </a>
        

        <div class="menu-splitter"></div>
        <a href="<?=$base;?>/admin/videos">
            <div class="menu-item <?=($activeMenu=='Videos')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/video.png" width="16" height="16" /></div>
            <div class="menu-item-text">Vídeos</div></div>
        </a>
        <div class="menu-splitter"></div>
        <a href="<?=$base;?>/admin/depoimentos">
            <div class="menu-item <?=($activeMenu=='Depoimentos')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/depoimentos.png" width="16" height="16" /></div>
            <div class="menu-item-text">Depoimentos</div></div>
        </a>
    <div class="menu-splitter"></div>
        
        <a href="<?=$base;?>/admin/comunidades">
            <div class="menu-item <?=($activeMenu=='Comunidade')?'active':'';?>"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/comunidade.png" width="16" height="16" /></div>
            <div class="menu-item-text">Comunidades</div></div>
        </a>

        <div class="menu-splitter"></div>
        <a href="<?=$base;?>/sair">
            <div class="menu-item"><div class="menu-item-icon"><img src="<?=$base;?>/assets/images/power.png" width="16" height="16" /></div>
            <div class="menu-item-text">Sair</div></div>
        </a>

        <div class="menu-item">
            <div class="menu-item-text"><center>Versão 0.0.8</center></div></div>
        </nav>
    </aside>
</section>		