<div class="box feed-item p-5">
	<div class="box-body bgcolor p-2">
		<div class="feed-item-head row mt-5 m-width-5">
			<div class="feed-item-head-photo">
				<a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$user->avatar;?>" /></a>
			</div>
			<div class="feed-item-head-info">
				<a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><span class="fidi-name"><?=$user->name;?></span></a>
				<span class="fidi-action">
					<?php switch($data->type) {
						case 'text': echo 'fez um post'; break;
						case 'photo': echo 'postou uma foto'; break;
						case 'video': echo 'postou um vídeo'; break;
						}
					?>
				</span>
				<br/>
				<span class="fidi-date"><?=date('d/m/Y H:i', strtotime($data->created_at)-10800);?></span>
			</div>
            </div>
			
            <?php if ($loggedUser->id === $user->id): ?>
		        <div class="feed-item-body m-10 m-width-5">
                <form method="POST" action="<?=$base;?>/editar_feed/new">
                    <textarea class="btn-eo" name="body" maxlength="500"><?=nl2br($data->body);?></textarea>
                        <input class="btn-eo m-10-button" type="submit" value="Atualizar">
                            <input type="hidden" name="id" value="<?=$data->id;?>" />
						    <input type="hidden" name="id_user" value="<?=$user->id;?>" /></p>
                </form>
		        </div>
            <?php endif; ?> 

            <?php if ($loggedUser->id != $user->id): ?>
                <div class="feed-item-body m-10 m-width-5">

                    <?=nl2br($data->body);?>
                
                </div>
            <?php endif; ?>

		<!--
		<div class="feed-item-buttons row mt-5 m-width-5">
			<div class="like-btn <?=($data->liked ? 'on':'');?>"><?=$data->likeCount;?></div>
			<div class="msg-btn"><?=count($data->comments);?></div>
		</div>
		<div class="feed-item-comments">
			
			
			<div class="fic-item row m-height-10 m-width-20">
				<div class="fic-item-photo">
					<a href=""><img src="<?=$base;?>/media/avatars/avatar.jpg" /></a>
				</div>
				<div class="fic-item-info">
					<a href="">luan</a>
					Comentando no meu próprio post teste
				</div>
			</div>


			<div class="fic-answer row m-height-10 m-width-20">
				<div class="fic-item-photo">
					<a href="<?=$base;?>/perfil/uid=<?=$loggedUser->id;?>"><img src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" /></a>
				</div>
				<input type="text" class="fic-item-field" placeholder="Escreva um comentário" />
			</div>

		</div> -->

	</div>
</div>