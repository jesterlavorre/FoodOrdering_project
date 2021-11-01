  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<script src="http://localhost/fatty/assets/js/stars.js"></script>  
  
<ul class="nav nav-tabs  ">
				<li class="nav-item">
				  <a class="nav-link "  href="<?= site_url("User/restaurant/$restaurant->username")?>">Profil</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link "  href="<?= site_url("User/jela/$restaurant->username") ?>">Jelovnik</a>
				</li>
				<li class="nav-item">
				  <a  aria-current="page" class="nav-link active" href="#">Komentari</a>
				</li>
			  </ul>
       <br><br>
      <div class="container">
          <div class="row">
        <div class="col-sm-7">
            
        <?php    
            
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
    
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
       <div class="col-sm-5">
        <div class="commentsection">
            <form class="form_class" action="<?= site_url("User/publishCom") ?>" method="post">
                <div class="form-group" method="post">
                    <h4>Da li zelite da ostavite komentar?</h4>
            
    
                <div class="form-group">
                    <label>Komentar </label>
                    <textarea class="form-control" name="comment"></textarea>
    
                </div>
    
                <br>
                <center>
                    <div class="row" id="stars" align="center">
    
                        <p class="col-sm-6">Oceni </p>
                        <i class="fa fa-star checked " id="one"></i>
                        <i class="fa fa-star unchecked " id="two"></i>
                        <i class="fa fa-star unchecked " id="three"></i>
                        <i class="fa fa-star unchecked " id="four"></i>
                        <i class="fa fa-star unchecked " id="five"></i>
                       
                    </div>
                </center>
                <input type="submit" align="center" class="btn btn-warning col" value="Dodaj komentar" id="getComment">
                   
              
            </form>
    
        </div>
    </div>

</div>