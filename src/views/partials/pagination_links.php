<?php for($q=0;$q<$conteudo['pageCount'];$q++): ?><?php endfor; ?>
	<?php $p = 0;
		if (!empty($_GET['p'])) {$p = $_GET['p'];} 
	?>
<div class="box feed-item">
	                <div class="menu-splitter"></div>
	<div class="row">
            <div class="pl-10 tamanho50">
				<?php if ($p == 0): ?>Total<?php endif; ?>
				<?php if ($p > 0): ?>mostrando <b><?=$p*$conteudo['perPage']+1;?></b> -<b>
				<?php if ($quantidade > $p*$conteudo['perPage']+$conteudo['perPage']): ?><?=$p*$conteudo['perPage']+$conteudo['perPage'];?><?php endif; ?>
				<?php if ($quantidade <= $p*$conteudo['perPage']+$conteudo['perPage']): ?><?=$quantidade;?><?php endif; ?>
				</b> de<?php endif; ?>
				<b><?=$quantidade;?></b>
			</div>
											
		<div class="tamanho50 textoDireito pr-10">
			<?php if ($p <= 0): ?> <img src="<?=$base;?>/assets/images/prevprevoff.png" height="20" width="20"> <?php endif; ?>
			<?php if ($p > 0): ?><a href="<?=$base;?>/<?=$url;?>?p=<?=0;?>"><img src="<?=$base;?>/assets/images/prevprev.png" height="20" width="20"></a><?php endif; ?>
																
			<?php if ($p <= 0): ?> <img src="<?=$base;?>/assets/images/prevoff.png" height="20" width="20"> <?php endif; ?>
			<?php if ($p > 0): ?><a href="<?=$base;?>/<?=$url;?>?p=<?=$p-1;?>"><img src="<?=$base;?>/assets/images/prev.png" height="20" width="20"></a><?php endif; ?>
																
			<?php if ($p < $conteudo['pageCount'] -1): ?><a href="<?=$base;?>/<?=$url;?>?p=<?=$p+1;?>"><img src="<?=$base;?>/assets/images/next.png" height="20" width="20"></a><?php endif; ?>
			<?php if ($conteudo['pageCount'] -1 <= $p): ?><img src="<?=$base;?>/assets/images/nextoff.png" height="20" width="20"><?php endif; ?>
																
			<?php if ($p < $conteudo['pageCount'] -1): ?><a href="<?=$base;?>/<?=$url;?>?p=<?=$conteudo['pageCount'] -1;?>"><img src="<?=$base;?>/assets/images/nextnext.png" height="20" width="20"></a><?php endif; ?>
			<?php if ($conteudo['pageCount'] -1 <= $p): ?><img src="<?=$base;?>/assets/images/nextnextof.png" height="20" width="20"><?php endif; ?>
		</div>
	</div>
					<div class="menu-splitter"></div>
</div>