
<?=$render('header', ['loggedUser'=>$loggedUser]);?>
   				
	<section class="coluna-2 mt-10" id="sidebarMenu">
		<aside class="perfil">
			<nav class="p-5">
								
								<a href="/">
<img src="<?=$base;?>/media/avatars/avatar.jpg" class="img-perfil">
</a>
<div class="menu-splitter"></div>
<p class="p-5"><a href="/"><b>luan fernando</b></a></p>

<p class="status pl-5">
masculino,
casado(a) </p>
<p class="status pl-5">
Brasil </p>
<div class="menu-splitter"></div>
									<a href="">
										<div class="menu-item">
											<div class="menu-item-icon">
												<i class="icone-perfil"></i>
											</div>
											<div class="menu-item-text">
												Perfil
											</div>
											<div class="menu-item-badge">
												Editar
											</div>
										</div>
									</a>
									<a href="">
										<div class="menu-item">
											<div class="menu-item-icon">
												<i class="icone-recados"></i>
											</div>
											<div class="menu-item-text">
												Recados
											</div>
										</div>
									</a>
									<a href="">
										<div class="menu-item">
											<div class="menu-item-icon">
												<i class="icone-album"></i>
											</div>
											<div class="menu-item-text">
												Fotos
											</div>
										</div>
									</a>
									<a href="">
										<div class="menu-item">
											<div class="menu-item-icon">
												<i class="icone-videos"></i>
											</div>
											<div class="menu-item-text">
												Vídeos
											</div>
										</div>
									</a>
									<a href="">
										<div class="menu-item">
											<div class="menu-item-icon">
												<i class="icone-depoimentos"></i>
											</div>
											<div class="menu-item-text">
												Depoimentos
											</div>
										</div>
									</a>
									<div class="menu-splitter"></div>
									<b>Apps</b>
									<a href="">
										<div class="menu-item">
											<div class="menu-item-icon">
												<i class="icone-addapps"></i>
											</div>
											<div class="menu-item-text">
												Adicionar apps
											</div>
										</div>
									</a>
									<div class="menu-splitter"></div>
									<a href="">
										<div class="menu-item">
											<div class="menu-item-icon">
												<i class="icone-listas"></i>
											</div>
											<div class="menu-item-text">
												Listas
											</div>
										</div>
									</a>
									<a href="">
										<div class="menu-item">
											<div class="menu-item-icon">
												<i class="icone-updates"></i>
											</div>
											<div class="menu-item-text">
												Atualizações
											</div>
										</div>
									</a>
									<a href="">
										<div class="menu-item">
											<div class="menu-item-icon">
												<i class="icone-configuracoes"></i>
											</div>
											<div class="menu-item-text">
												Configurações
											</div>
										</div>
									</a>
									<a href="">
										<div class="menu-item">
											<div class="menu-item-icon">
												<img src="assets/images/power.png" width="16" height="16" />
											</div>
											<div class="menu-item-text">
												Sair
											</div>
										</div>
									</a>
								</nav>
							</aside>
						</section>
						
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
	
      <div class="tabs">
            <div class="tab-item active" data-for="tabGeral">Geral</div>
            <div class="tab-item" data-for="tabSocial">Social</div>
            <div class="tab-item" data-for="tabContato">Contato</div>
            <div class="tab-item" data-for="tabProfissional">Profissional</div>
            <div class="tab-item" data-for="tabPessoal">Pessoal</div>
      </div>

    <div class="tab-content">
	<form method="POST" action="<?=$base;?>/MainEditSummary">
        <div class="tab-body" data-item="tabGeral" style="display: block;">
            <div class="listInforma">
                <ul>
                    <li><p class="textop1">nome:</p> <p class="textop2"><input placeholder="Digite seu nome" class="input" type="text" name="name" maxlength="20"></p></li>
                    <li><p class="textop1">sobrenome:</p> <p class="textop2"><input placeholder="Digite seu sobrenome" class="input" type="text" name="sobrenome" maxlength="20"></p></li>
                    <li><p class="textop1">sexo:</p> <p class="textop2"><label><input type="radio" name="sexo" value="0" checked="checked"> feminino</label> <input type="radio" name="sexo" value="1"> masculino</label></p></li>
                    <li><p class="textop1">relacionamento:</p> <p class="textop2"><select name="geral_relacionamento" id="geral_relacionamento">
                                            <option value="0" selected="selected">solteiro(a)</option>
                                            <option value="1">casado(a)</option>
                                            <option value="2">namorando</option>
                                            </select></p></li>
                    <li><p class="textop1">data de nascimento:</p> <p class="textop2"><input placeholder="Digite sua data de Nacimento" class="input" type="text" name="birthdate" id="birthdate" /></p></li>
                    <li><p class="textop1">interessado(a) em:</p> <p class="textop2">
                    <label><input type="checkbox" name="geral_interamigos" id="geral_interamigos" value="1" checked="checked">amigos</label><br>
                    <label><input type="checkbox" name="geral_intercompanheiros" id="geral_intercompanheiros" value="1">companheiros para atividades</label><br>
                    <label><input type="checkbox" name="geral_intercontatos" id="geral_intercontatos" value="1">contatos profissionais</label><br>
                    <label><input type="checkbox" name="geral_internamoro" id="geral_internamoro" value="1">namoro</label>
                    <select id="geral_intertipo" name="geral_intertipo">
<option value="0">homem</option>
<option value="1">mulher</option>
<option value="2">homem e mulher</option>
</select></p></li>
                </ul>
	        </div>
        </div>

                                
        <div class="tab-body" data-item="tabSocial" style="display: none;">
            <div class="listInforma">
                    <ul>
                        <li><p class="textop1">filhos:</p> <p class="textop2"><select id="social_filhos" name="social_filhos">
                            <option value="">não há resposta</option>
                            <option value="0" selected="selected">não</option>
                            <option value="1">sim</option></select></p></li>
                        <li><p class="textop1">orientação sexual:</p> <p class="textop2"><select id="social_orientsexual" name="oriensocial_orientsexualtacao">
                        <option value="">não há resposta</option>
                        <option value="0" selected="selected">heterossexual</option>
                        <option value="1">homossexual</option>
                        <option value="2">bissexual</option>
                        <option value="3">assexual</option></select></p></li>
                        <li><p class="textop1">estilo:</p> <p class="textop2"><textarea id="social_estilo" name="social_estilo" maxlength="50">estilo</textarea></p></li>
                        <li><p class="textop1">fumo:</p> <p class="textop2"><select id="social_fumo" name="social_fumo">
                            <option value="">não há resposta</option>
                            <option value="0" selected="selected">não</option>
                            <option value="1">sim</option></select></p></li>
                        <li><p class="textop1">bebo:</p> <p class="textop2"><select id="social_bebo" name="social_bebo">
                            <option value="">não há resposta</option>
                            <option value="0" selected="selected">não</option>
                            <option value="1">sim</option></select></p></li>
                        <li><p class="textop1">animais de estimação:</p> <p class="textop2"><select id="	social_aniestimacao" name="	social_aniestimacao">
                            <option value="">não há resposta</option>
                            <option value="0" selected="selected">gosto de animais de estimação</option>
                            <option value="1">não gosto de animais de estimação</option></select></p></li>
                        <li><p class="textop1">cidade natal:</p> <p class="textop2"><input type="text" name="social_cidadenatal" id="social_cidadenatal" value="cidade natal"></p></li>
                        <li><p class="textop1">página web:</p> <p class="textop2"><input type="text" name="social_paginaweb" id="social_paginaweb" value="página web"></p></li>
                        <li><p class="textop1">quem sou eu:</p> <p class="textop2"><textarea id="social_quemsou" name="social_quemsou" maxlength="100">quem sou eu:</textarea></p></li>
                        <li><p class="textop1">paixões:</p> <p class="textop2"><textarea id="social_paixoes" name="social_paixoes" maxlength="100">paixões</textarea></p></li>
                        <li><p class="textop1">esportes:</p> <p class="textop2"><textarea id="social_esportes" name="social_esportes" maxlength="100">esportes</textarea></p></li>
                        <li><p class="textop1">atividades:</p> <p class="textop2"><textarea id="social_atividades" name="social_atividades" maxlength="100">atividades</textarea></p></li>
                        <li><p class="textop1">livros:</p> <p class="textop2"><textarea id="social_livros" name="social_livros" maxlength="100">livros</textarea></p></li>
                        <li><p class="textop1">música:</p> <p class="textop2"><textarea id="social_musica" name="social_musica" maxlength="100">músicas</textarea></p></li>
                        <li><p class="textop1">programas de tv:</p> <p class="textop2"><textarea id="social_prodetv" name="social_prodetv" maxlength="100">programas de tv</textarea></p></li>
                        <li><p class="textop1">preferências gastronômicas:</p> <p class="textop2"><textarea id="social_gastronomicas" name="social_gastronomicas" maxlength="100">preferências gastronômicas</textarea></p></li>
                    </ul>
            </div>
        </div>

        <div class="tab-body" data-item="tabContato" style="display: none;">
            <div class="listInforma">
                    <ul>
                        <li><p class="textop1">telefone residencial:</p> <p class="textop2"><input placeholder="Digite telefone residencial" class="input" type="tel" name="contato_residencial" maxlength="20"></p></li>
                        <li><p class="textop1">telefone celular:</p> <p class="textop2"><input placeholder="Digite telefone celular" class="input" type="tel" name="contato_celular" maxlength="20"></p></li>
                        <li><p class="textop1">endereço 1:</p> <p class="textop2"><input placeholder="Digite endereço 1" class="input" type="text" name="contato_endereco1" maxlength="20"></p></li>
                        <li><p class="textop1">endereço 2:</p> <p class="textop2"><input placeholder="Digite endereço 2" class="input" type="text" name="contato_endereco2" maxlength="20"></p></li>
                        <li><p class="textop1">cidade:</p> <p class="textop2"><input placeholder="Digite sua cidade" class="input" type="text" name="cidade" maxlength="20"></p></li>
                        <li><p class="textop1">estado:</p> <p class="textop2"><input placeholder="Digite seu estado" class="input" type="text" name="estado" maxlength="20"></p></li>
                        <li><p class="textop1">cep:</p> <p class="textop2"><input placeholder="Digite seu cep" class="input" type="text" name="contato_cep" maxlength="20"></p></li>
                        <li><p class="textop1">país:</p> <p class="textop2"><select name="contato_pais" id="pais">
<option value="Afeganistão">Afeganistão</option>
<option value="África do Sul">África do Sul</option>
<option value="Albânia">Albânia</option>
<option value="Alemanha">Alemanha</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antártida">Antártida</option>
<option value="Antígua e Barbuda">Antígua e Barbuda</option>
<option value="Antilhas Holandesas">Antilhas Holandesas</option>
<option value="Arábia Saudita">Arábia Saudita</option>
<option value="Argélia">Argélia</option>
<option value="Argentina">Argentina</option>
<option value="Armênia">Armênia</option>
<option value="Aruba">Aruba</option>
<option value="Austrália">Austrália</option>
<option value="Áustria">Áustria</option>
<option value="Azerbaijão">Azerbaijão</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrein">Bahrein</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Bélgica">Bélgica</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermudas">Bermudas</option>
<option value="Bolívia">Bolívia</option>
<option value="Bósnia-Herzegóvina">Bósnia-Herzegóvina</option>
<option value="Botsuana">Botsuana</option>
<option value="Brasil" selected="selected">Brasil</option>
<option value="Brunei">Brunei</option>
<option value="Bulgária">Bulgária</option>
<option value="Burkina Fasso">Burkina Fasso</option>
<option value="Burundi">Burundi</option>
 <option value="Butão">Butão</option>
<option value="Cabo Verde">Cabo Verde</option>
<option value="Camarões">Camarões</option>
<option value="Camboja">Camboja</option>
<option value="Canadá">Canadá</option>
<option value="Cazaquistão">Cazaquistão</option>
<option value="Chade">Chade</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Chipre">Chipre</option>
<option value="Cingapura">Cingapura</option>
<option value="Colômbia">Colômbia</option>
<option value="Congo">Congo</option>
<option value="Coréia do Norte">Coréia do Norte</option>
<option value="Coréia do Sul">Coréia do Sul</option>
<option value="Costa do Marfim">Costa do Marfim</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Croácia (Hrvatska)">Croácia (Hrvatska)</option>
<option value="Cuba">Cuba</option>
<option value="Dinamarca">Dinamarca</option>
<option value="Djibuti">Djibuti</option>
<option value="Dominica">Dominica</option>
<option value="Egito">Egito</option>
<option value="El Salvador">El Salvador</option>
<option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
<option value="Equador">Equador</option>
<option value="Eritréia">Eritréia</option>
<option value="Eslováquia">Eslováquia</option>
<option value="Eslovênia">Eslovênia</option>
<option value="Espanha">Espanha</option>
<option value="Estados Unidos">Estados Unidos</option>
<option value="Estônia">Estônia</option>
<option value="Etiópia">Etiópia</option>
<option value="Fiji">Fiji</option>
<option value="Filipinas">Filipinas</option>
<option value="Finlândia">Finlândia</option>
<option value="França">França</option>
<option value="Gabão">Gabão</option>
<option value="Gâmbia">Gâmbia</option>
<option value="Gana">Gana</option>
<option value="Geórgia">Geórgia</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Grã-Bretanha (Reino Unido, UK)">Grã-Bretanha (Reino Unido, UK)</option>
<option value="Granada">Granada</option>
<option value="Grécia">Grécia</option>
<option value="Groelândia">Groelândia</option>
<option value="Guadalupe">Guadalupe</option>
<option value="Guam (Território dos Estados Unidos)">Guam (Território dos Estados Unidos)</option>
<option value="Guatemala">Guatemala</option>
<option value="Guernsey">Guernsey</option>
 <option value="Guiana">Guiana</option>
<option value="Guiana Francesa">Guiana Francesa</option>
<option value="Guiné">Guiné</option>
<option value="Guiné Equatorial">Guiné Equatorial</option>
<option value="Guiné-Bissau">Guiné-Bissau</option>
<option value="Haiti">Haiti</option>
<option value="Holanda">Holanda</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungria">Hungria</option>
<option value="Iêmen">Iêmen</option>
<option value="Ilha Bouvet (Território da Noruega)">Ilha Bouvet (Território da Noruega)</option>
<option value="Ilha do Homem">Ilha do Homem</option>
<option value="Ilha Natal">Ilha Natal</option>
<option value="Ilha Pitcairn">Ilha Pitcairn</option>
<option value="Ilha Reunião">Ilha Reunião</option>
<option value="Ilhas Aland">Ilhas Aland</option>
<option value="Ilhas Cayman">Ilhas Cayman</option>
<option value="Ilhas Cocos">Ilhas Cocos</option>
<option value="Ilhas Comores">Ilhas Comores</option>
<option value="Ilhas Cook">Ilhas Cook</option>
<option value="Ilhas Faroes">Ilhas Faroes</option>
<option value="Ilhas Falkland (Malvinas)">Ilhas Falkland (Malvinas)</option>
<option value="Ilhas Geórgia do Sul e Sandwich do Sul">Ilhas Geórgia do Sul e Sandwich do Sul</option>
 <option value="Ilhas Heard e McDonald (Território da Austrália)">Ilhas Heard e McDonald (Território da Austrália)</option>
<option value="Ilhas Marianas do Norte">Ilhas Marianas do Norte</option>
<option value="Ilhas Marshall">Ilhas Marshall</option>
<option value="Ilhas Menores dos Estados Unidos">Ilhas Menores dos Estados Unidos</option>
<option value="Ilhas Norfolk">Ilhas Norfolk</option>
<option value="Ilhas Seychelles">Ilhas Seychelles</option>
<option value="Ilhas Solomão">Ilhas Solomão</option>
<option value="Ilhas Svalbard e Jan Mayen">Ilhas Svalbard e Jan Mayen</option>
<option value="Ilhas Tokelau">Ilhas Tokelau</option>
<option value="Ilhas Turks e Caicos">Ilhas Turks e Caicos</option>
<option value="Ilhas Virgens (Estados Unidos)">Ilhas Virgens (Estados Unidos)</option>
<option value="Ilhas Virgens (Inglaterra)">Ilhas Virgens (Inglaterra)</option>
<option value="Ilhas Wallis e Futuna">Ilhas Wallis e Futuna</option>
<option value="índia">índia</option>
<option value="Indonésia">Indonésia</option>
<option value="Irã">Irã</option>
<option value="Iraque">Iraque</option>
<option value="Irlanda">Irlanda</option>
<option value="Islândia">Islândia</option>
<option value="Israel">Israel</option>
<option value="Itália">Itália</option>
<option value="Jamaica">Jamaica</option>
<option value="Japão">Japão</option>
 <option value="Jersey">Jersey</option>
<option value="Jordânia">Jordânia</option>
<option value="Kênia">Kênia</option>
<option value="Kiribati">Kiribati</option>
<option value="Kuait">Kuait</option>
<option value="Laos">Laos</option>
<option value="Látvia">Látvia</option>
<option value="Lesoto">Lesoto</option>
<option value="Líbano">Líbano</option>
<option value="Libéria">Libéria</option>
<option value="Líbia">Líbia</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lituânia">Lituânia</option>
<option value="Luxemburgo">Luxemburgo</option>
<option value="Macau">Macau</option>
<option value="Macedônia (República Yugoslava)">Macedônia (República Yugoslava)</option>
<option value="Madagascar">Madagascar</option>
<option value="Malásia">Malásia</option>
<option value="Malaui">Malaui</option>
<option value="Maldivas">Maldivas</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marrocos">Marrocos</option>
<option value="Martinica">Martinica</option>
<option value="Maurício">Maurício</option>
<option value="Mauritânia">Mauritânia</option>
<option value="Mayotte">Mayotte</option>
<option value="México">México</option>
<option value="Micronésia">Micronésia</option>
<option value="Moçambique">Moçambique</option>
<option value="Moldova">Moldova</option>
<option value="Mônaco">Mônaco</option>
<option value="Mongólia">Mongólia</option>
<option value="Montenegro">Montenegro</option>
<option value="Montserrat">Montserrat</option>
<option value="Myanma">Myanma</option>
<option value="Namíbia">Namíbia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Nicarágua">Nicarágua</option>
<option value="Níger">Níger</option>
<option value="Nigéria">Nigéria</option>
<option value="Niue">Niue</option>
<option value="Noruega">Noruega</option>
<option value="Nova Caledônia">Nova Caledônia</option>
<option value="Nova Zelândia">Nova Zelândia</option>
<option value="Omã">Omã</option>
<option value="Palau">Palau</option>
<option value="Panamá">Panamá</option>
<option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
<option value="Paquistão">Paquistão</option>
 <option value="Paraguai">Paraguai</option>
<option value="Peru">Peru</option>
<option value="Polinésia Francesa">Polinésia Francesa</option>
<option value="Polônia">Polônia</option>
<option value="Porto Rico">Porto Rico</option>
<option value="Portugal">Portugal</option>
<option value="Qatar">Qatar</option>
<option value="Quirguistão">Quirguistão</option>
<option value="República Centro-Africana">República Centro-Africana</option>
<option value="República Democrática do Congo">República Democrática do Congo</option>
<option value="República Dominicana">República Dominicana</option>
<option value="República Tcheca">República Tcheca</option>
<option value="Romênia">Romênia</option>
<option value="Ruanda">Ruanda</option>
<option value="Rússia (antiga URSS) - Federação Russa">Rússia (antiga URSS) - Federação Russa</option>
<option value="Saara Ocidental">Saara Ocidental</option>
<option value="Saint Vincente e Granadinas">Saint Vincente e Granadinas</option>
<option value="Samoa Americana">Samoa Americana</option>
<option value="Samoa Ocidental">Samoa Ocidental</option>
<option value="San Marino">San Marino</option>
<option value="Santa Helena">Santa Helena</option>
<option value="Santa Lúcia">Santa Lúcia</option>
<option value="São Bartolomeu">São Bartolomeu</option>
 <option value="São Cristóvão e Névis">São Cristóvão e Névis</option>
<option value="São Martim">São Martim</option>
<option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
<option value="Senegal">Senegal</option>
<option value="Serra Leoa">Serra Leoa</option>
<option value="Sérvia">Sérvia</option>
<option value="Síria">Síria</option>
<option value="Somália">Somália</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
<option value="Suazilândia">Suazilândia</option>
<option value="Sudão">Sudão</option>
<option value="Suécia">Suécia</option>
<option value="Suíça">Suíça</option>
<option value="Suriname">Suriname</option>
<option value="Tadjiquistão">Tadjiquistão</option>
<option value="Tailândia">Tailândia</option>
<option value="Taiwan">Taiwan</option>
<option value="Tanzânia">Tanzânia</option>
<option value="Território Britânico do Oceano índico">Território Britânico do Oceano índico</option>
<option value="Territórios do Sul da França">Territórios do Sul da França</option>
<option value="Territórios Palestinos Ocupados">Territórios Palestinos Ocupados</option>
<option value="Timor Leste">Timor Leste</option>
<option value="Togo">Togo</option>
 <option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunísia">Tunísia</option>
<option value="Turcomenistão">Turcomenistão</option>
<option value="Turquia">Turquia</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Ucrânia">Ucrânia</option>
<option value="Uganda">Uganda</option>
<option value="Uruguai">Uruguai</option>
<option value="Uzbequistão">Uzbequistão</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vaticano">Vaticano</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnã">Vietnã</option>
<option value="Zâmbia">Zâmbia</option>
<option value="Zimbábue">Zimbábue</option>
</select></p></li>
                    </ul>
            </div>
        </div>

        <div class="tab-body" data-item="tabProfissional" style="display: none;">
            <div class="listInforma">
                    <ul>
                        <li><p class="textop1">escolaridade:</p> <p class="textop2"><input placeholder="Digite sua escolaridade" class="input" type="text" name="profis_escolaridade" maxlength="20"></p></li>
                        <li><p class="textop1">escola (ensino médio):</p> <p class="textop2"><input placeholder="escola (ensino médio)" class="input" type="text" name="profis_ensinomedio" maxlength="20"></p></li>
                        <li><p class="textop1">faculdade:</p> <p class="textop2"><input placeholder="faculdade" class="input" type="text" name="profis_faculdade" maxlength="20"></p></li>
                        <li><p class="textop1">curso:</p> <p class="textop2"><input placeholder="curso" class="input" type="text" name="profis_curso" maxlength="20"></p></li>
                        <li><p class="textop1">diploma:</p> <p class="textop2"><input placeholder="diploma" class="input" type="text" name="profis_diploma" maxlength="20"></p></li>
                        <li><p class="textop1">ano:</p> <p class="textop2"><input placeholder="ano" class="input" type="number" name="profis_ano" maxlength="4"></p></li>
                        <li><p class="textop1">profissão:</p> <p class="textop2"><input placeholder="profissão" class="input" type="text" name="profis_profissao" maxlength="20"></p></li>
                        <li><p class="textop1">setor:</p> <p class="textop2"><input placeholder="setor" class="input" type="text" name="profis_setor" maxlength="20"></p></li>
                        <li><p class="textop1">empresa/organização:</p> <p class="textop2"><input placeholder="empresa/organização" class="input" type="text" name="profis_empresa" maxlength="20"></p></li>
                    </ul>
            </div>
        </div>

        <div class="tab-body" data-item="tabPessoal" style="display: none;">
            <div class="listInforma">
                    <ul>
                        <li><p class="textop1">título:</p> <p class="textop2"><input placeholder="título" class="input" type="text" name="pessoal_titulo" maxlength="20"></p></li>
                        <li><p class="textop1">o que mais chama atenção em mim:</p> <p class="textop2"><input placeholder="o que mais chama atenção em mim" class="input" type="text" name="pessoal_atencao" maxlength="20"></p></li>
                        <li><p class="textop1">altura:</p> <p class="textop2"><input placeholder="altura" class="input" type="text" name="pessoal_altura" maxlength="20"></p></li>
                        <li><p class="textop1">cor dos olhos:</p> <p class="textop2"><input placeholder="cor dos olhos" class="input" type="text" name="pessoal_olhos" maxlength="20"></p></li>
                        <li><p class="textop1">cor do cabelo:</p> <p class="textop2"><input placeholder="cor do cabelo" class="input" type="text" name="pessoal_cabelo" maxlength="20"></p></li>
                        <li><p class="textop1">tipo físico:</p> <p class="textop2"><textarea id="pessoal_fisico" name="pessoal_fisico" maxlength="100">tipo físico</textarea></p></li>
                        <li><p class="textop1">arte no corpo:</p> <p class="textop2"><textarea id="pessoal_corpo" name="pessoal_corpo" maxlength="100">arte no corpo</textarea></p></li>
                        <li><p class="textop1">aparencia:</p> <p class="textop2"><textarea id="pessoal_aparencia" name="pessoal_aparencia" maxlength="100">aparencia</textarea></p></li>
                        <li><p class="textop1">do que mais gosto em mim:</p> <p class="textop2"><textarea id="pessoal_gostoemmim" name="pessoal_gostoemmim" maxlength="100">do que mais gosto em mim</textarea></p></li>
                    </ul>
            </div>
        </div>

        <input class="btn-orkut-2" type="submit" value="Atualizar">
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