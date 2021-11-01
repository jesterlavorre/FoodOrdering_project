<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
        public function run()
        {
                $data = [
			'username' =>'admin',
                        'email'    => 'admin@gmail.com',
                        'password' => 'admin123',
                        'name' => 'Toma',
                        'surname' => 'Zdravkovic',
                        'phone'=>'69420',
                        'address'=>'nema',
                        'approved' =>'1'
                ];

                // Using Query Builder
                $this->db->table('regkorisnik')->insert($data);
        }
}