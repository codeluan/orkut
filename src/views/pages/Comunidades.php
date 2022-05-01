<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<?=$render('comunidade_sidebar', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>
<section class="coluna-7">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
                <div class="profile-page">
                    <div class="p-10">
                        <h3 class="hidden-xs"><?=$comunidades->nome;?></h3>
                            <ul class="breadcrumb hidden-xs">
                                <li><a href="<?=$base;?>/">Home</a></li>
                                <li><a href="<?=$base;?>/">community</a></li>
                                <li><?=$comunidades->nome;?></li>
                            </ul>
                    </div>
	                <div class="listInforma2 m-10-button">
                        <ul>
                            <li><p class="textop1">description:</p> <p class="textop2"><?=$comunidades->descricao;?></p></li>
                            <li>
                                <p class="textop1">language:</p> <p class="textop2">
                                            <?=($comunidades->idioma=='0')?'Indefinido':'';?>
                                            <?=($comunidades->idioma=='1')?'Arabic':'';?>
                                            <?=($comunidades->idioma=='2')?'Bengali':'';?>
                                            <?=($comunidades->idioma=='3')?'Chinese':'';?>
                                            <?=($comunidades->idioma=='4')?'English':'';?>
                                            <?=($comunidades->idioma=='5')?'Hindi':'';?>
                                            <?=($comunidades->idioma=='6')?'Indonesian':'';?>
                                            <?=($comunidades->idioma=='7')?'Japanese':'';?>
                                            <?=($comunidades->idioma=='8')?'Lahnda':'';?>
                                            <?=($comunidades->idioma=='9')?'Mandarin':'';?>
                                            <?=($comunidades->idioma=='10')?'Portuguese':'';?>
                                            <?=($comunidades->idioma=='11')?'Russian':'';?>
                                            <?=($comunidades->idioma=='12')?'Spanish':'';?>
                                </p>
                            </li>
                            <li><p class="textop1">category:</p>
                                <p class="textop2">
                                            <?=($comunidades->categoria=='0')?'Outros':'';?>
                                            <?=($comunidades->categoria=='1')?'Alunos e Escolas':'';?>
                                            <?=($comunidades->categoria=='2')?'Animais: de estimação ou não':'';?>
                                            <?=($comunidades->categoria=='3')?'Artes e Entretenimento':'';?>
                                            <?=($comunidades->categoria=='4')?'Atividades':'';?>
                                            <?=($comunidades->categoria=='5')?'Automotivo':'';?>
                                            <?=($comunidades->categoria=='6')?'Cidades e Bairros':'';?>
                                            <?=($comunidades->categoria=='7')?'Computadores e Internet':'';?>
                                            <?=($comunidades->categoria=='8')?'Culinária, Bebidas e Vinhos':'';?>
                                            <?=($comunidades->categoria=='9')?'Culturas e Comunidade':'';?>
                                            <?=($comunidades->categoria=='10')?'Empresa':'';?>
                                            <?=($comunidades->categoria=='11')?'Escolas e Cursos':'';?>
                                            <?=($comunidades->categoria=='12')?'Esportes e Lazer':'';?>
                                            <?=($comunidades->categoria=='13')?'Família e Lar':'';?>
                                            <?=($comunidades->categoria=='14')?'Gays, Lésbicas e Bi':'';?>
                                            <?=($comunidades->categoria=='15')?'Governo e Política':'';?>
                                            <?=($comunidades->categoria=='16')?'História e Ciências':'';?>
                                            <?=($comunidades->categoria=='17')?'Hobbies e Trabalhos Manuais':'';?>
                                            <?=($comunidades->categoria=='18')?'Jogos':'';?>
                                            <?=($comunidades->categoria=='19')?'Moda e Beleza':'';?>
                                            <?=($comunidades->categoria=='20')?'Música':'';?>
                                            <?=($comunidades->categoria=='21')?'Negócios':'';?>
                                            <?=($comunidades->categoria=='22')?'Países e Regiões':'';?>
                                            <?=($comunidades->categoria=='23')?'Pessoas':'';?>
                                            <?=($comunidades->categoria=='24')?'Religiões e Crenças':'';?>
                                            <?=($comunidades->categoria=='25')?'Romances e Relacionamentos':'';?>
                                            <?=($comunidades->categoria=='26')?'Saúde, Bem-estar e Fitness':'';?>
                                            <?=($comunidades->categoria=='27')?'Viagens':'';?>
                                </p>
                            </li>
                                        <li><p class="textop1">owner:</p> <p class="textop2"><a href="<?=$base;?>/perfil/uid=<?=$comunidades->id_usuario;?>"><b><?=$comunidades->dono;?></b></a></p></li>
                                        <li><p class="textop1">moderators:</p> <p class="textop2">nenhum</p></li>
                                        <li><p class="textop1">type:</p> <p class="textop2">
                                            <?=($comunidades->tipo=='0')?'Public':'';?>
                                            <?=($comunidades->tipo=='1')?'Moderate':'';?>
                                        </p></li>
                                        <li><p class="textop1">content privacy:</p> <p class="textop2">
                                            <?=($comunidades->privacidade=='0')?'Open to non-members':'';?>
                                            <?=($comunidades->privacidade=='1')?'Members only':'';?>
                                        </p></li>
                                        <li><p class="textop1">local:</p> <p class="textop2"><?=$comunidades->cidade;?> <?=$comunidades->estado;?> <?=$comunidades->pais;?></p></li>
                                        <li><p class="textop1">Zip code:</p> <p class="textop2"><?=$comunidades->cep;?></p></li>
                                        <li><p class="textop1">created in:</p> <p class="textop2"><?=date('d/m/Y h:i', strtotime($comunidades->created_at));?></p></li>
                                        <li><p class="textop1">members:</p> <p class="textop2"><?=$comunidades->somamembros;?></p></li>
                                    </ul>
                                </div>
                            </div>

	
	
	                    <div class="box feed-item pb-10">
		                    <div class="p-10">
                                <b>▼ forum</b>
                                <div class="listInforma3">
                                    <ul>
                                        <li style="background-color: transparent;">
                                            <p class="textop1"><b>topic</b></p>
                                            <p class="textop2"><b>posts</b></p>
                                            <p class="textop3"><b>last</b></p>
                                        </li>
                                    </ul>
                                </div>
                        <?php foreach($topicos['post'] as $feedItem): ?>
                            <?=$render('topicos', ['data' => $feedItem,'loggedUser' => $loggedUser, 'id'=>$comunidades->id, 'dono'=>$comunidades->id_usuario]);?>
                        <?php endforeach; ?>
                    </div>	
                    <a class="btn-eo m-10" href="<?=$base;?>/comunidade/criartopicos/uid=<?=$comunidades->id;?>">new topic</a>
                    <a class="btn-eo-link" href="<?=$base;?>/comunidade/topicos/uid=<?=$comunidades->id;?>">view all topics »</a>
                 </div>
			</div>			
		</div>			
	</section>
</section>				
<?=$render('comunidade_sidebar_membros', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades]);?>    
<?=$render('footer');?>