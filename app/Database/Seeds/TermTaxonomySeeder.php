<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TermTaxonomySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'term_id' => 1,
                'taxonomy' => 'category',
                'description' => 'Category description',
                'parent' => 0,
                'count' => 10,
            ],
            [
                'term_id' => 2,
                'taxonomy' => 'tag',
                'description' => 'Tag description',
                'parent' => 0,
                'count' => 5,
            ],
        ];

        $this->db->table('term_taxonomy')->insertBatch($data);
    }
}