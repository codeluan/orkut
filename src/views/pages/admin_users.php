<?=$render('header', ['loggedUser'=>$loggedUser,]);?>
<?=$render('admin_sidebar', ['activeMenu'=>'Usuários', 'user' => $user, 'loggedUser'=>$loggedUser,]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs">Bem-vindo(a), Administrador <?=$loggedUser->name;?></h3>
					</div>
				</div>
				<div class="box feed-item">
					<div class="p-10">
						<h3 class="hidden-xs">Gerenciar todos os Usuários</h3>
					</div>
                    <div class="full-friend-list">
                        <?php foreach($users['users'] as $membroItem): ?>
                            <div class="friend-icon">
                                <a href="<?=$base;?>/perfil/uid=<?=$membroItem->id;?>">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/<?=$membroItem->avatar;?>">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="<?=$base;?>/perfil/uid="><?=$membroItem->name;?></a>
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="<?=$base;?>/perfil/uid=">(<?=$membroItem->somamigos;?>)</a>
                                    </div>
                                </a>
                            </div>
                         <?php endforeach; ?>
                    </div>
                    <?=$render('pagination_links', ['url' => 'admin/users', 'conteudo' => $users, 'quantidade'=>$users['total'], 'id'=>$user->id]);?>
                </div>
            </div>							
        </div>
	</section>
</section>
 <?=$render('footer');?>