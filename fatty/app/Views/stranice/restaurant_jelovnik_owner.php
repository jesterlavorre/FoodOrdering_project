
			<ul class="nav nav-tabs  ">
				<li class="nav-item">
				  <a class="nav-link "  href="<?= site_url("Restaurant/myRestaurant") ?>">Profil</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="">Jelovnik</a>
				</li>
				<li class="nav-item">
                                  <a class="nav-link" href="<?= site_url("Restaurant/comments_restaurantowner") ?>">Komentari</a>
				</li>
			  </ul>
    	<div class="container meal" style="margin-left:5%">
			<br/>
			<div class="row">
				<div class="col-sm-12 align-items-stretch offset-sm-7">
				<h1><?php echo $restaurant->name?></h1>
                                 <a  href="<?= site_url("Restaurant/dodajJeloStranica") ?>" class="btn btn-warning change"> Dodaj jelo</a>
				</div>
                                   
			</div>
			<br/>
			<div class="row ">
                             <?php foreach($jelo as $jela) { ;?>
				<div class="col-sm-12 align-items-stretch offset-sm-4">
					<div class="card mb-9 " >
						 <div class="row no-gutters">
						<div class="col-md-4">
							 <?php echo "<img class='card-img' src='http://localhost/fatty/public/uploads/{$jela->Slika}' alt='Image'>" ?>
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?php echo $jela->Naziv?></h5>
								<p class="card-text"><?php echo $jela->Cena?></p>
								<p class="card-text"><?php echo $jela->Sastojci?></p>
								<a href="<?= site_url("Restaurant/azurirajJeloStranica/{$jela->IdJelo}") ?>" class = "btn btn-success change"> Azuriraj</a>
								<a style="margin-right:4% "  href="<?= site_url("Restaurant/izbrisiJelo/{$jela->IdJelo}") ?>" class="btn btn-warning change"> Izbrisi</a>
							</div>
						</div>
						</div>
						
					</div>
					<br/>
				</div>
                             <?php } ?>
			</div>
			</div>
			