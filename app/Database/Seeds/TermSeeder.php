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
            ],
            [
                'term_id' => 2,
                'name' => 'Computers',
            ],
            [
                'term_id' => 3,
                'name' => 'Laptops',
            ],
        ];

        $this->db->table('terms')->insertBatch($data);
    }
}
