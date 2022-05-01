<?=$render('header', ['loggedUser'=>$loggedUser]);?>

					
						<section class="coluna-10 plr-10">
								
							<section class="feed mt-10">
								
								<div class="row">
									<div class="column">


	<div class="p-10">

<link rel='stylesheet' href='https://unpkg.com/flickity@2/dist/flickity.css'>
<div class="gallery">
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketimoveis.png" width="80" height="80" />Imóveis</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketcarros.png" width="80" height="80" />Autos e peças</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketcasa.png" width="80" height="80" />Para a sua casa</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketcelular.png" width="80" height="80" />Eletrônicos e celulares</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketviolao.png" width="80" height="80" />Música e hobbies</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketbicicleta.png" width="80" height="80" />Esportes e lazer</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketbebe.png" width="80" height="80" />Artigos infantis</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketcao.png" width="80" height="80" />Animais de estimação</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketmoda.png" width="80" height="80" />Moda e beleza</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/markettrator.png" width="80" height="80" />Agro e indústria</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketmarket.png" width="80" height="80" />Comércio e escritório</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketservico.png" width="80" height="80" />Serviços</div>
  <div class="gallery-cell"><img src="<?=$base;?>/assets/images/marketemprego.png" width="80" height="80" />Vagas de emprego</div>

</div>


	
	
	
	

                        
</div>
<!-- partial -->
  <script src='https://unpkg.com/flickity@2/dist/flickity.pkgd.js'></script><script  src="./script.js"></script>
  <div class="box feed-item">
		<div class="p-10">
  <div class="d-area">
                            <form method="GET" action="https://espaco.online/pesquisa">
                                <input class="form-control" type="search" placeholder="Pesquisa anuncios" name="s">
                            </form>
                        </div>
                        
                        
                        
                        
                        
                        
                        </div></div>

<style>
.flickity-page-dots {
  display: none!important;
}
.gallery-cell {
  width: 80px;
  height: 120px;
  margin-right: 10px;
  counter-increment: gallery-cell;
  text-align: center;
  background-color: #fff;
  border-radius: 10%;
}

.gallery-cell img {
    background-color: #fff;
    padding: 10px;
    border-radius: 10%;
    opacity: 0.5;}

.gallery-cell.is-selected {
  background: #c0c8d0;
  border-radius: 10%;
}

</style>
<script>
  // external js: flickity.pkgd.js

var flkty = new Flickity( '.gallery', {
  contain: true,
  dot: false

});

flkty.on( 'select', function() {
  var target = flkty.selectedCell.target;
  if ( target == flkty.cells[0].target ) {
    console.log('is at contained start')
  } else if ( target == flkty.getLastCell().target ) {
    console.log('is at contained end')
  }
});
</script>


	
	<div class="box feed-item">
		<div class="p-10">
		
		<b>▼ Anúncios</b>
		
			
			
				
		

		</div>					
	</div>


									</div>
									
						</div>
								
						</section>
						</section>
					
				

<?=$render('footer');?>