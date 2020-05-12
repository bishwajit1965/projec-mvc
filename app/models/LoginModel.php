<?php

class LoginModel extends ParentModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
    }
    public function home()
    {
    }
    public function loginUserCheck($tableUsers, $userName, $password)
    {
        $sql = "SELECT * FROM $tableUsers WHERE userName = ? AND password = ?";
        return $this->dbHandler->returnedRows($sql, $userName, $password);
    }
    public function getUserData($tableUsers, $userName, $password)
    {
        $sql = "SELECT * FROM $tableUsers WHERE userName = ? AND password = ?";
        return $this->dbHandler->selectUser($sql, $userName, $password);
    }
}