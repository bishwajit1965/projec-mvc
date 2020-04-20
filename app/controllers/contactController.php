<?php

class ContactController extends Controller
{
    //Database connection
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->model('ParentModel');
        $this->view('home/contact', []);
    }
    
    public function contactUs()
    {
        // Model loaded
        $this->model('ParentModel');
        // View page loaded using function
        $this->view('home/contact', []);
    }
}