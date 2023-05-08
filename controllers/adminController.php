<?php

class adminController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  { //action

    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $data['page'] = "admin";
    $accounts = new accounts();
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    $ecu = new type_ecu();

    $data['list_type_ecu'] = $ecu->getAll();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
      $name = addslashes($_POST['name']);

      if ($ecu->add($name)) {
        setcookie("failed_add_ecu", "", time() - 100);
        setcookie("success_add_ecu", "O tipo de ECU foi registrado com sucesso!", time() + 100);
        header("Location: " . BASE_URL . "admin");
        exit;
      } else {
        setcookie("success_add_ecu", "", time() - 100);
        setcookie("failed_add_ecu", "O tipo de ECU não pode ser registrado, verifique se os campos foram preenchidos corretamente, ou entre em contato com o suporte do site", time() + 100);
        header("Location: " . BASE_URL . "admin");
        exit;
      }
    }
    //template, view, data
    $this->loadTemplate("home", "admin/add_ecu", $data);
  }

  public function add_can()
  { //action

    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $data['page'] = "admin";
    $accounts = new accounts();
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    $can = new type_can();
    $data['list_type_can'] = $can->getAll();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
      $name = addslashes($_POST['name']);

      if ($can->add($name)) {
        setcookie("failed_add_can", "", time() - 100);
        setcookie("success_add_can", "O tipo de rede CAN foi registrado com sucesso!", time() + 100);
        header("Location: " . BASE_URL . "admin/add_can");
        exit;
      } else {
        setcookie("success_add_can", "", time() - 100);
        setcookie("failed_add_can", "O tipo de rede CAN não pode ser registrado, verifique se o campo foi preenchido corretamente, ou entre em contato com o suporte do site", time() + 100);
        header("Location: " . BASE_URL . "admin/add_can");
        exit;
      }
    }

    //template, view, data
    $this->loadTemplate("home", "admin/add_can", $data);
  }

  public function add_parameters()
  {
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $data['page'] = "admin";
    $accounts = new accounts();
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $parameters = new type_parameters();
    $data['list_type_parameters'] = $parameters->getAll();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
      $name = addslashes($_POST['name']);

      if ($parameters->add($name)) {
        setcookie("failed_add_parameters", "", time() - 100);
        setcookie("success_add_parameters", "O tipo de Parâmetro foi registrado com sucesso!", time() + 100);
        header("Location: " . BASE_URL . "admin/add_parameters");
        exit;
      } else {
        setcookie("success_add_parameters", "", time() - 100);
        setcookie("failed_add_parameters", "O tipo de Parâmetro não pode ser registrado, verifique se o campo foi preenchido corretamente, ou entre em contato com o suporte do site", time() + 100);
        header("Location: " . BASE_URL . "admin/add_parameters");
        exit;
      }
    }

    //template, view, data
    $this->loadTemplate("home", "admin/add_parameter", $data);
  }

  public function add_useful_links()
  { //action

    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $data['page'] = "admin";
    $accounts = new accounts();
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    $useful_links = new useful_links();
    $data['list'] = $useful_links->getAll();

    if (isset($_POST['url']) && !empty($_POST['url'])) {
      $url = addslashes($_POST['url']);
      $title = addslashes($_POST['title']);

      if ($useful_links->add($url, $title)) {
        setcookie("failed_add_link", "", -100);
        setcookie("success_add_link", "O link foi registrado com sucesso", +100);
        header("Location: " . BASE_URL . "admin/add_useful_links");
        exit;
      } else {
        setcookie("success_add_link", "", -100);
        setcookie("failed_add_link", "O link não pode ser registrado, veja se os campos foram preenchidos corretamente, ou entre em contato com o suporte do site", +100);
        header("Location: " . BASE_URL . "admin/add_useful_links");
        exit;
      }
    }

    //template, view, data
    $this->loadTemplate("home", "admin/add_useful_links", $data);
  }

  public function question_point()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data = array();
    $data['page'] = "admin";
    $accounts = new accounts();
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    //fim do básico

    $points = new points();

    $points_id = 1;

    $data['list_questions'] = $points->get($points_id);

    //template, view, data
    $this->loadTemplate("home", "admin/question_points", $data);
  }

  public function edit_points()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data = array();
    $data['page'] = "admin";
    $accounts = new accounts();
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    //fim do básico

    $points = new points();

    $points_id = 1;

    $data['list_questions'] = $points->get($id);

    if (!empty($_POST['point_1']) && !empty($_POST['point_2']) && !empty($_POST['point_3'])) {
      //question 1

      $point_1 = addslashes($_POST['point_1']);

      //question 2

      $point_2 = addslashes($_POST['point_2']);

      //question 3

      $point_3 = addslashes($_POST['point_3']);

      $points->update_questions($point_1, $point_2, $point_3, $points_id);
    }

    $this->loadTemplate("home", "admin/edit_points", $data);
  }

  public function delete_ecu($id)
  {
    $type_ecu = new type_ecu();
    $type_ecu->delete($id);
    header("Location: " . BASE_URL . "admin/add_ecu");
    exit;
  }

  public function delete_parameters($id)
  {
    $type_parameters = new type_parameters();
    $type_parameters->delete($id);
    header("Location: " . BASE_URL . "admin/add_parameters");
    exit;
  }

  public function delete_can($id)
  {
    $type_can = new type_can();
    $type_can->delete($id);
    header("Location: " . BASE_URL . "admin/add_can");
    exit;
  }
}
