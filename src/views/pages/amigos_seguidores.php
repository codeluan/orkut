<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('perfil_sidebar', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>

<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
                <div class="profile-page">
                        <div class="p-10">
                            <h3 class="hidden-xs"><?=$user->name;?> <?=$user->sobrenome;?></h3>
                                <ul class="breadcrumb hidden-xs">
                                    <li><a href="<?=$base;?>/home">Início</a></li>
                                    <li><a href="<?=$base;?>/perfil/uid=<?=$user->id;?>">Perfil</a></li>
                                    <li>Seguidores <?=$user->name;?></li>
                                </ul>
                        </div>
                        <div class="tabs">
                            <a href="<?=$base;?>/seguidores/uid=<?=$user->id;?>">
                                <div class="tab-item active" data-for="followers">
                                    Seguidores (<?=$user->somaseguidores;?>)
                                </div>
                            </a>
                            <a href="<?=$base;?>/seguindo/uid=<?=$user->id;?>">
                                <div class="tab-item" data-for="following">
                                    Seguindo (<?=$user->somamigos;?>)
                                </div>
                            </a>
                        </div>

                        <div class="tab-content">
                            <div class="tab-body" data-item="followers" style="display: block;">
                                <div class="full-friend-list">
                                    <?php foreach($membros['membros'] as $membroItem): ?>
                                        <?=$render('listar_usuarios', ['data' => $membroItem, 'loggedUser' => $loggedUser]);?>
                                    <?php endforeach; ?>
                                </div>
                                <?=$render('pagination', ['url' => 'seguidores', 'conteudo' => $membros, 'quantidade'=>$user->somaseguidores, 'id'=>$user->id]);?>
                            </div>
                        </div>
                </div>
            </div>							
        </div>
	</section>
</section>
 <?=$render('footer');?>