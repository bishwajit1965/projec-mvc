<?php

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index($welcomeMessage = '')
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        // Model loaded and then method
        $homeModel = $this->model('HomeModel');
        $homeModel->home();
        $homeModel->welcomeMessage = $welcomeMessage;
        $homeModel->welcomeMessage = [];

        $homeModel->welcomeMessage['message'] = '<div class="alert alert-success" style="font-weight:900;">HELLO DEAR ! </strong> You are most welcome !!!</div><strong>';

        // View page loaded using view() from views folder
        $this->view('home/home', ['message' => $homeModel->welcomeMessage]);
        
        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    public function home()
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        $homeModel = $this->model('HomeModel');
        
        // Model method called
        $homeModel->home();

        // View file called
        $this->view('home/home', []);
        
        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
}