<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users  =   [
                        [
                            'fullname'      =>  ucwords(strtolower('Anton Prakasa')),
                            'gender'        =>  '1',
                            'username'      =>  strtolower('anton123'),
                            'password'      =>  password_hash(strtolower('anton123'), PASSWORD_DEFAULT),
                            'isactive'      =>  '1',
                            'created_at'    =>  Time::now(),
                            'updated_at'    =>  Time::now()
                        ],
                        [
                            'fullname'      =>  ucwords(strtolower('Dita Anggraini')),
                            'gender'        =>  '0',
                            'username'      =>  strtolower('dita456'),
                            'password'      =>  password_hash(strtolower('dita456'), PASSWORD_DEFAULT),
                            'isactive'      =>  '1',
                            'created_at'    =>  Time::now(),
                            'updated_at'    =>  Time::now()
                        ]
                    ];

                    $this->db->table('users')->insertBatch($users);
    }
}
