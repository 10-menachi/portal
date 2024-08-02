<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Hashids\Hashids;

class Sales extends BaseController
{
    private  $hashIds;

    public function __construct()
    {
        $this->hashIds = new Hashids('OjCNz34S20t6fkx7iVp4dXhDCDFXyf6K', 20, 'abcdefghijklmnopqrstuvwxyz123456789');
    }

    public function getIndex()
    {
        $this->data['products'] = $products = $this->adminModel->getTableResultDataByWhere('tbl_product_sales', ['isDelete' => 0]);
        // var_dump($products);

        return $this->blade->run('admin.sales.index', $this->data);
    }

    public function getCreate()
    {
        $this->data['categories'] = $products = $this->adminModel->wp_category();
        return $this->blade->run('admin.sales.create', $this->data);
    }

    public function getEdit($id = null)
    {
        $this->data['object'] = $object = $this->adminModel->getTableDataById('tbl_product_sales', $id);
        if ($object) {
            $this->data['productId'] = $productId = $this->adminModel->wp_product_by_sku($object['sku']);
            $this->data['product'] = $product = $this->adminModel->wp_product_by_id($productId);
            return $this->blade->run('admin.sales.edit', $this->data);
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

        $sales = $post['sales'];

        foreach ($sales as $sale) {
            $product = $this->adminModel->wp_product_by_id($sale['productId']);
            if ($product) {
                $data = [
                    'name' => $product['title'],
                    'product_id' => $product['post_id'],
                    'category_id' =>  $sale['categoryId'],
                    'slug' => $product['product_name'],
                    'description' => $sale['description'],
                    'startDate' => $sale['startDate'],
                    'endDate' => $sale['endDate'],
                    'qr_code' => $sale['qr_code'],
                    'sku' => $product['sku'],
                ];

                $data = $this->adminModel->insertInToTable('tbl_product_sales', $data);
            }
        }

        $message = ["text" => "Created Successfully", "type" => "success"];
        return redirect()->to(admin_url('sales'))->with('systemMessage', $message);
    }


    public function postUpdate()
    {
        $post = $this->request->getPost();
        $productId = $post['productId'];
        if ($post['productId'] == null) {
            $productId = $this->adminModel->wp_product_by_sku($post['sku']);
        }
        $product = $this->adminModel->wp_product_by_id($productId);

        if ($product) {
            $data = [
                'name' => $product['title'],
                'product_id' => $product['post_id'],
                'description' => $post['description'],
                'startDate' => $post['startDate'],
                'endDate' => $post['endDate'],
                'qr_code' => $post['qr_code'],
                'sku' => $product['sku'],
            ];
            $data = $this->adminModel->updateIntoTable('tbl_product_sales', $data, ['id' => $post['post_id']]);
            $message = ["text" => "Update Successfully", "type" => "success"];
            return redirect()->to(admin_url('sales'))->with('systemMessage', $message);
        } else {
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
