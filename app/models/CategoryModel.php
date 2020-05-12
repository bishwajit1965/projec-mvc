<?php
class CategoryModel extends ParentModel
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Will store category data
     *
     * @param string $table
     * @param array $fields
     *
     * @return mixed
     */
    public function storeCategory($table, $fields)
    {
        return $this->dbHandler->insert($table, $fields);
    }
    /**
     * Select category bt Id
     *
     * @param string $table
     * @param integer $categoryId
     *
     * @return mixed
     */
    public function categoryById($table, $categoryId)
    {
        $sql = "SELECT * FROM $table WHERE id=:id";
        $data = ['id' => $categoryId];
        return $this->dbHandler->select($sql, $data) ;
    }
    /**
     * Will fetch categories from tbl_category
     *
     * @param string $table
     *
     * @return void
     */
    public function categoryList($table)
    {
        $sql = "SELECT * FROM $table ";
        $sql.= "ORDER BY id DESC";
        return $this->dbHandler->selectData($sql);
    }
    /**
     * Will update category as per condition
     *
     * @param string $table
     * @param array $fields
     * @param string $condition
     *
     * @return mixed
     */
    public function updateCategoryData($table, $fields, $condition)
    {
        return $this->dbHandler->update($table, $fields, $condition);
    }
    /**
     * Will delete category data
     *
     * @param string $table
     * @param string $condition
     * @param integer $limit
     *
     * @return mixed
     */
    public function deleteCategoryById($table, $condition, $limit=1)
    {
        return $this->dbHandler->delete($table, $condition, $limit=1);
    }
}