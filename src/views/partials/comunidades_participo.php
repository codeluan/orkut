<div class="depoimento">
    <div class="fic-item row">
        <div class="depoimento-Img">
            <a href="<?=$base;?>/comunidade/uid=<?=$data->id;?>"><img src="<?=$base;?>/media/avatars/<?=$data->avatar;?>" /></a>
        </div>
        <div class="fic-item-info feed-item-head-info">
            <a href="<?=$base;?>/comunidade/uid=<?=$data->id;?>"><?=$data->nome;?> (<?=$data->somamembros;?>)</a>
                <?=nl2br($data->descricao);?>
        </div>
    </div>
</div>