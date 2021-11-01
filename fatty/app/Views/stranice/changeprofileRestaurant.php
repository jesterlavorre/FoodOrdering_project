 <link type="text/css" rel="stylesheet"  href = "http://localhost/fatty/assets/css/register.css" >  


<div class="container"> 
<?php if(isset($message)) echo "<font color='red'>$message</font><br>"; 
  else echo"<br>"?>
        <form name="changeprofileform" action="<?= site_url("Restaurant/change") ?>" method="post">
          <div class="form-group">
            <label for="address">Adresa</label>
            <input type="text" class="form-control" name="address" value="<?= $restaurant->address?>" >
          </div>
                <font color='red'>
            <?php if(!empty($errors['name'])) 
                echo $errors['name'];
            ?>
      </font>
          <div class="form-group">
            <label for="name">Ime</label>
            <input type="text" class="form-control" name="name" value="<?= $restaurant->name?>">
          </div>
        <font color='red'>
            <?php if(!empty($errors['surname'])) 
                echo $errors['surname'];
            ?>
      </font>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $restaurant->email?>" >
          </div>
          <font color='red'>
            <?php if(!empty($errors['email'])) 
                echo $errors['email'];
            ?>
      </font>
          <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="number" class="form-control" name="phone" value="<?= $restaurant->phone?>">
          </div>
          <font color='red'>
            <?php if(!empty($errors['phone'])) 
                echo $errors['phone'];
            ?>
      </font>
          <div class="form-group">
            <label for="description">Opis</label>
            <input type="text" class="form-control" name="description" value="<?= $restaurant->description?>" >
          </div>
          <font color='red'>
            <?php if(!empty($errors['description'])) 
                echo $errors['description'];
            ?>
      </font>
                  <div class="form-group">
            <label for="password">Stara lozinka</label>
            <input type="password" class="form-control" name="oldpassword" " >
          </div>
          <div class="form-group">
            <label for="password">Nova lozinka</label>
            <input type="password" class="form-control" name="newpassword" " >
          </div>
        <center>
          <button class="btn btn-warning">Izmeni</button>
        </center>
        </form>
      
  </div>