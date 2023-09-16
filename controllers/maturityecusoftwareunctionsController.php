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
    $data['page'] = 'maturityecusoftwareunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['list_projects'] = $projects->getAll($id);

    if (!isset($_GET['project_id']) || empty($_GET['maturityecusoftwareunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwareunctions");
      exit;
    }

    $data['list_ecu'] = $list_ecu->getAll($filters, $_GET['project_id']);

    





    $this->loadTemplate("home", "maturityecusoftwareunctions/software_information", $data);
  }
}
