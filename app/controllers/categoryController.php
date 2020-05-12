<?php

class CategoryController extends Controller
{
    //Database connection
    public function __construct()
    {
        parent::__construct();
        Session::checkSession();

    }
    /**
     * Default page loader
     *
     * @return void
     */
    public function index()
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        // Model loaded and then method
        $this->model('HomeModel');
        $this->view('home/index', []);

        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    /**
     * Load form to insert category data
     *
     * @return void
     */
    public function store()
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);
        $this->view('admin/leftMenuPanel', []);

        $this->view('admin/category/addCategory', []);
        
        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    /**
     * Will insert category
     *
     * @param string $message
     *
     * @return void
     */
    public function addCategory($message ='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);
        $this->view('admin/leftMenuPanel', []);

        // Category model loaded
        $categoryModel = $this->model('CategoryModel');
        // Message variable is bound and assigned with model
        $categoryModel->message = $message;
        // Table to insert data into
        $table = 'tbl_category';
        // Super global to insert data by user input
        $name = (isset($_POST['name'])) ? $_POST['name'] : null;
        $title = (isset($_POST['title'])) ? $_POST['title'] : null;
        // Fields to be iterated
        $fields = [
            'name' => $name,
            'title' => $title
        ];
        // Data will be inserted into tbl_category
        $insertResult = $categoryModel->storeCategory($table, $fields);
        // To display insert message
        $categoryModel->message=[];
        $insertResult == true ? $categoryModel->message['message'] =  '<strong>WOW !</strong> Data inserted successfully.': $categoryModel->message['error_message'] =  '<strong>SORRY !</strong> Data insertion failed.';
        //Category insert page loaded using view() with success or error message
        $this->view('admin/category/addCategory', ['message' => $categoryModel->message, 'error_message' => $categoryModel->message]);
       
        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    /**
     * Will fetch category as per Id
     *
     * @return void
     */
    public function categoryById($categoryById = '')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        // Category model loaded
        $categoryModel = $this->model('CategoryModel');
        // Variable assigned to model as well as bound to model
        $categoryModel->categoryById = $categoryById;
        // Table to insert data into
        $table = 'tbl_category';
        // Hard coded
        $categoryId = '5';
        // Fetched associative data loaded to variable bound with model
        $categoryModel->categoryById = $categoryModel->categoryById($table, $categoryId);
        // View page loaded using view() from views folder with an associative array
        $this->view('category/updateCategory', ['categoryById' => $categoryModel->categoryById]);
        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    /**
     * Will display  category data on categoryList.php page
     *
     * @return void
     */
    public function category($category='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);
        $this->view('admin/leftMenuPanel', []);

        /**================================================================
        * Fetching category data to be displayed on categoryList.php page
        /==================================================================**/
        // Table to fetch dat from
        $table = 'tbl_category';
        // Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Variable assigned to model as well as bound to model
        $categoryModel->category = $category;
        // Data fetched from tbl_category
        $categoryModel->category = $categoryModel->categoryList($table);
        // View page loaded using view() from views folder with an associative array
        $this->view('admin/category/categoryList', ['category' => $categoryModel->category]);

        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
     
    /**
     * Will update category data in database
     *
     * @return void
     */
    public function updateCategory($message ='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        // Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Message variable is bound and assigned with model
        $categoryModel->message = $message;
        // Table to fetch dat from
        $table = 'tbl_category';
        // Super global to insert data by user input
        if (isset($_POST['submit'])) {
            $name = (isset($_POST['name'])) ? $_POST['name'] : null;
            $title = (isset($_POST['title'])) ? $_POST['title'] : null;
        }
        // Fields to be iterated
        $fields = [
            'name' =>  $name,
            'title' => $title
        ];
        // Update condition
        $condition = "id=5";
        // Data fetched from tbl_category
        $updateResult = $categoryModel->updateCategoryData($table, $fields, $condition);
        // To display insert message
        $categoryModel->message=[];
        $updateResult == true ? $categoryModel->message['message'] =  '<span class="alert alert-success d-block"><strong>WOW !</strong> Category updated successfully.</span>': $categoryModel->message['error_message'] =  '<span class="alert alert-warning d-block"><strong>SORRY !</strong> Category update failed.</span>';

        // View page loaded using view() from views folder with update message
        $this->view('category/updateCategory', ['message' => $categoryModel->message, 'error_message' => $categoryModel->message]);

        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    /**
     * Will delete category from database
     *
     * @return void
     */
    public function deleteCategory($message ='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        // Table to fetch data from
        $table = 'tbl_category';
        // Update condition
        $condition = "id=37";
        // Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Message variable is bound and assigned with model
        $categoryModel->message = $message;
        // Data fetched from tbl_category
        $deleteResult = $categoryModel->deleteCategoryById($table, $condition);
        // To display insert message
        $categoryModel->message=[];
        $deleteResult == true ? $categoryModel->message['message'] =  '<span class="alert alert-danger d-block"><strong>LOOK !</strong> Category deleted successfully.</span>': $categoryModel->message['error_message'] =  '<span class="alert alert-warning d-block"><strong>SORRY !</strong> Category deletion failed.</span>';
        // View page loaded using view() from views folder
        $this->view('category/categoryList', ['message' => $categoryModel->message, 'error_message' => $categoryModel->message]);
        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
}