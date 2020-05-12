<?php

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->login();
    }
    
    public function login()
    {
        // views/templates files loaded
        $this->view('templates/head', []);
        $this->view('templates/header', []);
        
        $this->view('login/login');

        // views/templates footer.php file loaded
        $this->view('templates/footer', []);

        Session::init();
        Session::checkLogin();
    }
    public function loginAuthentication($result='')
    {
        $tableUsers = 'tbl_users';
        $userName = (isset($_POST['userName'])) ? $_POST['userName'] : null;
        $password  = (isset($_POST['password'])) ? $_POST['password'] : null;
        $password = md5($_POST['password']);
        $loginModel = $this->model('LoginModel');
        $loginModel->result = $result;
        $loginModel->result =  $loginModel->loginUserCheck($tableUsers, $userName, $password);
        if ($loginModel->result > 0) {
            $loginModel->result =  $loginModel->getUserData($tableUsers, $userName, $password);
            Session::init();
            foreach ($loginModel->result as  $value) {
                Session::set("login", true);
                Session::set("id", $value->id);
                Session::set("userName", $value->userName);
                Session::set("email", $value->email);
                Session::set("role", $value->role);
            }
            header("Location:".BASE_URL."?url=AdminController/home");
        } else {
            header("Location:".BASE_URL."?url=LoginController/login");
        }
        $this->view('login/login', ['result' => $loginModel->result]);
    }
    public function logOut()
    {
        Session::init();
        Session::destroy();
        header("Location:".BASE_URL."?url=LoginController/login");
    }
}