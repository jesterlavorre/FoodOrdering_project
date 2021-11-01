<?php  namespace App\Models;

use CodeIgniter\Model;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of UserModel
 *
 * @author Neda Todorovic
 */
class UserModel extends Model{
        protected $table      = 'regkorisnik';
        protected $primaryKey = 'idkor';
        protected $returnType = 'object';
        protected $allowedFields = ['restoran','approved','email', 'password', 'name', 'address','username','phone', 'surname'];
        
}
