<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
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
            'fullname'      =>  [
                                    'type'              =>  'VARCHAR',
                                    'constraint'        =>  '255',
                                ],
            'gender'        =>  [
                                    'type'              =>  'BOOLEAN',
                                ],
            'image'         =>  [
                                    'type'              =>  'VARCHAR',
                                    'constraint'        =>  '255',
                                    'null'              =>  true,
                                ],
            'username'      =>  [
                                    'type'              =>  'VARCHAR',
                                    'constraint'        =>  '255',
                                    'unique'            =>  true,
                                ],
            'password'      =>  [
                                    'type'              =>  'VARCHAR',
                                    'constraint'        =>  '255',
                                ],
            'isactive'      =>  [
                                    'type'              =>  'BOOLEAN',
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
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
