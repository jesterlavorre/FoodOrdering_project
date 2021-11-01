 <div class="container box"> 
  
       <form name="orderform" action="<?= site_url("User/finish_order/{$ukupaniznos}")?>" method="post">
           <h4>Da li želite da promenite adresu dostave? </h4>
        <div class="form-group">
          <label for="address">Adresa</label>
          <input type="text" class="form-control" name="address"  value="<?= $user->address?>">
        </div>
         <font color='red'>
            <?php if(!empty($errors['address'])) 
                echo $errors['address'];
            ?>
      </font>
         <center>
             <input type="submit" class="btn btn-warning" value="Potvrdi"> 
         </center>
    
      </form>