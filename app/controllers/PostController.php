<?php

class PostController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Session::checkSession();
    }
    
    public function index($name = '', $search='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);
        
        // Table to fetch data from
        $tableCategory = 'tbl_category';
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        $categoryModel->search = $search;
        $categoryModel->search = $categoryModel->categoryList($tableCategory);
        $this->view('templates/search', ['search' => $categoryModel->search]);

        // Model loaded and then method
        $homeModel = $this->model('HomeModel');
        $homeModel->index();
        // View page loaded using view() from views folder
        $homeModel->name = $name;
        $this->view('home/home', ['name' => $homeModel->name]);
        
        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    /**
     * Will fetch posts and category to displayed on ]home/index page
     *
     * @return void
     */
    public function posts($category='', $posts='', $recentPosts='', $search='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        // Table to fetch data from
        $tableArticle = 'tbl_article';
        $tableCategory = 'tbl_category';
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        $categoryModel->search = $search;
        $categoryModel->search = $categoryModel->categoryList($tableCategory);
        $this->view('templates/search', ['search' => $categoryModel->search]);

        /**=================================================
        * Fetching posts data to be displayed on index page
        /===================================================**/
        // Post model loaded and then method
        $postModel = $this->model('PostModel');
        // Posts variable is bound and assigned with model
        $postModel->posts = $posts;
        $postModel->recentPosts = $recentPosts;
        // Post model method is loaded
        $postModel->posts = $postModel->viewPosts($tableArticle);
        $postModel->recentPosts = $postModel->recentPosts($tableArticle);
        
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Category variable is bound and assigned with model
        $categoryModel->category = $category;
        // Will fetch category data
        $categoryModel->category = $categoryModel->categoryList($tableCategory);

        // Will send category and post data to home/index(Posts page)
        $this->view('home/mainContent', ['posts' => $postModel->posts,'recentPosts' => $postModel->recentPosts,'category' =>  $categoryModel->category]);

        /**=================================================
        * Fetching categories to be displayed on index page
        /===================================================**/
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Category variable is bound and assigned with model
        $categoryModel->category = $category;
        
        // Will fetch category data
        $categoryModel->category = $categoryModel->categoryList($tableCategory);
        $this->view('home/sideBar', ['category' => $categoryModel->category, 'recentPosts' => $postModel->recentPosts]);

        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
   
    /**
     * Will display single post in post detail
     *
     * @param string $postId
     * @param string $details
     * @param string $category
     * @param string $recentPosts
     *
     * @return void
     */
    public function postInDetail($postId ='', $details='', $category='', $recentPosts = '', $search ='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        // Table to insert data into
        $tableArticle = 'tbl_article';
        $tableCategory = 'tbl_category';
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        $categoryModel->search = $search;
        $categoryModel->search = $categoryModel->categoryList($tableCategory);
        $this->view('templates/search', ['search' => $categoryModel->search]);

        /**================================================================
         * Fetching single post data to be displayed on singlePost.php page
        /==================================================================**/
        // Post model loaded
        $postModel = $this->model('PostModel');
        // Posts variable is bound and assigned with model
        $postModel->details = $details;
        $postModel->recentPosts = $recentPosts;

        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Category model loaded and then method
        $categoryModel->category = $category;
        // Will fetch category data
        $categoryModel->category = $categoryModel->categoryList($tableCategory);

        // Will fetch post data
        $postModel->details = $postModel->getPostById($tableArticle, $tableCategory, $postId);
        $postModel->recentPosts = $postModel->recentPosts($tableArticle);
        // Will send category and single post data to home/singlePost(Posts page)
        $this->view('home/singlePost', ['details' => $postModel->details, 'category' => $categoryModel->category, 'recentPosts' => $postModel->recentPosts]);

        /**=====================================================
        * Fetching categories to be displayed on index page
        /=======================================================**/
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Category model loaded and then method
        $categoryModel->category = $category;
        // Will fetch category data
        $categoryModel->category = $categoryModel->categoryList($tableCategory);
        $this->view('home/sideBar', ['category' => $categoryModel->category, 'recentPosts' => $postModel->recentPosts]);

        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    
    /**
     * Will fetch category wise posts
     *
     * @param string $postId
     * @param string $postsAsPerCategory
     * @param string $category
     * @param string $recentPosts
     *
     * @return mixed
     */
    public function categoryWisePosts($categoryId ='', $postsAsPerCategory='', $category='', $recentPosts = '', $search ='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        // Tables to fetch data from
        $tableArticle = 'tbl_article';
        $tableCategory = 'tbl_category';
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        $categoryModel->search = $search;
        $categoryModel->search = $categoryModel->categoryList($tableCategory);
        $this->view('templates/search', ['search' => $categoryModel->search]);

        /**================================================================
         * Fetching single post data to be displayed on singlePost.php page
        /==================================================================**/
        // Post model loaded
        $postModel = $this->model('PostModel');
        // Posts variable is bound and assigned with model
        $postModel->postsAsPerCategory = $postsAsPerCategory;
        $postModel->recentPosts = $recentPosts;
        // Will fetch post data
        $postModel->postsAsPerCategory = $postModel->getPostByCategory($tableArticle, $tableCategory, $categoryId);
        $postModel->recentPosts = $postModel->recentPosts($tableArticle);
        
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Category model loaded and then method
        $categoryModel->category = $category;
        // Will fetch category data
        $categoryModel->category = $categoryModel->categoryList($tableCategory);

        // Will send category and single post data to home/singlePost(Posts page)
        $this->view('home/postsByCategory', ['postsAsPerCategory' => $postModel->postsAsPerCategory, 'category' => $categoryModel->category,'recentPosts' =>  $postModel->recentPosts]);
        
        /**=====================================================
        * Fetching categories to be displayed on index page
        /=======================================================**/
         
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Category model loaded and then method
        $categoryModel->category = $category;
        // Will fetch category data
        $categoryModel->category = $categoryModel->categoryList($tableCategory);
        // Will send category and single post data to home/singlePost(Posts page)
        $this->view('home/sideBar', ['postsAsPerCategory' => $postModel->postsAsPerCategory, 'category' => $categoryModel->category,'recentPosts' =>  $postModel->recentPosts]);

        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    /**
     * Will search out post
     *
     * @param integer $categoryKey
     * @param string $postsAsPerCategory
     * @param integer $category
     * @param string $recentPosts
     * @param string $search
     *
     * @return mixed
     */
    public function search($categoryKey ='', $postsAsPerCategory='', $category='', $recentPosts = '', $search ='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        // Catching the sent keyword
        $keyWord = (isset($_POST['keyWord'])) ? $_POST['keyWord'] : null;
        $categoryKey = (isset($_POST['categoryKey'])) ? $_POST['categoryKey'] : null;

        // Tables to fetch data from
        $tableArticle = 'tbl_article';
        $tableCategory = 'tbl_category';
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        $categoryModel->search = $search;
        $categoryModel->search = $categoryModel->categoryList($tableCategory);
        $this->view('templates/search', ['search' => $categoryModel->search]);

        /**================================================================
         * Fetching single post data to be displayed on singlePost.php page
        /==================================================================**/
        // Post model loaded
        $postModel = $this->model('PostModel');
        // Posts variable is bound and assigned with model
        $postModel->postsAsPerCategory = $postsAsPerCategory;
        $postModel->recentPosts = $recentPosts;
        // Will fetch post data
        $postModel->postsAsPerCategory = $postModel->searchPostsByCategory($tableArticle, $keyWord, $categoryKey);
        $postModel->recentPosts = $postModel->recentPosts($tableArticle);
        
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Category model loaded and then method
        $categoryModel->category = $category;
        // Will fetch category data
        $categoryModel->category = $categoryModel->categoryList($tableCategory);

        // Will send category and single post data to home/singlePost(Posts page)
        // $this->view('home/postsByCategory', ['postsAsPerCategory' => $postModel->postsAsPerCategory, 'category' => $categoryModel->category,'recentPosts' =>  $postModel->recentPosts]);
        
        $this->view('home/searchResult', ['postsAsPerCategory' => $postModel->postsAsPerCategory, 'category' => $categoryModel->category,'recentPosts' =>  $postModel->recentPosts]);
        
        // Sidebar will be loaded
        $this->view('home/sideBar', ['postsAsPerCategory' => $postModel->postsAsPerCategory, 'category' => $categoryModel->category,'recentPosts' =>  $postModel->recentPosts]);

        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    /**
     * Will display post insert form
     *
     * @return void
     */
    public function create($category='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);
        $this->view('admin/leftMenuPanel', []);
        
        // Tables to fetch data from
        $tableCategory = 'tbl_category';
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        $categoryModel->category = $category;
        $categoryModel->category = $categoryModel->categoryList($tableCategory);

        // Insert form will be displayed with category drop down list
        $this->view('admin/article/addArticle', ['category' => $categoryModel->category]);
        
        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    // Will display post to admin panel
    public function postIndex($category='', $posts='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);
        $this->view('admin/leftMenuPanel', []);

        // Table to fetch data from
        $tableCategory = 'tbl_category';
        $tableArticle = 'tbl_article';
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Post model loaded and then method
        $postModel = $this->model('PostModel');

        /**==============================================================
        * Fetching posts data to be displayed on admin article index page
        /================================================================**/
        // Posts variable is bound and assigned with model
        $postModel->posts = $posts;
        // Post model method is loaded
        $postModel->posts = $postModel->viewPosts($tableArticle);
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Category variable is bound and assigned with model
        $categoryModel->category = $category;
        // Will fetch category data
        $categoryModel->category = $categoryModel->categoryList($tableCategory);
        // Will send category and post data to home/index(Posts page)
        $this->view('admin/article/articleIndex', ['posts' => $postModel->posts,'category' =>  $categoryModel->category]);

        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }

    // Will save post to database
    public function store($result='', $category='', $posts='', $message ='', $postErrors='')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);
        $this->view('admin/leftMenuPanel', []);

        // Table to insert data into
        $tableCategory = 'tbl_category';
        $tableArticle = 'tbl_article';
        // Category Model loaded and then method
        $categoryModel = $this->model('CategoryModel');
        // Posts model loaded
        $postModel = $this->model('PostModel');
        //post model is bound to the variable
        $postModel->result = $result;
        $postModel->postErrors = $postErrors;
        
        // Validation class file loaded
        $input = $this->validation('FormValidation');
        
        // Fields validation code
        $input->post('title')
        ->empty()
        ->length(10, 100);

        $input->post('author')
        ->empty()
        ->length(3, 30);

        $input->post('synopsis')
        ->empty()
        ->length(3, 200);

        $input->post('content')
        ->empty();

        $input->post('category')
        ->empty();

        // Input fields
        $title = $input->values['title'];
        $author = $input->values['author'];
        $synopsis = $input->values['synopsis'];
        $content = $input->values['content'];
        $category = $input->values['category'];
        // Fields array
        $fields = [
            'title' => $title,
            'author' => $author,
            'synopsis' => $synopsis,
            'content' => $content,
            'category' => $category
        ];

        if ($input->submit()) {
            // Post data will be stored in article table
            $postModel->result = $postModel->storePost($tableArticle, $fields);
            /**==============================================================
            * Fetching posts data to be displayed on admin article index page
            /================================================================**/
            // Posts variable is bound and assigned with model
            $postModel->posts = $posts;
            $postModel->message = $message;
            // Post model method is loaded
            $postModel->posts = $postModel->viewPosts($tableArticle);
            // Category Model loaded and then method
            $categoryModel = $this->model('CategoryModel');
            // Category variable is bound and assigned with model
            $categoryModel->category = $category;
            // Will fetch category data
            $categoryModel->category = $categoryModel->categoryList($tableCategory);
            // To display insert message
            $postModel->message=[];
            $postModel->result == true ? $postModel->message['message'] = '<div class="alert alert-success"> <strong>WOW !</strong> Post data inserted successfully.</div>': $postModel->message['error_message'] = '<div class="alert alert-danger"><strong>SORRY !</strong>Post data insertion failed.</div>';

            // Will send category and post data to (Posts page)
            $this->view('admin/article/articleIndex', [
            'posts' => $postModel->posts,
            'category' =>  $categoryModel->category,
            'message' => $postModel->message,
            'error_message' => $postModel->message
            ]);

            // views/templates footer.php file loaded
            $this->view('templates/footer', []);
        } else {
            // Tables to fetch data from
            $tableCategory = 'tbl_category';
            // Category Model loaded and then method
            $categoryModel = $this->model('CategoryModel');
            $categoryModel->category = $category;

            // Flag variable to avoid error message
            $postModel->postErrors = [];
            $postModel->postErrors['postErrors'] = $input->errors;
            // Posts model loaded
            $postModel = $this->model('PostModel');

            // views/templates files loaded
            $this->view('templates/head', []);
            $this->view('templates/header', []);
            $this->view('templates/links', []);
            $this->view('admin/leftMenuPanel', []);
            //Categories fetched
            $categoryModel->category = $categoryModel->categoryList($tableCategory);
    
            // Will send category and posts error data to addArticle.php page
            $this->view('admin/article/addArticle', ['postErrors' => $input->errors, 'category' =>  $categoryModel->category]);

            // views/templates footer.php file loaded
            $this->view('templates/footer', []);
        }
    }
    //  Show the form for editing the specified resource.
    public function edit()
    {
    }
    // Update specific post
    public function update()
    {
    }
    // Delete view of the post
    public function delete()
    {
    }
    // Delete the specific post from the database permanently
    public function destroy()
    {
    }
}