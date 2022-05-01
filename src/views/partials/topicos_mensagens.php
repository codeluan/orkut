<div class="depoimento">
	<div class="fic-item row">
            <div class="depoimento-Img topicosAvatar">
                <a href="<?=$base;?>/perfil/uid=<?=$data->user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$data->user->avatar;?>" /></a>
            </div>
            <div class="fic-item-info topicosContent">
                <a class="topicosContent" href="<?=$base;?>/perfil/uid=<?=$data->user->id;?>"><?=$data->user->name;?></a>
                <b><?=nl2br($data->assunto);?></b><br>
                <?=nl2br($data->body);?>
            </div>
            
            <div class="fic-item-info postagens ultimas">
            <?=date('d/m/Y H:i', strtotime($data->created_at)-10800);?>
            
            </div>
            
        <?php if ($loggedUser->id === $data->user->id or $loggedUser->id === $dono): ?>
            <div class="feed-item-head-btn menu">
		        <span tabindex="0" class="selection"><img src="<?=$base;?>/assets/images/more.png" /></span>
		        <ul>
			        <li><a href="#">Editar</a></li>
			        <li><a href="<?=$base;?>/deletarcomunidademensagen?uid=<?=$data->user->id;?>&delete=<?=$data->id;?>&return=<?=$id;?>">Deletar</a></li> 
		        </ul>
	        </div>
        <?php endif; ?>
    </div>
</div>