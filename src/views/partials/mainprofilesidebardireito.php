<section id="mySidenav2" class="coluna-3 sidenav2">
					
					<aside class="amigos">
								<div class="box pb-5">
                        <div class="box-header m-10">
                            <div class="box-header-text">
                               Seguindo <a href="">(<?=count($user->following);?>)</a>
                            </div>
                            
                        </div>
                        <div class="box-body friend-list">

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
									<a href="">(2)</a>
									</div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                            
							
                        </div>
						<div class="box-header-buttons btn-footer">
                                <a href="<?=$base;?>/MainShowFriends/uid=<?=$user->id;?>">Ver todos</a>
                            </div>
                    </div>
							</aside>
							
							
							
							
							<aside class="amigos">
								<div class="box pb-5">
                        <div class="box-header m-10">
                            <div class="box-header-text">
                               Minhas Comunidades <a href="">(9)</a>
                            </div>
                            
                        </div>
                        <div class="box-body friend-list">
                            
                            <div class="friend-icon">
                                <a href="">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/avatar.jpg">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="/" class="visible-xs">Cmm Fake</a>
                                    </div>
									<div class="friend-icon-name">
									<a href="/" class="visible-xs">(1)</a>
									</div>
                                </a>
                            </div>

                            <div class="friend-icon">
                                <a href="">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/avatar.jpg">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="/" class="visible-xs">Cmm Fake</a>
                                    </div>
									<div class="friend-icon-name">
									<a href="/" class="visible-xs">(1)</a>
									</div>
                                </a>
                            </div>

                            <div class="friend-icon">
                                <a href="">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/avatar.jpg">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="/" class="visible-xs">Cmm Fake</a>
                                    </div>
									<div class="friend-icon-name">
									<a href="/" class="visible-xs">(1)</a>
									</div>
                                </a>
                            </div>

                            <div class="friend-icon">
                                <a href="">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/avatar.jpg">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="/" class="visible-xs">Cmm Fake</a>
                                    </div>
									<div class="friend-icon-name">
									<a href="/" class="visible-xs">(1)</a>
									</div>
                                </a>
                            </div>

                            <div class="friend-icon">
                                <a href="">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/avatar.jpg">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="/" class="visible-xs">Cmm Fake</a>
                                    </div>
									<div class="friend-icon-name">
									<a href="/" class="visible-xs">(1)</a>
									</div>
                                </a>
                            </div>

                            <div class="friend-icon">
                                <a href="">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/avatar.jpg">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="/" class="visible-xs">Cmm Fake</a>
                                    </div>
									<div class="friend-icon-name">
									<a href="/" class="visible-xs">(1)</a>
									</div>
                                </a>
                            </div>

                            <div class="friend-icon">
                                <a href="">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/avatar.jpg">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="/" class="visible-xs">Cmm Fake</a>
                                    </div>
									<div class="friend-icon-name">
									<a href="/" class="visible-xs">(1)</a>
									</div>
                                </a>
                            </div>

                            <div class="friend-icon">
                                <a href="">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/avatar.jpg">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="/" class="visible-xs">Cmm Fake</a>
                                    </div>
									<div class="friend-icon-name">
									<a href="/" class="visible-xs">(1)</a>
									</div>
                                </a>
                            </div>

                            <div class="friend-icon">
                                <a href="">
                                    <div class="friend-icon-avatar">
                                        <img src="<?=$base;?>/media/avatars/avatar.jpg">
                                    </div>
                                    <div class="friend-icon-name">
                                        <a href="/" class="visible-xs">Cmm Fake</a>
                                    </div>
									<div class="friend-icon-name">
									<a href="/" class="visible-xs">(1)</a>
									</div>
                                </a>
                            </div>


                        </div>
						<div class="box-header-buttons btn-footer">
                                <a href="">Ver todos</a>
                            </div>
                    </div>
							</aside>
							
					</section>