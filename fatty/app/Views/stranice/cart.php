      <link type="text/css" rel="stylesheet"  href = "http://localhost/fatty/assets/css/cart.css" >
      <center>
<?php if(isset($message) && $message!="{}") echo "<font color='red'>$message</font><br>"; 
  else echo"<br>"?>
          </center>
<div class="container"> 
       <center><h2>Moja korpa</h2></center>
       <br>
<div class="row">
    <div class="col-sm-9 ">
        
        <?php foreach($jela as $jelo) { ;?>
       
        <div class="card mb-8 " >
             <div class="row no-gutters">
            <div class="col-md-2">
             <?php echo "<img src='http://localhost/fatty/public/uploads/{$jelo->Slika}' "
             . "class='card-img'  >
    ";?>        </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h6 class="card-title"><?php echo $jelo->Naziv ?></h6>
                 </div>
            </div>
            <div class="col-md-2">
                <span id="price"><?php echo $jelo->Cena ?> RSD</span>
            </div>
            <div class="col-md-2">
                <a class="fa fa-trash fa-2x" href="<?= site_url("User/deletefromcart/{$jelo->IdJelo}") ?>"> </a>
            </div>
            </div>
        </div>
       
   <?php  } ?>
    
    </div>
        <div class="col-sm-3">
           
                <br>
            <h3>Ukupan iznos:</h3>
            <br>
            <h4 id="iznos"><?php echo $ukupaniznos;?></h4>
            <br>
            <center>
                <a href="<?= site_url("User/confirm_order/{$ukupaniznos}") ?>" class="btn btn-warning">Zavrsi  <i class="fa fa-arrow-right"></i></a>
        </center>
        </div>
        </div>