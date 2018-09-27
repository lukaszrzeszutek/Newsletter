<?php

class Admin extends Controller {
    public function __construct() {
      // Load model
      $this->adminModel = $this->model('Admins');
      // Session Check
      if(isLoggedIn()){
        header('location: ' . URLROOT . '/' . 'subscribers');
      }
    }

    public function index() {
      $data = [];
      $this->view('admin/index', $data);
    }

    public function login() {
        // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // Init data
        $data =[
          'login' => trim($_POST['login']),
          'password' => trim($_POST['password']),
          'login_err' => '',
          'password_err' => '',
        ];
        // Validate Login
        if(empty($data['login'])){
          $data['login_err'] = 'Podaj swój login';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Podaj swoje hasło';
        }

        // Check for user/login_err
        if($this->adminModel->findLogin($data['login'])){
          // User found
        } else {
          // User not found
          $data['login_err'] = 'Nie znaleziono admina o podanym loginie';
        }

        if(empty($data['login_err']) && empty($data['password_err'])){
            //Log the user
            $logged = $this->adminModel->login($data['login'], $data['password']);
            if($logged){
              // Create Session
              $this->createUserSession($logged);
            } else{
              $data['password_err'] = 'Hasło nieprawidłowe';
              $this->view('admin/index', $data);
            }
        } else {
            // Load view with errors
            $this->view('admin/index', $data);
        }
    } else {
        // Init data
        $data =[
          'login' => '',
          'password' => '',
          'login_err' => '',
          'password_err' => ''
        ];
        // Load view
        $this->view('admin/index', $data);
      }
  }

    // Create session
  public function createUserSession($user){
      $_SESSION['id'] = $user->id;
      $_SESSION['login'] = $user->login;
      header('location: ' . URLROOT . '/' . 'subscribers');
    }

    // Destroy session
  public function logout(){
      unset($_SESSION['id']);
      unset($_SESSION['login']);
      session_destroy();
      header('location: ' . URLROOT . '/' . 'admin');
    }
}
