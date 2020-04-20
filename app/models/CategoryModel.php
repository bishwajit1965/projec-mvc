<?php

class CategoryModel extends ParentModel
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function categoryList($table)
    {
        $data = $this->dbHandler->select($table);
        return isset($data) ? $data : false;
    }
}