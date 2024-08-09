<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;
use Hashids\Hashids;

class Products extends BaseController
{
    private  $hashIds;

    public function __construct()
    {
        $this->hashIds = new Hashids('OjCNz34S20t6fkx7iVp4dXhDCDFXyf6K',
            20, 'abcdefghijklmnopqrstuvwxyz123456789');
    }

    public function getIndex()
    {
        // Attempt to retrieve posts from the database
        try {
            $this->data['posts'] = $posts = $this->adminModel->getProductsTableResultData('posts');

            // Check if posts were retrieved successfully
            if (!$posts) {
                $this->data['error'] = 'No posts found';
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during data retrieval
            $this->data['error'] = 'Failed to retrieve posts: ' . $e->getMessage();
        }

        // Render the view with the data
        return $this->blade->run('admin.products.index', $this->data);
//        return redirect()->to(admin_url('products'))->with('systemMessage', $message);
    }


    public function getCreate()
    {
        return $this->blade->run('admin.products.create');
    }

    public function getEdit($id = null)
    {
        $this->data['object'] = $object = $this->adminModel->getTableDataById('posts', $id);
        if ($object) {
            return $this->blade->run('admin.products.edit', $this->data);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function getDetail($id = null)
    {
        $this->data['object'] = $object = $this->adminModel->getTableDataById('tbl_product_sales', $id);
        if ($object) {
            $this->data['productId'] = $productId = $this->adminModel->wp_product_by_sku($object['sku']);
            $this->data['product'] = $product = $this->adminModel->wp_product_by_id($productId);
            return $this->blade->run('admin.sales.detail', $this->data);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function postCreate()
    {
        $post = $this->request->getPost();
        log_message('info', 'Data from form of creating a product: ' . json_encode($post));

        // Current date and time in 'YYYY-MM-DD HH:MM:SS' format
        $currentDateTime = date('Y-m-d H:i:s');

        // Prepare data for insertion
        $data = [
            "post_author" => 1,
            "post_date" => $currentDateTime,
            "post_date_gmt" => gmdate('Y-m-d H:i:s'),
            "post_content" => $post['postContent'],
            "post_title" => $post['postTitle'],
            "post_excerpt" => $post['postExcerpt'],
            "post_status" => "publish",
            "comment_status" => 'open',
            "ping_status" => "open",
            "post_password" => "122334445555",
            "post_name" => $post['postName'],
            "to_ping" => "null",
            "pinged" => "null",
            "post_modified" => $currentDateTime,
            "post_modified_gmt" => gmdate('Y-m-d H:i:s'),
            "post_content_filtered" => "null",
            "post_parent" => 0,
            "guid" => $post['guid'] ?? "null",
            "menu_order" => 0,
            "post_type" => "post",
            "post_mime_type" => $post['mimeType'] ?? "null",
            "comment_count" => 0,
        ];

        // Insert data into the database
        $this->adminModel->insertInToTable('posts', $data);

        // Log the data that was inserted
        log_message('info', 'Inserted data into posts table: ' . json_encode($data));

        // Prepare and log the success message
        $message = ["text" => "Created Successfully", "type" => "success"];
        log_message('info', 'Redirecting with message: ' . json_encode($message));

        // Redirect with the success message
        return redirect()->to(admin_url('products'))->with('systemMessage', $message);
    }


    public function postUpdate()
    {
        $post = $this->request->getPost();
        log_message('info', 'Data from form of Editing a product: ' . json_encode($post));

        // Use the key as it is in the form
        $productId = $post['id']; // Change this if you updated the form field name to 'id'
        log_message('info', 'Product ID of a product being Edited : ' . json_encode($productId));

        // Fetch the existing product
        $product = $this->adminModel->wp_product_edit_by_id($productId);
        if ($product) {
            $currentDateTime = date('Y-m-d H:i:s');

            $data = [
                "post_author" => 1,
                "post_date" => $currentDateTime,
                "post_date_gmt" => gmdate('Y-m-d H:i:s'),
                "post_content" => $post['postContent'],
                "post_title" => $post['postTitle'],
                "post_excerpt" => $post['postExcerpt'],
                "post_status" => "publish",
                "comment_status" => 'open',
                "ping_status" => "open",
                "post_password" => "122334445555",
                "post_name" => $post['postName'],
                "to_ping" => null,
                "pinged" => null,
                "post_modified" => $currentDateTime,
                "post_modified_gmt" => gmdate('Y-m-d H:i:s'),
                "post_content_filtered" => null,
                "post_parent" => 0,
                "guid" => $post['guid'] ?? null,
                "menu_order" => 0,
                "post_type" => "post",
                "post_mime_type" => $post['mimeType'] ?? null,
                "comment_count" => 0,
            ];

            // Update the record
            $this->adminModel->updateIntoTable('posts', $data, ['id' => $productId]);

            // Log success message
            log_message('info', 'Updated product with ID ' . $productId . ': ' . json_encode($data));

            $message = ["text" => "Update Successfully", "type" => "success"];
            return redirect()->to(admin_url('products'))->with('systemMessage', $message);
        } else {
            // Log error and throw exception
            log_message('error', 'Product with ID ' . $productId . ' not found.');
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function ZCreate()
    {
        $sheetData = null;
        $wp_url = "https://yourapps.co.ke/product-sales/";
        for ($x = 1; $x <= 10000; $x++) {
            $hasId = $this->hashIds->encode($x);
            $sheetData[] = [
                'code' => $hasId,
                'hashId' => $x,
                'link' => $wp_url . $hasId,
            ];
        }

        if (is_array($sheetData)) {
            // $this->adminModel->batchInsertData('tbl_qrcode',$sheetData);
        }
    }
}