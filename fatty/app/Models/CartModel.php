<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of CartModel
 *
 * @author User
 */
class CartModel extends \CodeIgniter\Model{
    //put your code here
    
      protected $table      = 'korpa';
        protected $primaryKey = 'idkor';
        protected $returnType = 'object';
        protected $allowedFields = ['idkor',
            'IdJelo',
            'Kolicina'];
}
