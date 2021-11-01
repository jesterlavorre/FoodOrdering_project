<link type="text/css" rel="stylesheet"  href = "http://localhost/fatty/assets/css/register.css" >

<div class="container"> 

    <ul class="nav nav-tabs  nav-justified">
        <li class="nav-item">
            <a class="nav-link "  href="<?= site_url("Guest/register_user") ?>">Korisnik</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Restoran</a>
        </li>

    </ul>
    <?php if(isset($message)) echo "<font color='red'>$message</font><br>"; 
  else echo"<br>"?>
    <form name="registerformRest" action="<?= site_url("Guest/registerSubmitRestaurant") ?>" method="post">

        <div class="form-group">
            <label for="name">Ime</label>
            <input type="text" class="form-control" name="name"  placeholder="Ime" value="<?= set_value('name') ?>">
        </div>
        
        <div class="col-sm-5">
            <font color='red'>
            <?php
            if (!empty($errors['name']))
                echo $errors['name'];
            ?></font>
        </div>

        <div class="form-group">
            <label for="username">Korisnicko ime</label>
            <input type="text" class="form-control" name="username"  placeholder="Korisnicko ime" value="<?= set_value('username') ?>">
        </div>
        
        <div class="col-sm-5">
            <font color='red'>
            <?php
            if (!empty($errors['username']))
                echo $errors['username'];
            ?></font>
        </div>

        <div class="form-group">
            <label for="pib">PIB</label>
            <input type="text" class="form-control" name="pib"  placeholder="PIB" value="<?= set_value('pib') ?>">
        </div>
        
        <div class="col-sm-5">
            <font color='red'>
            <?php
            if (!empty($errors['pib']))
                echo $errors['pib'];
            ?></font>
        </div>

        <div class="form-group">
            <label for="password">Lozinka</label>
            <input type="password" class="form-control" name="password" placeholder="Lozinka" value="<?= set_value('password') ?>">
        </div>
        
        <div class="col-sm-5">
            <font color='red'>
<?php
if (!empty($errors['password']))
    echo $errors['password'];
?></font>
        </div>
<div class="form-group">
            <label for="password">Ponovljena lozinka</label>
            <input type="password" class="form-control" name="repeatedpassword" placeholder="Ponovljena lozinka" value="<?= set_value('repeatedpassword') ?>">
        </div>
        
        <div class="col-sm-5">
            <font color='red'>
<?php
if (!empty($errors['repeatedpassword']))
    echo $errors['repeatedpassword'];
?></font>
        </div>
        <div class="form-group">
            <label for="address">Adresa</label>
            <input type="text" class="form-control" name="address"  placeholder="Adresa" value="<?= set_value('address') ?>">
        </div>
        
        <div class="col-sm-5">
            <font color='red'>
<?php
if (!empty($errors['address']))
    echo $errors['address'];
?></font>
        </div>

        <div class="form-group">
            <label for="mail">Mejl</label>
            <input type="email" aria-describedby="emailHelp" class="form-control" name="email" placeholder="Mejl" value="<?= set_value('email') ?>">
        </div>
        
        <div class="col-sm-5">
            <font color='red'>
<?php
if (!empty($errors['email']))
    echo $errors['email'];
?></font>
        </div>
        <div class="form-group">
            <label for="phone">Broj telefona</label>
            <input type="text" class="form-control" name="phone" placeholder="Broj telefona" value="<?= set_value('phone') ?>">
        </div>
        
        <div class="col-sm-5">
            <font color='red'>
<?php
if (!empty($errors['phone']))
    echo $errors['phone'];
?></font>
        </div>
        <div class="form-group">
            <label for="description">Opis</label>
            <input type="text" class="form-control" name="description" placeholder="Opis" value="<?= set_value('description') ?>">
        </div>
       
        <div class="col-sm-5">
            <font color='red'>
<?php
if (!empty($errors['description']))
    echo $errors['description'];
?></font>
        </div>                                     
        <div class="form-group">
            <label for="type">Tip hrane</label>
            <select class="form-control" name="type" placeholder="Tip hrane" value="<?= set_value('type') ?>">
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
          <font color='red'>
<?php
if (!empty($errors['type']))
    echo $errors['type'];
?></font>
        <center>
            <button class="btn btn-warning">Registruj se</button>
        </center>
    </form>
</div>