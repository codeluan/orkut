
<?=$render('header', ['loggedUser'=>$loggedUser]);?>		
<?=$render('perfil_sidebar', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
<section class="coluna-8 pr-10">
        <section class="feed mt-10">
	        <div class="row">
			<div class="column">
                <div class="profile-page">
                    <div class="p-10">
                        <h3 class="hidden-xs">Configurar perfil</h3>
                            <ul class="breadcrumb hidden-xs">
                                <li><a href="/">Início</a></li>
                                <li><a href="<?=$base;?>/perfil/uid=<?=$user->id;?>">Meu perfil</a></li>
                                <li>Configurar perfil</li>
                            </ul>
                    </div>

                    <div class="tabsContainer">
                        <div class="tabs">
                            <div class="tab-item active" data-for="tabGeral">Geral</div>
                        </div>
                    </div>
            <div class="tab-content">
                <?php if(!empty($flash)): ?>
                        <?php echo $flash; ?>
                <?php endif; ?>
	<form method="POST" enctype="multipart/form-data" action="<?=$base;?>/profile_config/new">
                <div class="tab-body" data-item="tabGeral" style="display: block;">
                <div class="listInforma">
                        <ul>
                        <li><p class="textop1">Nova senha:</p> <p class="textop2"><input class="btn-eo" type="text" name="password" maxlength="20"></p></li>
                        <li><p class="textop1">Confirma nova senha:</p> <p class="textop2"><input class="btn-eo" type="text" name="password_confirmation" maxlength="20"></p></li>
                        <li><p class="textop1">Ver página de recados:</p> <p class="textop2"><select class="btn-eo" name="viewscraps">
                                <option value="0" <?=($user->viewscraps=='0')?'selected':'';?>>Todos</option>
                                <option value="1" <?=($user->viewscraps=='1')?'selected':'';?>>Seguidores</option>
                                <option value="2" <?=($user->viewscraps=='2')?'selected':'';?>>Só eu</option>
                                </select></p>
                        </li>
                        <li><p class="textop1">Escrever na página de recados</p> <p class="textop2"><select class="btn-eo" name="write_scraps">
                                <option value="0" <?=($user->write_scraps=='0')?'selected':'';?>>Todos</option>
                                <option value="1" <?=($user->write_scraps=='1')?'selected':'';?>>Seguidores</option>
                                <option value="2" <?=($user->write_scraps=='2')?'selected':'';?>>Só eu</option>
                                </select></p>
                        </li>
                        <li><p class="textop1">Visualizar fotos</p> <p class="textop2"><select class="btn-eo" name="viewphotos">
                                <option value="0" <?=($user->viewphotos=='0')?'selected':'';?>>Todos</option>
                                <option value="1" <?=($user->viewphotos=='1')?'selected':'';?>>Seguidores</option>
                                <option value="2" <?=($user->viewphotos=='2')?'selected':'';?>>Só eu</option>
                                </select></p>
                        </li>
                        <li><p class="textop1">Visualizar vídeos</p> <p class="textop2"><select class="btn-eo" name="viewvideo">
                                <option value="0" <?=($user->viewvideo=='0')?'selected':'';?>>Todos</option>
                                <option value="1" <?=($user->viewvideo=='1')?'selected':'';?>>Seguidores</option>
                                <option value="2" <?=($user->viewvideo=='2')?'selected':'';?>>Só eu</option>
                                </select></p>
                        </li>
                        <li><p class="textop1">Visualizar Depoimentos que recebi</p> <p class="textop2"><select class="btn-eo" name="viewtestimonialreceived">
                                <option value="0" <?=($user->viewtestimonialreceived=='0')?'selected':'';?>>Todos</option>
                                <option value="1" <?=($user->viewtestimonialreceived=='1')?'selected':'';?>>Seguidores</option>
                                <option value="2" <?=($user->viewtestimonialreceived=='2')?'selected':'';?>>Só eu</option>
                                </select></p>
                        </li>
                        <li><p class="textop1">Visualizar Depoimentos que escrevi</p> <p class="textop2"><select class="btn-eo" name="viewtestimonialwrote">
                                <option value="0" <?=($user->viewtestimonialwrote=='0')?'selected':'';?>>Todos</option>
                                <option value="1" <?=($user->viewtestimonialwrote=='1')?'selected':'';?>>Seguidores</option>
                                <option value="2" <?=($user->viewtestimonialwrote=='2')?'selected':'';?>>Só eu</option>
                                </select></p>
                        </li>
                        </ul>
                        </div>
                </div>
                <center><input class="btn-eo m-10-button" type="submit" value="Atualizar"></center>
        </form>
                                                </div>
                                        </div>
                                </div>
		        </div>	
		</div>
	</section>
</section>
<script src="https://unpkg.com/imask"></script>
<script>IMask(document.getElementById('birthdate'),{mask:'00/00/0000'});</script>
<?=$render('footer');?>