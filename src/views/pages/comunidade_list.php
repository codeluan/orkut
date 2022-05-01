<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('perfil_sidebar', ['activeMenu'=>'Comunidades','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
<section class="coluna-7">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">

<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs">Your Communities <?=$user->name;?></h3>
			<ul class="breadcrumb hidden-xs">
                <li><a href="<?=$base;?>/">Home</a></li>
                <li><a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><?=$user->name;?></a></li>
                <li>Communities</li>
			</ul>
	</div>
                    <div class="tabsContainer m-10-button">
                        <div class="tabs">
                            <a href="<?=$base;?>/comunidades">
                                <div class="tab-item active" data-for="todas">
								All (<?=$user->somarcomunidades;?>)
                                </div>
                            </a>
                            <a href="<?=$base;?>/comunidadesoudono">
                                <div class="tab-item" data-for="soudono">
                                Owned communities (<?=$user->somarcomunidadesdono;?>)
                                </div>
                            </a>
                            <a href="<?=$base;?>/comunidade/criar">
                                <div class="tab-item" data-for="criar">
                                Create
                                </div>
                            </a>
                        </div>
					</div>
                    <div class="m-width-10 pb-5">
                        <?php foreach($comunidades['comunidades'] as $comunidade): ?>
    						<?=$render('comunidades_participo', ['data' => $comunidade, 'loggedUser' => $loggedUser]);?>
						<?php endforeach; ?>
					</div>
                </div>		
                    <?=$render('pagination', ['url' => 'comunidades', 'conteudo' => $comunidades, 'quantidade'=>$user->somarcomunidades, 'id'=>$user->id]);?>
			</div>					
        </div>
	</section>
</section>  		
<?=$render('perfil_sidebar_direito', ['user'=>$user]);?>
<?=$render('footer');?>