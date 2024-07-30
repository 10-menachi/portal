<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWpTblProductSales extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'product_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'startDate' => [
                'type' => 'DATE',
            ],
            'endDate' => [
                'type' => 'DATE',
            ],
            'qr_code' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'sku' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('wp_tbl_product_sales');
    }

    public function down()
    {
        $this->forge->dropTable('wp_tbl_product_sales');
    }
}
