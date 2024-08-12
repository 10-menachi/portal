<?php

namespace App\Controllers\Admin;

use App\Models\AdminModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;
use Hashids\Hashids;

class Dashboard extends BaseController
{
    protected AdminModel $adminModel;
    private $hashIds;
    protected array $data = [];

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->hashIds = new Hashids(
            'OjCNz34S20t6fkx7iVp4dXhDCDFXyf6K',
            20,
            'abcdefghijklmnopqrstuvwxyz123456789'
        );
    }
    public function getIndex()
    {
        // Fetch the total count of posts
        $tableNamePosts = 'posts';
        $totalRecordsPosts = $this->adminModel->countAllRecords($tableNamePosts);
        log_message('info', 'Total posts: ' . $totalRecordsPosts);

        // Fetch the total count of sales
        $totalSales = $this->adminModel->countProductSalesRecords();
        log_message('info', 'Total sales: ' . $totalSales);

        // Fetch the total count of categories
        $totalCategories = $this->adminModel->countproductsCategoriesRecords();
        log_message('info', 'Total categories: ' . $totalCategories);

        // Prepare data to pass to the view
        $this->data['totalRecordsPosts'] = $totalRecordsPosts;
        $this->data['totalSales'] = $totalSales;
        $this->data['totalCategories'] = $totalCategories;

        // Render the view with the data
        return $this->blade->run('admin.dashboard', $this->data);
    }

}