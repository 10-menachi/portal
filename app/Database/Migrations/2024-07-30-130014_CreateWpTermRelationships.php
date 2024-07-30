<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWpTermRelationships extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'object_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'null' => false,
            ],
            'term_taxonomy_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'null' => false,
            ],
            'term_order' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
        ]);
        $this->forge->addKey(['object_id', 'term_taxonomy_id'], true);
        $this->forge->createTable('term_relationships');
    }

    public function down()
    {
        $this->forge->dropTable('term_relationships');
    }
}