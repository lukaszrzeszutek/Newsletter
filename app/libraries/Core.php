<?php

/*
*App Core class
*Creates Url & loads core Controller
*URL FORMAT - /controller/method/params
*/

class Core {
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct() {
      // print_r($this->getUrl());
    $url = $this->getUrl();

      //Look in controllers for first value with array
    if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
        //If exists set as a controllers
      $this->currentController = ucwords($url[0]);
        //Unset 0 Index with array
      unset($url[0]);
    }
        //Require controller
      require_once '../app/controllers/' . $this->currentController . '.php';

        //Instantiate controller class
      $this->currentController = new $this->currentController;

        //Check of second part of Url
      if(isset($url[1])) {
          //Check to see if method exist in controllers
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
            //unset 1 index
          unset($url[1]);
        }
      }

        //Get params (0 and 1 is unset in array so function return params only)
      $this->params = $url ? array_values($url) : [];

        //Call a callback with array of $params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  public function getUrl() {
    if(isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
