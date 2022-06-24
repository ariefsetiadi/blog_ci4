<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users  =   [
                        [
                            'fullname'      =>  ucwords(strtolower('Administrator')),
                            'gender'        =>  '1',
                            'username'      =>  strtolower('admin123'),
                            'password'      =>  password_hash(strtolower('admin123'), PASSWORD_DEFAULT),
                            'isactive'      =>  '1',
                            'created_at'    =>  round(microtime(true) * 1000),
                            'updated_at'    =>  round(microtime(true) * 1000)
                        ]
                    ];

                    $this->db->table('users')->insertBatch($users);
    }
}
