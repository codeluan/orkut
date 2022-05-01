<?=$render('header', ['loggedUser'=>$loggedUser,]);?>
<?=$render('admin_sidebar', ['activeMenu'=>'Depoimentos', 'user' => $user, 'loggedUser'=>$loggedUser,]);?>
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
						<h3 class="hidden-xs">Gerenciar todos os Depoimento</h3>
					</div>
				<div class="box feed-new ">
					<?php foreach($depoimentos['depoimentos'] as $recado): ?>
						<div class="depoimento m-width-10 pb-5">
                            <div class="fic-item row ">
                                <div class="depoimento-Img">
                                    <a href="<?=$base;?>/perfil/uid=<?=$recado->user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$recado->user->avatar;?>" /></a>
                                </div>
                                <div class="fic-item-info feed-item-head-info">
                                    <a href="<?=$base;?>/perfil/uid=<?=$recado->user->id;?>"><?=$recado->user->name;?></a>
                                        <?=nl2br($recado->body);?>
                                </div>
                                <div class="feed-item-head-btn menu">
                                    <span tabindex="0" class="selection"><img src="<?=$base;?>/assets/images/more.png" /></span>
                                        <ul>
                                            <li><a href="<?=$base;?>/admindeldepoimento?uid=<?=$recado->user->id;?>&delete=<?=$recado->id;?>">Deletar</a></li> 
                                        </ul>
                                </div>
                            </div>
                        </div>
					<?php endforeach; ?>
					<?=$render('pagination_links', ['url' => 'admin/depoimentos', 'conteudo' => $depoimentos, 'quantidade'=>$depoimentos['total'], 'id'=>$user->id]);?>
				</div>			
			</div>
		</div>			
	</section>
</section>
<?=$render('footer');?>