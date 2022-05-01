<div class="box feed-item p-5">
	<div class="box-body bgcolor p-2">
		<div class="feed-item-head row mt-5 m-width-5">
			<div class="feed-item-head-photo">
				<a href="<?=$base;?>/perfil/uid=<?=$data->user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$data->user->avatar;?>" /></a>
			</div>
			<div class="feed-item-head-info">
				<a href="<?=$base;?>/perfil/uid=<?=$data->user->id;?>"><span class="fidi-name"><?=$data->user->name;?></span></a>
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

			<?php if ($loggedUser->id === $id or $loggedUser->id === $data->user->id): ?>
				<div class="feed-item-head-btn menu">
					<span tabindex="0" class="selection"><img src="<?=$base;?>/assets/images/more.png" /></span>
						<ul>
							<?php if ($loggedUser->id === $data->user->id): ?>
								<li><a href="<?=$base;?>/recados/edit/uid=<?=$data->user->id;?>&view=<?=$data->id;?>&return=<?=$id;?>">Editar</a></li>
							<?php endif; ?>
							<li><a href="<?=$base;?>/deleterecado?uid=<?=$data->user->id;?>&delete=<?=$data->id;?>&return=<?=$id;?>">Deletar</a></li> 
						</ul>
				</div>
			<?php endif; ?>
		</div>
		
		<div class="feed-item-body m-10 m-width-5">
			<?=nl2br($data->body);?>
		</div>
		
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

		</div>-->
	
	</div>
</div>