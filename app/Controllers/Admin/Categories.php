<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Hashids\Hashids;

class Categories extends BaseController
{
    private  $hashIds;

    public function __construct()
    {
        $this->hashIds = new Hashids('OjCNz34S20t6fkx7iVp4dXhDCDFXyf6K',
            20, 'abcdefghijklmnopqrstuvwxyz123456789');
    }

    public function getIndex()
    {
        // Fetch categories with term_group = 0 and term_id >= 36
        $this->data['categories'] = $this->adminModel
            ->getCategoriesTableResultDataByWhere('terms', ['term_group' => 0])
            ->where('term_id >=', 36)
            ->get()
            ->getResultArray();

        // Render the view with the fetched data
        return $this->blade->run('admin.categories.index', $this->data);
    }




    public function getCreate()
    {
        return $this->blade->run('admin.categories.create', $this->data);
    }

    public function getEdit($id = null)
    {
        $this->data['object'] = $object = $this->adminModel->getCategoryTableDataById('terms', $id);
        if ($object) {
            return $this->blade->run('admin.categories.edit', $this->data);
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
        log_message('info', 'Data from form of creating a product Category : ' . json_encode($post));

        // Prepare data for insertion
        $data = [
            "name" => $post['name'],
            "slug" => $post['slug_name'],
            "term_group" => 0,
        ];

        // Insert data into the database
        $this->adminModel->insertInToTable('terms', $data);

        // Log the data that was inserted
        log_message('info', 'Inserted data into Terms table: ' . json_encode($data));

        // Prepare and log the success message
        $message = ["text" => "Created Successfully", "type" => "success"];
        log_message('info', 'Redirecting with message: ' . json_encode($message));

        // Redirect with the success message
        return redirect()->to(admin_url('categories'))->with('systemMessage', $message);
    }
    public function postUpdate()
    {
        $post = $this->request->getPost();
        log_message('info', 'Data from form of Editing a product Categories: ' . json_encode($post));

        // Get the ID of the category being edited
        $categoryId = $post['term_id'];
        log_message('info', 'ID of a Product Category being Edited: ' . json_encode($categoryId));

        // Fetch the existing category
        $category = $this->adminModel->wp_category_edit_by_id($categoryId);
        if ($category) {
            $data = [
                "name" => $post['postTitle'],
                "slug" => $post['postName'],
            ];

            // Update the category in the terms table
            $this->adminModel->updateIntoTable('terms', $data, ['term_id' => $categoryId]);

            // Log success message
            log_message('info', 'Updated product Category with ID ' . $categoryId . ': ' . json_encode($data));

            // Redirect with success message
            $message = ["text" => "Update Successfully", "type" => "success"];
            return redirect()->to(admin_url('categories'))->with('systemMessage', $message);
        } else {
            // Log error and throw exception if category not found
            log_message('error', 'Product Category with ID ' . $categoryId . ' not found.');
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