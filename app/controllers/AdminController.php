<?php

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Session::checkSession();
    }
    public function index()
    {
        $this->home();
    }
    public function home()
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);
        // Code below
        $this->view('admin/leftMenuPanel', []);
    
        $this->view('admin/contentRight', []);
       
        // views/templates footer.php file loaded
        $this->view('templates/footer', []);
    }
    

}