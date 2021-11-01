
			<ul class="nav nav-tabs  ">
				<li class="nav-item">
				  <a class="nav-link "  href='<?= site_url("Guest/restaurant/{$restaurant->username}") ?>'>Profil</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="">Jelovnik</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href='<?= site_url("Guest/comments_restaurant") ?>'>Komentari</a>
				</li>
			  </ul>
    	<div class="container meal" style="margin-left:5%">
			<br/>
			<div class="row">
				<div class="col-sm-12 align-items-stretch offset-sm-7">
				<h1><?php echo $restaurant->name?></h1>
				</div>
			</div>
			<br/>
			<div class="row ">
                             <?php foreach($jelo as $jelo) { ;?>
				<div class="col-sm-12 align-items-stretch offset-sm-4">
					<div class="card mb-9 " >
						 <div class="row no-gutters">
						<div class="col-md-4">
							 <?php echo "<img class='card-img' src='http://localhost/fatty/public/uploads/{$jelo->Slika}'alt='Image'>" ?>
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?php echo $jelo->Naziv?></h5>
								<p class="card-text"><?php echo $jelo->Cena?></p>
								<p class="card-text"><?php echo $jelo->Sastojci?></p>
								
							</div>
						</div>
						</div>
						
					</div>
					<br/>
				</div>
                             <?php } ?>
			</div>
			</div>
			