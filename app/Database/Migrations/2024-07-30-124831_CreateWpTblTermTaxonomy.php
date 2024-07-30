<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWpTblTermTaxonomy extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'term_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'taxonomy' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
        ]);
        $this->forge->addKey('term_id', true);
        $this->forge->createTable('term_taxonomy');
    }

    public function down()
    {
        $this->forge->dropTable('term_taxonomy');
    }
}
