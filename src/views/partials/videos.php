<div class="depoimento">
	<div class="fic-item row">
		<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?=nl2br($data->id_video);?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
		<center><?=nl2br($data->titulo_video);?></center>
		
	<?php if ($loggedUser->id == $user->id): ?>
		<a href="<?=$base;?>/deletevideo?uid=<?=$user->id;?>&delete=<?=$data->id;?>">Deletar</a>
	<?php endif; ?>
</div>