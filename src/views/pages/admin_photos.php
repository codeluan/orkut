<?=$render('header', ['loggedUser'=>$loggedUser,]);?>
<?=$render('admin_sidebar', ['activeMenu'=>'Fotos', 'user' => $user, 'loggedUser'=>$loggedUser,]);?>
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
						<h3 class="hidden-xs">Gerenciar todas as Fotos</h3>
					</div>
                    <div class="box">
                        <div class="box-body">
                            <div class="full-user-photos">
                                <?php foreach($photos['post'] as $feedItem): ?>
                                    <div class="user-photo-item">
										<a href="">
											<img src="<?=$base;?>/media/uploads/<?=$feedItem->photo;?>" />
										</a>
										<a href="<?=$base;?>/admindelphoto?uid=<?=$loggedUser->id;?>&photo=<?=$feedItem->id;?>">
										<center>Delete</center>
										</a>
									</div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
					<?=$render('pagination_links', ['url' => 'admin/photos', 'conteudo' => $photos, 'quantidade'=>$photos['totalfotos'], 'id'=>$user->id]);?>
                </div>
			</div>		
		</div>
	</section>
</section>
<?=$render('footer');?>