<?php

class homeController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  { //action

    $data  = array();
    $filters = array();
  

    //template, view, data
    $this->loadTemplate("home","home", $data);
  }



 

}
