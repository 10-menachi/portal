<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use stdClass;

class AdminModel
{
    protected $db;
    public string $userTable = 'tbl_user';
    private  string $wp_postMeta="postmeta";

    private string $preFix="wp";

    public function __construct(?ConnectionInterface $db = null)
    {
        $this->db = $db ?? db_connect();
        $this->preFix = env('database.default.DBPrefix');
    }


    public function insertInToTable($table,$data){
        $this->db->table($table)->insert($data);
        return $this->db->insertID();
    }

    public function getTableData(string $table): array
    {
        return  $this->db->table($table)->where('isDelete',0)->get()->getResultArray();
    }

    public function getTableDataById(string $table, $id): ?array
    {
        return  $this->db->table($table)->where('id',$id)->get()->getRowArray();
    }

    public function getCategoryTableDataById($tableName, $id)
    {
        if (!$tableName || !$id) {
            throw new \InvalidArgumentException("Table name and ID must be provided");
        }
        // Query the table for the record with the specified term_id
        $builder = $this->db->table($tableName);
        $result = $builder->where('term_id', $id)->get()->getRowArray();

        // Return the result as an array
        return $result;
    }


    public function getTableDataByWhere(string $table, $where): ?array
    {
        return  $this->db->table($table)->where($where)->get()->getRowArray();
    }

    public function getTableResultDataByWhere(string $table, array $where): array
    {
        return  $this->db->table($table)->where($where)->get()->getResultArray();
    }


    public function getCategoriesTableResultDataByWhere($tableName, $where = [])
    {
        // Ensure the table name is specified
        if (!$tableName) {
            throw new \InvalidArgumentException("Table name must be provided");
        }

        // Start the query builder with the specified table
        $builder = $this->db->table($tableName);

        // Apply the 'where' conditions
        if (!empty($where)) {
            $builder->where($where);
        }

        // Return the query builder instance for further chaining
        return $builder;
    }


    public function wp_category_edit_by_id($categoryId)
    {
        // Make sure a valid category ID is provided
        if (!$categoryId) {
            throw new \InvalidArgumentException("Category ID must be provided");
        }

        // Fetch the category by ID
        $builder = $this->db->table('terms');
        $query = $builder->where('term_id', $categoryId)->get();

        // Return the result as an associative array
        return $query->getRowArray();
    }


    public function updateIntoTable(string $table, array $data, array $whereData): bool
    {
        return $this->db->table($table)->where($whereData)->update($data);
    }

    public function deleteFromTable(string $table, $postId): bool
    {
        return $this->db->table($table)->where('id',$postId)->update(['isDelete'=>1]);
    }

    public function softDeleteFromTable(string $table, $postId): bool
    {
        return $this->db->table($table)->where('id',$postId)->update(['isDelete'=>1]);
    }

    public function deleteWhere(string $table, array $where)
    {
        return $this->db->table($table)->where($where)->delete();
    }

    function batchInsertData($table,$data){
        $builder= $this->db->table($table);
        $builder->insertBatch($data);
    }


    public function updateOrCreate($where,$data,$table)
    {
        $builder = $this->db->table($table)->where($where);
        $row = $builder->get()->getRowArray();
        if(is_array($row)){
            $this->db->table($table)->update($data,$where);
            $rowId = $row['id'];
        }else{
            $this->db->table($table)->insert($data);
            $rowId = $this->db->insertID();
        }
        return $rowId;
    }

    public function updateWhere($table, array $where, array $data): bool
    {
        return $this->db->table($table)->update($data,$where);
    }

    public function getUserProfile($userId): stdClass
    {
        $builder = $this->db->table('tbl_user as u')->select('u.id,u.name,u.email');
        return $builder->where('u.id', $userId )->get()->getRow();
    }


    private function wp_product_query(){
        $sql ="SELECT pm.post_id,t.name AS product_category,t.term_id AS category_id,IF(p.post_parent = 0, p.ID, p.post_parent) AS post_parent,
            p.post_name AS product_name,
            (SELECT post_title FROM {$this->preFix}posts WHERE id = pm.post_id) AS title,
            (SELECT meta_value FROM {$this->preFix}postmeta WHERE post_id = pm.post_id AND meta_key = '_price' LIMIT 1) AS price, 
            (SELECT meta_value FROM {$this->preFix}postmeta WHERE post_id = pm.post_id AND meta_key = '_regular_price' LIMIT 1) AS 'regular price', 
            (SELECT meta_value FROM {$this->preFix}postmeta WHERE post_id = pm.post_id AND meta_key = '_stock' LIMIT 1) AS stock, 
            (SELECT meta_value FROM {$this->preFix}postmeta WHERE post_id = pm.post_id AND meta_key = '_stock_status' LIMIT 1) AS 'stock status', 
            IFNULL((SELECT meta_value FROM {$this->preFix}postmeta WHERE post_id = pm.post_id AND meta_key = '_sku' LIMIT 1), 
            (SELECT meta_value FROM {$this->preFix}postmeta WHERE post_id = pm.post_id AND meta_key = '_custom_field' LIMIT 1)) as sku 
            FROM `{$this->preFix}postmeta` AS pm JOIN {$this->preFix}posts AS p ON p.ID = pm.post_id 
            JOIN {$this->preFix}term_relationships AS tr ON tr.object_id = IF(p.post_parent = 0, p.ID, p.post_parent) 
            JOIN {$this->preFix}term_taxonomy AS tt ON tt.taxonomy = 'product_cat' AND tt.term_taxonomy_id = tr.term_taxonomy_id 
            JOIN {$this->preFix}terms AS t ON t.term_id = tt.term_id 
            WHERE meta_key in ('_product_version') AND p.post_status in ('publish')";
        return $sql;
    }
    public function wp_products(){
        $sql = $this->wp_product_query();
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function wp_category(){
        $sql= "SELECT {$this->preFix}terms.* FROM {$this->preFix}terms  LEFT JOIN {$this->preFix}term_taxonomy  
         ON {$this->preFix}terms.term_id = {$this->preFix}term_taxonomy.term_id  WHERE {$this->preFix}term_taxonomy.taxonomy = 'product_cat' ";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function wp_product_by_category($categoryId){
        $sql= $this->wp_product_query() ;
        $sql = $sql." AND t.term_id='$categoryId'";
        $query = $this->db->query($sql);
        log_message('debug', 'sql:'.$sql);
        return $query->getResultArray();
    }

    public function wp_product_by_id($productId){
        $sql= $this->wp_product_query() ;
        $sql = $sql. " AND pm.post_id='$productId'" ;
        $query = $this->db->query($sql);
        return $query->getRowArray();
    }

    public function wp_product_edit_by_id($productId)
    {
        $query = $this->db->table('posts')
            ->where('id', $productId)
            ->get();
        return $query->getRowArray();
    }


    public function wp_product_by_sku($sku)
    {
        $post_id=null;
        $builder = $this->db->table($this->preFix.$this->wp_postMeta)->where(['meta_key'=>'_sku','meta_value'=> $sku ]);
        $row = $builder->get()->getRowArray();
        if($row){
            $post_id = $row['post_id'];
        }
        return $post_id;
    }

    public function getUserByEmailId($email): ?array
    {
        $builder = $this->db->table('tbl_user as u')->select('u.*');
        $q= $builder->where(['u.email'=>$email])->get();
        return $q->getRowArray();
    }


    public function getProductsTableResultData(string $table = 'posts'): array
    {
        return $this->db->table($table)
            ->select('id, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name') // Corrected the column name and removed duplicates
            ->where('comment_status', 'closed')
            ->orWhere('comment_status', 'open') // Correctly combines the conditions using OR
            ->get()
            ->getResultArray(); // Return results as an array
    }



}