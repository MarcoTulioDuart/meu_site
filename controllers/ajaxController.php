<?php
class ajaxController extends Controller
{

  public function __construct()
  {
    parent::__construct();
  }

 

  public function check_login_exist()
  {
    $array = array();
    $accounts = new accounts();

    if (isset($_POST['email']) && !empty($_POST['email'])) {
      $login = addslashes($_POST['email']);

      if ($accounts->check_login_exist($login)) {

        $array['retorno'] = "true";
      } else {
        $array['retorno'] = 0;
      }

      print_r($array['retorno']);
    }
  }


  
}
