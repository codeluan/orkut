<?=$render('header', ['loggedUser'=>$loggedUser]);?>

<?=$render('comunidade_sidebar', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>

<section class="coluna-7">
	<section class="feed mt-10">
		<div class="row">
			<div class="column">
                <div class="profile-page">
                    <div class="p-10">
                        <h3 class="hidden-xs">Edit Community <?=$comunidades->nome;?></h3>
                            <ul class="breadcrumb hidden-xs">
                            <li><a href="<?=$base;?>/">Home</a></li>
                            <li><a href="<?=$base;?>/">Community</a></li>
                            <li><a href="<?=$base;?>/comunidade/uid=<?=$comunidades->id;?>"><?=$comunidades->nome;?></a></li>
                            <li>Edit</li>
                            </ul>
                    </div>
	
	
	
	<form method="POST" enctype="multipart/form-data" action="<?=$base;?>/comunidade/editar">
        <?php if(!empty($flash)): ?>
            <?php echo $flash; ?>
        <?php endif; ?>

                <div class="listInforma2 m-10-button">
					<ul>
                        <li><p class="textop1">Community:</p> <p class="textop2"> <?=$comunidades->nome;?></p></li>
                        <li><p class="textop1">Owner:</p> <p class="textop2"> <?=$loggedUser->name;?></p></li>
                        <li><p class="textop1">Cover:</p> <p class="textop2"> <input class="btn-eo" type="file" name="avatar" /></p></li>
						<li><p class="textop1">Name:</p> <p class="textop2"> <input value="<?=$comunidades->nome;?>" class="btn-eo" type="text" name="nome" /></p></li>
						<li><p class="textop1">Description:</p> <p class="textop2"><textarea class="btn-eo" name="descricao" maxlength="500"><?=$comunidades->descricao;?></textarea></p></li>
                        <li><p class="textop1">City:</p> <p class="textop2"> <input value="<?=$comunidades->cidade;?>" class="btn-eo" type="text" name="cidade" /></p></li>
                        <li><p class="textop1">State:</p> <p class="textop2"> <input value="<?=$comunidades->estado;?>" class="btn-eo" type="text" name="estado" /></p></li>
                        <li><p class="textop1">Zip code:</p> <p class="textop2"> <input value="<?=$comunidades->cep;?>" class="btn-eo" type="text" name="cep" maxlength="9" pattern="\d{5}-\d{3}" /></p></li>
                        <li><p class="textop1">country:</p> <p class="textop2"><select class="btn-eo" name="pais">
<option value="Afeganistão" <?=($comunidades->pais=='Afeganistão')?'selected':'';?>>Afeganistão</option>
<option value="África do Sul" <?=($comunidades->pais=='África do Sul')?'selected':'';?>>África do Sul</option>
<option value="Albânia" <?=($comunidades->pais=='Albânia')?'selected':'';?>>Albânia</option>
<option value="Alemanha" <?=($comunidades->pais=='Alemanha')?'selected':'';?>>Alemanha</option>
<option value="Andorra" <?=($comunidades->pais=='Andorra')?'selected':'';?>>Andorra</option>
<option value="Angola" <?=($comunidades->pais=='Angola')?'selected':'';?>>Angola</option>
<option value="Anguilla" <?=($comunidades->pais=='Anguilla')?'selected':'';?>>Anguilla</option>
<option value="Antártida" <?=($comunidades->pais=='Antártida')?'selected':'';?>>Antártida</option>
<option value="Antígua e Barbuda" <?=($comunidades->pais=='Antígua e Barbuda')?'selected':'';?>>Antígua e Barbuda</option>
<option value="Antilhas Holandesas" <?=($comunidades->pais=='Antilhas Holandesas')?'selected':'';?>>Antilhas Holandesas</option>
<option value="Arábia Saudita" <?=($comunidades->pais=='Arábia Saudita')?'selected':'';?>>Arábia Saudita</option>
<option value="Argélia" <?=($comunidades->pais=='Argélia')?'selected':'';?>>Argélia</option>
<option value="Argentina" <?=($comunidades->pais=='Argentina')?'selected':'';?>>Argentina</option>
<option value="Armênia" <?=($comunidades->pais=='Armênia')?'selected':'';?>>Armênia</option>
<option value="Aruba" <?=($comunidades->pais=='Aruba')?'selected':'';?>>Aruba</option>
<option value="Austrália" <?=($comunidades->pais=='Austrália')?'selected':'';?>>Austrália</option>
<option value="Áustria" <?=($comunidades->pais=='Áustria')?'selected':'';?>>Áustria</option>
<option value="Azerbaijão" <?=($comunidades->pais=='Azerbaijão')?'selected':'';?>>Azerbaijão</option>
<option value="Bahamas" <?=($comunidades->pais=='Bahamas')?'selected':'';?>>Bahamas</option>
<option value="Bahrein" <?=($comunidades->pais=='Bahrein')?'selected':'';?>>Bahrein</option>
<option value="Bangladesh" <?=($comunidades->pais=='Bangladesh')?'selected':'';?>>Bangladesh</option>
<option value="Barbados" <?=($comunidades->pais=='Barbados')?'selected':'';?>>Barbados</option>
<option value="Belarus" <?=($comunidades->pais=='Belarus')?'selected':'';?>>Belarus</option>
<option value="Bélgica" <?=($comunidades->pais=='Bélgica')?'selected':'';?>>Bélgica</option>
<option value="Belize" <?=($comunidades->pais=='Belize')?'selected':'';?>>Belize</option>
<option value="Benin" <?=($comunidades->pais=='Benin')?'selected':'';?>>Benin</option>
<option value="Bermudas" <?=($comunidades->pais=='Bermudas')?'selected':'';?>>Bermudas</option>
<option value="Bolívia" <?=($comunidades->pais=='Bolívia')?'selected':'';?>>Bolívia</option>
<option value="Bósnia-Herzegóvina" <?=($comunidades->pais=='Bósnia-Herzegóvina')?'selected':'';?>>Bósnia-Herzegóvina</option>
<option value="Botsuana" <?=($comunidades->pais=='Botsuana')?'selected':'';?>>Botsuana</option>
<option value="Brasil" <?=($comunidades->pais=='Brasil')?'selected':'';?>>Brasil</option>
<option value="Brunei" <?=($comunidades->pais=='Brunei')?'selected':'';?>>Brunei</option>
<option value="Bulgária" <?=($comunidades->pais=='Bulgária')?'selected':'';?>>Bulgária</option>
<option value="Burkina Fasso" <?=($comunidades->pais=='Burkina Fasso')?'selected':'';?>>Burkina Fasso</option>
<option value="Burundi" <?=($comunidades->pais=='Burundi')?'selected':'';?>>Burundi</option>
 <option value="Butão" <?=($comunidades->pais=='Butão')?'selected':'';?>>Butão</option>
<option value="Cabo Verde" <?=($comunidades->pais=='Cabo Verde')?'selected':'';?>>Cabo Verde</option>
<option value="Camarões" <?=($comunidades->pais=='Camarões')?'selected':'';?>>Camarões</option>
<option value="Camboja" <?=($comunidades->pais=='Camboja')?'selected':'';?>>Camboja</option>
<option value="Canadá" <?=($comunidades->pais=='Canadá')?'selected':'';?>>Canadá</option>
<option value="Cazaquistão" <?=($comunidades->pais=='Cazaquistão')?'selected':'';?>>Cazaquistão</option>
<option value="Chade" <?=($comunidades->pais=='Chade')?'selected':'';?>>Chade</option>
<option value="Chile" <?=($comunidades->pais=='Chile')?'selected':'';?>>Chile</option>
<option value="China" <?=($comunidades->pais=='China')?'selected':'';?>>China</option>
<option value="Chipre" <?=($comunidades->pais=='Chipre')?'selected':'';?>>Chipre</option>
<option value="Cingapura" <?=($comunidades->pais=='Cingapura')?'selected':'';?>>Cingapura</option>
<option value="Colômbia" <?=($comunidades->pais=='Colômbia')?'selected':'';?>>Colômbia</option>
<option value="Congo" <?=($comunidades->pais=='Congo')?'selected':'';?>>Congo</option>
<option value="Coréia do Norte" <?=($comunidades->pais=='Coréia do Norte')?'selected':'';?>>Coréia do Norte</option>
<option value="Coréia do Sul" <?=($comunidades->pais=='Coréia do Sul')?'selected':'';?>>Coréia do Sul</option>
<option value="Costa do Marfim" <?=($comunidades->pais=='Costa do Marfim')?'selected':'';?>>Costa do Marfim</option>
<option value="Costa Rica" <?=($comunidades->pais=='Costa Rica')?'selected':'';?>>Costa Rica</option>
<option value="Croácia (Hrvatska)" <?=($comunidades->pais=='Croácia (Hrvatska)')?'selected':'';?>>Croácia (Hrvatska)</option>
<option value="Cuba" <?=($comunidades->pais=='Cuba')?'selected':'';?>>Cuba</option>
<option value="Dinamarca" <?=($comunidades->pais=='Dinamarca')?'selected':'';?>>Dinamarca</option>
<option value="Djibuti" <?=($comunidades->pais=='Djibuti')?'selected':'';?>>Djibuti</option>
<option value="Dominica" <?=($comunidades->pais=='Dominica')?'selected':'';?>>Dominica</option>
<option value="Egito" <?=($comunidades->pais=='Egito')?'selected':'';?>>Egito</option>
<option value="El Salvador" <?=($comunidades->pais=='El Salvador')?'selected':'';?>>El Salvador</option>
<option value="Emirados Árabes Unidos" <?=($comunidades->pais=='Emirados Árabes Unidos')?'selected':'';?>>Emirados Árabes Unidos</option>
<option value="Equador" <?=($comunidades->pais=='Equador')?'selected':'';?>>Equador</option>
<option value="Eritréia" <?=($comunidades->pais=='Eritréia')?'selected':'';?>>Eritréia</option>
<option value="Eslováquia" <?=($comunidades->pais=='Eslováquia')?'selected':'';?>>Eslováquia</option>
<option value="Eslovênia" <?=($comunidades->pais=='Eslovênia')?'selected':'';?>>Eslovênia</option>
<option value="Espanha" <?=($comunidades->pais=='Espanha')?'selected':'';?>>Espanha</option>
<option value="Estados Unidos" <?=($comunidades->pais=='Estados Unidos')?'selected':'';?>>Estados Unidos</option>
<option value="Estônia" <?=($comunidades->pais=='Estônia')?'selected':'';?>>Estônia</option>
<option value="Etiópia" <?=($comunidades->pais=='Etiópia')?'selected':'';?>>Etiópia</option>
<option value="Fiji" <?=($comunidades->pais=='Fiji')?'selected':'';?>>Fiji</option>
<option value="Filipinas" <?=($comunidades->pais=='Filipinas')?'selected':'';?>>Filipinas</option>
<option value="Finlândia" <?=($comunidades->pais=='Finlândia')?'selected':'';?>>Finlândia</option>
<option value="França" <?=($comunidades->pais=='França')?'selected':'';?>>França</option>
<option value="Gabão" <?=($comunidades->pais=='Gabão')?'selected':'';?>>Gabão</option>
<option value="Gâmbia" <?=($comunidades->pais=='Gâmbia')?'selected':'';?>>Gâmbia</option>
<option value="Gana" <?=($comunidades->pais=='Gana')?'selected':'';?>>Gana</option>
<option value="Geórgia" <?=($comunidades->pais=='Geórgia')?'selected':'';?>>Geórgia</option>
<option value="Gibraltar" <?=($comunidades->pais=='Gibraltar')?'selected':'';?>>Gibraltar</option>
<option value="Grã-Bretanha (Reino Unido, UK)" <?=($comunidades->pais=='Grã-Bretanha (Reino Unido, UK)')?'selected':'';?>>Grã-Bretanha (Reino Unido, UK)</option>
<option value="Granada" <?=($comunidades->pais=='Granada')?'selected':'';?>>Granada</option>
<option value="Grécia" <?=($comunidades->pais=='Grécia')?'selected':'';?>>Grécia</option>
<option value="Groelândia" <?=($comunidades->pais=='Groelândia')?'selected':'';?>>Groelândia</option>
<option value="Guadalupe" <?=($comunidades->pais=='Guadalupe')?'selected':'';?>>Guadalupe</option>
<option value="Guam (Território dos Estados Unidos)" <?=($comunidades->pais=='Guam (Território dos Estados Unidos)')?'selected':'';?>>Guam (Território dos Estados Unidos)</option>
<option value="Guatemala" <?=($comunidades->pais=='Guatemala')?'selected':'';?>>Guatemala</option>
<option value="Guernsey" <?=($comunidades->pais=='Guernsey')?'selected':'';?>>Guernsey</option>
 <option value="Guiana" <?=($comunidades->pais=='Guiana')?'selected':'';?>>Guiana</option>
<option value="Guiana Francesa" <?=($comunidades->pais=='Guiana Francesa')?'selected':'';?>>Guiana Francesa</option>
<option value="Guiné" <?=($comunidades->pais=='Guiné')?'selected':'';?>>Guiné</option>
<option value="Guiné Equatorial" <?=($comunidades->pais=='Guiné Equatorial')?'selected':'';?>>Guiné Equatorial</option>
<option value="Guiné-Bissau" <?=($comunidades->pais=='Guiné-Bissau')?'selected':'';?>>Guiné-Bissau</option>
<option value="Haiti" <?=($comunidades->pais=='Haiti')?'selected':'';?>>Haiti</option>
<option value="Holanda" <?=($comunidades->pais=='Holanda')?'selected':'';?>>Holanda</option>
<option value="Honduras" <?=($comunidades->pais=='Honduras')?'selected':'';?>>Honduras</option>
<option value="Hong Kong" <?=($comunidades->pais=='Hong Kong')?'selected':'';?>>Hong Kong</option>
<option value="Hungria" <?=($comunidades->pais=='Hungria')?'selected':'';?>>Hungria</option>
<option value="Iêmen" <?=($comunidades->pais=='Iêmen')?'selected':'';?>>Iêmen</option>
<option value="Ilha Bouvet (Território da Noruega)" <?=($comunidades->pais=='Ilha Bouvet (Território da Noruega)')?'selected':'';?>>Ilha Bouvet (Território da Noruega)</option>
<option value="Ilha do Homem" <?=($comunidades->pais=='Ilha do Homem')?'selected':'';?>>Ilha do Homem</option>
<option value="Ilha Natal" <?=($comunidades->pais=='Ilha Natal')?'selected':'';?>>Ilha Natal</option>
<option value="Ilha Pitcairn" <?=($comunidades->pais=='Ilha Pitcairn')?'selected':'';?>>Ilha Pitcairn</option>
<option value="Ilha Reunião" <?=($comunidades->pais=='Ilha Reunião')?'selected':'';?>>Ilha Reunião</option>
<option value="Ilhas Aland" <?=($comunidades->pais=='Ilhas Aland')?'selected':'';?>>Ilhas Aland</option>
<option value="Ilhas Cayman" <?=($comunidades->pais=='Ilhas Cayman')?'selected':'';?>>Ilhas Cayman</option>
<option value="Ilhas Cocos" <?=($comunidades->pais=='Ilhas Cocos')?'selected':'';?>>Ilhas Cocos</option>
<option value="Ilhas Comores" <?=($comunidades->pais=='Ilhas Comores')?'selected':'';?>>Ilhas Comores</option>
<option value="Ilhas Cook" <?=($comunidades->pais=='Ilhas Cook')?'selected':'';?>>Ilhas Cook</option>
<option value="Ilhas Faroes" <?=($comunidades->pais=='Ilhas Faroes')?'selected':'';?>>Ilhas Faroes</option>
<option value="Ilhas Falkland (Malvinas)" <?=($comunidades->pais=='Ilhas Falkland (Malvinas)')?'selected':'';?>>Ilhas Falkland (Malvinas)</option>
<option value="Ilhas Geórgia do Sul e Sandwich do Sul" <?=($comunidades->pais=='Ilhas Geórgia do Sul e Sandwich do Sul')?'selected':'';?>>Ilhas Geórgia do Sul e Sandwich do Sul</option>
 <option value="Ilhas Heard e McDonald (Território da Austrália)" <?=($comunidades->pais=='Ilhas Heard e McDonald (Território da Austrália)')?'selected':'';?>>Ilhas Heard e McDonald (Território da Austrália)</option>
<option value="Ilhas Marianas do Norte" <?=($comunidades->pais=='Ilhas Marianas do Norte')?'selected':'';?>>Ilhas Marianas do Norte</option>
<option value="Ilhas Marshall" <?=($comunidades->pais=='Ilhas Marshall')?'selected':'';?>>Ilhas Marshall</option>
<option value="Ilhas Menores dos Estados Unidos" <?=($comunidades->pais=='Ilhas Menores dos Estados Unidos')?'selected':'';?>>Ilhas Menores dos Estados Unidos</option>
<option value="Ilhas Norfolk" <?=($comunidades->pais=='Ilhas Norfolk')?'selected':'';?>>Ilhas Norfolk</option>
<option value="Ilhas Seychelles" <?=($comunidades->pais=='Ilhas Seychelles')?'selected':'';?>>Ilhas Seychelles</option>
<option value="Ilhas Solomão" <?=($comunidades->pais=='Ilhas Solomão')?'selected':'';?>>Ilhas Solomão</option>
<option value="Ilhas Svalbard e Jan Mayen" <?=($comunidades->pais=='Ilhas Svalbard e Jan Mayen')?'selected':'';?>>Ilhas Svalbard e Jan Mayen</option>
<option value="Ilhas Tokelau" <?=($comunidades->pais=='Ilhas Tokelau')?'selected':'';?>>Ilhas Tokelau</option>
<option value="Ilhas Turks e Caicos" <?=($comunidades->pais=='Ilhas Turks e Caicos')?'selected':'';?>>Ilhas Turks e Caicos</option>
<option value="Ilhas Virgens (Estados Unidos)" <?=($comunidades->pais=='Ilhas Virgens (Estados Unidos)')?'selected':'';?>>Ilhas Virgens (Estados Unidos)</option>
<option value="Ilhas Virgens (Inglaterra)" <?=($comunidades->pais=='Ilhas Virgens (Inglaterra)')?'selected':'';?>>Ilhas Virgens (Inglaterra)</option>
<option value="Ilhas Wallis e Futuna" <?=($comunidades->pais=='Ilhas Wallis e Futuna')?'selected':'';?>>Ilhas Wallis e Futuna</option>
<option value="índia" <?=($comunidades->pais=='Índia')?'selected':'';?>>Índia</option>
<option value="Indonésia" <?=($comunidades->pais=='Indonésia')?'selected':'';?>>Indonésia</option>
<option value="Irã" <?=($comunidades->pais=='Irã')?'selected':'';?>>Irã</option>
<option value="Iraque" <?=($comunidades->pais=='Iraque')?'selected':'';?>>Iraque</option>
<option value="Irlanda" <?=($comunidades->pais=='Irlanda')?'selected':'';?>>Irlanda</option>
<option value="Islândia" <?=($comunidades->pais=='Islândia')?'selected':'';?>>Islândia</option>
<option value="Israel" <?=($comunidades->pais=='Israel')?'selected':'';?>>Israel</option>
<option value="Itália" <?=($comunidades->pais=='Itália')?'selected':'';?>>Itália</option>
<option value="Jamaica" <?=($comunidades->pais=='Jamaica')?'selected':'';?>>Jamaica</option>
<option value="Japão" <?=($comunidades->pais=='Japão')?'selected':'';?>>Japão</option>
<option value="Jersey" <?=($comunidades->pais=='Jersey')?'selected':'';?>>Jersey</option>
<option value="Jordânia" <?=($comunidades->pais=='Jordânia')?'selected':'';?>>Jordânia</option>
<option value="Kênia" <?=($comunidades->pais=='Kênia')?'selected':'';?>>Kênia</option>
<option value="Kiribati" <?=($comunidades->pais=='Kiribati')?'selected':'';?>>Kiribati</option>
<option value="Kuait" <?=($comunidades->pais=='Kuait')?'selected':'';?>>Kuait</option>
<option value="Laos" <?=($comunidades->pais=='Laos')?'selected':'';?>>Laos</option>
<option value="Látvia" <?=($comunidades->pais=='Látvia')?'selected':'';?>>Látvia</option>
<option value="Lesoto" <?=($comunidades->pais=='Lesoto')?'selected':'';?>>Lesoto</option>
<option value="Líbano" <?=($comunidades->pais=='Líbano')?'selected':'';?>>Líbano</option>
<option value="Libéria" <?=($comunidades->pais=='Libéria')?'selected':'';?>>Libéria</option>
<option value="Líbia" <?=($comunidades->pais=='Líbia')?'selected':'';?>>Líbia</option>
<option value="Liechtenstein" <?=($comunidades->pais=='Liechtenstein')?'selected':'';?>>Liechtenstein</option>
<option value="Lituânia" <?=($comunidades->pais=='Lituânia')?'selected':'';?>>Lituânia</option>
<option value="Luxemburgo" <?=($comunidades->pais=='Luxemburgo')?'selected':'';?>>Luxemburgo</option>
<option value="Macau" <?=($comunidades->pais=='Macau')?'selected':'';?>>Macau</option>
<option value="Macedônia (República Yugoslava)" <?=($comunidades->pais=='Macedônia (República Yugoslava)')?'selected':'';?>>Macedônia (República Yugoslava)</option>
<option value="Madagascar" <?=($comunidades->pais=='Madagascar')?'selected':'';?>>Madagascar</option>
<option value="Malásia" <?=($comunidades->pais=='Malásia')?'selected':'';?>>Malásia</option>
<option value="Malaui" <?=($comunidades->pais=='Malaui')?'selected':'';?>>Malaui</option>
<option value="Maldivas" <?=($comunidades->pais=='Maldivas')?'selected':'';?>>Maldivas</option>
<option value="Mali" <?=($comunidades->pais=='Mali')?'selected':'';?>>Mali</option>
<option value="Malta" <?=($comunidades->pais=='Malta')?'selected':'';?>>Malta</option>
<option value="Marrocos" <?=($comunidades->pais=='Marrocos')?'selected':'';?>>Marrocos</option>
<option value="Martinica" <?=($comunidades->pais=='Martinica')?'selected':'';?>>Martinica</option>
<option value="Maurício" <?=($comunidades->pais=='Maurício')?'selected':'';?>>Maurício</option>
<option value="Mauritânia" <?=($comunidades->pais=='Mauritânia')?'selected':'';?>>Mauritânia</option>
<option value="Mayotte" <?=($comunidades->pais=='Mayotte')?'selected':'';?>>Mayotte</option>
<option value="México" <?=($comunidades->pais=='México')?'selected':'';?>>México</option>
<option value="Micronésia" <?=($comunidades->pais=='Micronésia')?'selected':'';?>>Micronésia</option>
<option value="Moçambique" <?=($comunidades->pais=='Moçambique')?'selected':'';?>>Moçambique</option>
<option value="Moldova" <?=($comunidades->pais=='Moldova')?'selected':'';?>>Moldova</option>
<option value="Mônaco" <?=($comunidades->pais=='Mônaco')?'selected':'';?>>Mônaco</option>
<option value="Mongólia" <?=($comunidades->pais=='Mongólia')?'selected':'';?>>Mongólia</option>
<option value="Montenegro" <?=($comunidades->pais=='Montenegro')?'selected':'';?>>Montenegro</option>
<option value="Montserrat" <?=($comunidades->pais=='Montserrat')?'selected':'';?>>Montserrat</option>
<option value="Myanma" <?=($comunidades->pais=='Myanma')?'selected':'';?>>Myanma</option>
<option value="Namíbia" <?=($comunidades->pais=='Namíbia')?'selected':'';?>>Namíbia</option>
<option value="Nauru" <?=($comunidades->pais=='Nauru')?'selected':'';?>>Nauru</option>
<option value="Nepal" <?=($comunidades->pais=='Nepal')?'selected':'';?>>Nepal</option>
<option value="Nicarágua" <?=($comunidades->pais=='Nicarágua')?'selected':'';?>>Nicarágua</option>
<option value="Níger" <?=($comunidades->pais=='Níger')?'selected':'';?>>Níger</option>
<option value="Nigéria" <?=($comunidades->pais=='Nigéria')?'selected':'';?>>Nigéria</option>
<option value="Niue" <?=($comunidades->pais=='Niue')?'selected':'';?>>Niue</option>
<option value="Noruega" <?=($comunidades->pais=='Noruega')?'selected':'';?>>Noruega</option>
<option value="Nova Caledônia" <?=($comunidades->pais=='Nova Caledônia')?'selected':'';?>>Nova Caledônia</option>
<option value="Nova Zelândia" <?=($comunidades->pais=='Nova Zelândia')?'selected':'';?>>Nova Zelândia</option>
<option value="Omã" <?=($comunidades->pais=='Omã')?'selected':'';?>>Omã</option>
<option value="Palau" <?=($comunidades->pais=='Palau')?'selected':'';?>>Palau</option>
<option value="Panamá" <?=($comunidades->pais=='Panamá')?'selected':'';?>>Panamá</option>
<option value="Papua-Nova Guiné" <?=($comunidades->pais=='Papua-Nova Guiné')?'selected':'';?>>Papua-Nova Guiné</option>
<option value="Paquistão" <?=($comunidades->pais=='Paquistão')?'selected':'';?>>Paquistão</option>
<option value="Paraguai" <?=($comunidades->pais=='Paraguai')?'selected':'';?>>Paraguai</option>
<option value="Peru" <?=($comunidades->pais=='Peru')?'selected':'';?>>Peru</option>
<option value="Polinésia Francesa" <?=($comunidades->pais=='Polinésia Francesa')?'selected':'';?>>Polinésia Francesa</option>
<option value="Polônia" <?=($comunidades->pais=='Polônia')?'selected':'';?>>Polônia</option>
<option value="Porto Rico" <?=($comunidades->pais=='Porto Rico')?'selected':'';?>>Porto Rico</option>
<option value="Portugal" <?=($comunidades->pais=='Portugal')?'selected':'';?>>Portugal</option>
<option value="Qatar" <?=($comunidades->pais=='Qatar')?'selected':'';?>>Qatar</option>
<option value="Quirguistão" <?=($comunidades->pais=='Quirguistão')?'selected':'';?>>Quirguistão</option>
<option value="República Centro-Africana" <?=($comunidades->pais=='República Centro-Africana')?'selected':'';?>>República Centro-Africana</option>
<option value="República Democrática do Congo" <?=($comunidades->pais=='República Democrática do Congo')?'selected':'';?>>República Democrática do Congo</option>
<option value="República Dominicana" <?=($comunidades->pais=='República Dominicana')?'selected':'';?>>República Dominicana</option>
<option value="República Tcheca" <?=($comunidades->pais=='República Tcheca')?'selected':'';?>>República Tcheca</option>
<option value="Romênia" <?=($comunidades->pais=='Romênia')?'selected':'';?>>Romênia</option>
<option value="Ruanda" <?=($comunidades->pais=='Ruanda')?'selected':'';?>>Ruanda</option>
<option value="Rússia (antiga URSS) - Federação Russa" <?=($comunidades->pais=='Rússia (antiga URSS) - Federação Russa')?'selected':'';?>>Rússia (antiga URSS) - Federação Russa</option>
<option value="Saara Ocidental" <?=($comunidades->pais=='Saara Ocidental')?'selected':'';?>>Saara Ocidental</option>
<option value="Saint Vincente e Granadinas" <?=($comunidades->pais=='Saint Vincente e Granadinas')?'selected':'';?>>Saint Vincente e Granadinas</option>
<option value="Samoa Americana" <?=($comunidades->pais=='Samoa Americana')?'selected':'';?>>Samoa Americana</option>
<option value="Samoa Ocidental" <?=($comunidades->pais=='Samoa Ocidental')?'selected':'';?>>Samoa Ocidental</option>
<option value="San Marino" <?=($comunidades->pais=='San Marino')?'selected':'';?>>San Marino</option>
<option value="Santa Helena" <?=($comunidades->pais=='Santa Helena')?'selected':'';?>>Santa Helena</option>
<option value="Santa Lúcia" <?=($comunidades->pais=='Santa Lúcia')?'selected':'';?>>Santa Lúcia</option>
<option value="São Bartolomeu" <?=($comunidades->pais=='São Bartolomeu')?'selected':'';?>>São Bartolomeu</option>
<option value="São Cristóvão e Névis" <?=($comunidades->pais=='São Cristóvão e Névis')?'selected':'';?>>São Cristóvão e Névis</option>
<option value="São Martim" <?=($comunidades->pais=='São Martim')?'selected':'';?>>São Martim</option>
<option value="São Tomé e Príncipe" <?=($comunidades->pais=='São Tomé e Príncipe')?'selected':'';?>>São Tomé e Príncipe</option>
<option value="Senegal" <?=($comunidades->pais=='Senegal')?'selected':'';?>>Senegal</option>
<option value="Serra Leoa" <?=($comunidades->pais=='Serra Leoa')?'selected':'';?>>Serra Leoa</option>
<option value="Sérvia" <?=($comunidades->pais=='Sérvia')?'selected':'';?>>Sérvia</option>
<option value="Síria" <?=($comunidades->pais=='Síria')?'selected':'';?>>Síria</option>
<option value="Somália" <?=($comunidades->pais=='Somália')?'selected':'';?>>Somália</option>
<option value="Sri Lanka" <?=($comunidades->pais=='Sri Lanka')?'selected':'';?>>Sri Lanka</option>
<option value="St. Pierre and Miquelon" <?=($comunidades->pais=='St. Pierre and Miquelon')?'selected':'';?>>St. Pierre and Miquelon</option>
<option value="Suazilândia" <?=($comunidades->pais=='Suazilândia')?'selected':'';?>>Suazilândia</option>
<option value="Sudão" <?=($comunidades->pais=='Sudão')?'selected':'';?>>Sudão</option>
<option value="Suécia" <?=($comunidades->pais=='Suécia')?'selected':'';?>>Suécia</option>
<option value="Suíça" <?=($comunidades->pais=='Suíça')?'selected':'';?>>Suíça</option>
<option value="Suriname" <?=($comunidades->pais=='Suriname')?'selected':'';?>>Suriname</option>
<option value="Tadjiquistão" <?=($comunidades->pais=='Tadjiquistão')?'selected':'';?>>Tadjiquistão</option>
<option value="Tailândia" <?=($comunidades->pais=='Tailândia')?'selected':'';?>>Tailândia</option>
<option value="Taiwan" <?=($comunidades->pais=='Taiwan')?'selected':'';?>>Taiwan</option>
<option value="Tanzânia" <?=($comunidades->pais=='Tanzânia')?'selected':'';?>>Tanzânia</option>
<option value="Território Britânico do Oceano índico" <?=($comunidades->pais=='Território Britânico do Oceano índico')?'selected':'';?>>Território Britânico do Oceano índico</option>
<option value="Territórios do Sul da França" <?=($comunidades->pais=='Territórios do Sul da França')?'selected':'';?>>Territórios do Sul da França</option>
<option value="Territórios Palestinos Ocupados" <?=($comunidades->pais=='Territórios Palestinos Ocupados')?'selected':'';?>>Territórios Palestinos Ocupados</option>
<option value="Timor Leste" <?=($comunidades->pais=='Timor Leste')?'selected':'';?>>Timor Leste</option>
<option value="Togo" <?=($comunidades->pais=='Togo')?'selected':'';?>>Togo</option>
<option value="Tonga" <?=($comunidades->pais=='Tonga')?'selected':'';?>>Tonga</option>
<option value="Trinidad and Tobago" <?=($comunidades->pais=='Trinidad and Tobago')?'selected':'';?>>Trinidad and Tobago</option>
<option value="Tunísia" <?=($comunidades->pais=='Tunísia')?'selected':'';?>>Tunísia</option>
<option value="Turcomenistão" <?=($comunidades->pais=='Turcomenistão')?'selected':'';?>>Turcomenistão</option>
<option value="Turquia" <?=($comunidades->pais=='Turquia')?'selected':'';?>>Turquia</option>
<option value="Tuvalu" <?=($comunidades->pais=='Tuvalu')?'selected':'';?>>Tuvalu</option>
<option value="Ucrânia" <?=($comunidades->pais=='Ucrânia')?'selected':'';?>>Ucrânia</option>
<option value="Uganda" <?=($comunidades->pais=='Uganda')?'selected':'';?>>Uganda</option>
<option value="Uruguai" <?=($comunidades->pais=='Uruguai')?'selected':'';?>>Uruguai</option>
<option value="Uzbequistão" <?=($comunidades->pais=='Uzbequistão')?'selected':'';?>>Uzbequistão</option>
<option value="Vanuatu" <?=($comunidades->pais=='Vanuatu')?'selected':'';?>>Vanuatu</option>
<option value="Vaticano" <?=($comunidades->pais=='Vaticano')?'selected':'';?>>Vaticano</option>
<option value="Venezuela" <?=($comunidades->pais=='Venezuela')?'selected':'';?>>Venezuela</option>
<option value="Vietnã" <?=($comunidades->pais=='Vietnã')?'selected':'';?>>Vietnã</option>
<option value="Zâmbia" <?=($comunidades->pais=='Zâmbia')?'selected':'';?>>Zâmbia</option>
<option value="Zimbábue" <?=($comunidades->pais=='Zimbábue')?'selected':'';?>>Zimbábue</option>
</select></p></li>
                        <li><p class="textop1">Language:</p> <p class="textop2"><select class="btn-eo" name="idioma">
                            <option value="0" <?=($comunidades->idioma=='0')?'selected':'';?>>Indefinido</option>
                            <option value="1" <?=($comunidades->idioma=='1')?'selected':'';?>>Arabic</option>
                            <option value="2" <?=($comunidades->idioma=='2')?'selected':'';?>>Bengali</option>
                            <option value="3" <?=($comunidades->idioma=='3')?'selected':'';?>>Chinese</option>
                            <option value="4" <?=($comunidades->idioma=='4')?'selected':'';?>>English</option>
                            <option value="5" <?=($comunidades->idioma=='5')?'selected':'';?>>Hindi</option>
                            <option value="6" <?=($comunidades->idioma=='6')?'selected':'';?>>Indonesian</option>
                            <option value="7" <?=($comunidades->idioma=='7')?'selected':'';?>>Japanese</option>
                            <option value="8" <?=($comunidades->idioma=='8')?'selected':'';?>>Lahnda</option>
                            <option value="9" <?=($comunidades->idioma=='9')?'selected':'';?>>Mandarin</option>
                            <option value="10" <?=($comunidades->idioma=='10')?'selected':'';?>>Portuguese</option>
                            <option value="11" <?=($comunidades->idioma=='11')?'selected':'';?>>Russian</option>
                            <option value="12" <?=($comunidades->idioma=='12')?'selected':'';?>>Spanish</option>
                            </select></p>
                        </li><li><p class="textop1">Category:</p> <p class="textop2"><select class="btn-eo" name="categoria">
                            <option value="0" <?=($comunidades->categoria=='0')?'selected':'';?>>Outros</option>
                            <option value="1" <?=($comunidades->categoria=='1')?'selected':'';?>>Alunos e Escolas</option>
                            <option value="2" <?=($comunidades->categoria=='2')?'selected':'';?>>Animais: de estimação ou não</option>
                            <option value="3" <?=($comunidades->categoria=='3')?'selected':'';?>>Artes e Entretenimento</option>
                            <option value="4" <?=($comunidades->categoria=='4')?'selected':'';?>>Atividades</option>
                            <option value="5" <?=($comunidades->categoria=='5')?'selected':'';?>>Automotivo</option>
                            <option value="6" <?=($comunidades->categoria=='6')?'selected':'';?>>Cidades e Bairros</option>
                            <option value="7" <?=($comunidades->categoria=='7')?'selected':'';?>>Computadores e Internet</option>
                            <option value="8" <?=($comunidades->categoria=='8')?'selected':'';?>>Culinária, Bebidas e Vinhos</option>
                            <option value="9" <?=($comunidades->categoria=='9')?'selected':'';?>>Culturas e Comunidade</option>
                            <option value="10" <?=($comunidades->categoria=='10')?'selected':'';?>>Empresa</option>
                            <option value="11" <?=($comunidades->categoria=='11')?'selected':'';?>>Escolas e Cursos</option>
                            <option value="12" <?=($comunidades->categoria=='12')?'selected':'';?>>Esportes e Lazer</option>
                            <option value="13" <?=($comunidades->categoria=='13')?'selected':'';?>>Família e Lar</option>
                            <option value="14" <?=($comunidades->categoria=='14')?'selected':'';?>>Gays, Lésbicas e Bi</option>
                            <option value="15" <?=($comunidades->categoria=='15')?'selected':'';?>>Governo e Política</option>
                            <option value="16" <?=($comunidades->categoria=='16')?'selected':'';?>>História e Ciências</option>
                            <option value="17" <?=($comunidades->categoria=='17')?'selected':'';?>>Hobbies e Trabalhos Manuais</option>
                            <option value="18" <?=($comunidades->categoria=='18')?'selected':'';?>>Jogos</option>
                            <option value="19" <?=($comunidades->categoria=='19')?'selected':'';?>>Moda e Beleza</option>
                            <option value="20" <?=($comunidades->categoria=='20')?'selected':'';?>>Música</option>
                            <option value="21" <?=($comunidades->categoria=='21')?'selected':'';?>>Negócios</option>
                            <option value="22" <?=($comunidades->categoria=='22')?'selected':'';?>>Países e Regiões</option>
                            <option value="23" <?=($comunidades->categoria=='23')?'selected':'';?>>Pessoas</option>
                            <option value="24" <?=($comunidades->categoria=='24')?'selected':'';?>>Religiões e Crenças</option>
                            <option value="25" <?=($comunidades->categoria=='25')?'selected':'';?>>Romances e Relacionamentos</option>
                            <option value="26" <?=($comunidades->categoria=='26')?'selected':'';?>>Saúde, Bem-estar e Fitness</option>
                            <option value="27" <?=($comunidades->categoria=='27')?'selected':'';?>>Viagens</option>
                            </select></p>
                        </li>
                        <li><p class="textop1">Type:</p> <p class="textop2"><label>
                        <input type="radio" maxlength="1" class="btn-eo" name="tipo" value="0" <?=($comunidades->tipo=='0')?'checked':'';?>> pública - qualquer pessoa pode participar</label><br>
                        <input type="radio" maxlength="1" class="btn-eo" name="tipo" value="1" <?=($comunidades->tipo=='1')?'checked':'';?>> moderada - o mediador precisa aprovar pedidos de participação</label></p></li>
                        <li><p class="textop1">Content Privacy:</p> <p class="textop2"><label>
                        <input type="radio" maxlength="1" class="btn-eo" name="privacidade" value="0" <?=($comunidades->privacidade=='0')?'checked':'';?>> aberta - qualquer pessoa pode visualizar o conteúdo da comunidade</label><br>
                        <input type="radio" maxlength="1" class="btn-eo" name="privacidade" value="1" <?=($comunidades->privacidade=='1')?'checked':'';?>> oculta - apenas membros podem visualizar o conteúdo da comunidade</label></p>
                        </li>
                        <li><center><input class="btn-eo" type="submit" value="Atualizar" /></center></li>
                        <input type="hidden" name="comunidade" value="<?=$comunidades->id;?>" />
                        <input type="hidden" name="avatarantigo" value="<?=$comunidades->avatar;?>" />
					</ul>
				</div>

        </form>

                        
</div>

	



			</div>					
		</div>						
	</section>
</section>				
<?=$render('comunidade_sidebar_membros', ['activeMenu'=>'Perfil','loggedUser'=>$loggedUser, 'comunidades'=>$comunidades, 'comunidadeisFollowing'=>$comunidadeisFollowing]);?>   
<?=$render('footer');?>