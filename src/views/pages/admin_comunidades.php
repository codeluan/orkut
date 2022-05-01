<?=$render('header', ['loggedUser'=>$loggedUser,]);?>
<?=$render('admin_sidebar', ['activeMenu'=>'Comunidade', 'user' => $user, 'loggedUser'=>$loggedUser,]);?>
<section class="coluna-8 pr-10">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
				<div class="profile-page">
					<div class="p-10">
						<h3 class="hidden-xs">Welcome, Administrator<?=$loggedUser->name;?></h3>
					</div>
				</div>
				<div class="box feed-item">
					<div class="p-10">
						<h3 class="hidden-xs">Manage all Communities</h3>
					</div>
                    <div class="m-width-10 pb-5">
                        <?php foreach($comunidades['comunidades'] as $comunidade): ?>
    						<div class="depoimento">
                                <div class="fic-item row">
                                    <div class="depoimento-Img">
                                        <a href="<?=$base;?>/comunidade/uid=<?=$comunidade->id;?>"><img src="<?=$base;?>/media/avatars/<?=$comunidade->avatar;?>" /></a>
                                    </div>
                                    <div class="fic-item-info feed-item-head-info">
                                        <a href="<?=$base;?>/comunidade/uid=<?=$comunidade->id;?>"><?=$comunidade->nome;?> (<?=$comunidade->somamembros;?>)</a>
                                            <?=nl2br($comunidade->descricao);?>
                                    </div>
                                </div>
                            </div>
						<?php endforeach; ?>
					</div>
                </div>		
                <?=$render('pagination_links', ['url' => 'admin/comunidades', 'conteudo' => $comunidades, 'quantidade'=>$comunidades['total'], 'id'=>$user->id]);?>
			</div>					
        </div>
	</section>
</section>
<?=$render('footer');?>