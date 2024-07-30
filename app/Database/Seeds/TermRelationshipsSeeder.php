<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TermRelationshipsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'object_id' => 1,
                'term_taxonomy_id' => 1,
                'term_order' => 0,
            ],
            [
                'object_id' => 2,
                'term_taxonomy_id' => 2,
                'term_order' => 0,
            ],
        ];

        $this->db->table('wp_term_relationships')->insertBatch($data);
    }
}