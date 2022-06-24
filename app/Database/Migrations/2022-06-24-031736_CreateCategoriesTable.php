<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            =>  [
                                    'type'              =>  'INT',
                                    'constraint'        =>  '11',
                                    'unsigned'          =>  true,
                                    'auto_increment'    =>  true,
                                ],
            'title'         =>  [
                                    'type'              =>  'VARCHAR',
                                    'constraint'        =>  '255',
                                    'unique'            =>  true,
                                ],
            'description'   =>  [
                                    'type'              =>  'TEXT',
                                    'null'              =>  true,
                                ],
            'isactive'      =>  [
                                    'type'              =>  'BOOLEAN',
                                ],
            'slug'          =>  [
                                    'type'              =>  'VARCHAR',
                                    'constraint'        =>  '255',
                                ],
            'created_at'    =>  [
                                    'type'              =>  'VARCHAR',
                                    'constraint'        =>  '255',
                                ],
            'updated_at'    =>  [
                                    'type'              =>  'VARCHAR',
                                    'constraint'        =>  '255',
                                ],
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('categories', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
