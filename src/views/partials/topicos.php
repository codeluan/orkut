<div class="depoimento">
	<div class="fic-item row">
            <div class="depoimento-Img topicosAvatar">
                <a href="<?=$base;?>/comunidade/mensagens/uid=<?=$data->id;?>"><img src="<?=$base;?>/media/avatars/<?=$data->user->avatar;?>" /></a>
            </div>
            <div class="fic-item-info topicosContent">
                <a class="topicosContent" href="<?=$base;?>/comunidade/mensagens/uid=<?=$data->id;?>"><?=$data->assunto;?></a>
                <?=nl2br($data->body);?>
            </div>
            <div class="fic-item-info postagens">
                <?=$data->somamensagens;?>
            </div>
            <div class="fic-item-info ultimas">
                <?php if ($data->ultimapostagem <= 0): ?>No posts<?php endif; ?>
                <?php if ($data->ultimapostagem > 0): ?><?=date('H:i', strtotime($data->ultimapostagem)-10800);?><?php endif; ?>
            </div>
        <?php if ($loggedUser->id === $data->user->id or $loggedUser->id === $dono): ?>
            <div class="feed-item-head-btn menu">
		        <span tabindex="0" class="selection"><img src="<?=$base;?>/assets/images/more.png" /></span>
		        <ul>
			        <li><a href="#">Editar</a></li>
			        <li><a href="<?=$base;?>/deletarcomunidadetopico?uid=<?=$data->user->id;?>&delete=<?=$data->id;?>&return=<?=$id;?>">Deletar</a></li> 
		        </ul>
            </div>
        <?php endif; ?>
    </div>
 </div>