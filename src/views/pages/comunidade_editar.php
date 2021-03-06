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
<option value="Afeganist??o" <?=($comunidades->pais=='Afeganist??o')?'selected':'';?>>Afeganist??o</option>
<option value="??frica do Sul" <?=($comunidades->pais=='??frica do Sul')?'selected':'';?>>??frica do Sul</option>
<option value="Alb??nia" <?=($comunidades->pais=='Alb??nia')?'selected':'';?>>Alb??nia</option>
<option value="Alemanha" <?=($comunidades->pais=='Alemanha')?'selected':'';?>>Alemanha</option>
<option value="Andorra" <?=($comunidades->pais=='Andorra')?'selected':'';?>>Andorra</option>
<option value="Angola" <?=($comunidades->pais=='Angola')?'selected':'';?>>Angola</option>
<option value="Anguilla" <?=($comunidades->pais=='Anguilla')?'selected':'';?>>Anguilla</option>
<option value="Ant??rtida" <?=($comunidades->pais=='Ant??rtida')?'selected':'';?>>Ant??rtida</option>
<option value="Ant??gua e Barbuda" <?=($comunidades->pais=='Ant??gua e Barbuda')?'selected':'';?>>Ant??gua e Barbuda</option>
<option value="Antilhas Holandesas" <?=($comunidades->pais=='Antilhas Holandesas')?'selected':'';?>>Antilhas Holandesas</option>
<option value="Ar??bia Saudita" <?=($comunidades->pais=='Ar??bia Saudita')?'selected':'';?>>Ar??bia Saudita</option>
<option value="Arg??lia" <?=($comunidades->pais=='Arg??lia')?'selected':'';?>>Arg??lia</option>
<option value="Argentina" <?=($comunidades->pais=='Argentina')?'selected':'';?>>Argentina</option>
<option value="Arm??nia" <?=($comunidades->pais=='Arm??nia')?'selected':'';?>>Arm??nia</option>
<option value="Aruba" <?=($comunidades->pais=='Aruba')?'selected':'';?>>Aruba</option>
<option value="Austr??lia" <?=($comunidades->pais=='Austr??lia')?'selected':'';?>>Austr??lia</option>
<option value="??ustria" <?=($comunidades->pais=='??ustria')?'selected':'';?>>??ustria</option>
<option value="Azerbaij??o" <?=($comunidades->pais=='Azerbaij??o')?'selected':'';?>>Azerbaij??o</option>
<option value="Bahamas" <?=($comunidades->pais=='Bahamas')?'selected':'';?>>Bahamas</option>
<option value="Bahrein" <?=($comunidades->pais=='Bahrein')?'selected':'';?>>Bahrein</option>
<option value="Bangladesh" <?=($comunidades->pais=='Bangladesh')?'selected':'';?>>Bangladesh</option>
<option value="Barbados" <?=($comunidades->pais=='Barbados')?'selected':'';?>>Barbados</option>
<option value="Belarus" <?=($comunidades->pais=='Belarus')?'selected':'';?>>Belarus</option>
<option value="B??lgica" <?=($comunidades->pais=='B??lgica')?'selected':'';?>>B??lgica</option>
<option value="Belize" <?=($comunidades->pais=='Belize')?'selected':'';?>>Belize</option>
<option value="Benin" <?=($comunidades->pais=='Benin')?'selected':'';?>>Benin</option>
<option value="Bermudas" <?=($comunidades->pais=='Bermudas')?'selected':'';?>>Bermudas</option>
<option value="Bol??via" <?=($comunidades->pais=='Bol??via')?'selected':'';?>>Bol??via</option>
<option value="B??snia-Herzeg??vina" <?=($comunidades->pais=='B??snia-Herzeg??vina')?'selected':'';?>>B??snia-Herzeg??vina</option>
<option value="Botsuana" <?=($comunidades->pais=='Botsuana')?'selected':'';?>>Botsuana</option>
<option value="Brasil" <?=($comunidades->pais=='Brasil')?'selected':'';?>>Brasil</option>
<option value="Brunei" <?=($comunidades->pais=='Brunei')?'selected':'';?>>Brunei</option>
<option value="Bulg??ria" <?=($comunidades->pais=='Bulg??ria')?'selected':'';?>>Bulg??ria</option>
<option value="Burkina Fasso" <?=($comunidades->pais=='Burkina Fasso')?'selected':'';?>>Burkina Fasso</option>
<option value="Burundi" <?=($comunidades->pais=='Burundi')?'selected':'';?>>Burundi</option>
 <option value="But??o" <?=($comunidades->pais=='But??o')?'selected':'';?>>But??o</option>
<option value="Cabo Verde" <?=($comunidades->pais=='Cabo Verde')?'selected':'';?>>Cabo Verde</option>
<option value="Camar??es" <?=($comunidades->pais=='Camar??es')?'selected':'';?>>Camar??es</option>
<option value="Camboja" <?=($comunidades->pais=='Camboja')?'selected':'';?>>Camboja</option>
<option value="Canad??" <?=($comunidades->pais=='Canad??')?'selected':'';?>>Canad??</option>
<option value="Cazaquist??o" <?=($comunidades->pais=='Cazaquist??o')?'selected':'';?>>Cazaquist??o</option>
<option value="Chade" <?=($comunidades->pais=='Chade')?'selected':'';?>>Chade</option>
<option value="Chile" <?=($comunidades->pais=='Chile')?'selected':'';?>>Chile</option>
<option value="China" <?=($comunidades->pais=='China')?'selected':'';?>>China</option>
<option value="Chipre" <?=($comunidades->pais=='Chipre')?'selected':'';?>>Chipre</option>
<option value="Cingapura" <?=($comunidades->pais=='Cingapura')?'selected':'';?>>Cingapura</option>
<option value="Col??mbia" <?=($comunidades->pais=='Col??mbia')?'selected':'';?>>Col??mbia</option>
<option value="Congo" <?=($comunidades->pais=='Congo')?'selected':'';?>>Congo</option>
<option value="Cor??ia do Norte" <?=($comunidades->pais=='Cor??ia do Norte')?'selected':'';?>>Cor??ia do Norte</option>
<option value="Cor??ia do Sul" <?=($comunidades->pais=='Cor??ia do Sul')?'selected':'';?>>Cor??ia do Sul</option>
<option value="Costa do Marfim" <?=($comunidades->pais=='Costa do Marfim')?'selected':'';?>>Costa do Marfim</option>
<option value="Costa Rica" <?=($comunidades->pais=='Costa Rica')?'selected':'';?>>Costa Rica</option>
<option value="Cro??cia (Hrvatska)" <?=($comunidades->pais=='Cro??cia (Hrvatska)')?'selected':'';?>>Cro??cia (Hrvatska)</option>
<option value="Cuba" <?=($comunidades->pais=='Cuba')?'selected':'';?>>Cuba</option>
<option value="Dinamarca" <?=($comunidades->pais=='Dinamarca')?'selected':'';?>>Dinamarca</option>
<option value="Djibuti" <?=($comunidades->pais=='Djibuti')?'selected':'';?>>Djibuti</option>
<option value="Dominica" <?=($comunidades->pais=='Dominica')?'selected':'';?>>Dominica</option>
<option value="Egito" <?=($comunidades->pais=='Egito')?'selected':'';?>>Egito</option>
<option value="El Salvador" <?=($comunidades->pais=='El Salvador')?'selected':'';?>>El Salvador</option>
<option value="Emirados ??rabes Unidos" <?=($comunidades->pais=='Emirados ??rabes Unidos')?'selected':'';?>>Emirados ??rabes Unidos</option>
<option value="Equador" <?=($comunidades->pais=='Equador')?'selected':'';?>>Equador</option>
<option value="Eritr??ia" <?=($comunidades->pais=='Eritr??ia')?'selected':'';?>>Eritr??ia</option>
<option value="Eslov??quia" <?=($comunidades->pais=='Eslov??quia')?'selected':'';?>>Eslov??quia</option>
<option value="Eslov??nia" <?=($comunidades->pais=='Eslov??nia')?'selected':'';?>>Eslov??nia</option>
<option value="Espanha" <?=($comunidades->pais=='Espanha')?'selected':'';?>>Espanha</option>
<option value="Estados Unidos" <?=($comunidades->pais=='Estados Unidos')?'selected':'';?>>Estados Unidos</option>
<option value="Est??nia" <?=($comunidades->pais=='Est??nia')?'selected':'';?>>Est??nia</option>
<option value="Eti??pia" <?=($comunidades->pais=='Eti??pia')?'selected':'';?>>Eti??pia</option>
<option value="Fiji" <?=($comunidades->pais=='Fiji')?'selected':'';?>>Fiji</option>
<option value="Filipinas" <?=($comunidades->pais=='Filipinas')?'selected':'';?>>Filipinas</option>
<option value="Finl??ndia" <?=($comunidades->pais=='Finl??ndia')?'selected':'';?>>Finl??ndia</option>
<option value="Fran??a" <?=($comunidades->pais=='Fran??a')?'selected':'';?>>Fran??a</option>
<option value="Gab??o" <?=($comunidades->pais=='Gab??o')?'selected':'';?>>Gab??o</option>
<option value="G??mbia" <?=($comunidades->pais=='G??mbia')?'selected':'';?>>G??mbia</option>
<option value="Gana" <?=($comunidades->pais=='Gana')?'selected':'';?>>Gana</option>
<option value="Ge??rgia" <?=($comunidades->pais=='Ge??rgia')?'selected':'';?>>Ge??rgia</option>
<option value="Gibraltar" <?=($comunidades->pais=='Gibraltar')?'selected':'';?>>Gibraltar</option>
<option value="Gr??-Bretanha (Reino Unido, UK)" <?=($comunidades->pais=='Gr??-Bretanha (Reino Unido, UK)')?'selected':'';?>>Gr??-Bretanha (Reino Unido, UK)</option>
<option value="Granada" <?=($comunidades->pais=='Granada')?'selected':'';?>>Granada</option>
<option value="Gr??cia" <?=($comunidades->pais=='Gr??cia')?'selected':'';?>>Gr??cia</option>
<option value="Groel??ndia" <?=($comunidades->pais=='Groel??ndia')?'selected':'';?>>Groel??ndia</option>
<option value="Guadalupe" <?=($comunidades->pais=='Guadalupe')?'selected':'';?>>Guadalupe</option>
<option value="Guam (Territ??rio dos Estados Unidos)" <?=($comunidades->pais=='Guam (Territ??rio dos Estados Unidos)')?'selected':'';?>>Guam (Territ??rio dos Estados Unidos)</option>
<option value="Guatemala" <?=($comunidades->pais=='Guatemala')?'selected':'';?>>Guatemala</option>
<option value="Guernsey" <?=($comunidades->pais=='Guernsey')?'selected':'';?>>Guernsey</option>
 <option value="Guiana" <?=($comunidades->pais=='Guiana')?'selected':'';?>>Guiana</option>
<option value="Guiana Francesa" <?=($comunidades->pais=='Guiana Francesa')?'selected':'';?>>Guiana Francesa</option>
<option value="Guin??" <?=($comunidades->pais=='Guin??')?'selected':'';?>>Guin??</option>
<option value="Guin?? Equatorial" <?=($comunidades->pais=='Guin?? Equatorial')?'selected':'';?>>Guin?? Equatorial</option>
<option value="Guin??-Bissau" <?=($comunidades->pais=='Guin??-Bissau')?'selected':'';?>>Guin??-Bissau</option>
<option value="Haiti" <?=($comunidades->pais=='Haiti')?'selected':'';?>>Haiti</option>
<option value="Holanda" <?=($comunidades->pais=='Holanda')?'selected':'';?>>Holanda</option>
<option value="Honduras" <?=($comunidades->pais=='Honduras')?'selected':'';?>>Honduras</option>
<option value="Hong Kong" <?=($comunidades->pais=='Hong Kong')?'selected':'';?>>Hong Kong</option>
<option value="Hungria" <?=($comunidades->pais=='Hungria')?'selected':'';?>>Hungria</option>
<option value="I??men" <?=($comunidades->pais=='I??men')?'selected':'';?>>I??men</option>
<option value="Ilha Bouvet (Territ??rio da Noruega)" <?=($comunidades->pais=='Ilha Bouvet (Territ??rio da Noruega)')?'selected':'';?>>Ilha Bouvet (Territ??rio da Noruega)</option>
<option value="Ilha do Homem" <?=($comunidades->pais=='Ilha do Homem')?'selected':'';?>>Ilha do Homem</option>
<option value="Ilha Natal" <?=($comunidades->pais=='Ilha Natal')?'selected':'';?>>Ilha Natal</option>
<option value="Ilha Pitcairn" <?=($comunidades->pais=='Ilha Pitcairn')?'selected':'';?>>Ilha Pitcairn</option>
<option value="Ilha Reuni??o" <?=($comunidades->pais=='Ilha Reuni??o')?'selected':'';?>>Ilha Reuni??o</option>
<option value="Ilhas Aland" <?=($comunidades->pais=='Ilhas Aland')?'selected':'';?>>Ilhas Aland</option>
<option value="Ilhas Cayman" <?=($comunidades->pais=='Ilhas Cayman')?'selected':'';?>>Ilhas Cayman</option>
<option value="Ilhas Cocos" <?=($comunidades->pais=='Ilhas Cocos')?'selected':'';?>>Ilhas Cocos</option>
<option value="Ilhas Comores" <?=($comunidades->pais=='Ilhas Comores')?'selected':'';?>>Ilhas Comores</option>
<option value="Ilhas Cook" <?=($comunidades->pais=='Ilhas Cook')?'selected':'';?>>Ilhas Cook</option>
<option value="Ilhas Faroes" <?=($comunidades->pais=='Ilhas Faroes')?'selected':'';?>>Ilhas Faroes</option>
<option value="Ilhas Falkland (Malvinas)" <?=($comunidades->pais=='Ilhas Falkland (Malvinas)')?'selected':'';?>>Ilhas Falkland (Malvinas)</option>
<option value="Ilhas Ge??rgia do Sul e Sandwich do Sul" <?=($comunidades->pais=='Ilhas Ge??rgia do Sul e Sandwich do Sul')?'selected':'';?>>Ilhas Ge??rgia do Sul e Sandwich do Sul</option>
 <option value="Ilhas Heard e McDonald (Territ??rio da Austr??lia)" <?=($comunidades->pais=='Ilhas Heard e McDonald (Territ??rio da Austr??lia)')?'selected':'';?>>Ilhas Heard e McDonald (Territ??rio da Austr??lia)</option>
<option value="Ilhas Marianas do Norte" <?=($comunidades->pais=='Ilhas Marianas do Norte')?'selected':'';?>>Ilhas Marianas do Norte</option>
<option value="Ilhas Marshall" <?=($comunidades->pais=='Ilhas Marshall')?'selected':'';?>>Ilhas Marshall</option>
<option value="Ilhas Menores dos Estados Unidos" <?=($comunidades->pais=='Ilhas Menores dos Estados Unidos')?'selected':'';?>>Ilhas Menores dos Estados Unidos</option>
<option value="Ilhas Norfolk" <?=($comunidades->pais=='Ilhas Norfolk')?'selected':'';?>>Ilhas Norfolk</option>
<option value="Ilhas Seychelles" <?=($comunidades->pais=='Ilhas Seychelles')?'selected':'';?>>Ilhas Seychelles</option>
<option value="Ilhas Solom??o" <?=($comunidades->pais=='Ilhas Solom??o')?'selected':'';?>>Ilhas Solom??o</option>
<option value="Ilhas Svalbard e Jan Mayen" <?=($comunidades->pais=='Ilhas Svalbard e Jan Mayen')?'selected':'';?>>Ilhas Svalbard e Jan Mayen</option>
<option value="Ilhas Tokelau" <?=($comunidades->pais=='Ilhas Tokelau')?'selected':'';?>>Ilhas Tokelau</option>
<option value="Ilhas Turks e Caicos" <?=($comunidades->pais=='Ilhas Turks e Caicos')?'selected':'';?>>Ilhas Turks e Caicos</option>
<option value="Ilhas Virgens (Estados Unidos)" <?=($comunidades->pais=='Ilhas Virgens (Estados Unidos)')?'selected':'';?>>Ilhas Virgens (Estados Unidos)</option>
<option value="Ilhas Virgens (Inglaterra)" <?=($comunidades->pais=='Ilhas Virgens (Inglaterra)')?'selected':'';?>>Ilhas Virgens (Inglaterra)</option>
<option value="Ilhas Wallis e Futuna" <?=($comunidades->pais=='Ilhas Wallis e Futuna')?'selected':'';?>>Ilhas Wallis e Futuna</option>
<option value="??ndia" <?=($comunidades->pais=='??ndia')?'selected':'';?>>??ndia</option>
<option value="Indon??sia" <?=($comunidades->pais=='Indon??sia')?'selected':'';?>>Indon??sia</option>
<option value="Ir??" <?=($comunidades->pais=='Ir??')?'selected':'';?>>Ir??</option>
<option value="Iraque" <?=($comunidades->pais=='Iraque')?'selected':'';?>>Iraque</option>
<option value="Irlanda" <?=($comunidades->pais=='Irlanda')?'selected':'';?>>Irlanda</option>
<option value="Isl??ndia" <?=($comunidades->pais=='Isl??ndia')?'selected':'';?>>Isl??ndia</option>
<option value="Israel" <?=($comunidades->pais=='Israel')?'selected':'';?>>Israel</option>
<option value="It??lia" <?=($comunidades->pais=='It??lia')?'selected':'';?>>It??lia</option>
<option value="Jamaica" <?=($comunidades->pais=='Jamaica')?'selected':'';?>>Jamaica</option>
<option value="Jap??o" <?=($comunidades->pais=='Jap??o')?'selected':'';?>>Jap??o</option>
<option value="Jersey" <?=($comunidades->pais=='Jersey')?'selected':'';?>>Jersey</option>
<option value="Jord??nia" <?=($comunidades->pais=='Jord??nia')?'selected':'';?>>Jord??nia</option>
<option value="K??nia" <?=($comunidades->pais=='K??nia')?'selected':'';?>>K??nia</option>
<option value="Kiribati" <?=($comunidades->pais=='Kiribati')?'selected':'';?>>Kiribati</option>
<option value="Kuait" <?=($comunidades->pais=='Kuait')?'selected':'';?>>Kuait</option>
<option value="Laos" <?=($comunidades->pais=='Laos')?'selected':'';?>>Laos</option>
<option value="L??tvia" <?=($comunidades->pais=='L??tvia')?'selected':'';?>>L??tvia</option>
<option value="Lesoto" <?=($comunidades->pais=='Lesoto')?'selected':'';?>>Lesoto</option>
<option value="L??bano" <?=($comunidades->pais=='L??bano')?'selected':'';?>>L??bano</option>
<option value="Lib??ria" <?=($comunidades->pais=='Lib??ria')?'selected':'';?>>Lib??ria</option>
<option value="L??bia" <?=($comunidades->pais=='L??bia')?'selected':'';?>>L??bia</option>
<option value="Liechtenstein" <?=($comunidades->pais=='Liechtenstein')?'selected':'';?>>Liechtenstein</option>
<option value="Litu??nia" <?=($comunidades->pais=='Litu??nia')?'selected':'';?>>Litu??nia</option>
<option value="Luxemburgo" <?=($comunidades->pais=='Luxemburgo')?'selected':'';?>>Luxemburgo</option>
<option value="Macau" <?=($comunidades->pais=='Macau')?'selected':'';?>>Macau</option>
<option value="Maced??nia (Rep??blica Yugoslava)" <?=($comunidades->pais=='Maced??nia (Rep??blica Yugoslava)')?'selected':'';?>>Maced??nia (Rep??blica Yugoslava)</option>
<option value="Madagascar" <?=($comunidades->pais=='Madagascar')?'selected':'';?>>Madagascar</option>
<option value="Mal??sia" <?=($comunidades->pais=='Mal??sia')?'selected':'';?>>Mal??sia</option>
<option value="Malaui" <?=($comunidades->pais=='Malaui')?'selected':'';?>>Malaui</option>
<option value="Maldivas" <?=($comunidades->pais=='Maldivas')?'selected':'';?>>Maldivas</option>
<option value="Mali" <?=($comunidades->pais=='Mali')?'selected':'';?>>Mali</option>
<option value="Malta" <?=($comunidades->pais=='Malta')?'selected':'';?>>Malta</option>
<option value="Marrocos" <?=($comunidades->pais=='Marrocos')?'selected':'';?>>Marrocos</option>
<option value="Martinica" <?=($comunidades->pais=='Martinica')?'selected':'';?>>Martinica</option>
<option value="Maur??cio" <?=($comunidades->pais=='Maur??cio')?'selected':'';?>>Maur??cio</option>
<option value="Maurit??nia" <?=($comunidades->pais=='Maurit??nia')?'selected':'';?>>Maurit??nia</option>
<option value="Mayotte" <?=($comunidades->pais=='Mayotte')?'selected':'';?>>Mayotte</option>
<option value="M??xico" <?=($comunidades->pais=='M??xico')?'selected':'';?>>M??xico</option>
<option value="Micron??sia" <?=($comunidades->pais=='Micron??sia')?'selected':'';?>>Micron??sia</option>
<option value="Mo??ambique" <?=($comunidades->pais=='Mo??ambique')?'selected':'';?>>Mo??ambique</option>
<option value="Moldova" <?=($comunidades->pais=='Moldova')?'selected':'';?>>Moldova</option>
<option value="M??naco" <?=($comunidades->pais=='M??naco')?'selected':'';?>>M??naco</option>
<option value="Mong??lia" <?=($comunidades->pais=='Mong??lia')?'selected':'';?>>Mong??lia</option>
<option value="Montenegro" <?=($comunidades->pais=='Montenegro')?'selected':'';?>>Montenegro</option>
<option value="Montserrat" <?=($comunidades->pais=='Montserrat')?'selected':'';?>>Montserrat</option>
<option value="Myanma" <?=($comunidades->pais=='Myanma')?'selected':'';?>>Myanma</option>
<option value="Nam??bia" <?=($comunidades->pais=='Nam??bia')?'selected':'';?>>Nam??bia</option>
<option value="Nauru" <?=($comunidades->pais=='Nauru')?'selected':'';?>>Nauru</option>
<option value="Nepal" <?=($comunidades->pais=='Nepal')?'selected':'';?>>Nepal</option>
<option value="Nicar??gua" <?=($comunidades->pais=='Nicar??gua')?'selected':'';?>>Nicar??gua</option>
<option value="N??ger" <?=($comunidades->pais=='N??ger')?'selected':'';?>>N??ger</option>
<option value="Nig??ria" <?=($comunidades->pais=='Nig??ria')?'selected':'';?>>Nig??ria</option>
<option value="Niue" <?=($comunidades->pais=='Niue')?'selected':'';?>>Niue</option>
<option value="Noruega" <?=($comunidades->pais=='Noruega')?'selected':'';?>>Noruega</option>
<option value="Nova Caled??nia" <?=($comunidades->pais=='Nova Caled??nia')?'selected':'';?>>Nova Caled??nia</option>
<option value="Nova Zel??ndia" <?=($comunidades->pais=='Nova Zel??ndia')?'selected':'';?>>Nova Zel??ndia</option>
<option value="Om??" <?=($comunidades->pais=='Om??')?'selected':'';?>>Om??</option>
<option value="Palau" <?=($comunidades->pais=='Palau')?'selected':'';?>>Palau</option>
<option value="Panam??" <?=($comunidades->pais=='Panam??')?'selected':'';?>>Panam??</option>
<option value="Papua-Nova Guin??" <?=($comunidades->pais=='Papua-Nova Guin??')?'selected':'';?>>Papua-Nova Guin??</option>
<option value="Paquist??o" <?=($comunidades->pais=='Paquist??o')?'selected':'';?>>Paquist??o</option>
<option value="Paraguai" <?=($comunidades->pais=='Paraguai')?'selected':'';?>>Paraguai</option>
<option value="Peru" <?=($comunidades->pais=='Peru')?'selected':'';?>>Peru</option>
<option value="Polin??sia Francesa" <?=($comunidades->pais=='Polin??sia Francesa')?'selected':'';?>>Polin??sia Francesa</option>
<option value="Pol??nia" <?=($comunidades->pais=='Pol??nia')?'selected':'';?>>Pol??nia</option>
<option value="Porto Rico" <?=($comunidades->pais=='Porto Rico')?'selected':'';?>>Porto Rico</option>
<option value="Portugal" <?=($comunidades->pais=='Portugal')?'selected':'';?>>Portugal</option>
<option value="Qatar" <?=($comunidades->pais=='Qatar')?'selected':'';?>>Qatar</option>
<option value="Quirguist??o" <?=($comunidades->pais=='Quirguist??o')?'selected':'';?>>Quirguist??o</option>
<option value="Rep??blica Centro-Africana" <?=($comunidades->pais=='Rep??blica Centro-Africana')?'selected':'';?>>Rep??blica Centro-Africana</option>
<option value="Rep??blica Democr??tica do Congo" <?=($comunidades->pais=='Rep??blica Democr??tica do Congo')?'selected':'';?>>Rep??blica Democr??tica do Congo</option>
<option value="Rep??blica Dominicana" <?=($comunidades->pais=='Rep??blica Dominicana')?'selected':'';?>>Rep??blica Dominicana</option>
<option value="Rep??blica Tcheca" <?=($comunidades->pais=='Rep??blica Tcheca')?'selected':'';?>>Rep??blica Tcheca</option>
<option value="Rom??nia" <?=($comunidades->pais=='Rom??nia')?'selected':'';?>>Rom??nia</option>
<option value="Ruanda" <?=($comunidades->pais=='Ruanda')?'selected':'';?>>Ruanda</option>
<option value="R??ssia (antiga URSS) - Federa????o Russa" <?=($comunidades->pais=='R??ssia (antiga URSS) - Federa????o Russa')?'selected':'';?>>R??ssia (antiga URSS) - Federa????o Russa</option>
<option value="Saara Ocidental" <?=($comunidades->pais=='Saara Ocidental')?'selected':'';?>>Saara Ocidental</option>
<option value="Saint Vincente e Granadinas" <?=($comunidades->pais=='Saint Vincente e Granadinas')?'selected':'';?>>Saint Vincente e Granadinas</option>
<option value="Samoa Americana" <?=($comunidades->pais=='Samoa Americana')?'selected':'';?>>Samoa Americana</option>
<option value="Samoa Ocidental" <?=($comunidades->pais=='Samoa Ocidental')?'selected':'';?>>Samoa Ocidental</option>
<option value="San Marino" <?=($comunidades->pais=='San Marino')?'selected':'';?>>San Marino</option>
<option value="Santa Helena" <?=($comunidades->pais=='Santa Helena')?'selected':'';?>>Santa Helena</option>
<option value="Santa L??cia" <?=($comunidades->pais=='Santa L??cia')?'selected':'';?>>Santa L??cia</option>
<option value="S??o Bartolomeu" <?=($comunidades->pais=='S??o Bartolomeu')?'selected':'';?>>S??o Bartolomeu</option>
<option value="S??o Crist??v??o e N??vis" <?=($comunidades->pais=='S??o Crist??v??o e N??vis')?'selected':'';?>>S??o Crist??v??o e N??vis</option>
<option value="S??o Martim" <?=($comunidades->pais=='S??o Martim')?'selected':'';?>>S??o Martim</option>
<option value="S??o Tom?? e Pr??ncipe" <?=($comunidades->pais=='S??o Tom?? e Pr??ncipe')?'selected':'';?>>S??o Tom?? e Pr??ncipe</option>
<option value="Senegal" <?=($comunidades->pais=='Senegal')?'selected':'';?>>Senegal</option>
<option value="Serra Leoa" <?=($comunidades->pais=='Serra Leoa')?'selected':'';?>>Serra Leoa</option>
<option value="S??rvia" <?=($comunidades->pais=='S??rvia')?'selected':'';?>>S??rvia</option>
<option value="S??ria" <?=($comunidades->pais=='S??ria')?'selected':'';?>>S??ria</option>
<option value="Som??lia" <?=($comunidades->pais=='Som??lia')?'selected':'';?>>Som??lia</option>
<option value="Sri Lanka" <?=($comunidades->pais=='Sri Lanka')?'selected':'';?>>Sri Lanka</option>
<option value="St. Pierre and Miquelon" <?=($comunidades->pais=='St. Pierre and Miquelon')?'selected':'';?>>St. Pierre and Miquelon</option>
<option value="Suazil??ndia" <?=($comunidades->pais=='Suazil??ndia')?'selected':'';?>>Suazil??ndia</option>
<option value="Sud??o" <?=($comunidades->pais=='Sud??o')?'selected':'';?>>Sud??o</option>
<option value="Su??cia" <?=($comunidades->pais=='Su??cia')?'selected':'';?>>Su??cia</option>
<option value="Su????a" <?=($comunidades->pais=='Su????a')?'selected':'';?>>Su????a</option>
<option value="Suriname" <?=($comunidades->pais=='Suriname')?'selected':'';?>>Suriname</option>
<option value="Tadjiquist??o" <?=($comunidades->pais=='Tadjiquist??o')?'selected':'';?>>Tadjiquist??o</option>
<option value="Tail??ndia" <?=($comunidades->pais=='Tail??ndia')?'selected':'';?>>Tail??ndia</option>
<option value="Taiwan" <?=($comunidades->pais=='Taiwan')?'selected':'';?>>Taiwan</option>
<option value="Tanz??nia" <?=($comunidades->pais=='Tanz??nia')?'selected':'';?>>Tanz??nia</option>
<option value="Territ??rio Brit??nico do Oceano ??ndico" <?=($comunidades->pais=='Territ??rio Brit??nico do Oceano ??ndico')?'selected':'';?>>Territ??rio Brit??nico do Oceano ??ndico</option>
<option value="Territ??rios do Sul da Fran??a" <?=($comunidades->pais=='Territ??rios do Sul da Fran??a')?'selected':'';?>>Territ??rios do Sul da Fran??a</option>
<option value="Territ??rios Palestinos Ocupados" <?=($comunidades->pais=='Territ??rios Palestinos Ocupados')?'selected':'';?>>Territ??rios Palestinos Ocupados</option>
<option value="Timor Leste" <?=($comunidades->pais=='Timor Leste')?'selected':'';?>>Timor Leste</option>
<option value="Togo" <?=($comunidades->pais=='Togo')?'selected':'';?>>Togo</option>
<option value="Tonga" <?=($comunidades->pais=='Tonga')?'selected':'';?>>Tonga</option>
<option value="Trinidad and Tobago" <?=($comunidades->pais=='Trinidad and Tobago')?'selected':'';?>>Trinidad and Tobago</option>
<option value="Tun??sia" <?=($comunidades->pais=='Tun??sia')?'selected':'';?>>Tun??sia</option>
<option value="Turcomenist??o" <?=($comunidades->pais=='Turcomenist??o')?'selected':'';?>>Turcomenist??o</option>
<option value="Turquia" <?=($comunidades->pais=='Turquia')?'selected':'';?>>Turquia</option>
<option value="Tuvalu" <?=($comunidades->pais=='Tuvalu')?'selected':'';?>>Tuvalu</option>
<option value="Ucr??nia" <?=($comunidades->pais=='Ucr??nia')?'selected':'';?>>Ucr??nia</option>
<option value="Uganda" <?=($comunidades->pais=='Uganda')?'selected':'';?>>Uganda</option>
<option value="Uruguai" <?=($comunidades->pais=='Uruguai')?'selected':'';?>>Uruguai</option>
<option value="Uzbequist??o" <?=($comunidades->pais=='Uzbequist??o')?'selected':'';?>>Uzbequist??o</option>
<option value="Vanuatu" <?=($comunidades->pais=='Vanuatu')?'selected':'';?>>Vanuatu</option>
<option value="Vaticano" <?=($comunidades->pais=='Vaticano')?'selected':'';?>>Vaticano</option>
<option value="Venezuela" <?=($comunidades->pais=='Venezuela')?'selected':'';?>>Venezuela</option>
<option value="Vietn??" <?=($comunidades->pais=='Vietn??')?'selected':'';?>>Vietn??</option>
<option value="Z??mbia" <?=($comunidades->pais=='Z??mbia')?'selected':'';?>>Z??mbia</option>
<option value="Zimb??bue" <?=($comunidades->pais=='Zimb??bue')?'selected':'';?>>Zimb??bue</option>
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
                            <option value="2" <?=($comunidades->categoria=='2')?'selected':'';?>>Animais: de estima????o ou n??o</option>
                            <option value="3" <?=($comunidades->categoria=='3')?'selected':'';?>>Artes e Entretenimento</option>
                            <option value="4" <?=($comunidades->categoria=='4')?'selected':'';?>>Atividades</option>
                            <option value="5" <?=($comunidades->categoria=='5')?'selected':'';?>>Automotivo</option>
                            <option value="6" <?=($comunidades->categoria=='6')?'selected':'';?>>Cidades e Bairros</option>
                            <option value="7" <?=($comunidades->categoria=='7')?'selected':'';?>>Computadores e Internet</option>
                            <option value="8" <?=($comunidades->categoria=='8')?'selected':'';?>>Culin??ria, Bebidas e Vinhos</option>
                            <option value="9" <?=($comunidades->categoria=='9')?'selected':'';?>>Culturas e Comunidade</option>
                            <option value="10" <?=($comunidades->categoria=='10')?'selected':'';?>>Empresa</option>
                            <option value="11" <?=($comunidades->categoria=='11')?'selected':'';?>>Escolas e Cursos</option>
                            <option value="12" <?=($comunidades->categoria=='12')?'selected':'';?>>Esportes e Lazer</option>
                            <option value="13" <?=($comunidades->categoria=='13')?'selected':'';?>>Fam??lia e Lar</option>
                            <option value="14" <?=($comunidades->categoria=='14')?'selected':'';?>>Gays, L??sbicas e Bi</option>
                            <option value="15" <?=($comunidades->categoria=='15')?'selected':'';?>>Governo e Pol??tica</option>
                            <option value="16" <?=($comunidades->categoria=='16')?'selected':'';?>>Hist??ria e Ci??ncias</option>
                            <option value="17" <?=($comunidades->categoria=='17')?'selected':'';?>>Hobbies e Trabalhos Manuais</option>
                            <option value="18" <?=($comunidades->categoria=='18')?'selected':'';?>>Jogos</option>
                            <option value="19" <?=($comunidades->categoria=='19')?'selected':'';?>>Moda e Beleza</option>
                            <option value="20" <?=($comunidades->categoria=='20')?'selected':'';?>>M??sica</option>
                            <option value="21" <?=($comunidades->categoria=='21')?'selected':'';?>>Neg??cios</option>
                            <option value="22" <?=($comunidades->categoria=='22')?'selected':'';?>>Pa??ses e Regi??es</option>
                            <option value="23" <?=($comunidades->categoria=='23')?'selected':'';?>>Pessoas</option>
                            <option value="24" <?=($comunidades->categoria=='24')?'selected':'';?>>Religi??es e Cren??as</option>
                            <option value="25" <?=($comunidades->categoria=='25')?'selected':'';?>>Romances e Relacionamentos</option>
                            <option value="26" <?=($comunidades->categoria=='26')?'selected':'';?>>Sa??de, Bem-estar e Fitness</option>
                            <option value="27" <?=($comunidades->categoria=='27')?'selected':'';?>>Viagens</option>
                            </select></p>
                        </li>
                        <li><p class="textop1">Type:</p> <p class="textop2"><label>
                        <input type="radio" maxlength="1" class="btn-eo" name="tipo" value="0" <?=($comunidades->tipo=='0')?'checked':'';?>> p??blica - qualquer pessoa pode participar</label><br>
                        <input type="radio" maxlength="1" class="btn-eo" name="tipo" value="1" <?=($comunidades->tipo=='1')?'checked':'';?>> moderada - o mediador precisa aprovar pedidos de participa????o</label></p></li>
                        <li><p class="textop1">Content Privacy:</p> <p class="textop2"><label>
                        <input type="radio" maxlength="1" class="btn-eo" name="privacidade" value="0" <?=($comunidades->privacidade=='0')?'checked':'';?>> aberta - qualquer pessoa pode visualizar o conte??do da comunidade</label><br>
                        <input type="radio" maxlength="1" class="btn-eo" name="privacidade" value="1" <?=($comunidades->privacidade=='1')?'checked':'';?>> oculta - apenas membros podem visualizar o conte??do da comunidade</label></p>
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