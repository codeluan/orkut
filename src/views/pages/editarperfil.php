
<?=$render('header', ['loggedUser'=>$loggedUser]);?>
   				
	<?=$render('perfil_sidebar', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'user'=>$user, 'isFollowing'=>$isFollowing]);?>
						
	<section class="coluna-8 plr-10">
		<section class="feed mt-10">
			<div class="row">
				<div class="column">

<div class="profile-page">
	<div class="p-10">
		<h3 class="hidden-xs">Editar perfil</h3>
			<ul class="breadcrumb hidden-xs">
			<li><a href="/">Início</a></li>
            <li><a href="/">Meu perfil</a></li>
			<li>Editar perfil</li>
			</ul>
    </div>
	<div class="tabsContainer">
      <div class="tabs">
            <div class="tab-item active" data-for="tabGeral">Geral</div>
            <div class="tab-item" data-for="tabSocial">Social</div>
            <div class="tab-item" data-for="tabContato">Contato</div>
            <div class="tab-item" data-for="tabProfissional">Profissional</div>
            <div class="tab-item" data-for="tabPessoal">Pessoal</div>
      </div>
    </div>
    <div class="tab-content">

    <?php if(!empty($flash)): ?>
            <?php echo $flash; ?>
        <?php endif; ?>
	<form method="POST" action="<?=$base;?>/editarperfil/new">
        <div class="tab-body" data-item="tabGeral" style="display: block;">
            <div class="listInforma">
                <ul>
                    <li><p class="textop1">estilo:</p> <p class="textop2"><textarea class="btn-eo" id="frase" name="frase" maxlength="100"><?=$user->frase;?></textarea></p></li>
                    <li><p class="textop1">nome:</p> <p class="textop2"><input value="<?=$user->name;?>" class="btn-eo" type="text" name="name" maxlength="20"></p></li>
                    <li><p class="textop1">sobrenome:</p> <p class="textop2"><input value="<?=$user->sobrenome;?>" class="btn-eo" type="text" name="sobrenome" maxlength="20"></p></li>
                    <li><p class="textop1">sexo:</p> <p class="textop2"><label><input type="radio" class="btn-eo" name="sexo" value="1" <?=($user->sexo=='1')?'checked':'';?>> feminino</label> <input type="radio" class="btn-eo" name="sexo" value="2" <?=($user->sexo=='2')?'checked':'';?>> masculino</label></p></li>
                    <li><p class="textop1">relacionamento:</p> <p class="textop2"><select class="btn-eo" name="geral_relacionamento" id="geral_relacionamento">
                                            <option value="1" <?=($user->geral_relacionamento=='1')?'selected':'';?>>solteiro(a)</option>
                                            <option value="2" <?=($user->geral_relacionamento=='2')?'selected':'';?>>casado(a)</option>
                                            <option value="3" <?=($user->geral_relacionamento=='3')?'selected':'';?>>namorando</option>
                                            </select></p></li>
                    <li><p class="textop1">data de nascimento:</p> <p class="textop2"><input value="<?=date('d/m/Y', strtotime($user->birthdate));  ?>" class="btn-eo" type="text" name="birthdate" id="birthdate" /></p></li>
                    <li><p class="textop1">interessado(a) em:</p> <p class="textop2">
                    <label><input type="checkbox" name="geral_interamigos" id="geral_interamigos" value="1" <?=($user->geral_interamigos=='1')?'checked':'';?>>amigos</label><br>
                    <label><input type="checkbox" name="geral_intercompanheiros" id="geral_intercompanheiros" value="1" <?=($user->geral_intercompanheiros=='1')?'checked':'';?>>companheiros para atividades</label><br>
                    <label><input type="checkbox" name="geral_intercontatos" id="geral_intercontatos" value="1" <?=($user->geral_intercontatos=='1')?'checked':'';?>>contatos profissionais</label><br>
                    <label><input type="checkbox" name="geral_internamoro" id="geral_internamoro" value="1" <?=($user->geral_internamoro=='1')?'checked':'';?>>namoro</label>
                    <select class="btn-eo" id="geral_intertipo" name="geral_intertipo">
                        <option value="1" <?=($user->geral_intertipo=='1')?'selected':'';?>>homem</option>
                        <option value="2" <?=($user->geral_intertipo=='2')?'selected':'';?>>mulher</option>
                        <option value="3" <?=($user->geral_intertipo=='3')?'selected':'';?>>homem e mulher</option>
                    </select></p></li>
                </ul>
	        </div>
        </div>

                                
        <div class="tab-body" data-item="tabSocial" style="display: none;">
            <div class="listInforma">
                    <ul>
                        <li><p class="textop1">filhos:</p> <p class="textop2"><select class="btn-eo" id="social_filhos" name="social_filhos">
                            <option value="0" <?=($user->social_filhos=='0')?'selected':'';?>>não há resposta</option>
                            <option value="1" <?=($user->social_filhos=='1')?'selected':'';?>>não</option>
                            <option value="2" <?=($user->social_filhos=='2')?'selected':'';?>>sim</option></select></p></li>
                        <li><p class="textop1">orientação sexual:</p> <p class="textop2"><select class="btn-eo" id="social_orientsexual" name="social_orientsexual">
                        <option value="0" <?=($user->social_orientsexual=='0')?'selected':'';?>>não há resposta</option>
                        <option value="1" <?=($user->social_orientsexual=='1')?'selected':'';?>>heterossexual</option>
                        <option value="2" <?=($user->social_orientsexual=='2')?'selected':'';?>>homossexual</option>
                        <option value="3" <?=($user->social_orientsexual=='3')?'selected':'';?>>bissexual</option>
                        <option value="4" <?=($user->social_orientsexual=='4')?'selected':'';?>>assexual</option></select></p></li>
                        <li><p class="textop1">fumo:</p> <p class="textop2"><select class="btn-eo" id="social_fumo" name="social_fumo">
                            <option value="0" <?=($user->social_fumo=='0')?'selected':'';?>>não há resposta</option>
                            <option value="1" <?=($user->social_fumo=='1')?'selected':'';?>>não</option>
                            <option value="2" <?=($user->social_fumo=='2')?'selected':'';?>>sim</option></select></p></li>
                        <li><p class="textop1">bebo:</p> <p class="textop2"><select class="btn-eo" id="social_bebo" name="social_bebo">
                            <option value="0" <?=($user->social_bebo=='0')?'selected':'';?>>não há resposta</option>
                            <option value="1" <?=($user->social_bebo=='1')?'selected':'';?>>não</option>
                            <option value="2" <?=($user->social_bebo=='2')?'selected':'';?>>sim</option></select></p></li>
                        <li><p class="textop1">animais de estimação:</p> <p class="textop2"><select class="btn-eo" id="social_aniestimacao" name="social_aniestimacao">
                            <option value="0" <?=($user->social_aniestimacao=='0')?'selected':'';?>>não há resposta</option>
                            <option value="1" <?=($user->social_aniestimacao=='1')?'selected':'';?>>gosto de animais de estimação</option>
                            <option value="2" <?=($user->social_aniestimacao=='2')?'selected':'';?>>não gosto de animais de estimação</option></select></p></li>
                        <li><p class="textop1">cidade natal:</p> <p class="textop2"><input class="btn-eo" type="text" name="social_cidadenatal" id="social_cidadenatal" value="<?=$user->social_cidadenatal;?>"></p></li>
                        <li><p class="textop1">página web:</p> <p class="textop2"><input class="btn-eo" type="url" name="social_paginaweb" id="social_paginaweb" value="<?=$user->social_paginaweb;?>"></p></li>
                        <li><p class="textop1">quem sou eu:</p> <p class="textop2"><textarea class="btn-eo" id="social_quemsou" name="social_quemsou" maxlength="100"><?=$user->social_quemsou;?></textarea></p></li>
                        <li><p class="textop1">estilo:</p> <p class="textop2"><textarea class="btn-eo" id="social_estilo" name="social_estilo" maxlength="100"><?=$user->social_estilo;?></textarea></p></li>
                        <li><p class="textop1">paixões:</p> <p class="textop2"><textarea class="btn-eo" id="social_paixoes" name="social_paixoes" maxlength="100"><?=$user->social_paixoes;?></textarea></p></li>
                        <li><p class="textop1">esportes:</p> <p class="textop2"><textarea class="btn-eo" id="social_esportes" name="social_esportes" maxlength="100"><?=$user->social_esportes;?></textarea></p></li>
                        <li><p class="textop1">atividades:</p> <p class="textop2"><textarea class="btn-eo" id="social_atividades" name="social_atividades" maxlength="100"><?=$user->social_atividades;?></textarea></p></li>
                        <li><p class="textop1">livros:</p> <p class="textop2"><textarea class="btn-eo" id="social_livros" name="social_livros" maxlength="100"><?=$user->social_livros;?></textarea></p></li>
                        <li><p class="textop1">música:</p> <p class="textop2"><textarea class="btn-eo" id="social_musica" name="social_musica" maxlength="100"><?=$user->social_musica;?></textarea></p></li>
                        <li><p class="textop1">programas de tv:</p> <p class="textop2"><textarea class="btn-eo" id="social_prodetv" name="social_prodetv" maxlength="100"><?=$user->social_prodetv;?></textarea></p></li>
                        <li><p class="textop1">preferências gastronômicas:</p> <p class="textop2"><textarea class="btn-eo" id="social_gastronomicas" name="social_gastronomicas" maxlength="100"><?=$user->social_gastronomicas;?></textarea></p></li>
                    </ul>
            </div>
        </div>

        <div class="tab-body" data-item="tabContato" style="display: none;">
            <div class="listInforma">
                    <ul>
                        <li><p class="textop1">telefone residencial:</p> <p class="textop2"><input class="btn-eo" value="<?=$user->contato_residencial;?>" type="tel" maxlength="14" name="contato_residencial" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" /></p></li>
                        <li><p class="textop1">telefone celular:</p> <p class="textop2"><input class="btn-eo" value="<?=$user->contato_celular;?>" type="tel" maxlength="15" name="contato_celular" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" /></p></li>
                        <li><p class="textop1">endereço 1:</p> <p class="textop2"><input value="<?=$user->contato_endereco1;?>" class="btn-eo" type="text" name="contato_endereco1" maxlength="20"></p></li>
                        <li><p class="textop1">endereço 2:</p> <p class="textop2"><input value="<?=$user->contato_endereco2;?>" class="btn-eo" type="text" name="contato_endereco2" maxlength="20"></p></li>
                        <li><p class="textop1">cidade:</p> <p class="textop2"><input value="<?=$user->cidade;?>" class="btn-eo" type="text" name="cidade" maxlength="20"></p></li>
                        <li><p class="textop1">estado:</p> <p class="textop2"><input value="<?=$user->estado;?>" class="btn-eo" type="text" name="estado" maxlength="20"></p></li>
                        <li><p class="textop1">cep:</p> <p class="textop2"><input value="<?=$user->contato_cep;?>" class="btn-eo" type="text" name="contato_cep" maxlength="9" pattern="\d{5}-\d{3}"></p></li>
                        <li><p class="textop1">país:</p> <p class="textop2"><select class="btn-eo" name="contato_pais" id="contato_pais">
<option value="Afeganistão" <?=($user->contato_pais=='Afeganistão')?'selected':'';?>>Afeganistão</option>
<option value="África do Sul" <?=($user->contato_pais=='África do Sul')?'selected':'';?>>África do Sul</option>
<option value="Albânia" <?=($user->contato_pais=='Albânia')?'selected':'';?>>Albânia</option>
<option value="Alemanha" <?=($user->contato_pais=='Alemanha')?'selected':'';?>>Alemanha</option>
<option value="Andorra" <?=($user->contato_pais=='Andorra')?'selected':'';?>>Andorra</option>
<option value="Angola" <?=($user->contato_pais=='Angola')?'selected':'';?>>Angola</option>
<option value="Anguilla" <?=($user->contato_pais=='Anguilla')?'selected':'';?>>Anguilla</option>
<option value="Antártida" <?=($user->contato_pais=='Antártida')?'selected':'';?>>Antártida</option>
<option value="Antígua e Barbuda" <?=($user->contato_pais=='Antígua e Barbuda')?'selected':'';?>>Antígua e Barbuda</option>
<option value="Antilhas Holandesas" <?=($user->contato_pais=='Antilhas Holandesas')?'selected':'';?>>Antilhas Holandesas</option>
<option value="Arábia Saudita" <?=($user->contato_pais=='Arábia Saudita')?'selected':'';?>>Arábia Saudita</option>
<option value="Argélia" <?=($user->contato_pais=='Argélia')?'selected':'';?>>Argélia</option>
<option value="Argentina" <?=($user->contato_pais=='Argentina')?'selected':'';?>>Argentina</option>
<option value="Armênia" <?=($user->contato_pais=='Armênia')?'selected':'';?>>Armênia</option>
<option value="Aruba" <?=($user->contato_pais=='Aruba')?'selected':'';?>>Aruba</option>
<option value="Austrália" <?=($user->contato_pais=='Austrália')?'selected':'';?>>Austrália</option>
<option value="Áustria" <?=($user->contato_pais=='Áustria')?'selected':'';?>>Áustria</option>
<option value="Azerbaijão" <?=($user->contato_pais=='Azerbaijão')?'selected':'';?>>Azerbaijão</option>
<option value="Bahamas" <?=($user->contato_pais=='Bahamas')?'selected':'';?>>Bahamas</option>
<option value="Bahrein" <?=($user->contato_pais=='Bahrein')?'selected':'';?>>Bahrein</option>
<option value="Bangladesh" <?=($user->contato_pais=='Bangladesh')?'selected':'';?>>Bangladesh</option>
<option value="Barbados" <?=($user->contato_pais=='Barbados')?'selected':'';?>>Barbados</option>
<option value="Belarus" <?=($user->contato_pais=='Belarus')?'selected':'';?>>Belarus</option>
<option value="Bélgica" <?=($user->contato_pais=='Bélgica')?'selected':'';?>>Bélgica</option>
<option value="Belize" <?=($user->contato_pais=='Belize')?'selected':'';?>>Belize</option>
<option value="Benin" <?=($user->contato_pais=='Benin')?'selected':'';?>>Benin</option>
<option value="Bermudas" <?=($user->contato_pais=='Bermudas')?'selected':'';?>>Bermudas</option>
<option value="Bolívia" <?=($user->contato_pais=='Bolívia')?'selected':'';?>>Bolívia</option>
<option value="Bósnia-Herzegóvina" <?=($user->contato_pais=='Bósnia-Herzegóvina')?'selected':'';?>>Bósnia-Herzegóvina</option>
<option value="Botsuana" <?=($user->contato_pais=='Botsuana')?'selected':'';?>>Botsuana</option>
<option value="Brasil" <?=($user->contato_pais=='Brasil')?'selected':'';?>>Brasil</option>
<option value="Brunei" <?=($user->contato_pais=='Brunei')?'selected':'';?>>Brunei</option>
<option value="Bulgária" <?=($user->contato_pais=='Bulgária')?'selected':'';?>>Bulgária</option>
<option value="Burkina Fasso" <?=($user->contato_pais=='Burkina Fasso')?'selected':'';?>>Burkina Fasso</option>
<option value="Burundi" <?=($user->contato_pais=='Burundi')?'selected':'';?>>Burundi</option>
 <option value="Butão" <?=($user->contato_pais=='Butão')?'selected':'';?>>Butão</option>
<option value="Cabo Verde" <?=($user->contato_pais=='Cabo Verde')?'selected':'';?>>Cabo Verde</option>
<option value="Camarões" <?=($user->contato_pais=='Camarões')?'selected':'';?>>Camarões</option>
<option value="Camboja" <?=($user->contato_pais=='Camboja')?'selected':'';?>>Camboja</option>
<option value="Canadá" <?=($user->contato_pais=='Canadá')?'selected':'';?>>Canadá</option>
<option value="Cazaquistão" <?=($user->contato_pais=='Cazaquistão')?'selected':'';?>>Cazaquistão</option>
<option value="Chade" <?=($user->contato_pais=='Chade')?'selected':'';?>>Chade</option>
<option value="Chile" <?=($user->contato_pais=='Chile')?'selected':'';?>>Chile</option>
<option value="China" <?=($user->contato_pais=='China')?'selected':'';?>>China</option>
<option value="Chipre" <?=($user->contato_pais=='Chipre')?'selected':'';?>>Chipre</option>
<option value="Cingapura" <?=($user->contato_pais=='Cingapura')?'selected':'';?>>Cingapura</option>
<option value="Colômbia" <?=($user->contato_pais=='Colômbia')?'selected':'';?>>Colômbia</option>
<option value="Congo" <?=($user->contato_pais=='Congo')?'selected':'';?>>Congo</option>
<option value="Coréia do Norte" <?=($user->contato_pais=='Coréia do Norte')?'selected':'';?>>Coréia do Norte</option>
<option value="Coréia do Sul" <?=($user->contato_pais=='Coréia do Sul')?'selected':'';?>>Coréia do Sul</option>
<option value="Costa do Marfim" <?=($user->contato_pais=='Costa do Marfim')?'selected':'';?>>Costa do Marfim</option>
<option value="Costa Rica" <?=($user->contato_pais=='Costa Rica')?'selected':'';?>>Costa Rica</option>
<option value="Croácia (Hrvatska)" <?=($user->contato_pais=='Croácia (Hrvatska)')?'selected':'';?>>Croácia (Hrvatska)</option>
<option value="Cuba" <?=($user->contato_pais=='Cuba')?'selected':'';?>>Cuba</option>
<option value="Dinamarca" <?=($user->contato_pais=='Dinamarca')?'selected':'';?>>Dinamarca</option>
<option value="Djibuti" <?=($user->contato_pais=='Djibuti')?'selected':'';?>>Djibuti</option>
<option value="Dominica" <?=($user->contato_pais=='Dominica')?'selected':'';?>>Dominica</option>
<option value="Egito" <?=($user->contato_pais=='Egito')?'selected':'';?>>Egito</option>
<option value="El Salvador" <?=($user->contato_pais=='El Salvador')?'selected':'';?>>El Salvador</option>
<option value="Emirados Árabes Unidos" <?=($user->contato_pais=='Emirados Árabes Unidos')?'selected':'';?>>Emirados Árabes Unidos</option>
<option value="Equador" <?=($user->contato_pais=='Equador')?'selected':'';?>>Equador</option>
<option value="Eritréia" <?=($user->contato_pais=='Eritréia')?'selected':'';?>>Eritréia</option>
<option value="Eslováquia" <?=($user->contato_pais=='Eslováquia')?'selected':'';?>>Eslováquia</option>
<option value="Eslovênia" <?=($user->contato_pais=='Eslovênia')?'selected':'';?>>Eslovênia</option>
<option value="Espanha" <?=($user->contato_pais=='Espanha')?'selected':'';?>>Espanha</option>
<option value="Estados Unidos" <?=($user->contato_pais=='Estados Unidos')?'selected':'';?>>Estados Unidos</option>
<option value="Estônia" <?=($user->contato_pais=='Estônia')?'selected':'';?>>Estônia</option>
<option value="Etiópia" <?=($user->contato_pais=='Etiópia')?'selected':'';?>>Etiópia</option>
<option value="Fiji" <?=($user->contato_pais=='Fiji')?'selected':'';?>>Fiji</option>
<option value="Filipinas" <?=($user->contato_pais=='Filipinas')?'selected':'';?>>Filipinas</option>
<option value="Finlândia" <?=($user->contato_pais=='Finlândia')?'selected':'';?>>Finlândia</option>
<option value="França" <?=($user->contato_pais=='França')?'selected':'';?>>França</option>
<option value="Gabão" <?=($user->contato_pais=='Gabão')?'selected':'';?>>Gabão</option>
<option value="Gâmbia" <?=($user->contato_pais=='Gâmbia')?'selected':'';?>>Gâmbia</option>
<option value="Gana" <?=($user->contato_pais=='Gana')?'selected':'';?>>Gana</option>
<option value="Geórgia" <?=($user->contato_pais=='Geórgia')?'selected':'';?>>Geórgia</option>
<option value="Gibraltar" <?=($user->contato_pais=='Gibraltar')?'selected':'';?>>Gibraltar</option>
<option value="Grã-Bretanha (Reino Unido, UK)" <?=($user->contato_pais=='Grã-Bretanha (Reino Unido, UK)')?'selected':'';?>>Grã-Bretanha (Reino Unido, UK)</option>
<option value="Granada" <?=($user->contato_pais=='Granada')?'selected':'';?>>Granada</option>
<option value="Grécia" <?=($user->contato_pais=='Grécia')?'selected':'';?>>Grécia</option>
<option value="Groelândia" <?=($user->contato_pais=='Groelândia')?'selected':'';?>>Groelândia</option>
<option value="Guadalupe" <?=($user->contato_pais=='Guadalupe')?'selected':'';?>>Guadalupe</option>
<option value="Guam (Território dos Estados Unidos)" <?=($user->contato_pais=='Guam (Território dos Estados Unidos)')?'selected':'';?>>Guam (Território dos Estados Unidos)</option>
<option value="Guatemala" <?=($user->contato_pais=='Guatemala')?'selected':'';?>>Guatemala</option>
<option value="Guernsey" <?=($user->contato_pais=='Guernsey')?'selected':'';?>>Guernsey</option>
 <option value="Guiana" <?=($user->contato_pais=='Guiana')?'selected':'';?>>Guiana</option>
<option value="Guiana Francesa" <?=($user->contato_pais=='Guiana Francesa')?'selected':'';?>>Guiana Francesa</option>
<option value="Guiné" <?=($user->contato_pais=='Guiné')?'selected':'';?>>Guiné</option>
<option value="Guiné Equatorial" <?=($user->contato_pais=='Guiné Equatorial')?'selected':'';?>>Guiné Equatorial</option>
<option value="Guiné-Bissau" <?=($user->contato_pais=='Guiné-Bissau')?'selected':'';?>>Guiné-Bissau</option>
<option value="Haiti" <?=($user->contato_pais=='Haiti')?'selected':'';?>>Haiti</option>
<option value="Holanda" <?=($user->contato_pais=='Holanda')?'selected':'';?>>Holanda</option>
<option value="Honduras" <?=($user->contato_pais=='Honduras')?'selected':'';?>>Honduras</option>
<option value="Hong Kong" <?=($user->contato_pais=='Hong Kong')?'selected':'';?>>Hong Kong</option>
<option value="Hungria" <?=($user->contato_pais=='Hungria')?'selected':'';?>>Hungria</option>
<option value="Iêmen" <?=($user->contato_pais=='Iêmen')?'selected':'';?>>Iêmen</option>
<option value="Ilha Bouvet (Território da Noruega)" <?=($user->contato_pais=='Ilha Bouvet (Território da Noruega)')?'selected':'';?>>Ilha Bouvet (Território da Noruega)</option>
<option value="Ilha do Homem" <?=($user->contato_pais=='Ilha do Homem')?'selected':'';?>>Ilha do Homem</option>
<option value="Ilha Natal" <?=($user->contato_pais=='Ilha Natal')?'selected':'';?>>Ilha Natal</option>
<option value="Ilha Pitcairn" <?=($user->contato_pais=='Ilha Pitcairn')?'selected':'';?>>Ilha Pitcairn</option>
<option value="Ilha Reunião" <?=($user->contato_pais=='Ilha Reunião')?'selected':'';?>>Ilha Reunião</option>
<option value="Ilhas Aland" <?=($user->contato_pais=='Ilhas Aland')?'selected':'';?>>Ilhas Aland</option>
<option value="Ilhas Cayman" <?=($user->contato_pais=='Ilhas Cayman')?'selected':'';?>>Ilhas Cayman</option>
<option value="Ilhas Cocos" <?=($user->contato_pais=='Ilhas Cocos')?'selected':'';?>>Ilhas Cocos</option>
<option value="Ilhas Comores" <?=($user->contato_pais=='Ilhas Comores')?'selected':'';?>>Ilhas Comores</option>
<option value="Ilhas Cook" <?=($user->contato_pais=='Ilhas Cook')?'selected':'';?>>Ilhas Cook</option>
<option value="Ilhas Faroes" <?=($user->contato_pais=='Ilhas Faroes')?'selected':'';?>>Ilhas Faroes</option>
<option value="Ilhas Falkland (Malvinas)" <?=($user->contato_pais=='Ilhas Falkland (Malvinas)')?'selected':'';?>>Ilhas Falkland (Malvinas)</option>
<option value="Ilhas Geórgia do Sul e Sandwich do Sul" <?=($user->contato_pais=='Ilhas Geórgia do Sul e Sandwich do Sul')?'selected':'';?>>Ilhas Geórgia do Sul e Sandwich do Sul</option>
 <option value="Ilhas Heard e McDonald (Território da Austrália)" <?=($user->contato_pais=='Ilhas Heard e McDonald (Território da Austrália)')?'selected':'';?>>Ilhas Heard e McDonald (Território da Austrália)</option>
<option value="Ilhas Marianas do Norte" <?=($user->contato_pais=='Ilhas Marianas do Norte')?'selected':'';?>>Ilhas Marianas do Norte</option>
<option value="Ilhas Marshall" <?=($user->contato_pais=='Ilhas Marshall')?'selected':'';?>>Ilhas Marshall</option>
<option value="Ilhas Menores dos Estados Unidos" <?=($user->contato_pais=='Ilhas Menores dos Estados Unidos')?'selected':'';?>>Ilhas Menores dos Estados Unidos</option>
<option value="Ilhas Norfolk" <?=($user->contato_pais=='Ilhas Norfolk')?'selected':'';?>>Ilhas Norfolk</option>
<option value="Ilhas Seychelles" <?=($user->contato_pais=='Ilhas Seychelles')?'selected':'';?>>Ilhas Seychelles</option>
<option value="Ilhas Solomão" <?=($user->contato_pais=='Ilhas Solomão')?'selected':'';?>>Ilhas Solomão</option>
<option value="Ilhas Svalbard e Jan Mayen" <?=($user->contato_pais=='Ilhas Svalbard e Jan Mayen')?'selected':'';?>>Ilhas Svalbard e Jan Mayen</option>
<option value="Ilhas Tokelau" <?=($user->contato_pais=='Ilhas Tokelau')?'selected':'';?>>Ilhas Tokelau</option>
<option value="Ilhas Turks e Caicos" <?=($user->contato_pais=='Ilhas Turks e Caicos')?'selected':'';?>>Ilhas Turks e Caicos</option>
<option value="Ilhas Virgens (Estados Unidos)" <?=($user->contato_pais=='Ilhas Virgens (Estados Unidos)')?'selected':'';?>>Ilhas Virgens (Estados Unidos)</option>
<option value="Ilhas Virgens (Inglaterra)" <?=($user->contato_pais=='Ilhas Virgens (Inglaterra)')?'selected':'';?>>Ilhas Virgens (Inglaterra)</option>
<option value="Ilhas Wallis e Futuna" <?=($user->contato_pais=='Ilhas Wallis e Futuna')?'selected':'';?>>Ilhas Wallis e Futuna</option>
<option value="índia" <?=($user->contato_pais=='Índia')?'selected':'';?>>Índia</option>
<option value="Indonésia" <?=($user->contato_pais=='Indonésia')?'selected':'';?>>Indonésia</option>
<option value="Irã" <?=($user->contato_pais=='Irã')?'selected':'';?>>Irã</option>
<option value="Iraque" <?=($user->contato_pais=='Iraque')?'selected':'';?>>Iraque</option>
<option value="Irlanda" <?=($user->contato_pais=='Irlanda')?'selected':'';?>>Irlanda</option>
<option value="Islândia" <?=($user->contato_pais=='Islândia')?'selected':'';?>>Islândia</option>
<option value="Israel" <?=($user->contato_pais=='Israel')?'selected':'';?>>Israel</option>
<option value="Itália" <?=($user->contato_pais=='Itália')?'selected':'';?>>Itália</option>
<option value="Jamaica" <?=($user->contato_pais=='Jamaica')?'selected':'';?>>Jamaica</option>
<option value="Japão" <?=($user->contato_pais=='Japão')?'selected':'';?>>Japão</option>
<option value="Jersey" <?=($user->contato_pais=='Jersey')?'selected':'';?>>Jersey</option>
<option value="Jordânia" <?=($user->contato_pais=='Jordânia')?'selected':'';?>>Jordânia</option>
<option value="Kênia" <?=($user->contato_pais=='Kênia')?'selected':'';?>>Kênia</option>
<option value="Kiribati" <?=($user->contato_pais=='Kiribati')?'selected':'';?>>Kiribati</option>
<option value="Kuait" <?=($user->contato_pais=='Kuait')?'selected':'';?>>Kuait</option>
<option value="Laos" <?=($user->contato_pais=='Laos')?'selected':'';?>>Laos</option>
<option value="Látvia" <?=($user->contato_pais=='Látvia')?'selected':'';?>>Látvia</option>
<option value="Lesoto" <?=($user->contato_pais=='Lesoto')?'selected':'';?>>Lesoto</option>
<option value="Líbano" <?=($user->contato_pais=='Líbano')?'selected':'';?>>Líbano</option>
<option value="Libéria" <?=($user->contato_pais=='Libéria')?'selected':'';?>>Libéria</option>
<option value="Líbia" <?=($user->contato_pais=='Líbia')?'selected':'';?>>Líbia</option>
<option value="Liechtenstein" <?=($user->contato_pais=='Liechtenstein')?'selected':'';?>>Liechtenstein</option>
<option value="Lituânia" <?=($user->contato_pais=='Lituânia')?'selected':'';?>>Lituânia</option>
<option value="Luxemburgo" <?=($user->contato_pais=='Luxemburgo')?'selected':'';?>>Luxemburgo</option>
<option value="Macau" <?=($user->contato_pais=='Macau')?'selected':'';?>>Macau</option>
<option value="Macedônia (República Yugoslava)" <?=($user->contato_pais=='Macedônia (República Yugoslava)')?'selected':'';?>>Macedônia (República Yugoslava)</option>
<option value="Madagascar" <?=($user->contato_pais=='Madagascar')?'selected':'';?>>Madagascar</option>
<option value="Malásia" <?=($user->contato_pais=='Malásia')?'selected':'';?>>Malásia</option>
<option value="Malaui" <?=($user->contato_pais=='Malaui')?'selected':'';?>>Malaui</option>
<option value="Maldivas" <?=($user->contato_pais=='Maldivas')?'selected':'';?>>Maldivas</option>
<option value="Mali" <?=($user->contato_pais=='Mali')?'selected':'';?>>Mali</option>
<option value="Malta" <?=($user->contato_pais=='Malta')?'selected':'';?>>Malta</option>
<option value="Marrocos" <?=($user->contato_pais=='Marrocos')?'selected':'';?>>Marrocos</option>
<option value="Martinica" <?=($user->contato_pais=='Martinica')?'selected':'';?>>Martinica</option>
<option value="Maurício" <?=($user->contato_pais=='Maurício')?'selected':'';?>>Maurício</option>
<option value="Mauritânia" <?=($user->contato_pais=='Mauritânia')?'selected':'';?>>Mauritânia</option>
<option value="Mayotte" <?=($user->contato_pais=='Mayotte')?'selected':'';?>>Mayotte</option>
<option value="México" <?=($user->contato_pais=='México')?'selected':'';?>>México</option>
<option value="Micronésia" <?=($user->contato_pais=='Micronésia')?'selected':'';?>>Micronésia</option>
<option value="Moçambique" <?=($user->contato_pais=='Moçambique')?'selected':'';?>>Moçambique</option>
<option value="Moldova" <?=($user->contato_pais=='Moldova')?'selected':'';?>>Moldova</option>
<option value="Mônaco" <?=($user->contato_pais=='Mônaco')?'selected':'';?>>Mônaco</option>
<option value="Mongólia" <?=($user->contato_pais=='Mongólia')?'selected':'';?>>Mongólia</option>
<option value="Montenegro" <?=($user->contato_pais=='Montenegro')?'selected':'';?>>Montenegro</option>
<option value="Montserrat" <?=($user->contato_pais=='Montserrat')?'selected':'';?>>Montserrat</option>
<option value="Myanma" <?=($user->contato_pais=='Myanma')?'selected':'';?>>Myanma</option>
<option value="Namíbia" <?=($user->contato_pais=='Namíbia')?'selected':'';?>>Namíbia</option>
<option value="Nauru" <?=($user->contato_pais=='Nauru')?'selected':'';?>>Nauru</option>
<option value="Nepal" <?=($user->contato_pais=='Nepal')?'selected':'';?>>Nepal</option>
<option value="Nicarágua" <?=($user->contato_pais=='Nicarágua')?'selected':'';?>>Nicarágua</option>
<option value="Níger" <?=($user->contato_pais=='Níger')?'selected':'';?>>Níger</option>
<option value="Nigéria" <?=($user->contato_pais=='Nigéria')?'selected':'';?>>Nigéria</option>
<option value="Niue" <?=($user->contato_pais=='Niue')?'selected':'';?>>Niue</option>
<option value="Noruega" <?=($user->contato_pais=='Noruega')?'selected':'';?>>Noruega</option>
<option value="Nova Caledônia" <?=($user->contato_pais=='Nova Caledônia')?'selected':'';?>>Nova Caledônia</option>
<option value="Nova Zelândia" <?=($user->contato_pais=='Nova Zelândia')?'selected':'';?>>Nova Zelândia</option>
<option value="Omã" <?=($user->contato_pais=='Omã')?'selected':'';?>>Omã</option>
<option value="Palau" <?=($user->contato_pais=='Palau')?'selected':'';?>>Palau</option>
<option value="Panamá" <?=($user->contato_pais=='Panamá')?'selected':'';?>>Panamá</option>
<option value="Papua-Nova Guiné" <?=($user->contato_pais=='Papua-Nova Guiné')?'selected':'';?>>Papua-Nova Guiné</option>
<option value="Paquistão" <?=($user->contato_pais=='Paquistão')?'selected':'';?>>Paquistão</option>
<option value="Paraguai" <?=($user->contato_pais=='Paraguai')?'selected':'';?>>Paraguai</option>
<option value="Peru" <?=($user->contato_pais=='Peru')?'selected':'';?>>Peru</option>
<option value="Polinésia Francesa" <?=($user->contato_pais=='Polinésia Francesa')?'selected':'';?>>Polinésia Francesa</option>
<option value="Polônia" <?=($user->contato_pais=='Polônia')?'selected':'';?>>Polônia</option>
<option value="Porto Rico" <?=($user->contato_pais=='Porto Rico')?'selected':'';?>>Porto Rico</option>
<option value="Portugal" <?=($user->contato_pais=='Portugal')?'selected':'';?>>Portugal</option>
<option value="Qatar" <?=($user->contato_pais=='Qatar')?'selected':'';?>>Qatar</option>
<option value="Quirguistão" <?=($user->contato_pais=='Quirguistão')?'selected':'';?>>Quirguistão</option>
<option value="República Centro-Africana" <?=($user->contato_pais=='República Centro-Africana')?'selected':'';?>>República Centro-Africana</option>
<option value="República Democrática do Congo" <?=($user->contato_pais=='República Democrática do Congo')?'selected':'';?>>República Democrática do Congo</option>
<option value="República Dominicana" <?=($user->contato_pais=='República Dominicana')?'selected':'';?>>República Dominicana</option>
<option value="República Tcheca" <?=($user->contato_pais=='República Tcheca')?'selected':'';?>>República Tcheca</option>
<option value="Romênia" <?=($user->contato_pais=='Romênia')?'selected':'';?>>Romênia</option>
<option value="Ruanda" <?=($user->contato_pais=='Ruanda')?'selected':'';?>>Ruanda</option>
<option value="Rússia (antiga URSS) - Federação Russa" <?=($user->contato_pais=='Rússia (antiga URSS) - Federação Russa')?'selected':'';?>>Rússia (antiga URSS) - Federação Russa</option>
<option value="Saara Ocidental" <?=($user->contato_pais=='Saara Ocidental')?'selected':'';?>>Saara Ocidental</option>
<option value="Saint Vincente e Granadinas" <?=($user->contato_pais=='Saint Vincente e Granadinas')?'selected':'';?>>Saint Vincente e Granadinas</option>
<option value="Samoa Americana" <?=($user->contato_pais=='Samoa Americana')?'selected':'';?>>Samoa Americana</option>
<option value="Samoa Ocidental" <?=($user->contato_pais=='Samoa Ocidental')?'selected':'';?>>Samoa Ocidental</option>
<option value="San Marino" <?=($user->contato_pais=='San Marino')?'selected':'';?>>San Marino</option>
<option value="Santa Helena" <?=($user->contato_pais=='Santa Helena')?'selected':'';?>>Santa Helena</option>
<option value="Santa Lúcia" <?=($user->contato_pais=='Santa Lúcia')?'selected':'';?>>Santa Lúcia</option>
<option value="São Bartolomeu" <?=($user->contato_pais=='São Bartolomeu')?'selected':'';?>>São Bartolomeu</option>
<option value="São Cristóvão e Névis" <?=($user->contato_pais=='São Cristóvão e Névis')?'selected':'';?>>São Cristóvão e Névis</option>
<option value="São Martim" <?=($user->contato_pais=='São Martim')?'selected':'';?>>São Martim</option>
<option value="São Tomé e Príncipe" <?=($user->contato_pais=='São Tomé e Príncipe')?'selected':'';?>>São Tomé e Príncipe</option>
<option value="Senegal" <?=($user->contato_pais=='Senegal')?'selected':'';?>>Senegal</option>
<option value="Serra Leoa" <?=($user->contato_pais=='Serra Leoa')?'selected':'';?>>Serra Leoa</option>
<option value="Sérvia" <?=($user->contato_pais=='Sérvia')?'selected':'';?>>Sérvia</option>
<option value="Síria" <?=($user->contato_pais=='Síria')?'selected':'';?>>Síria</option>
<option value="Somália" <?=($user->contato_pais=='Somália')?'selected':'';?>>Somália</option>
<option value="Sri Lanka" <?=($user->contato_pais=='Sri Lanka')?'selected':'';?>>Sri Lanka</option>
<option value="St. Pierre and Miquelon" <?=($user->contato_pais=='St. Pierre and Miquelon')?'selected':'';?>>St. Pierre and Miquelon</option>
<option value="Suazilândia" <?=($user->contato_pais=='Suazilândia')?'selected':'';?>>Suazilândia</option>
<option value="Sudão" <?=($user->contato_pais=='Sudão')?'selected':'';?>>Sudão</option>
<option value="Suécia" <?=($user->contato_pais=='Suécia')?'selected':'';?>>Suécia</option>
<option value="Suíça" <?=($user->contato_pais=='Suíça')?'selected':'';?>>Suíça</option>
<option value="Suriname" <?=($user->contato_pais=='Suriname')?'selected':'';?>>Suriname</option>
<option value="Tadjiquistão" <?=($user->contato_pais=='Tadjiquistão')?'selected':'';?>>Tadjiquistão</option>
<option value="Tailândia" <?=($user->contato_pais=='Tailândia')?'selected':'';?>>Tailândia</option>
<option value="Taiwan" <?=($user->contato_pais=='Taiwan')?'selected':'';?>>Taiwan</option>
<option value="Tanzânia" <?=($user->contato_pais=='Tanzânia')?'selected':'';?>>Tanzânia</option>
<option value="Território Britânico do Oceano índico" <?=($user->contato_pais=='Território Britânico do Oceano índico')?'selected':'';?>>Território Britânico do Oceano índico</option>
<option value="Territórios do Sul da França" <?=($user->contato_pais=='Territórios do Sul da França')?'selected':'';?>>Territórios do Sul da França</option>
<option value="Territórios Palestinos Ocupados" <?=($user->contato_pais=='Territórios Palestinos Ocupados')?'selected':'';?>>Territórios Palestinos Ocupados</option>
<option value="Timor Leste" <?=($user->contato_pais=='Timor Leste')?'selected':'';?>>Timor Leste</option>
<option value="Togo" <?=($user->contato_pais=='Togo')?'selected':'';?>>Togo</option>
<option value="Tonga" <?=($user->contato_pais=='Tonga')?'selected':'';?>>Tonga</option>
<option value="Trinidad and Tobago" <?=($user->contato_pais=='Trinidad and Tobago')?'selected':'';?>>Trinidad and Tobago</option>
<option value="Tunísia" <?=($user->contato_pais=='Tunísia')?'selected':'';?>>Tunísia</option>
<option value="Turcomenistão" <?=($user->contato_pais=='Turcomenistão')?'selected':'';?>>Turcomenistão</option>
<option value="Turquia" <?=($user->contato_pais=='Turquia')?'selected':'';?>>Turquia</option>
<option value="Tuvalu" <?=($user->contato_pais=='Tuvalu')?'selected':'';?>>Tuvalu</option>
<option value="Ucrânia" <?=($user->contato_pais=='Ucrânia')?'selected':'';?>>Ucrânia</option>
<option value="Uganda" <?=($user->contato_pais=='Uganda')?'selected':'';?>>Uganda</option>
<option value="Uruguai" <?=($user->contato_pais=='Uruguai')?'selected':'';?>>Uruguai</option>
<option value="Uzbequistão" <?=($user->contato_pais=='Uzbequistão')?'selected':'';?>>Uzbequistão</option>
<option value="Vanuatu" <?=($user->contato_pais=='Vanuatu')?'selected':'';?>>Vanuatu</option>
<option value="Vaticano" <?=($user->contato_pais=='Vaticano')?'selected':'';?>>Vaticano</option>
<option value="Venezuela" <?=($user->contato_pais=='Venezuela')?'selected':'';?>>Venezuela</option>
<option value="Vietnã" <?=($user->contato_pais=='Vietnã')?'selected':'';?>>Vietnã</option>
<option value="Zâmbia" <?=($user->contato_pais=='Zâmbia')?'selected':'';?>>Zâmbia</option>
<option value="Zimbábue" <?=($user->contato_pais=='Zimbábue')?'selected':'';?>>Zimbábue</option>
</select></p></li>
                    </ul>
            </div>
        </div>

        <div class="tab-body" data-item="tabProfissional" style="display: none;">
            <div class="listInforma">
                    <ul>
                        <li><p class="textop1">escolaridade:</p> <p class="textop2"><input value="<?=$user->profis_escolaridade;?>" class="btn-eo" type="text" name="profis_escolaridade" maxlength="40"></p></li>
                        <li><p class="textop1">escola (ensino médio):</p> <p class="textop2"><input value="<?=$user->profis_ensinomedio;?>" class="btn-eo" type="text" name="profis_ensinomedio" maxlength="40"></p></li>
                        <li><p class="textop1">faculdade:</p> <p class="textop2"><input value="<?=$user->profis_faculdade;?>" class="btn-eo" type="text" name="profis_faculdade" maxlength="40"></p></li>
                        <li><p class="textop1">curso:</p> <p class="textop2"><input value="<?=$user->profis_curso;?>" class="btn-eo" type="text" name="profis_curso" maxlength="40"></p></li>
                        <li><p class="textop1">diploma:</p> <p class="textop2"><input value="<?=$user->profis_diploma;?>" class="btn-eo" type="text" name="profis_diploma" maxlength="40"></p></li>
                        <li><p class="textop1">ano:</p> <p class="textop2"><input value="<?=$user->profis_ano;?>" class="btn-eo" type="text" name="profis_ano" maxlength="4" pattern="[0-9]{4}$"></p></li>
                        <li><p class="textop1">profissão:</p> <p class="textop2"><input value="<?=$user->profis_profissao;?>" class="btn-eo" type="text" name="profis_profissao" maxlength="40"></p></li>
                        <li><p class="textop1">setor:</p> <p class="textop2"><input value="<?=$user->profis_setor;?>" class="btn-eo" type="text" name="profis_setor" maxlength="40"></p></li>
                        <li><p class="textop1">empresa/organização:</p> <p class="textop2"><input value="<?=$user->profis_empresa;?>" class="btn-eo" type="text" name="profis_empresa" maxlength="40"></p></li>
                    </ul>
            </div>
        </div>

        <div class="tab-body" data-item="tabPessoal" style="display: none;">
            <div class="listInforma">
                    <ul>
                        <li><p class="textop1">título:</p> <p class="textop2"><input value="<?=$user->pessoal_titulo;?>" class="btn-eo" type="text" name="pessoal_titulo" maxlength="40"></p></li>
                        <li><p class="textop1">o que mais chama atenção em mim:</p> <p class="textop2"><input value="<?=$user->pessoal_atencao;?>" class="btn-eo" type="text" name="pessoal_atencao" maxlength="40"></p></li>
                        <li><p class="textop1">altura:</p> <p class="textop2"><input value="<?=$user->pessoal_altura;?>" class="btn-eo" type="text" name="pessoal_altura" maxlength="40"></p></li>
                        <li><p class="textop1">cor dos olhos:</p> <p class="textop2"><input value="<?=$user->pessoal_olhos;?>" class="btn-eo" type="text" name="pessoal_olhos" maxlength="40"></p></li>
                        <li><p class="textop1">cor do cabelo:</p> <p class="textop2"><input value="<?=$user->pessoal_cabelo;?>" class="btn-eo" type="text" name="pessoal_cabelo" maxlength="40"></p></li>
                        <li><p class="textop1">tipo físico:</p> <p class="textop2"><textarea class="btn-eo" id="pessoal_fisico" name="pessoal_fisico" maxlength="100"><?=$user->pessoal_fisico;?></textarea></p></li>
                        <li><p class="textop1">arte no corpo:</p> <p class="textop2"><textarea class="btn-eo" id="pessoal_corpo" name="pessoal_corpo" maxlength="100"><?=$user->pessoal_corpo;?></textarea></p></li>
                        <li><p class="textop1">aparencia:</p> <p class="textop2"><textarea class="btn-eo" id="pessoal_aparencia" name="pessoal_aparencia" maxlength="100"><?=$user->pessoal_aparencia;?></textarea></p></li>
                        <li><p class="textop1">do que mais gosto em mim:</p> <p class="textop2"><textarea class="btn-eo" id="pessoal_gostoemmim" name="pessoal_gostoemmim" maxlength="100"><?=$user->pessoal_gostoemmim;?></textarea></p></li>
                    </ul>
            </div>
        </div>

        <center><input class="btn-eo m-10-button" type="submit" value="Atualizar"></center>
</form>
    </div>
</div>
							
							

                        
</div>

	
	
	

									</div>
									
								</div>
								
								

							</section>
						</section>
					

<script src="https://unpkg.com/imask"></script>
<script>
IMask(
document.getElementById('birthdate'),
{
 mask:'00/00/0000'
}
);
</script>

 <?=$render('footer');?>