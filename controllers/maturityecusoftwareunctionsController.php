<?php

class maturityecusoftwareunctionsController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
  }

  public function index()
  {
    //básico

    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'maturityecusoftwareunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_protsa'])) {
      unset($_SESSION['project_protsa']);
    }

    if (isset($_COOKIE['error']) && !empty($_COOKIE['error'])) {
      unset($_COOKIE['error']);
    }

    $projects = new projects();

    $data['list_projects'] = $projects->getAll($id);



    if (isset($_GET['project_id']) && !empty($_GET['project_id'])) {

      $maturityecusoftwareunctions = new maturityecusoftwareunctions();
      $project_id = addslashes($_GET['project_id']);

      if ($maturityecusoftwareunctions_id = $maturityecusoftwareunctions->add($project_id)) {
        header("Location: " . BASE_URL . "maturityecusoftwareunctions/chooseStep?project_id=" . $project_id . "&maturityecusoftwareunctions_id=" . $maturityecusoftwareunctions_id);
        exit;
      } else {
        // Cria o novo cookie para durar 1 hora
        setcookie('error', 'Não foi possível selecionar o projeto, tente novamente.', (time() + (1 * 3600)));
        header("Location: " . BASE_URL . "maturityecusoftwareunctions");
        exit;
      }
    }



    //template, view, data
    $this->loadTemplate("home", "maturityecusoftwareunctions/choose_project_processing", $data);
  }


  public function chooseStep()
  {
    $data  = array();
    $accounts = new accounts();
    $projects = new projects();
    $maturityecusoftwareunctions = new maturityecusoftwareunctions();
    $data['maturityecusoftwareunctions'] = $maturityecusoftwareunctions->get($_GET['maturityecusoftwareunctions_id']);
    
    $data['maturityecusoftwareunctions']['total_percentage'] = $data['maturityecusoftwareunctions']['step_1'] + $data['maturityecusoftwareunctions']['step_2'] + $data['maturityecusoftwareunctions']['step_3'] + $data['maturityecusoftwareunctions']['step_4'] + $data['maturityecusoftwareunctions']['step_5'] + $data['maturityecusoftwareunctions']['step_6'];
    

    $data['page'] = 'maturityecusoftwareunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['list_projects'] = $projects->getAll($id);

    if (!isset($_GET['project_id']) || empty($_GET['maturityecusoftwareunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwareunctions");
      exit;
    }

    $this->loadTemplate("home", "maturityecusoftwareunctions/choose_step", $data);
  }

  public function software_information()
  {
    $data  = array();
    $filters  = array();
    $accounts = new accounts();
    $projects = new projects();
    $list_ecu = new list_ecu();
    $data_ecu = new data_ecu();
    $maturityecusoftwareunctions = new maturityecusoftwareunctions();
    $site = new site();
    $data['page'] = 'maturityecusoftwareunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['list_projects'] = $projects->getAll($id);
    

    if (isset($_POST['responsible_name']) && !empty($_POST['maturityecusoftwareunctions_id'])) {

      $name_ecu = $data_ecu->get(addslashes($_POST['name_ecu']));
      $list_ecu_function = $_POST['list_ecu_function'];
      $project_id = $_POST['project_id'];
      $maturityecusoftwareunctions_id = $_POST['maturityecusoftwareunctions_id'];
      $responsible_name = (isset($_POST['responsible_name'])) ? addslashes($_POST['responsible_name']) : "";
      
      $list_ecu_function = implode(", ", $list_ecu_function);
  
      if ($responsible_name != "") {
        $email_responsible_name = explode(";", $responsible_name);

        foreach ($email_responsible_name as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Informações do Software - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message = 
            "<b>Nome ECU: </b>" . $name_ecu['name'] . "<br> <br>" . 
            "<b>Funções da ECU: </b>" . $list_ecu_function . "<br> <br>" . 
            "<a target='_blank' href='" . BASE_URL . "maturityecusoftwareunctions/software_information_provider?project_id=" . $project_id . "&maturityecusoftwareunctions_id=" . $maturityecusoftwareunctions_id . "'>Clique no Link para responder</a>"         
          ;

          $site->sendMessage($email, $name[0], $subject, $message);
          $maturityecusoftwareunctions->editStep($maturityecusoftwareunctions_id, 1, 8);
          header("Location: " . BASE_URL . "maturityecusoftwareunctions/chooseStep?project_id=" . $project_id . "&maturityecusoftwareunctions_id=" . $maturityecusoftwareunctions_id);
          exit;
          
        }
      }

      
    }

    $data['list_ecu'] = $list_ecu->getAll($filters, $_GET['project_id']);


    if (!isset($_GET['project_id']) || empty($_GET['maturityecusoftwareunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwareunctions/chooseStep");
      exit;
    }


    $this->loadTemplate("home", "maturityecusoftwareunctions/software_information", $data);
  }

  public function software_information_provider()
  {
    $data  = array();
    $filters  = array();
    $accounts = new accounts();
    $projects = new projects();
    $list_ecu = new list_ecu();
    $site = new site();
    $data['page'] = 'maturityecusoftwareunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['list_projects'] = $projects->getAll($id);    

    $data['list_ecu'] = $list_ecu->getAll($filters, $_GET['project_id']);

    if (!isset($_GET['project_id']) || empty($_GET['maturityecusoftwareunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwareunctions");
      exit;
    }

    $this->loadTemplate("home", "maturityecusoftwareunctions/software_information_provider", $data);
  }
}
