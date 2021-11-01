<?php

namespace App\Controllers;
use App\Controllers\Guest;
use App\Controllers\Admin;
use App\Controllers\Restaurant;
use App\Controllers\User;
use App\Models\UserModel;
use App\Models\JeloModel;
use App\Models\CommentModel;
use App\Models\RestaurantModel;
class Guest extends BaseController
{
	/**
* Prikazivanje ekrana korisniku
** @author Nikola Ilic
* 
 * @return void
 */
    protected function show($page, $data)
    {
        
        $data['controller'] = 'Guest';
        echo view('sablon/header');
        echo view("stranice/$page", $data);
        echo view('sablon/footer');
    }
	/**
* Prikazivanje pocetne stranice sa svim restoranima
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
* Prikazivanje stranice za login
** @author Nikola Ilic
* 
 * @return void
 */
    public function login(){
        $this->show('login', []);
    }
	/**
* Provera podataka i login korisnika u sistem
** @author Nikola Ilic
* 
 * @return void
 */
    public function loginSubmit()
    {
        if(!$this->validate(['username'=>'required', 'password'=>'required']))
        {
            return $this->show('login', ['errors'=>$this->validator->getErrors()]);
        }
        
        $userModel = new UserModel();
///$users = $userModel->where('active', 1) ->findAll();
        $user = $userModel->where('username',$this->request->getVar('username'))->findAll();
        $restaurantModel = new RestaurantModel();
        $restaurant = $restaurantModel->where('username',$this->request->getVar('username'))->findAll();
        
        
        if(($user== null) && ($restaurant == null))
            return $this->show('login', ['message'=>'User with this username does not exists!']);
       
        
        if($user!=null){
            if(($user[0]->password != $this->request->getVar('password')))
            return $this->show('login', ['message'=>'User with this password does not exists!']);
        }

        if($restaurant!=null){
            if($restaurant[0]->password != $this->request->getVar('password'))
            return $this->show('login', ['message'=>'User with this password does not exists!']);
        }
            
       

        
        if($user!=null && $user[0]->username != "admin" && $user[0]->approved=='yes'){
            
        $this->session->set('user', $user[0]);
            return redirect()->to(site_url('User'));   
        }
        if($restaurant!=null && $restaurant[0]->username != "admin" && $restaurant[0]->approved=='yes')
        {   
        $this->session->set('restaurant', $restaurant[0]);
        
            return redirect()->to(site_url('Restaurant'));
        }
        if($user!=null){
        if($user[0]->username == "admin"){
            
            $this->session->set('admin', $user[0]);
            
            return redirect()->to(site_url('Admin'));//aminski model jos fali
        // php spark db:seed AdminSeeder
        //ovo je da se ucita seed tj da mozemo iz ovoga da fizicki dodajemo stvari
        }
        }
        return $this->show('login', ['message'=>'User has not been approved by admin yet']);
    }

   /** Otvara stranicu za registrovanje korisnika
* 
** @author Neda Todorovic
* 
 * @return void
 */
    public function register_user(){
        $this->show('register_user', []);
    }
       /** Otvara stranicu za registrovanje restorana
* 
** @author Neda Todorovic
* 
 * @return void
 */
     public function register_restaurant(){
        $this->show('register_restaurant', []);
    }
    
    
   /** Proverava formu za registraciju restorana i ukoliko je dobra registruje korisnika
* 
** @author Neda Todorovic
* 
 * @return void
 */
    public function registerSubmitRestaurant()
    {
    
      if(!$this->validate(
              ['email'=>'required', 
            'phone'=>'required',
            'password'=>'required',
          'type'=>'required',
          'description'=>'required',
            'repeatedpassword'=>'required',
            'username'=>'required',
            'address'=>'required',
          'name'=>'required',
            'pib'=>'required']))
        {
            return $this->show('register_restaurant', ['errors'=>$this->validator->getErrors()]);
        }
       
         if($this->request->getVar('password')!= $this->request->getVar('repeatedpassword'))
            return $this->show('register_restaurant', ['message'=>'Passwords do not match!']);
       
        
         $restaurantModel = new RestaurantModel();
      
            $user = $restaurantModel->where('username',$this->request->getVar('username'))->findAll();
       if($user != null)
           return $this->show('register_restaurant', ['message'=>'User with this username already exists!']);
       
        $data = [
            'email'=>$this->request->getVar('email'),
            'password'=>$this->request->getVar('password'),
            'name'=>$this->request->getVar('name'),
            'pib'=>$this->request->getVar('pib'),
                 'restoran'=>true, 
            'username'=>$this->request->getVar('username'),
            'phone'=>$this->request->getVar('phone'),
             'description'=>$this->request->getVar('description'),
            'type'=>$this->request->getVar('type'),
            'address'=>$this->request->getVar('address')
        ];
     
        $restaurantModel->insert($data);

      
        return redirect()->to(site_url('Guest'));
    }
   /** Proverava formu za registraciju korisnika i ukoliko je dobra registruje korisnika
* 
** @author Neda Todorovic
* 
 * @return void
 */
    public function registerSubmitUser()
    {
        
        if(!$this->validate([
            'email'=>'required', 
            'phone'=>'required',
            'password'=>'required',
            'repeatedpassword'=>'required',
            'username'=>'required',
            'address'=>'required',
            
            'name'=>'required',
            'surname'=>'required']))
        {
        
            return $this->show('register_user', ['errors'=>$this->validator->getErrors()]);
        }
      $userModel = new UserModel();
        
       
        
      
         if($this->request->getVar('password')!= $this->request->getVar('repeatedpassword'))
            return $this->show('register_user', ['message'=>'Passwords do not match!']);
        
           $user = $userModel->where('username',$this->request->getVar('username'))->findAll();
        if($user != null)
          return $this->show('register_user', ['message'=>'User with this username already exists!']);

        $data = [
            'email'=>$this->request->getVar('email'),
            'password'=>$this->request->getVar('password'),
            'name'=>$this->request->getVar('name'),
            'surname'=>$this->request->getVar('surname'),
            'username'=>$this->request->getVar('username'),
              'restoran'=>false,  
            'phone'=>$this->request->getVar('phone'),
                
            'address'=>$this->request->getVar('address')
        ];
        
        $userModel->insert($data);

        return redirect()->to(site_url('Guest'));
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
            $this->session->set('chosenrestaurant',$rest[0]);
            $this->show('restaurant_profile_guest', ['restaurant'=>$rest[0]]);
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
            $data['restaurant'] = $restaurant[0];
            $data['jelo'] = $jelo;
            $this->show('restaurant_jelovnik_guest', $data );
            
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
  
         public function comments_restaurant() {

        $commentModel = new CommentModel();
        /**
         * @var Object[] $comments Comments
         */
        
        $comments = $commentModel->where('IdRes', $this->session->get('chosenrestaurant')->idkor)->findAll();


        $userModel = new UserModel();
        //Umesto korisnickog id-a prikazuje ime onog korisnika koji je ostavio odredjeni komentar 
        foreach ($comments as $comment) {
            $user = $userModel->find($comment->IdKor);
            $comment->IdKor = $user->username;
        }
        $data['restaurant']=$this->session->get('chosenrestaurant');
        $data['comments']=$comments;

        $this->show('comments_guest', $data);
    }
}