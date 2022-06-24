<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories =   [
                            [
                                'title'         =>  'Uncategorized',
                                'isactive'      =>  '1',
                                'slug'          =>  'uncategorized',
                                'created_at'    =>  round(microtime(true) * 1000),
                                'updated_at'    =>  round(microtime(true) * 1000)
                            ]
                        ];

                    $this->db->table('categories')->insertBatch($categories);
    }
}
