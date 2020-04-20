<?php

class Controller
{
    protected $dbHandler;
    public function __construct()
    {
        $this->dbHandler = new Database();
    }
    public function model($model)
    {
        require_once '../app/models/'. $model. '.php';
        return new $model();
    }
    public function view($view, $data = [])
    {
        require_once '../app/views/'. $view .'.php';
    }
}