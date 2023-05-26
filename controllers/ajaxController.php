<?php
class ajaxController extends Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function check_password_exist()
  {
    $array = array();
    $accounts = new accounts();

    if (isset($_POST['password']) && !empty($_POST['password'])) {
      $password = addslashes($_POST['password']);
      $id = $_SESSION['proTSA_online'];

      if ($accounts->check_password($password, $id)) {
        $array['retorno'] = "true";
      } else {
        $array['retorno'] = 0;
      }

      echo $array['retorno'];
    }
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

  public function check_name_exist()
  {
    $array = array();
    $projects = new projects();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
      $name = addslashes($_POST['name']);

      if ($projects->check_name_exist($name)) {

        $array['retorno'] = 0;
      } else {
        $array['retorno'] = 'true';
      }

      print_r($array['retorno']);
    }
  }

  public function search_can()
  {
    
    header('Content-Type: application/json; charset=uft-8');
    try {
      $filters = array();
      $filters['search'] = addslashes($_POST['search']);
      $filters['name_can'] = $_SESSION['name_can'];
      $can = new data_can();
      echo json_encode(array(
        'status' => true,
        'data' => $can->getAll($filters),
      ));
    } catch (Exception $exception) {
      echo json_encode(array(
        'status'  => false,
        'error'   => $exception->getMessage()
      ));
    }
  }
  
  public function search_parameters()
  {
    
    header('Content-Type: application/json; charset=uft-8');
    try {
      $filters = array();
      $filters['search'] = addslashes($_POST['search']);
      $filters['type_parameter'] = $_SESSION['type_parameter'];
      $parameters = new data_parameters();
      echo json_encode(array(
        'status' => true,
        'data' => $parameters->getAll($filters),
      ));
    } catch (Exception $exception) {
      echo json_encode(array(
        'status'  => false,
        'error'   => $exception->getMessage()
      ));
    }
    
  }


  
}
