
			<ul class="nav nav-tabs  ">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="#">Profil</a>
				</li>


				  <a class="nav-link" href="<?= site_url("User/jela/$restaurant->username") ?>">Jelovnik</a>


				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?= site_url("User/comments") ?>">Komentari</a>
				</li>
			  </ul>
    	<div class="container  "> 

			  
	
       <form>
		   <br>

	<div class="row">
		<div class="col-sm-4 align-items-stretch offset-sm-1">

                 <?php echo "<img class='card-img' style='width:100%' src='http://localhost/fatty/public/uploads/{$restaurant->image}' alt='Image'>" ?>

		</div>
		<div class="col-sm-6 align-items-stretch offset-sm-1">
			<p class="labela"> Ime : <?php echo $restaurant->name?></p>
			<p class="labela"> Tip hrane : <?php echo $restaurant->type?></p>
			<p class="labela"> Adresa : <?php echo $restaurant->address?></p>
			<p class="labela"> Broj telefona : <?php echo $restaurant->phone?></p>     
			<p class="labela"> Mejl : <?php echo $restaurant->email?></p>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-sm-6 align-items-stretch offset-sm-5">
			<?php echo $restaurant->description?>
		</div>
	</div>
    
      </form>
        </div>
	 