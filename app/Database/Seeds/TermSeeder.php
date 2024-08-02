<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TermSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'term_id' => 1,
                'name' => 'Desktop POS',
                'slug' => 'desktop-pos',
            ],
            [
                'term_id' => 2,
                'name' => 'Computers',
                'slug' => 'computers',
            ],
            [
                'term_id' => 3,
                'name' => 'Laptops',
                'slug' => 'laptops',
            ],
        ];

        $this->db->table('terms')->insertBatch($data);
    }
}
