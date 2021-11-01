
    	<div class="container " style="margin-left:5%">
			<br/>
			<div class="row">
				<div class="col-sm-12 align-items-stretch ">
					<center>	<h1>Restorani</h1> </center>
				</div>
			</div>
			<br/>
			<div class="row ">
                            <form name="filtrirajStranicu" action="<?= site_url("{$controller}/sortiraj") ?>" method="post">
                                <div class="form-group">
					<label for="sort"><h4>Sortiranje</h4></label>
					<div class="form-check">
					  <input class="form-check-input" type="radio" value="sort" id="defaultCheck1" name="sortiranje">
					  <label class="form-check-label" for="defaultCheck1">
						Po oceni
					  </label>
					</div>
                                 </div> 
					<br />
                                <div class="form-group">
                                    <label for="type"><h4>Tip hrane</h4></label>
                                    <select class="form-control" name="tip" placeholder="Tip hrane" value="<?= set_value('tip') ?>">
                                        <option selected disabled>Izaberite opciju</option>
                                        <option>Azijska</option>
                                        <option>Srpska</option>
                                        <option>Italijanska</option>
                                        <option>BliskoIstocna</option>
                                        <option>Grcka</option>
                                        <option>Americka</option>
                                        <option>Ostalo</option>
                                    </select>
                                </div>
					<button class="btn btn-success" type="submit">Sortiraj</button>
                                </form>
                            <div class="col-sm-9 align-items-stretch offset-sm-1">
                           <?php foreach($rest as $resto) { '<div class = "row">';?>
				 <?php echo "<a href='/{$controller}/restaurant/{$resto->username}'>";?>
                                 
                               <div class='card mb-9' >
                                 
                                <div class='row no-gutters'>
                                <div class='col-md-4'>
                                <?php echo "<img class='card-img' src='http://localhost/fatty/public/uploads/{$resto->image}' alt='Image'>" ?>
                                  </div>
                                    <div class="col-md-8">
					<div class="card-body">
                                            <h5 class="card-title"><?php echo $resto->name?></h5>
                                            <p class="card-text"> <?php echo $resto->description; 
                                        
                                            ?>
                                          
                                            </p>
                                           
                                         </div>
                                 </div>
                                    </div>
                                   </div>
                                </a>
                                <br/>
                                <?php } ?>
				</div>
				
			</div>
            	</div>
