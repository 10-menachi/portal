<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostMetaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'post_id' => 1,
                'meta_key' => '_thumbnail_id',
                'meta_value' => '100',
            ],
            [
                'post_id' => 2,
                'meta_key' => '_edit_last',
                'meta_value' => '1',
            ],
        ];

        $this->db->table('postmeta')->insertBatch($data);
    }
}