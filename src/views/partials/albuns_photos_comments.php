<div class="box feed-item p-5">
	<div class="box-body bgcolor p-2">
		<div class="feed-item-head row mt-5 m-width-5">
			<div class="feed-item-head-photo">
				<a href="<?=$base;?>/perfil/uid=<?=$data->user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$data->user->avatar;?>" /></a>
			</div>
			<div class="feed-item-head-info">
				<a href="<?=$base;?>/perfil/uid=<?=$data->user->id;?>"><span class="fidi-name"><?=$data->user->name;?></span></a>
				<span class="fidi-date"><?=date('d/m/Y H:i', strtotime($data->created_at)-10800);?></span>
			</div>

			<?php if ($loggedUser->id === $id or $loggedUser->id === $data->user->id): ?>
				<div class="feed-item-head-btn menu">
					<span tabindex="0" class="selection"><img src="<?=$base;?>/assets/images/more.png" /></span>
						<ul>
							<li><a href="<?=$base;?>/album/foto/comment/edit/uid=<?=$id;?>&album=<?=$album;?>&photo=<?=$photo;?>&comment=<?=$data->id;?>">Editar</a></li>
							<li><a href="<?=$base;?>/deletalbumfotocomment?uid=<?=$id;?>&album=<?=$album;?>&photo=<?=$photo;?>&comment=<?=$data->id;?>">Deletar</a></li> 
						</ul>
				</div>
			<?php endif; ?>
		</div>
		<div class="feed-item-body m-10 m-width-5">
			<?=nl2br($data->body);?>
		</div>
	</div>
</div>