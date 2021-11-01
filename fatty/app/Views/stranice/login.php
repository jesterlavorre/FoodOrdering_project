<link type="text/css" rel="stylesheet"  href = "http://localhost/fatty/assets/css/login.css" >



<div class="container log">
<?php if(isset($message)) echo "<font color='red'>$message</font><br>"; 
  else echo"<br>"?>
<form name="loginform" action="<?= site_url("Guest/loginSubmit") ?>" method="post">
  <div class="form-group ">
    <label for="inputUser">Username</label>
      <input type="username" class="form-control" required id="inputUser" name="username" value="<?= set_value('username') ?>">
      <font color='red'>
            <?php if(!empty($errors['username'])) 
                echo $errors['username'];
            ?>
      </font>
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
      <input type="password" required class="form-control" id="inputPassword" name="password" placeholder="Password">
      <font color='red'>
            <?php if(!empty($errors['password'])) 
                echo $errors['password'];
            ?>
      </font>
  </div>

    <center>
      <button type="submit" class="btn btn-warning" value="Log in">Log in</button>
    <br>
       <a href="<?= site_url("Guest/register_user") ?>">Nemas nalog? Registruj se </a>
       </center>
</form>
</div>

