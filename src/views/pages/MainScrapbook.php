<?=$render('header', ['loggedUser'=>$loggedUser]);?>

<?=$render('mainprofilesidebar', ['activeMenu'=>'MainProfile','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
						
						<section class="coluna-7 plr-10">
								
							<section class="feed mt-10">
								
								<div class="row">
									<div class="column">

<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs"><?=$user->name;?> <?=$user->sobrenome;?></h3>
			<ul class="breadcrumb hidden-xs">
			<li><a href="<?=$base;?>/">Início</a></li>
			<li>Recados do <?=$user->name;?></li>
			</ul>

	</div>
	


	<div class="box feed-new">
	<div class="box-body">
		<div class="feed-new-editor m-width-10 row newbordas">
			<div class="feed-new-avatar">
				<img src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" />
			</div>
	<div class="feed-new-input-placeholder">Olá <?=$loggedUser->name;?>, escreva um recado</div>
		<div class="feed-new-input" contenteditable="true"></div>
			<div class="feed-new-send">
				<img src="<?=$base;?>/assets/images/send.png" />
			</div>
            <form class="feed-new-form" method="POST" action="<?=$base;?>/recado/new">
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


<?php foreach($feed['post'] as $feedItem): ?>
    <?=$render('feed-item', ['data' => $feedItem,
							'loggedUser' => $loggedUser
							]);?>
	<?php endforeach; ?>
		<?php for($q=0;$q<$feed['pageCount'];$q++): ?>
				<?php endfor; ?>
					<?php $p = 0;
						if (!empty($_GET['p'])) {
							$p = $_GET['p']; 
							} 
					?>
									
	<div class="box feed-item">
		<div class="p-10">
			<div class="menu-splitter"></div>
				<div class="row">
				<div class="pl-10 tamanho50">
															<?php if ($p == 0): ?>Total<?php endif; ?>
															<?php if ($p > 0): ?>mostrando <b><?=$p+1+$p;?></b>-<b><?=$p+$p+2;?></b> de<?php endif; ?>
															<b><?=$feed['totalpost'];?></b>
														</div>
									
					<div class="tamanho50 textoDireito">
						<?php if ($p <= 0): ?> primeira <?php endif; ?>
						<?php if ($p > 0): ?><a href="<?=$base;?>/MainScrapbook/uid=<?=$user->id;?>?p=<?=0;?>">primeira</a><?php endif; ?> |
											
						<?php if ($p <= 0): ?> < anterior <?php endif; ?>
						<?php if ($p > 0): ?><a href="<?=$base;?>/MainScrapbook/uid=<?=$user->id;?>?p=<?=$p-1;?>">< anterior</a><?php endif; ?> |
											
						<?php if ($p < $feed['pageCount'] -1): ?><a href="<?=$base;?>/MainScrapbook/uid=<?=$user->id;?>?p=<?=$p+1;?>">próxima ></a><?php endif; ?>
						<?php if ($feed['pageCount'] -1 <= $p): ?>próxima ><?php endif; ?> |
											
						<?php if ($p < $feed['pageCount'] -1): ?><a href="<?=$base;?>/MainScrapbook/uid=<?=$user->id;?>?p=<?=$feed['pageCount'] -1;?>">última</a><?php endif; ?>
						<?php if ($feed['pageCount'] -1 <= $p): ?>última<?php endif; ?>
					</div>
				</div>
									
				<div class="menu-splitter"></div>
			</div>
		</div>	
	</div>
								

			
			


	
	


									</div>
									
								</div>
								
								

							</section>
						</section>
					
					
                        <?=$render('mainprofilesidebardireito', ['user'=>$user]);?>

<?=$render('footer');?>