<?php

class adminController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  { //action

    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'admin';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

   //Session de projeto
   if (isset($_SESSION['project_protsa'])) {
    unset($_SESSION['project_protsa']);
  }
  //Session do Primeiro Módulo
  if (isset($_SESSION['integration_id_proTSA'])) {
    unset($_SESSION['integration_id_proTSA']);
  }
  //Session do Segundo Módulo

  //Session do Terceiro Módulo
  if (isset($_SESSION['signals_id_proTSA'])) {
    unset($_SESSION['signals_id_proTSA']);
    unset($_SESSION['project_signals_id_proTSA']);
  }
  //Session do Quarto Módulo
  if (isset($_SESSION['parameters_id_proTSA'])) {
    unset($_SESSION['parameters_id_proTSA']);
    unset($_SESSION['parameters_project_id_proTSA']);
  }
  //Session do Quinto Módulo

  //Session do Sexto Módulo
  if (isset($_SESSION['safe_test_id_proTSA'])) {
    unset($_SESSION['safe_test_id_proTSA']);
  }
  //fim do básico

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
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'admin';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    //Session de projeto
    if (isset($_SESSION['project_protsa'])) {
      unset($_SESSION['project_protsa']);
    }
    //Session do Primeiro Módulo
    if (isset($_SESSION['integration_id_proTSA'])) {
      unset($_SESSION['integration_id_proTSA']);
    }
    //Session do Segundo Módulo

    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

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
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'admin';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    if (isset($_SESSION['project_protsa'])) {
      //Session de projeto
      unset($_SESSION['project_protsa']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['signals_id_proTSA'])) {
      //Session do Terceiro Módulo
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }

    //fim do básico

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

    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'admin';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    //Session de projeto
    if (isset($_SESSION['project_protsa'])) {
      unset($_SESSION['project_protsa']);
    }
    //Session do Primeiro Módulo
    if (isset($_SESSION['integration_id_proTSA'])) {
      unset($_SESSION['integration_id_proTSA']);
    }
    //Session do Segundo Módulo

    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

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
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'admin';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    //Session de projeto
    if (isset($_SESSION['project_protsa'])) {
      unset($_SESSION['project_protsa']);
    }
    //Session do Primeiro Módulo
    if (isset($_SESSION['integration_id_proTSA'])) {
      unset($_SESSION['integration_id_proTSA']);
    }
    //Session do Segundo Módulo

    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
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
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'admin';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    //Session de projeto
    if (isset($_SESSION['project_protsa'])) {
      unset($_SESSION['project_protsa']);
    }
    //Session do Primeiro Módulo
    if (isset($_SESSION['integration_id_proTSA'])) {
      unset($_SESSION['integration_id_proTSA']);
    }
    //Session do Segundo Módulo

    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
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

  public function delete_link($id)
  {
    $useful_links = new useful_links();
    $useful_links->deleteLink($id);
    header("Location: " . BASE_URL . "admin/add_useful_links");
    exit;
  }
}
