<?php

class ContactController extends Controller
{
    //Database connection
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Default page loader method
     *
     * @return void
     */
    public function index()
    {
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        $this->model('HomeModel');
        $this->view('home/index', []);
        $this->view('templates/footer', []);
    }
    
    public function contactUs()
    {
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        $this->view('templates/links', []);

        // Model loaded
        $this->model('HomeModel');
        // View page loaded using function
        $this->view('home/contact', []);
        $this->view('templates/footer', []);
    }
}