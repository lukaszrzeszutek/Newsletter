<?php

class Newsletter extends Controller {
    public function __construct() {
      //Init model
      $this->emailModel = $this->model('Email');
    }

    public function index() {
      $data = [];

      $this->view('newsletter/index', $data);
    }

    public function save() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          // Init data
          $data =[
            'email' => trim($_POST['email']),
            'email_err' => ''
          ];

          // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Proszę wpisać swój adres E-mail!';
        } elseif (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
          $data['email_err'] = 'Ten adres E-mail nie jest poprawny!';
        } else {
        if($this->emailModel->findEmail($data['email'])){
          $data['email_err'] = 'Ten adres E-mail jest już zapisany na nasz newsletter';
          }
        }

      // Make sure errors are empty
        if(empty($data['email_err'])){
          // Add email to database
          $sign = $this->emailModel->addEmail($data);
          if($sign){
            flash('register_success', 'Dziękujemy za zapisanie się na nasz newsletter!');
            header('location: ' . URLROOT . '/' . 'newsletter');
          } else {
            die('something went wrong');
          }
        } else {
          //load views with errors
          $this->view('newsletter/index', $data);
        }

      } else {
        $data =[
          'email' => '',
          'email_err' => ''
        ];
        
        $this->view('newsletter/index', $data);
      }
  }
}
