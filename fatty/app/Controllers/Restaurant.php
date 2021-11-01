<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/*
* RestaurantController – klasa za upravljanje funkcijama restorana
*
* @version 1.0
*/
use App\Models\RestaurantModel;
use App\Models\UserModel;
use App\Models\JeloModel;
use App\Models\CommentModel;
class Restaurant extends BaseController{
	
	/**
* Prikazivanje ekrana korisniku
** @author Nikola Ilic
* 
 * @return void
 */
       protected function show($page, $data)
    {
        $data['controller'] = 'Restaurant';
        
        echo view('sablon/header_restaurant', $data);
        echo view("stranice/$page", $data);
        echo view('sablon/footer');
    }

		/**
* Govori na koju stranicu se prebacuje korisnik, na stranicu za dodavanje jela
** @author Nikola Ilic
* 
 * @return void
 */
    public function dodajJeloStranica(){
         $this->show('dodaj_jelo', []);
    }

	/**
* Prebaci korisnika na stranicu za azuraranje jela i popuni sa trenutnim podacima
* @param  int $idjela IdJela
** @author Nikola Ilic
* 
 * @return void
 */
     public function azurirajJeloStranica($idjela){
            $jeloModel = new JeloModel();
            $jelo = $jeloModel->where('IdJelo', $idjela)->findAll();
            $this->show('azuriraj_jelo', ['jelo'=>$jelo[0]]);
            
    }
	/**
* Pocetna stranica da se otvori
** @author Nikola Ilic
* 
 * @return void
 */
    public function index()
	{
            helper (['url']);  
            helper (['form']); 
        $restaurantModel = new RestaurantModel();
        $rest = $restaurantModel->where('approved', 'yes')->findAll();
		$this->show('home', ['rest'=>$rest]);
	}
        	/**
* Nalazi i pokazuje restoran u zavisnosti od username
* @param String $username Username
** @author Nikola Ilic
* 
 * @return void
 */
        public function restaurant($username){
            
            $restaurantModel = new RestaurantModel();
            $rest = $restaurantModel->where('username', $username)->findAll();
 
            $this->session->set('chosenrestaurant', $rest[0]);
            $this->show('restaurant_profile_owner_gleda_tudji', ['restaurant'=>$rest[0]]);
        }
	/**
* Nadje podatke za svoj restoran i vrati podatke da se ispisu na stranici
** @author Nikola Ilic
* 
 * @return void
 */
        public function myRestaurant(){
            $restaurantModel = new restaurantModel();
        $restaurant = $restaurantModel->where('username',$this->session->get('restaurant')->username)->findAll();
		$this->show('restaurant_profile_owner', ['restaurant'=>$restaurant[0]]);
        }

	/**
* Vraca da prikaze sva jela po username od restorana 
* @param String $username Username
** @author Nikola Ilic
* 
 * @return void
 */
        public function jela($username){
            $restaurantModel = new restaurantModel();
            $restaurant = $restaurantModel->where('username',$username)->findAll();
            $jeloModel = new JeloModel();
            $jelo = $jeloModel->where('idkor', $restaurant[0]->idkor)->findAll();
	/**
             * @var int[] $data Data
         */
            $data['restaurant'] = $restaurant[0];
            $data['jelo'] = $jelo;
            $this->show('restaurant_jelovnik_owner_gleda_tudji', $data );
            
        }
	/**
* Pokazuje sva jela svom restoranu od korisnika
** @author Nikola Ilic
* 
 * @return void
 */
            public function myJela(){
              $restaurant1 = $this->session->get('restaurant'); 
            $restaurant = $this->session->get('restaurant')->username; 
            $jeloModel = new JeloModel();
            $jelo = $jeloModel->where('idkor', $this->session->get('restaurant')->idkor)->findAll();   
		/**
             * @var int[] $data Data
         */
            $data['restaurant'] = $restaurant1;
            $data['jelo'] = $jelo;  
            
            
            $this->show('restaurant_jelovnik_owner', $data);
            
        }
	/**
* Promeni sliku od restorana
** @author Nikola Ilic
* 
 * @return void
 */
        public function newPicture(){
        $restaurantModel = new RestaurantModel();
        $restaurant = $restaurantModel->where('username', $this->session->get('restaurant')->username)->findAll(); 
        $img = $this->request->getFile('image');
	/**
             * @var String $oldName $newName  OldName NewName  
         */
        if ($img->isValid() && ! $img->hasMoved())
        {
            $oldName = $restaurant[0]->image;

            $newName = $img->getRandomName();
            
            $img->move('uploads/', $newName);
        }
        else 
            $newName = $restaurant[0]->image;
        

        $data = [
            'image'=>$newName
        ];
        $restaurantModel->update($this->session->get('restaurant')->idkor, $data);
             $newRes = $restaurantModel->where('username',$this->session->get('restaurant')->username)->findAll();
    
        $this->session->set('restaurant', $newRes[0]);
        return redirect()->to(site_url("Restaurant/myRestaurant"));
        }
	/**
* Prebaci na stranicu da menjanje profila
** @author Nikola Ilic
* 
 * @return void
 */
        public function changeprofile(){
                
             $this->show('changeprofileRestaurant', [ 'restaurant'=>$this->session->get('restaurant')]);
            
        }
        /**
     * Funkcija koja dohvata podatke(mejl, telefon, adresu, ime, opis, PIB) iz forme i ukoliko su izmenjeni
    * menja im vrednost u bazi 
     * * @author Neda Todorovic
     * 
     * @return void
     */
        public function change(){
            
                if(!$this->validate([
            'email'=>'required', 
            'phone'=>'required',
            'address'=>'required',
            'name'=>'required',
            'description'=>'required'
                    ]))
        {
        
            return $this->show('changeprofileRestaurant', ['errors'=>$this->validator->getErrors()]);
        }
        $oldemail=$this->session->get('restaurant')->email;
       $restaurantModel=new RestaurantModel();
        
       $restaurantId=$this->session->get('restaurant')->idkor;
       
       $restaurant2 = $restaurantModel->where('idkor',$restaurantId)->findAll();
       
       if ($this->request->getVar('email')!=$oldemail){
        $restaurant = $restaurantModel->find($this->request->getVar('email'));
        if($restaurant != null )
            return $this->show('changeprofileRestaurant', ['message'=>'User with this email already exists!']);
        }
        
    if ( $this->request->getVar('oldpassword')!=""){
           
       if ($restaurant2[0]->password != $this->request->getVar('oldpassword')){
           $data['message']='Netacna stara lozinka!';
          $data['restaurant']=     $this->session->get('restaurant');
           return $this->show('changeprofileRestaurant', $data);
       }else{
            $data = [
            'email'=>$this->request->getVar('email'),
            'name'=>$this->request->getVar('name'),
            'description'=>$this->request->getVar('description'),
            'phone'=>$this->request->getVar('phone'),
            'address'=>$this->request->getVar('address'),
            'password'=>$this->request->getVar('newpassword')    
        ];
    
    }}else{
        $data = [
            'email'=>$this->request->getVar('email'),
            'name'=>$this->request->getVar('name'),
            'description'=>$this->request->getVar('description'),
            'phone'=>$this->request->getVar('phone'),
            'address'=>$this->request->getVar('address')
        ];    
    }
        $restaurantModel->update($restaurantId,$data);  
        
       $restaurant = $restaurantModel->where('idkor',$restaurantId)->findAll();
    
        $this->session->set('restaurant', $restaurant[0]);
       $this->show('restaurant_profile_owner', ["restaurant"=>$restaurant[0]]);
        }
	/**
* Dodaje novo jelo u bazu podataka
** @author Nikola Ilic
* 
 * @return void
 */
    public function dodajJelo(){

      if(!$this->validate(
              ['name'=>'required', 
            'price'=>'required',
            'ingredient'=>'required']))
        {
            return $this->show('dodaj_jelo', ['errors'=>$this->validator->getErrors()]);
        }
       
        
     // $jelo = $jeloModel->where('IdJelo', $idjelo)->findAll(); 
//        $user = $restaurantModel->find($this->request->getVar('email'));
//        if($user != null)
//            return $this->show('register_restaurant', ['message'=>'User with this email already exists!']);
//        
         $img = $this->request->getFile('image');
        if ($img->isValid() && ! $img->hasMoved())
        {
            $newName = $img->getRandomName();
            $img->move('uploads/', $newName);
        }

         
          $jeloModel = new JeloModel();
        $data = [
            'Sastojci'=>$this->request->getVar('ingredient'),
            'Slika'=>$newName,
            'Naziv'=>$this->request->getVar('name'),
            'Cena'=>$this->request->getVar('price'),
            'idkor'=>$this->session->get('restaurant')->idkor];
     
        $jeloModel->insert($data);
        
     return redirect()->to(site_url("Restaurant/myJela"));

    }
        public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url('Guest/index'));
    }
	/**
* Azurira podatke koji se nalze u bazi i popuni polja sa trenutnim
* @param $idjela
** @author Nikola Ilic
* 
 * @return void
 */
    public function azurirajJelo($idjelo){
            $jeloModel = new JeloModel();
            
            
            $jelo = $jeloModel->where('IdJelo', $idjelo)->findAll();  
                if(!$this->validate([
            'name'=>'required', 
            'price'=>'required',
            'ingredient'=>'required'   
                    ]))
                    { return $this->show('azuriraj_jelo', ['errors'=>$this->validator->getErrors()]);}
        	/**
             * @var String $oldName $newName  OldName NewName  
         */
        $img = $this->request->getFile('image');
        if ($img->isValid() && ! $img->hasMoved())
        {
            $oldName = $jelo[0]->Slika;
            if(file_exists("uploads/".$oldName))
            {
                unlink("uploads/".$oldName);
            }
            $newName = $img->getRandomName();
            $img->move('uploads/', $newName);
        }
        else 
            $newName = $jelo[0]->Slika;
        
        
        $data = [
            'Naziv'=>$this->request->getVar('name'),
            'Cena'=>$this->request->getVar('price'),
            'Sastojci'=>$this->request->getVar('ingredient'),
            'Slika'=>$newName
        ];
      
        $jeloModel->update($idjelo,$data);  
         return redirect()->to(site_url("Restaurant/myJela"));
    }
	/**
* Brise odredjeno jelo iz baze
* @param int $idjelo IdJelo
** @author Nikola Ilic
* 
 * @return void
 */
    public function izbrisiJelo($idjelo){
         $jeloModel = new JeloModel();
        $jelo = $jeloModel->where('IdJelo', $idjelo)->findAll();  

        $img = $jelo[0]->Slika;
        if(file_exists("uploads/".$img))
        {
            unlink("uploads/".$img);
        }

        $jeloModel->where('IdJelo', $idjelo)->delete();
       
         return redirect()->to(site_url("Restaurant/myJela"));
    }
	/**
* Menjanje pocetne stranice u zavisnosti sta korisnik obelezi
** @author Nikola Ilic
* 
 * @return void
 */
        public function sortiraj(){
            helper (['url']);  
            helper (['form']); 
            $restaurantModel = new RestaurantModel();
            	/**
             * @var int $zbirPrvog $brojPrvih $prosecnaPrvog $prosecnaDrugog $zbirDrugog $brojDrugih ZbirPrvog BrojPrvih ProsecnaPrvog ProsecnaDrugog ZbrirDrugog BrojDrugih  
         */
            if($this->request->getVar('sortiranje')){
                $rest = $restaurantModel->where('approved', 'yes')->findAll();
                usort($rest,function($first,$second){
                $komentarModel = new CommentModel();
                    $prvi = $komentarModel->where('IdRes', $first->idkor)->findAll();
                    $zbirPrvog = 0;
                    $brojPrvih = 0;
                    foreach($prvi as $komentar){
                        $zbirPrvog = $zbirPrvog + $komentar->Ocena;
                        $brojPrvih = $brojPrvih + 1;
                    }
                    $drugi = $komentarModel->where('IdRes', $second->idkor)->findAll();
                    $zbirDrugog = 0;
                        $brojDrugih = 0;
                        foreach($drugi as $komentar){
                            $zbirDrugog = $zbirDrugog + $komentar->Ocena;
                            $brojDrugih = $brojDrugih + 1;
                        }
                        
                        if($brojPrvih == 0 && $brojDrugih != 0){
                            return 1;
                        }
                        if($brojDrugih == 0 && $brojPrvih != 0){
                            return 0;
                        }
                        if($brojDrugih == 0 && $brojPrvih == 0){
                            return 1;
                        }
                        $prosecnaPrvog = $zbirPrvog/$brojPrvih;
                        $prosecnaDrugog = $zbirDrugog/$brojDrugih;
                        
                        
                          if($prosecnaPrvog < $prosecnaDrugog){
                                return 1;
                            }else{
                                return 0;
                            }
                           
                            
                        });
            }else 
            if($this->request->getVar('tip')){
                $where = array('approved' => 'yes', 'type' => $this->request->getVar('tip'));
                $rest = $restaurantModel->where($where)->findAll();
            }else{
                $rest = $restaurantModel->where('approved', 'yes')->findAll();
            }
            
            
            $this->show('home', ['rest'=>$rest]);
        }
       
        public function comments_restaurant($username){
           
        $commentModel=new CommentModel();
        if ($username!=""){
            $this->session->set('chosenrestaurant',$this->session->get("restaurant"));
        }
        $comments=$commentModel->where('IdRes', $this->session->get('chosenrestaurant')->idkor)->findAll();
       $userModel = new UserModel();
        foreach ($comments as $comment) {
         $user=$userModel->find($comment->IdKor);
        $comment->IdKor=$user->username;
        }

        $this->show('comments_restaurant', ['comments'=>$comments]);
        }
        
         public function comments_restaurantowner(){
           
        $commentModel=new CommentModel();
     
        $comments=$commentModel->where('IdRes', $this->session->get('restaurant')->idkor)->findAll();
       $userModel = new UserModel();
        foreach ($comments as $comment) {
         $user=$userModel->find($comment->IdKor);
        $comment->IdKor=$user->username;
        }
        $data['comments']=$comments;
        $this->show('commentsRestaurant_owner', $data);
        }
}
