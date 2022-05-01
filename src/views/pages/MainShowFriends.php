
<?=$render('header', ['loggedUser'=>$loggedUser]);?>
    <?=$render('mainprofilesidebar', ['activeMenu'=>'MainProfile','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
				
						
						<section class="coluna-8 plr-10">
								
							<section class="feed mt-10">
								
								<div class="row">
									<div class="column">

<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs"><?=$user->name;?> <?=$user->sobrenome;?></h3>
			<ul class="breadcrumb hidden-xs">
			<li><a href="<?=$base;?>/Home">Início</a></li>
			<li>Amigos de <?=$user->name;?></li>
			</ul>

						
						
						
		
	</div>
	
	

      <div class="tabs">
            <div class="tab-item active" data-for="followers">
				Seguidores (<?=count($user->followers);?>)
            </div>
            <div class="tab-item" data-for="following">
				Seguindo (<?=count($user->following);?>)
            </div>
      </div>
	  
	  <div class="menu-splitter"></div>
	  
	  <div class="row">
<div class="pl-10 tamanho50">
mostrando
<b>1</b>-<b>15</b>
de
<b>6298</b>
</div>
<div class="tamanho50 textoDireito">
primeira
|
&lt; anterior
|
<a href="/">próxima &gt;</a>
|
<a href="/">última</a>
</div>
</div>

<div class="menu-splitter"></div>

                            <div class="tab-content">
                                <div class="tab-body" data-item="followers" style="display: block;">
                                    
                                    <div class="full-friend-list">
                                        
        
                                    
					<?php for($q=0;$q<9;$q++):  ?>
                        <?php if(isset($user->followers[$q])): ?>
                            <div class="friend-icon">
                                <a href="<?=$base;?>/MainProfile/uid=<?=$user->followers[$q]->id;?>">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/<?=$user->followers[$q]->avatar;?>">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="<?=$base;?>/MainProfile/uid=<?=$user->followers[$q]->id;?>"><?=$user->following[$q]->name;?></a>
                                    </div>
									<div class="friend-icon-name">
									<a href="">(<?=count($user->following);?>)</a>
									</div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

				
        
                                       
                                    </div>

                                </div>
                                <div class="tab-body" data-item="following" style="display: none;">
                                    
                                    <div class="full-friend-list">
                                        
                                    <?php for($q=0;$q<9;$q++):  ?>
                        <?php if(isset($user->following[$q])): ?>
                            <div class="friend-icon">
                                <a href="<?=$base;?>/MainProfile/uid=<?=$user->following[$q]->id;?>">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/<?=$user->following[$q]->avatar;?>">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="<?=$base;?>/MainProfile/uid=<?=$user->following[$q]->id;?>"><?=$user->following[$q]->name;?></a>
                                    </div>
									<div class="friend-icon-name">
									<a href="">(<?=count($user->following);?>)</a>
									</div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
        
                                       
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