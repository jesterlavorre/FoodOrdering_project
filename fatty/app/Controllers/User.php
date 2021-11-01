<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use App\Models\RestaurantModel;
use App\Models\UserModel;
use App\Models\CommentModel;
use App\Models\JeloModel;
use App\Models\CartModel;
use App\Models\OrderModel;

/**
 * User – klasa registrovanog korisnika koji nije restoran
 *
 * @version 1.0
 */
class User extends BaseController {

    /**
     * Prikazivanje stranica sa dostavljenim podacima
     * * @author Neda Todorovic
     * 
     * @return void
     */
    protected function show($page, $data) {
        $data['controller'] = 'User';
        $data['user'] = $this->session->get('user');
        echo view('sablon/header_user', $data);
        echo view("stranice/$page", $data);
        echo view('sablon/footer');
    }

    /**
     * Pocetna funkcija modela User-a
     * * @author Neda Todorovic
     * 
     * @return void
     */
    public function index() {
        helper(['url']);
        helper(['form']);
        $restaurantModel = new RestaurantModel();
        $rest = $restaurantModel->where('approved', 'yes')->findAll();
        $this->show('home', ['rest' => $rest]);
    }

    /**
     * Prikazivanje stranice gde se nalaze podaci korisnika
     * * @author Neda Todorovic
     * 
     * @return void
     */
    public function userprofile() {
        $this->show('userprofile', []);
    }

    /**
     * Prikazivanje stranice gde se menjaju podaci korisnika
     * * @author Neda Todorovic
     * 
     * @return void
     */
    public function changeprofile() {

        $this->show('changeprofile', []);
    }

    /**
     * Prikazivanje komentara za odredjeni restoran kojem smo pristupili
     * sa home stranice. 
     * * @author Neda Todorovic
     * 
     * @return void
     */
    public function comments() {

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
        $this->show('comments', $data);
    }
   /**
     * Funkcija koja dohvata podatke(mejl, telefon, adresu, ime, prezime, sifra, ponovljena sifra) iz forme i ukoliko su izmenjeni
    * menja im vrednost u bazi 
     * * @author Neda Todorovic
     * 
     * @return void
     */
    public function change() {

        if (!$this->validate([
                    'email' => 'required',
                    'phone' => 'required',
                    'address' => 'required',
                    'name' => 'required',
                    'surname' => 'required'])) {

            return $this->show('changeprofile', ['errors' => $this->validator->getErrors()]);
        }
        
        /**
         * @var String $oldemail Oldemail
         */
        $oldemail = $this->session->get('user')->email;
        $userModel = new UserModel();
        $userId = $this->session->get('user')->idkor;
          $user = $userModel->where('idkor', $userId)->findAll();
          
          
        if ($this->request->getVar('email') != $oldemail) {
            $user = $userModel->find($this->request->getVar('email'));
            if ($user != null)
                return $this->show('changeprofile', ['message' => 'User with this email already exists!']);
        }
      
        if ($this->request->getVar('newpassword')!=$this->request->getVar('oldpassword') && $this->request->getVar('newpassword')!="" ){
           
       if ($user[0]->password != $this->request->getVar('oldpassword')){
           return $this->show('changeprofile', ['message' => 'Netacna stara lozinka!']);
       }else{
             /**
         * @var Object[] $data Data
         */
           $data = [
            'email' => $this->request->getVar('email'),
            'name' => $this->request->getVar('name'),
            'surname' => $this->request->getVar('surname'),
            'phone' => $this->request->getVar('phone'),
            'address' => $this->request->getVar('address'),
            'password' => $this->request->getVar('newpassword')
        ]; 
            
       }
        }else{
  /**
         * @var Object[] $data Data
         */
        $data = [
            'email' => $this->request->getVar('email'),
            'name' => $this->request->getVar('name'),
            'surname' => $this->request->getVar('surname'),
            'phone' => $this->request->getVar('phone'),
            'address' => $this->request->getVar('address')
        ];
        }
        $userModel->update($userId, $data);

        $user = $userModel->where('idkor', $userId)->findAll();

        $this->session->set('user', $user[0]);
        $this->show('userprofile', []);
    }

     /**
     * Funkcija kojom se korisnik izloguje
     * * @author Neda Todorovic
     * 
     * @return void
     */
    public function logout() {
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
    
       /**
     * Objavljuje komentar korisnika koji je ulogovan i popunio je formu
     * * @author Neda Todorovic
     * 
     * @return void
     */
    public function publishCom() {
        $ocena = $_COOKIE["stars"];
        $idkor = $this->session->get('user')->idkor;
        $idres = $this->session->get('chosenrestaurant')->idkor;

        $date = date("d.m.Y.");

        $data = [
            'Komentar' => $this->request->getVar('comment'),
            'Ocena' => $ocena,
            'IdKor' => $idkor,
            'IdRes' => $idres,
            'Datum' => $date
        ];
        $commentModel = new CommentModel();
        $commentModel->insert($data);
        return redirect()->to(site_url('User/comments/'));
    }
     /**
     * Prikazuje stranicu restorana kojem se pristupa sa home.php stranice
     * * @author Nikola Ilic
     * 
     * @return void
     */
    public function restaurant($username) {
        $restaurantModel = new RestaurantModel();
        $rest = $restaurantModel->where('username', $username)->findAll();
        $this->session->set('chosenrestaurant', $rest[0]);
        $this->show('restaurant_profile_kupac', ['restaurant' => $rest[0]]);
    }

     /**
     * Prikazuje jelovnik restorana 
     * * @author Nikola Ilic
      * 
     *  @param String $username username
     * @return void
     */
    public function jela($username) {
        $restaurantModel = new restaurantModel();
        $restaurant = $restaurantModel->where('username', $username)->findAll();
        $jeloModel = new JeloModel();
        $jelo = $jeloModel->where('idkor', $restaurant[0]->idkor)->findAll();
        $data['restaurant'] = $restaurant[0];
        $data['jelo'] = $jelo;
        $this->show('restaurant_jelovnik_kupac', $data);
    }
 /**
     * Dodaje jelo u korpu korisnika koji je ulogovan 
     * * @author Neda Todorovic
      * 
     *  @param int $idJelo IdJelo
     * @return void
     */
    public function addToCart($idJelo) {
        $kolicina=$this->request->getVar('kolicina');
        if ($this->request->getVar('kolicina')<1){
            $kolicina=1;
          
        }
        $array = array('IdJelo' => $idJelo, 'idkor' => $this->session->get('user')->idkor);

        $cartModel = new CartModel();
                    /**
             * @var Object[] $existing Existing
         */
        $existing = $cartModel->where($array)->findAll();

        if ($existing != null) {
                 /**
             * @var double $novaKolicina NovaKolicina
         */
            $novaKolicina = $existing[0]->Kolicina + $this->request->getVar('kolicina');
            $cartModel->where($array)->set(['Kolicina' => $novaKolicina])->update();
        } else {
            $data = [
                'idkor' => $this->session->get('user')->idkor,
                'Kolicina' => $kolicina,
                'IdJelo' => $idJelo
            ];
            $cartModel->insert($data);
        }
        $this->jela($this->session->get("chosenrestaurant")->username);
    }
  /**
     * Prikazivanje zeljenih stvari za narucivanje korisnika. 
     * * @author Neda Todorovic
     * 
     * @return void
     */
    public function cart($message) {
        $cartModel = new CartModel();
               /**
             * @var double $ukupaniznos Ukupaniznos
         */
        $ukupaniznos = 0;
        $jeloModel = new JeloModel();
        $allitems = $cartModel->where('idkor', $this->session->get('user')->idkor)->findAll();
        $jela = array();
        foreach ($allitems as $item) {
            $jelo = $jeloModel->find($item->IdJelo);
            $jelo->Cena = $item->Kolicina * $jelo->Cena;
            $ukupaniznos = $ukupaniznos + $jelo->Cena;
            array_push($jela, $jelo);
        }
        $data['ukupaniznos'] = $ukupaniznos;
        $data['message']=$message;
        $data['jela'] = $jela;
        $this->show('cart', $data);
    }
	/**
* Menjanje pocetne stranice u zavisnosti sta korisnik obelezi
** @author Nikola Ilic
* 
 * @return void
 */
    public function sortiraj() {
        helper(['url']);
        helper(['form']);
        $restaurantModel = new RestaurantModel();

        if ($this->request->getVar('sortiranje')) {
            $rest = $restaurantModel->where('approved', 'yes')->findAll();
            usort($rest, function($first, $second) {
                $komentarModel = new CommentModel();
                $prvi = $komentarModel->where('IdRes', $first->idkor)->findAll();
                $zbirPrvog = 0;
                $brojPrvih = 0;
                foreach ($prvi as $komentar) {
                    $zbirPrvog = $zbirPrvog + $komentar->Ocena;
                    $brojPrvih = $brojPrvih + 1;
                }
                $drugi = $komentarModel->where('IdRes', $second->idkor)->findAll();
                $zbirDrugog = 0;
                $brojDrugih = 0;
                foreach ($drugi as $komentar) {
                    $zbirDrugog = $zbirDrugog + $komentar->Ocena;
                    $brojDrugih = $brojDrugih + 1;
                }
                if ($brojPrvih == 0 && $brojDrugih != 0) {
                    return 1;
                }
                if ($brojDrugih == 0 && $brojPrvih != 0) {
                    return 0;
                }
                if ($brojDrugih == 0 && $brojPrvih == 0) {
                    return 1;
                }
                $prosecnaPrvog = $zbirPrvog / $brojPrvih;
                $prosecnaDrugog = $zbirDrugog / $brojDrugih;
                if ($prosecnaPrvog < $prosecnaDrugog) {
                    return 1;
                } else {
                    return 0;
                }
            });
        } else
        if ($this->request->getVar('tip')) {
            $where = array('approved' => 'yes', 'type' => $this->request->getVar('tip'));
            $rest = $restaurantModel->where($where)->findAll();
        } else {
            $rest = $restaurantModel->where('approved', 'yes')->findAll();
        }


        $this->show('home', ['rest' => $rest]);
    }
	/**
* Prikazuje stranicu na kojoj moze da se promeni adresa dostave i potvrdi narudzbina
** @author Neda Todorovic
* 
 * @return void
 */
    public function confirm_order($ukupaniznos) {
        if ($ukupaniznos>0){
        $data['ukupaniznos'] = $ukupaniznos;
        $this->show('confirm_order', $data);
        }else{
            $message="Morate imati nesto u korpi";
             $this->cart($message);
    
        }
    }
	/**
* Menja adresu ukoliko je izmenjena i zatim zapisuje narudzbinu u bazu i brise iz korpe
** @author Neda Todorovic
* 
 * @return void
 */
    public function finish_order($ukupaniznos) {


        if (!$this->validate([
                    'address' => 'required'])) {

            return $this->show('confirm_order', ['errors' => $this->validator->getErrors()]);
        }
        $cartModel = new CartModel();
        $orderModel = new OrderModel();
        $meals = $cartModel->where("idkor", $this->session->get('user')->idkor)->findAll();

        $orderModel->orderBy('IdNar', 'DESC');
          /**
             * @var Object[] $maxT MaxT
            */
        $maxT = $orderModel->findAll();
        if ($maxT == null) {
             /**
             * @var int $max Max
            */
            $max = 0;
        } else {
            $max = $maxT[0]->IdNar + 1;
        }
        $data = [
            'IdKor' => $this->session->get('user')->idkor,
            'IdJelo' => "",
            'IdNar' => $max,
            'UkupanIznos' => $ukupaniznos,
            'Adresa' => $this->request->getVar('address')
        ];
        foreach ($meals as $meal) {
            $data["IdJelo"] = $meal->IdJelo;
            $orderModel->insert($data);
            $cartModel->where('idkor', $this->session->get('user')->idkor)->delete();
        }
        $this->show('game', []);

        
    }
/**
* Prikazuje stranicu gde je igrica
** @author Neda Todorovic
* 
 * @return void
 */
    public function game() {
        $this->show('game', []);
    }
/**
* Brise artikal iz korpe
** @author Neda Todorovic
*   @param int $idJelo IdJelo
 * @return void
 */
    public function deletefromcart($idJelo) {

        $cartModel = new CartModel();
        $cartModel->where('IdJelo', $idJelo)->delete();

        $this->cart('{}');
    }

}
