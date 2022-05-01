
<?=$render('header', ['loggedUser'=>$loggedUser]);?>
    <?=$render('perfil_sidebar', ['activeMenu'=>'Fotos','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
				
						
						<section class="coluna-8 plr-10">
								
							<section class="feed mt-10">
								
								<div class="row">
									<div class="column">

<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs"><?=$user->name;?> <?=$user->sobrenome;?></h3>
			<ul class="breadcrumb hidden-xs">
			<li><a href="<?=$base;?>/home">Início</a></li>
            <li><a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><?=$user->name;?></a></li>
			<li>Fotos</li>
			</ul>
    </div>
	
	

      <div class="tabs">
            <div class="tab-item active" data-for="minhasfotos">
				Minhas fotos
            </div>
            
      </div>
                    <div class="menu-splitter"></div>

                        <div class="tab-content">
                            <div class="tab-body" data-item="minhasfotos" style="display: block;">
                                <div class="full-user-photos">

                                    <?php if(count($user->photos) === 0): ?>
                                        Este usuário não possui fotos
                                    <?php endif; ?>
        
                                    <?php foreach($user->photos as $photo): ?>
                                        <div class="user-photo-item">
                                            <a href="#modal-<?=$photo->id;?>" rel="modal:open">
                                                <img src="<?=$base;?>/media/uploads/<?=$photo->body;?>" />
                                            </a>
                                            <div id="modal-<?=$photo->id;?>" style="display:none">
                                                <img src="<?=$base;?>/media/uploads/<?=$photo->body;?>" />
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
							
							<div class="menu-splitter"></div>

                        
  </div>

									</div>
									
								</div>
								
								

							</section>
						</section>
 <?=$render('footer');?>