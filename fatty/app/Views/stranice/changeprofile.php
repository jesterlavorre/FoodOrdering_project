 <link type="text/css" rel="stylesheet"  href = "http://localhost/fatty/assets/css/register.css" >  


<div class="container"> 
<?php if(isset($message)) echo "<font color='red'>$message</font><br>"; 
  else echo"<br>"?>
        <form name="changeprofileform" action="<?= site_url("User/change") ?>" method="post">
          <div class="form-group">
            <label for="name">Ime</label>
            <input type="text" class="form-control" name="name" value="<?= $user->name?>" >
          </div>
                <font color='red'>
            <?php if(!empty($errors['name'])) 
                echo $errors['name'];
            ?>
      </font>
          <div class="form-group">
            <label for="surname">Prezime</label>
            <input type="text" class="form-control" name="surname" value="<?= $user->surname?>">
          </div>
        <font color='red'>
            <?php if(!empty($errors['surname'])) 
                echo $errors['surname'];
            ?>
      </font>
          <div class="form-group">
            <label for="address">Adresa</label>
            <input type="text" class="form-control" name="address" value="<?= $user->address?>" >
          </div>
          <font color='red'>
            <?php if(!empty($errors['address'])) 
                echo $errors['address'];
            ?>
      </font>
          <div class="form-group">
            <label for="mail">Mejl</label>
            <input type="email" class="form-control" name="email" value="<?= $user->email?>">
          </div>
          <font color='red'>
            <?php if(!empty($errors['email'])) 
                echo $errors['email'];
            ?>
      </font>
          <div class="form-group">
            <label for="phone">Broj telefona</label>
            <input type="number" class="form-control" name="phone" value="<?= $user->phone?>" >
          </div>
          <font color='red'>
            <?php if(!empty($errors['phone'])) 
                echo $errors['phone'];
            ?>
      </font>
                  <div class="form-group">
            <label for="password">Stara lozinka</label>
            <input type="password" class="form-control" name="oldpassword"  >
          </div>
          <div class="form-group">
            <label for="password">Nova lozinka</label>
            <input type="password" class="form-control" name="newpassword" >
          </div>
        <center>
          <button class="btn btn-warning">Izmeni</button>
        </center>
        </form>
      
  </div>