<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('perfil_sidebar', ['activeMenu'=>'Depoimento','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
<section class="coluna-7">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
                <div class="profile-page">
                    <div class="p-10">
                        <h3 class="hidden-xs">Criar depoimento para <?=$user->name;?></h3>
                            <ul class="breadcrumb hidden-xs">
                                <li><a href="<?=$base;?>/">Início</a></li>
                                <li><a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><?=$user->name;?></a></li>
                                <li>Criar depoimento para <?=$user->name;?></li>
                            </ul>
                    </div>
                    <div class="box feed-new">
                        <div class="box-body">
                            <div class="feed-new-editor m-width-10 row newbordas">
                                <div class="feed-new-avatar">
                                    <img src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" />
                                </div>
                                <div class="feed-new-input-placeholder">Olá <?=$loggedUser->name;?>, escreva um depoimento</div>
                                <div class="feed-new-input" contenteditable="true"></div>
                                <div class="feed-new-send">
                                    <img src="<?=$base;?>/assets/images/send.png" />
                                </div>
                                <form class="feed-new-form" method="POST" action="<?=$base;?>/depoimento/new">
                                    <input type="hidden" name="body" />
                                    <input  class="input" type="hidden" name="idpara" id="idpara" value="<?=$user->id;?>" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        let feedInput = document.querySelector('.feed-new-input');
                        let feedSubmit = document.querySelector('.feed-new-send');
                        let feedForm = document.querySelector('.feed-new-form');

                        feedSubmit.addEventListener('click', function(obj){
                            let value = feedInput.innerText.trim();
                            if (value != '') {
                                feedForm.querySelector('input[name=body]').value = value;
                                feedForm.querySelector('input[name=idpara]');
                                feedForm.submit();
                            }
                        });
                    </script>
                    <div class="tabsContainer m-10-button">
                        <div class="tabs">
                            <a href="<?=$base;?>/depoimento/uid=<?=$user->id;?>">
                                <div class="tab-item" data-for="tabsatus">
								Meus depoimentos
                                </div>
                            </a>
                            <a href="<?=$base;?>/depoimentoescrevi/uid=<?=$user->id;?>">
                                <div class="tab-item active" data-for="tabfollowers">
                                Depoimentos que escrevi
                                </div>
                            </a>
                        </div>
					</div>

                    <?php if ($loggedUser->id == $user->id): ?>
                        <div class="m-width-10 pb-5">
                            <?php foreach($depoimentos['depoimentos'] as $depoimento): ?>
                                <?=$render('depoimentos', ['data' => $depoimento, 'loggedUser' => $loggedUser, 'id'=>$user->id]);?>
                            <?php endforeach; ?>
                        </div>
                        <?=$render('pagination', ['url' => 'depoimento', 'conteudo' => $depoimentos, 'quantidade'=>$user->somadepoimentos, 'id'=>$user->id]);?>
                    <?php endif; ?>

                    <?php if ($loggedUser->id != $user->id): ?>

                        <?php if ($user->viewtestimonialwrote === '0'): ?>
                            <div class="m-width-10 pb-5">
                                <?php foreach($depoimentos['depoimentos'] as $depoimento): ?>
                                    <?=$render('depoimentos', ['data' => $depoimento, 'loggedUser' => $loggedUser, 'id'=>$user->id]);?>
                                <?php endforeach; ?>
                            </div>
                            <?=$render('pagination', ['url' => 'depoimento', 'conteudo' => $depoimentos, 'quantidade'=>$user->somadepoimentos, 'id'=>$user->id]);?>
                        <?php endif; ?>

                        <?php if ($isFollowing && $user->viewtestimonialwrote === '1'): ?>
                            <div class="m-width-10 pb-5">
                                <?php foreach($depoimentos['depoimentos'] as $depoimento): ?>
                                    <?=$render('depoimentos', ['data' => $depoimento, 'loggedUser' => $loggedUser, 'id'=>$user->id]);?>
                                <?php endforeach; ?>
                            </div>
                            <?=$render('pagination', ['url' => 'depoimento', 'conteudo' => $depoimentos, 'quantidade'=>$user->somadepoimentos, 'id'=>$user->id]);?>
                        <?php endif; ?>

                    <?php endif; ?>
                </div>
			</div>					
        </div>
	</section>
</section>  		
<?=$render('perfil_sidebar_direito', ['user'=>$user]);?>
<?=$render('footer');?>