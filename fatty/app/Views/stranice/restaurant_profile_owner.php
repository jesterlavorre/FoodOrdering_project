
			<ul class="nav nav-tabs  ">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="#">Profil</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?= site_url("Restaurant/myJela") ?>">Jelovnik</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="<?= site_url("Restaurant/comments_restaurantowner") ?>">Komentari</a>
				</li>
			  </ul>
    	<div class="container  "> 
       <form  name="addimage" action="<?= site_url("Restaurant/newPicture") ?>" method="post" enctype="multipart/form-data">
           <br>
        <a  href="<?= site_url("Restaurant/changeprofile") ?>" class="btn btn-warning change"> Izmeni podatke</a>
    <center>  <h1>Moj profil</h1>
		<br>
    </center>
	<div class="row">
		<div class="col-sm-4 align-items-stretch offset-sm-1">
               
		 <?php echo "<img class='card-img' style='width:100%' src='http://localhost/fatty/public/uploads/{$restaurant->image}' alt='Image'>" ?>
			    
                            <input style="margin-top:5%" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control-file" name="image" required id="exampleFormControlFile1">         
                <font color='red'>
                      <?php if(!empty($errors['image'])) 
                          echo $errors['image'];
                      ?></font>
                      <button style="margin-top:5%" type="submit" class="btn btn-warning" >Promeni Sliku</button>
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
      <br/>
	<div class="row" style="margin-top:5%">
            <br>
		<div class="col-sm-6 align-items-stretch offset-sm-5">
			<?php echo $restaurant->description?>
		</div>
	</div>
    
      </form>
        </div>