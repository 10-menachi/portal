<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Define an array of sample data to insert
        $data = [
            [
                'post_author'    => 1,
                'post_date'      => date('Y-m-d H:i:s'),
                'post_date_gmt'  => gmdate('Y-m-d H:i:s'),
                'post_content'   => 'This is the content of the first post.',
                'post_title'     => 'First Post',
                'post_status'    => 'publish',
                'post_name'      => 'first-post',
                'post_parent'    => 0,
                'post_type'      => 'post',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'post_author'    => 2,
                'post_date'      => date('Y-m-d H:i:s'),
                'post_date_gmt'  => gmdate('Y-m-d H:i:s'),
                'post_content'   => 'This is the content of the second post.',
                'post_title'     => 'Second Post',
                'post_status'    => 'draft',
                'post_name'      => 'second-post',
                'post_parent'    => 0,
                'post_type'      => 'post',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            // Add more sample posts as needed
        ];

        // Insert data into the 'posts' table
        $this->db->table('posts')->insertBatch($data);
    }
}
