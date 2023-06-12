<?php

class softwareintegrationController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    //básico

    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'software_integration';
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
      $software_integrations = new software_integrations();
      $project_id = addslashes($_GET['project_id']);

      if ($software_integrations_id = $software_integrations->add($project_id)) {
        header("Location: " . BASE_URL . "softwareintegration/selectEcu?project_id=" . $project_id . "&software_integrations_id=" . $software_integrations_id);
        exit;
      } else {
        // Cria o novo cookie para durar 1 hora
        setcookie('error', 'Não foi possível selecionar o projeto, tente novamente.', (time() + (1 * 3600)));
        header("Location: " . BASE_URL . "softwareintegration");
        exit;
      }
    }



    //template, view, data
    $this->loadTemplate("home", "software_integration/choose_project_processing", $data);
  }

  public function selectEcu()
  {
    $list_ecu = new list_ecu();
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_proTSA'])) {
      unset($_SESSION['project_proTSA']);
    }

    if (isset($_COOKIE['error']) && !empty($_COOKIE['error'])) {
      unset($_COOKIE['error']);
    }

    if (isset($_GET['ecu_id']) && !empty($_GET['ecu_id'])) {
      $software_integrations = new software_integrations();
      $ecu_id = $_GET['ecu_id'];

     
      $software_integrations->ecu_software_integrations_add($_GET['software_integrations_id'], $ecu_id); //cadastra os ecus selecionados nessa tabela
     
      header("Location: " . BASE_URL . "softwareintegration/uploadDiagramHardware?software_integrations_id=" . $_GET['software_integrations_id'] . "&ecu_id=" . $ecu_id);
      exit;
    }

   

    if (isset($_GET['project_id']) && isset($_GET['software_integrations_id'])) {
      $data['list_ecu_name'] = $list_ecu->getEcuProject($_GET['project_id']); //Pega somente os types ecu que foram registrados no projeto
      
      
    } else {
      header("Location: " . BASE_URL . "softwareintegration");
      exit;
    }

   


    $this->loadTemplate("home", "software_integration/select_ecu_processing", $data);
  }

  public function uploadDiagramHardware()
  {
    $data  = array();
    $data_hardware = new data_hardware();
    $accounts = new accounts();

    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    if (isset($_GET['software_integrations_id']) && isset($_GET['ecu_id'])) {
        $data['list_hardware'] = $data_hardware->getAll();
      
      
    } else {
      header("Location: " . BASE_URL . "softwareintegration");
      exit;
    }

    if (isset($_GET['ecu_id']) && !empty($_GET['ecu_id'])) {
      $software_integrations = new software_integrations();
      $ecu_id = $_GET['ecu_id'];
      $software_integrations_id = $_GET['ecu_id'];
      $diagram = upload($_FILES['files']);//continuar aqui

     
      $software_integrations->diagram_hardwares_add($software_integrations_id, $ecu_id, $diagram); //cadastra os ecus selecionados nessa tabela
     
      header("Location: " . BASE_URL . "softwareintegration/uploadDiagramHardware?software_integrations_id=" . $_GET['software_integrations_id'] . "&ecu_id=" . $ecu_id);
      exit;
    }

    

    $this->loadTemplate("home", "software_integration/type_hardware_processing", $data);
  }
}
