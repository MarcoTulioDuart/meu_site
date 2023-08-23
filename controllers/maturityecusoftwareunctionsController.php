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
    if (isset($_SESSION['project_proTSA'])) {
      unset($_SESSION['project_proTSA']);
    }

    if (isset($_COOKIE['error']) && !empty($_COOKIE['error'])) {
      unset($_COOKIE['error']);
    }


    //fim do básico

    //form 1: Escolha o projeto
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

  
  public function chooseStep(){
    $data  = array();
    $accounts = new accounts();
    $projects = new projects();
    $data['page'] = 'maturityecusoftwareunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['list_projects'] = $projects->getAll($id);


    if(isset($_GET['project_id']) && !empty($_GET['project_id'])){
      header("Location: " . BASE_URL . "maturityecusoftwareunctions");
      exit;
    }
   
   


    $this->loadTemplate("home", "maturityecusoftwareunctions/choose_step", $data);
  }

  public function select_automaker()
  {
    $list_ecu = new list_ecu();
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'maturityecusoftwareunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_proTSA'])) {
      unset($_SESSION['project_proTSA']);
    }

    if (isset($_COOKIE['error']) && !empty($_COOKIE['error'])) {
      unset($_COOKIE['error']);
    }

    if (isset($_GET['ecu_id']) && !empty($_GET['ecu_id'])) {
      $maturityecusoftwareunctions = new maturityecusoftwareunctions();
      $ecu_id = $_GET['ecu_id'];

     
      $maturityecusoftwareunctions->ecu_maturityecusoftwareunctions_add($_GET['maturityecusoftwareunctions_id'], $ecu_id); //cadastra os ecus selecionados nessa tabela
     
      header("Location: " . BASE_URL . "maturityecusoftwareunctions/uploadDiagramHardware?maturityecusoftwareunctions_id=" . $_GET['maturityecusoftwareunctions_id'] . "&ecu_id=" . $ecu_id);
      exit;
    }

   

    if (isset($_GET['project_id']) && isset($_GET['maturityecusoftwareunctions_id'])) {
      $data['list_ecu_name'] = $list_ecu->getEcuProject($_GET['project_id']); //Pega somente os types ecu que foram registrados no projeto
      
      
    } else {
      header("Location: " . BASE_URL . "maturityecusoftwareunctions");
      exit;
    }

   


    $this->loadTemplate("home", "maturityecusoftwareunctions/select_automaker", $data);
  }

  

  




 
}
