
<?=$render('header', ['loggedUser'=>$loggedUser]);?>
 
						
						<section class="coluna-8 plr-10">
								
							<section class="feed mt-10">
								
								<div class="row">
									<div class="column">

<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs">Resultados de pesquisa para <?=$searchTerm;?></h3>
			<ul class="breadcrumb hidden-xs">
			<li><a href="<?=$base;?>/Home">Início</a></li>
			<li> outras coisas</li>
			</ul>

						
						
						
		
	</div>
	
	

      <div class="tabs">
            <div class="tab-item active" data-for="followers">
				Seguidores
            </div>
            <div class="tab-item" data-for="following">
				Seguindo
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
                                        
                        <?php foreach($users as $user):  ?>
                                <div class="friend-icon">
                                    <a href="<?=$base;?>/MainProfile/uid=<?=$user->id;?>">
                                        <div class="friend-icon-avatar">
                                            <img src="<?=$base;?>/media/avatars/<?=$user->avatar;?>">
                                        </div>
                                        <div class="friend-icon-name">
                                            <a href="<?=$base;?>/MainProfile/uid=<?=$user->id;?>"><?=$user->name;?></a>
                                        </div>
                                        
                                    </a>
                                </div>
                        <?php endforeach; ?>
            
                                           
                                        </div>

                                </div>
                                <div class="tab-body" data-item="following" style="display: none;">
                                    
                                    <div class="full-friend-list">
                                        
                                    22222
                                       
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