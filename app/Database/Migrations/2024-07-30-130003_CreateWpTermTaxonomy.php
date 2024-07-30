<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWpTermTaxonomy extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'term_taxonomy_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'term_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'null' => false,
            ],
            'taxonomy' => [
                'type' => 'VARCHAR',
                'constraint' => '32',
                'null' => false,
            ],
            'description' => [
                'type' => 'LONGTEXT',
                'null' => false,
            ],
            'parent' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'default' => 0,
            ],
            'count' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'default' => 0,
            ],
        ]);
        $this->forge->addKey('term_taxonomy_id', true);
        $this->forge->createTable('wp_term_taxonomy');
    }

    public function down()
    {
        $this->forge->dropTable('wp_term_taxonomy');
    }
}