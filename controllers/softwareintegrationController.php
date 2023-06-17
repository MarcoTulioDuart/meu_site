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
    $data_ecu = new data_ecu();

    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
      $software_integrations = new software_integrations();
      $ecu_id = $_POST['ecu_id'];
      $software_integrations_id = $_POST['software_integrations_id'];

      $site = new site();

      $upload = $_FILES['files']; //pega todos os campos que contem um arquivo enviado
      $dir = "assets/upload/softwareintegration/flowchart/"; //endereço da pasta pra onde serão enviados os arquivos

      //envia os arquivo para a pasta determinada
      $diagram = $site->uploadPdf($dir, $upload);

     
     
      $software_integrations->diagram_hardwares_add($software_integrations_id, $ecu_id, $diagram); //cadastra os ecus selecionados nessa tabela
     
      header("Location: " . BASE_URL . "softwareintegration/releasesSoftware?software_integrations_id=" . $_GET['software_integrations_id'] . "&ecu_id=" . $ecu_id);
      exit;
    }

    if (isset($_GET['software_integrations_id']) && isset($_GET['ecu_id'])) {
        $data['list_hardware'] = $data_hardware->getAll();
      
      
    } else {
      header("Location: " . BASE_URL . "softwareintegration");
      exit;
    }
    $data['info_ecu'] = $data_ecu->get($_GET['ecu_id']);
  

    

    $this->loadTemplate("home", "software_integration/type_hardware_processing", $data);
  }

  public function releasesSoftware(){
    $data  = array();
    $accounts = new accounts();
    $data_ecu = new data_ecu();

    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if(isset($_GET['ecu_id'])){
      $data['info_ecu'] = $data_ecu->get($_GET['ecu_id']);
    }
    

    if (isset($_POST['ecu_id']) && !empty($_POST['software_integrations_id'])) {
      $software_integrations = new software_integrations();
      $ecu_id = $_POST['ecu_id'];
      $software_integrations_id = $_POST['software_integrations_id'];
      $releases_date = $_POST['releases_date'];
      $releases_function  = $_POST['releases_function'];     
    
      foreach($releases_date as $key => $item){
        $software_integrations->releases_software_add($software_integrations_id, $ecu_id, $item, $releases_function[$key]);
      }

      header("Location: " . BASE_URL . "softwareintegration/integrationPlan?software_integrations_id=" . $software_integrations_id . "&ecu_id=" . $ecu_id);
      exit;
    }
  
    
    $this->loadTemplate("home", "software_integration/releases_software", $data);
  }

  public function integrationPlan(){
    $data  = array();
    $accounts = new accounts();
    $data_ecu = new data_ecu();

    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if(isset($_GET['ecu_id'])){
      $data['info_ecu'] = $data_ecu->get($_GET['ecu_id']);
    }
    

    if (isset($_POST['ecu_id']) && !empty($_POST['software_integrations_id'])) {
      $software_integrations = new software_integrations();
      $ecu_id = $_POST['ecu_id'];
      $software_integrations_id = $_POST['software_integrations_id'];
      $releases_date = $_POST['releases_date'];
      $releases_function  = $_POST['releases_function'];     
    
      foreach($releases_date as $key => $item){
        $software_integrations->releases_software_add($software_integrations_id, $ecu_id, $item, $releases_function[$key]);
      }

      
    }
  
    
    $this->loadTemplate("home", "software_integration/integration_plan", $data);
  }

}
