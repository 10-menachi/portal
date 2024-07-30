<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TermSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'uncategorized', 'slug' => 'uncategorized'],
            ['name' => 'solid State Drivers', 'slug' => 'solid-state-drivers'],
            ['name' => 'Desktop POS', 'slug' => 'desktop-pos'],
            ['name' => 'Computers', 'slug' => 'computers'],
            ['name' => 'Laptops Asus Laptops', 'slug' => 'laptops-asus-laptops'],
            ['name' => 'Mounting Brackets', 'slug' => 'mounting-brackets'],
            ['name' => 'Dell Accessories', 'slug' => 'dell-accessories'],
            ['name' => 'Dell Laptops', 'slug' => 'dell-laptops'],
            ['name' => 'Dell Monitors', 'slug' => 'dell-monitors'],
            ['name' => 'HP Laptops', 'slug' => 'hp-laptops'],
            ['name' => 'HP Monitors', 'slug' => 'hp-monitors'],
            ['name' => 'HP Accessories', 'slug' => 'hp-accessories'],
            ['name' => 'Lenovo Laptops', 'slug' => 'lenovo-laptops'],
            ['name' => 'Lenovo Monitors', 'slug' => 'lenovo-monitors'],
            ['name' => 'Lenovo Accessories', 'slug' => 'lenovo-accessories'],
            ['name' => 'Printers & Consumables', 'slug' => 'printers-consumables'],
            ['name' => 'Ram', 'slug' => 'ram'],
            ['name' => 'Storage', 'slug' => 'storage'],
            ['name' => 'Hard Disk Drive', 'slug' => 'hard-disk-drive'],
            ['name' => 'Flash Drives', 'slug' => 'flash-drives'],
        ];

        // Using Query Builder
        $this->db->table('wp_terms')->insertBatch($data);
    }
}