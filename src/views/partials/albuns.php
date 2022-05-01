<div class="album">
	<div class="fic-item row">
        <div class="album-Img">
            <a href="<?=$base;?>/album/fotos/uid=<?=$data->user->id;?>&album=<?=$data->id;?>"><img src="<?=$base;?>/media/uploads/<?=$data->capa;?>" /></a>
        </div>
        <div class="fic-item-info album-content">
            <a class="album-content" href="<?=$base;?>/album/fotos/uid=<?=$data->user->id;?>&album=<?=$data->id;?>"><?=$data->titulo_album;?> (<?=$data->somarfotos;?> Fotos)</a>
            <p><?=nl2br($data->descricao);?></p>
            <p>data de criação: <?=date('d/m/Y H:i', strtotime($data->created_at));?></p>
        </div>
        <div class="fic-item-info ultimas">
            <?php if ($loggedUser->id === $data->user->id): ?>
                <div class="feed-item-head-btn menu">
                    <span tabindex="0" class="selection"><img src="<?=$base;?>/assets/images/more.png" /></span>
                    <ul>
                        <li><a href="<?=$base;?>/album/edit/uid=<?=$data->user->id;?>&album=<?=$data->id;?>">Editar</a></li>
                        <li><a href="<?=$base;?>/deletalbum?uid=<?=$data->user->id;?>&delet=<?=$data->id;?>">Deletar</a></li> 
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
 </div>