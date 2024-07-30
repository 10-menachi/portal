<?php

namespace App\Database\Seeds;

use App\Libraries\Password;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => Password::hash('123456789'),
                'isDelete' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('tbl_user')->insertBatch($data);
    }
}
