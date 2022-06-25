<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticlesTable extends Migration
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
            'user_id'       =>  [
                                    'type'              =>  'INT',
                                    'constraint'        =>  '10',
                                    'unsigned'          =>  true,
                                ],
            'category_id'   =>  [
                                    'type'              =>  'INT',
                                    'constraint'        =>  '10',
                                    'unsigned'          =>  true,
                                ],
            'title'         =>  [
                                    'type'              =>  'VARCHAR',
                                    'constraint'        =>  '255',
                                    'unique'            =>  true,
                                ],
            'thumbnail'     =>  [
                                    'type'              =>  'VARCHAR',
                                    'constraint'        =>  '255',
                                ],
            'content'       =>  [
                                    'type'              =>  'TEXT',
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
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('category_id', 'categories', 'id');
        $this->forge->createTable('articles', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('articles');
    }
}
