<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatty</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

            
          <link type="text/css" rel="stylesheet"  href = "http://localhost/fatty/assets/css/main.css" >  

</head>
<body >
  
    <nav class="navbar navbar-expand-sm  bg-dark navbar-light nav-special" >
        <div class="navbar-header">
          <a class="navbar-brand text-warning " href="<?= site_url("Guest") ?>"  >Fatty
              <img src="http://localhost/fatty/assets/images/fattylogo.png"    width="9%" height="9%" alt="" />
          
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
        </button>
        <div class="collapse navbar-collapse w-100  justify-content-end" id="navbarNavDropdown">
			<ul class="navbar-nav  ">
				<li class="nav-item ">
					<a class="btn btn-warning "  href="<?= site_url("Guest/login") ?>"><i class="fa fa-user"></i> Prijavite se</a>
				</li>
			</ul>
		</div>	
    </nav>