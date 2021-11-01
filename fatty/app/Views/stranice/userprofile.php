 <link type="text/css" rel="stylesheet"  href = "http://localhost/fatty/assets/css/profile.css" >  


       <div class="container biggerbox "> 
       <form>
        <a       <a href='/User/changeprofile'
           class="btn btn-warning change"> Izmeni podatke</a>
    <center>  <h3>Moj profil</h3>
    </center>
    <table class="table" >
     
        <tr class="clickable" >
           <td>
             <p class="labela"> Ime: </p>
           <?php     echo $user->name?>
         
           </td>
           
           </tr>
           <tr class="clickable" >
            <td>
              <p class="labela"> Prezime: </p>
     <?php     echo $user->surname?>
            </td>
            
            </tr>
            <tr class="clickable" >
                <td>
                  <p class="labela"> Adresa: </p>
                 
                  <?php     echo $user->address?>
                </td>
                
                </tr>
                <tr class="clickable" >
                    <td>
                      <p class="labela"> Mejl: </p>
                  
                      <?php     echo $user->email?>
                    </td>
                    
                    </tr>
                    <tr class="clickable" >
                        <td>
                          <p class="labela"> Broj telefona: </p>
                         
                        <?php     echo $user->phone?>
                        </td>
                        
                        </tr>
   </table>
    
      </form>
       </div>