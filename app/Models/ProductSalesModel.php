<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductSalesModel extends Model
{
    protected $table = 'wp_tbl_product_sales';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'name',
        'product_id',
        'category_id',
        'slug',
        'description',
        'startDate',
        'endDate',
        'qr_code',
        'sku',
        'isDelete'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Define any validation rules if necessary
    protected $validationRules = [
        'name' => 'required|max_length[255]',
        'product_id' => 'required|integer',
        'category_id' => 'required|integer',
        'slug' => 'required|max_length[255]',
        'description' => 'required',
        'startDate' => 'required|valid_date',
        'endDate' => 'required|valid_date',
        'qr_code' => 'required|max_length[255]',
        'sku' => 'required|max_length[255]',
    ];
}
