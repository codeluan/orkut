<div class="box feed-item p-5">
	<div class="box-body bgcolor p-2">
		<div class="feed-item-head row mt-5 m-width-5">
			<div class="feed-item-head-photo">
				<a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$user->avatar;?>" /></a>
			</div>
			<div class="feed-item-head-info">
				<a href="<?=$base;?>/perfil/uid=<?=$user->id;?>"><span class="fidi-name"><?=$user->name;?></span></a>
				<span class="fidi-action">
					Editar Recado
				</span>
				<br/>
				<span class="fidi-date"><?=date('d/m/Y H:i', strtotime($data->created_at)-10800);?></span>
			</div>
        </div>
			
            <?php if ($loggedUser->id === $user->id): ?>
		        <div class="feed-item-body m-10 m-width-5">
                <form method="POST" action="<?=$base;?>/editar_recado/new">
                    <textarea class="btn-eo" name="body" maxlength="500"><?=nl2br($data->body);?></textarea>
                        <input class="btn-eo m-10-button" type="submit" value="Atualizar">
                            <input type="hidden" name="id" value="<?=$data->id;?>" />
						    <input type="hidden" name="id_user" value="<?=$user->id;?>" />
							<input type="hidden" name="return" value="<?=$return;?>" />
                </form>
		        </div>
            <?php endif; ?> 

            <?php if ($loggedUser->id != $user->id): ?>
                <div class="feed-item-body m-10 m-width-5">

                    <?=nl2br($data->body);?>
                
                </div>
            <?php endif; ?>


	</div>
</div>