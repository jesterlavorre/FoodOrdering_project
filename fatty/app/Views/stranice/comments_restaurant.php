  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<script src="http://localhost/fatty/assets/js/stars.js"></script>  
  
<ul class="nav nav-tabs  ">
				<li class="nav-item">
				  <a class="nav-link "  href='<?= site_url("Guest/restaurant/{$restaurant->username}") ?>'>Profil</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link "  href="<?= site_url("Restaurant/jela/$restaurant->username") ?>">Jelovnik</a>
				</li>
				<li class="nav-item">
				  <a  aria-current="page" class="nav-link active" href="#">Komentari</a>
				</li>
			  </ul>
       <br><br>
      <div class="container">
          <div class="row">
        <div class="col-sm-8 offset-2">
            
        <?php    
   if (count($comments)==0){
       echo "<center><h4>Nema komentara </h4> </center>";
       }         
foreach ($comments as $comment) {
    
    echo " <div class='comentBox'><span><b>
       $comment->IdKor &nbsp {$comment->Datum}

                        </b></span><div>
            
     
              ";
      $counter=0;
      while ($counter<$comment->Ocena){
        echo "   <i class='fa fa-star checked '></i>";
        $counter=$counter+1;
      }
         while ($counter<5){
                   echo "   <i class='fa fa-star unchecked '></i>";
        $counter=$counter+1;
         }
        echo "       
                    </i></div><br><p>{$comment->Komentar}</p></div>
        <br>
        " ;
}

?>
         
        
         
        
       
    </div> 
             
      
</div>