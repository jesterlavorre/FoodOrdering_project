     <div class="container" >
         <h3>
           <center>Zabrani pristup</center>
         </h3>
          <table class="table" >
            <thead>
    <th>Ime</th>
    
    <th>Username</th>
    <th>Tip</th>
    <th>
    </th>
    <th></th>
            </thead>
<?php

foreach ($users as $user) {
    
    echo "<tr >
             <td>
              {$user->name}
             </td>
             <td>
            
              {$user->username}
               </td>
               <td>
               
            ".($user->restoran=="1"?"Restoran":"Korisnik")."

               </td>
               <td>
                <a href='/{$controller}/banuser/{$user->username}'
                    class='fa fa-times iconx' aria-hidden='true'></a>
               </td>
            
             </tr>
            
              ";
}

?>

  </table>  
</div>



