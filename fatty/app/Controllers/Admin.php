<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RestaurantModel;

/**
 * Admin- Funkcije administracije sajta
 *
 * @author Neda Todorovic
 * 
 *  @version 1.0
 */
class Admin extends BaseController {

  
     /**
     * Prikazivanje stranica sa dostavljenim podacima
     * * @author Neda Todorovic
     * 
     * @return void
     */
    protected function show($page, $data) {

        $data['controller'] = 'Admin';
        $data['admin'] = $this->session->get('admin');
        echo view('sablon/header_admin');
        echo view("stranice/$page", $data);
        echo view('sablon/footer');
    }
    
/**
     * Pocetna funkcija modela Admina
     * * @author Neda Todorovic
     * 
     * @return void
     */
    public function index() {

        helper(['url']);
        helper(['form']);


        return redirect()->to(site_url("Admin/adminregistration"));
    }

 
/**
     * Izlistavanje korisnika kojima admin moze da zabrani pristup
     * * @author Neda Todorovic
     * 
     * @return void
     */
    public function adminban() {

        $restaurantModel = new RestaurantModel();

        $restaurants = $restaurantModel->where('approved', 'yes')->findAll();

        $userModel = new UserModel();

        $user = $userModel->where('approved', 'yes')->findAll();
        $users = array_merge($restaurants, $user);

        $this->show('adminban', ['users' => $users]);
    }

   
 
/**
     *  Izlistavanje korisnika kojima admin moze da odobri registraciju
 * 
     * * @author Neda Todorovic
     * 
     * @return void
     */
    public function adminregistration() {

        $restaurantModel = new RestaurantModel();

        $restaurants = $restaurantModel->where('approved', 'no')->findAll();

        $userModel = new UserModel();

        $user = $userModel->where('approved', 'no')->findAll();
        $users = array_merge($restaurants, $user);
        $this->show('adminregistration', ['users' => $users]);
    }


/**
     *  Zabrani pristup korisniku ciji je username dostavljen
 * 
   
 *    @author Neda Todorovic
   
 *    @param String $username Username
   
 *    @return void
     */
    public function banUser($username) {

        $userModel = new UserModel();

        $user = $userModel->where('username', $username)->findAll();
        if ($user != null) {

            $userModel->where('username', $username)->set(['approved' => "x"])->update();
        } else {

            $restaurantModel = new RestaurantModel();

            $restaurantModel->where('username', $username)->set(['approved' => "x"])->update();
        }

        return redirect()->to(site_url("Admin/adminban"));
    }
/**
     * Odbija registraciju korisnika ciji je username dostavljen
 * 
   
 *    @author Neda Todorovic
   
 *    @param String $username Username
   
 *    @return void
     */
    public function declineReg($username) {

        $userModel = new UserModel();

        $user = $userModel->where('username', $username)->findAll();
        if ($user != null) {

            $userModel->where('username', $username)->set(['approved' => "x"])->update();
        } else {

            $restaurantModel = new RestaurantModel();

            $restaurantModel->where('username', $username)->set(['approved' => "x"])->update();
        }

        return redirect()->to(site_url("Admin/adminregistration"));
    }
/**
     *  Dozvoljava pristup korisniku ciji je username dostavljen
 * 
   
 *    @author Neda Todorovic
   
 *    @param String $username Username
   
 *    @return void
     */
    public function approveUser($username) {

        $userModel = new UserModel();

        $user = $userModel->where('username', $username)->findAll();
        if ($user != null) {
            $userModel->where('username', $username)->set(['approved' => "yes"])->update();
        } else {

            $restaurantModel = new RestaurantModel();

            $restaurantModel->where('username', $username)->set(['approved' => "yes"])->update();
        }



        return redirect()->to(site_url("Admin/adminregistration"));
    }
/**
     *  Izloguje korisnika sa sistema i vraca ga na pocetnu kontrolera Guest
 * 
   
 *    @author Neda Todorovic
   
 *    @param String $username Username
   
 *    @return void
     */
    public function logout() {
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }

 
}
