<?php namespace App\Models;

use CodeIgniter\Model;

class JeloModel extends Model {
    //put your code here
  protected $table      = 'Jelo';
        protected $primaryKey = 'IdJelo';
        protected $returnType = 'object';
        protected $allowedFields = ['Sastojci','Slika', 
            'Naziv', 
            'Cena', 'idkor','IdJelo'];
       
}