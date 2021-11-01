<?php namespace App\Models;

use CodeIgniter\Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RestaurantModel
 *
 * @author Neda Todorovic
 */
class RestaurantModel extends Model {
    //put your code here
  protected $table      = 'restoran';
        protected $primaryKey = 'idkor';
        protected $returnType = 'object';
        protected $allowedFields = ['restoran','image','approved','email', 'password', 'name', 'address','username','phone', 'PIB','description','type'];
       
}
