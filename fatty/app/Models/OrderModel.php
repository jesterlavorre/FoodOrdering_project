<?php namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model {
    //put your code here
  protected $table      = 'Narudzbina';
        protected $primaryKey = 'IdNar';
        protected $returnType = 'object';
        protected $allowedFields = ['IdKor','IdJelo', 
            'UkupanIznos', 
            'Adresa','IdNar'];
       
}