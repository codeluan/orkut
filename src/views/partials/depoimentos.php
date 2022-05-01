<div class="depoimento">
    <div class="fic-item row">
        <div class="depoimento-Img">
            <a href="<?=$base;?>/perfil/uid=<?=$data->user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$data->user->avatar;?>" /></a>
        </div>
        <div class="fic-item-info feed-item-head-info">
            <a href="<?=$base;?>/perfil/uid=<?=$data->user->id;?>"><?=$data->user->name;?></a>
                <?=nl2br($data->body);?>
        </div>

        <?php if ($loggedUser->id === $id or $loggedUser->id === $data->user->id): ?>
            <div class="feed-item-head-btn menu">
		        <span tabindex="0" class="selection"><img src="<?=$base;?>/assets/images/more.png" /></span>
		        <ul>
                    <?php if ($loggedUser->id === $data->user->id): ?>
			        <li><a href="<?=$base;?>/depoimento/edit/uid=<?=$data->user->id;?>&edit=<?=$data->id;?>">Editar</a></li>
                    <?php endif; ?>
			        <li><a href="<?=$base;?>/deletedepoimento?uid=<?=$data->user->id;?>&delete=<?=$data->id;?>&return=<?=$id;?>">Deletar</a></li> 
		            </ul>
	        </div>
        <?php endif; ?>
    </div>
</div>