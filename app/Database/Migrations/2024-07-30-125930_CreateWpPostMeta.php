<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWpTblPostMeta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'meta_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'post_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'default' => 0,
            ],
            'meta_key' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'meta_value' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('meta_id', true);
        $this->forge->addKey('post_id');
        $this->forge->addKey('meta_key');
        $this->forge->createTable('postmeta');
    }

    public function down()
    {
        $this->forge->dropTable('postmeta');
    }
}