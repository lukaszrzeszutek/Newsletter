<?php

class Subscribers extends Controller {
  public function __construct(){
      // Session Check
    if(!isLoggedIn()){
      header('location: ' . URLROOT . '/' . 'admin');
    }
      // Init model
    $this->emailModel = $this->model('Email');
    }

  public function index(){
      // Get all emails with database
    $emails = $this->emailModel->getEmails();

    $data = [
      'email' => $emails
    ];

    $this->view('subscribers/index', $data);
    }
}
