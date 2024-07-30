<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWpPosts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ID' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'post_author' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'default' => 0,
            ],
            'post_date' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'post_date_gmt' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'post_content' => [
                'type' => 'LONGTEXT',
                'null' => false,
            ],
            'post_title' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'post_status' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
                'default' => 'publish',
            ],
            'post_name' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => false,
            ],
            'post_parent' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'default' => 0,
            ],
            'post_type' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
                'default' => 'post',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('ID', true);
        $this->forge->createTable('wp_posts');
    }

    public function down()
    {
        $this->forge->dropTable('wp_posts');
    }
}