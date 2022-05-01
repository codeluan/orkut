
<?=$render('header', ['loggedUser'=>$loggedUser]);?>
    <?=$render('perfilsidebar', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
				
						
						<section class="coluna-8 plr-10">
								
							<section class="feed mt-10">
								
								<div class="row">
									<div class="column">

<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs"><?=$user->name;?> <?=$user->sobrenome;?></h3>
			<ul class="breadcrumb hidden-xs">
			<li><a href="<?=$base;?>/home">Início</a></li>
			<li>Amigos de <?=$user->name;?></li>
			</ul>

						
						
						
		
	</div>
	
	

      <div class="tabs">
            <div class="tab-item active" data-for="followers">
				Seguidores (<?=$user->somaseguidores;?>)
            </div>
            <div class="tab-item" data-for="following">
				Seguindo (<?=$user->somamigos;?>)
            </div>
      </div>

                            <div class="tab-content">
                                <div class="tab-body" data-item="followers" style="display: block;">
                                    
                                    <div class="full-friend-list">
                                        
        
                                    
					<?php for($q=0;$q<9;$q++):  ?>
                        <?php if(isset($user->followers[$q])): ?>
                            <div class="friend-icon">
                                <a href="<?=$base;?>/perfil/uid=<?=$user->followers[$q]->id;?>">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/<?=$user->followers[$q]->avatar;?>">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="<?=$base;?>/perfil/uid=<?=$user->followers[$q]->id;?>"><?=$user->followers[$q]->name;?></a>
                                    </div>
									<div class="friend-icon-name">
                                    <a href="<?=$base;?>/perfil/uid=<?=$user->followers[$q]->id;?>">(<?=$user->followers[$q]->somamigos;?>)</a>
									</div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

				
        
                                       
                                    </div>

                                </div>
                                <div class="tab-body" data-item="following" style="display: none;">
                                    
                                    <div class="full-friend-list">
                                        
                                    <?php foreach($user->following as $following): ?>
                            <div class="friend-icon">
                                <a href="<?=$base;?>/perfil/uid=<?=$following->id;?>">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/<?=$following->avatar;?>">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="<?=$base;?>/perfil/uid=<?=$following->id;?>"><?=$following->name;?></a>
                                    </div>
									<div class="friend-icon-name">
									<a href="<?=$base;?>/perfil/uid=<?=$following->id;?>">(<?=$following->somamigos;?>)</a>
									</div>
                                </a>
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