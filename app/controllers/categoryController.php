<?php

class CategoryController extends Controller
{
    //Database connection
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        // Model loaded and then method
        $this->model('HomeModel');
        $this->view('home/index', []);
    }
    public function category()
    {
        // Table to fetch dat from
        $table = 'tbl_category';
        // Model loaded and then method
        $categoryModel = $this->model('CategoryModel');

        // Data fetched from tbl_category
        $data = $categoryModel->categoryList($table);
        
        // View page loaded using view() from views folder
        $this->view('category/category', $data);
    }
}