<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Api extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        //
    }

    public function postProductsByCategory(): ResponseInterface
    {
        $post = $this->request->getPost();
        log_message('debug', 'postProductsByCategory: ' . json_encode($post));
        $output['data'] = $this->adminModel->wp_product_by_category($post['categoryId']);
        $output['status']= true;
        return  $this->respond($output, 200);
    }
}
