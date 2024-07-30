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
                'taxonomy' => 'product_cat',
            ],
        ];

        // Using Query Builder
        $this->db->table('term_taxonomy')->insertBatch($data);
    }
}
