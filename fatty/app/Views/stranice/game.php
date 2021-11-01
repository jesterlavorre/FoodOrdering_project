<link type="text/css" rel="stylesheet"  href = "http://localhost/fatty/assets/css/game1.css" >

 <div class="container cont" >
     <center>
            <h1>   Dok cekate zabavite se uz nasu igricu!</h1>
        </center>
    
        <section class="score-panel">
        	<ul class="stars">
        		<li><i class="fa fa-star"></i></li>
        		<li><i class="fa fa-star"></i></li>
        		<li><i class="fa fa-star"></i></li>
        	</ul>

        	<span class="moves">0</span> Broj poteza

            

            <div class="restart" onclick=startGame()>
        		<i class="fa fa-repeat"></i>
        	</div>
        </section>
 
        <ul class="deck" id="card-deck">
            <li class="card" type="burger" >
               <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/burger.jpg"> 
            </li>
            <li class="card" type="taco">
              <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/taco.jpg"> 
            </li>
            <li class="card match" type="pizza">
              <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/pizza.jpg"> 
            </li>
            <li class="card" type="sushi" >
               <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/sushi.jpg"> 
            </li>
            <li class="card" type="cake">
                <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/cake.jpg"> 
            </li>
            <li class="card match" type="pizza">
               <img  class='card-img dontDisplay ' src="http://localhost/fatty/assets/images/pizza.jpg"> 
            </li>
            <li class="card" type="fries">
             <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/fries.jpg"> 
            </li>
            <li class="card" type="salad">
                <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/salad.jpg"> 
            </li>
            <li class="card" type="burger">
               <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/burger.jpg"> 
            </li>
            <li class="card" type="steak">
               <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/steak.jpg"> 
            </li>
            <li class="card" type="fries">
                <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/fries.jpg"> 
            </li>
            <li class="card" type="steak">
                <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/steak.jpg"> 
            </li>
            <li class="card open " type="sushi">
              <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/sushi.jpg">
            </li>
            <li class="card" type="salad">
                <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/salad.jpg">
            </li>
            <li class="card" type="taco">
             <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/taco.jpg"> 
            </li>
            <li class="card" type="cake">
             <img  class='card-img dontDisplay' src="http://localhost/fatty/assets/images/cake.jpg"> 
            </li>
        </ul>

        <div id="popup1" class="overlay">
            <div class="popup">
                <h2>Pobedili ste! 🎉</h2>
                <a class="close" href=# >×</a>
               
              
                <button id="play-again" onclick="playAgain()">
                    Igrajte opet?</a>
                </button>
            </div>
        </div>

    </div>


<script src="http://localhost/fatty/assets/js/game.js"></script> 
