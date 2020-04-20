<?php

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index($name = '')
    {
        // Model loaded and then method
        $homeModel = $this->model('HomeModel');
        $homeModel->index();
        
        // View page loaded using view() from views folder
        $homeModel->name = $name;
        $this->view('home/index', ['name' => $homeModel->name]);
    }
}