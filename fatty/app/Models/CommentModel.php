<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of CommentModel
 *
 * @author Neda
 */
class CommentModel extends Model{

      protected $table      = 'komentar';
        protected $primaryKey = 'IdKom';
        protected $returnType = 'object';
        protected $allowedFields = ['Komentar',
            'Ocena',
            'IdKor', 'IdRes', 'Datum'];
       
    
}
