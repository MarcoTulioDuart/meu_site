<?php

class softwareintegrationController extends Controller
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
    $accounts = new accounts();
    $type_ecu = new type_ecu();

    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
      $diagram_hardware = new diagram_hardware();
      $ecu_id = $_POST['ecu_id'];
      $software_integrations_id = $_POST['software_integrations_id'];

      $site = new site();

      $upload = $_FILES['files']; //pega todos os campos que contem um arquivo enviado
      $dir = "assets/upload/softwareintegration/flowchart/"; //endereço da pasta pra onde serão enviados os arquivos
      $location = "Location: " . BASE_URL . "softwareintegration/uploadDiagramHardware";
      //envia os arquivo para a pasta determinada
      $diagram = $site->uploadPdf($dir, $upload, $location);     
     
      $diagram_hardware->add($software_integrations_id, $ecu_id, $diagram); //cadastra os ecus selecionados nessa tabela
     
      header("Location: " . BASE_URL . "softwareintegration/releasesSoftware?software_integrations_id=" . $software_integrations_id . "&ecu_id=" . $ecu_id);
      exit;
    }

   
    $data['info_ecu'] = $type_ecu->get($_GET['ecu_id']);

   

    

    $this->loadTemplate("home", "software_integration/type_hardware_processing", $data);
  }

  public function releasesSoftware(){
    $data  = array();
    $accounts = new accounts();
    $type_ecu = new type_ecu();

    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

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

    if(isset($_GET['ecu_id'])){
       $data['info_ecu'] = $type_ecu->get($_GET['ecu_id']);
    }
    

    
  
    
    $this->loadTemplate("home", "software_integration/releases_software", $data);
  }

  public function integrationPlan(){
    $data  = array();
    $accounts = new accounts();
    $type_ecu = new type_ecu();
    $site = new site();
    $integration_plan = new integration_plan();

    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if(isset($_GET['ecu_id'])){
       $data['info_ecu'] = $type_ecu->get($_GET['ecu_id']);
    }
    

    if (isset($_POST['ecu_id']) && !empty($_POST['software_integrations_id'])) {
      
      $ecu_id = $_POST['ecu_id'];
      $software_integrations_id = $_POST['software_integrations_id'];
      $physical_resources = addslashes($_POST['physical_resources']);
      $available_resources  = $_POST['available_resources'];  
      $test_date  = (isset($_POST['test_date'])) ? addslashes($_POST['test_date']) : "";
      $pending_item = (isset($_POST['pending_item'])) ? addslashes($_POST['pending_item']) : "";
      $email_pending_item = (isset($_POST['email_pending_item'])) ? addslashes($_POST['email_pending_item']) : "";
      if($email_pending_item != ""){
        $email_pending_item = explode(";", $email_pending_item);

        foreach ($email_pending_item as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Itens Pendentes - Plano de Integração | Protsa";
          $message = $pending_item;

          $site->sendMessage($email, $name[0], $subject, $message);
        }
      }
      

      
      
      $integration_plan->add($software_integrations_id, $ecu_id, $physical_resources, $available_resources, $test_date, $pending_item);
      header("Location: " . BASE_URL . "softwareintegration/finalStep?software_integrations_id=" . $software_integrations_id);
      exit;

      
    }
  
    
    $this->loadTemplate("home", "software_integration/integration_plan", $data);
  }

  public function finalStep(){
    $data  = array();
    $accounts = new accounts();
    $software_integrations = new software_integrations();
    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['info_software_integrations'] = $software_integrations->get($_GET['software_integrations_id']);
    $data['info_software_integrations_ecu'] = $software_integrations->getSoftwareIntegrationsEcu($_GET['software_integrations_id']);


    $this->loadTemplate("home", "software_integration/final_step", $data);
  }

  public function chooseProjectResults(){
    $data  = array();
    $accounts = new accounts();
    $projects = new projects();
    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['list_projects'] = $projects->getAll($id);


    if(isset($_GET['project_id']) && !empty($_GET['project_id'])){
      header("Location: " . BASE_URL . "softwareintegration/chooseResult?project_id=" . $_GET['project_id']);
      exit;
    }
   
   


    $this->loadTemplate("home", "software_integration/result/choose_project", $data);
  }

  public function chooseResult(){
    $data  = array();
    $accounts = new accounts();
    $projects = new projects();
    $data['page'] = 'chooseResult';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id); 
    
    if(!isset($_GET['project_id']) || empty($_GET['project_id'])){
      header("Location: " . BASE_URL . "softwareintegration/chooseProjectResults");
      exit;
    }
    $this->loadTemplate("home", "software_integration/result/choose_result", $data);
  }

  public function first_result()
  {   
    $data  = array();
    $filters = array();
    $accounts = new accounts();
    $diagram_hardware = new diagram_hardware();
    $software_integrations = new software_integrations();

    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if(!isset($_GET['project_id']) || empty($_GET['project_id'])){
      header("Location: " . BASE_URL . "softwareintegration/chooseProjectResults");
      exit;
    } 

    $data['info_software_integrations'] = $software_integrations->getByProjectId($_GET['project_id']);

    
    foreach ($data['info_software_integrations'] as $key => $value) {
      $data['info_software_integrations'][$key]['info_diagram_hardware'] = $diagram_hardware->getBySoftwareIntegrationsId($value['id']);
    }

    if (isset($_FILES['flowchart_upload']) && !empty($_FILES['flowchart_upload'])) {
      $site = new site();

      $upload = $_FILES['flowchart_upload']; //pega todos os campos que contem um arquivo enviado
      $dir = "assets/upload/softwareintegration/flowchart/"; //endereço da pasta pra onde serão enviados os arquivos
      $location = "Location: " . BASE_URL . "softwareintegration/first_result?project_id=" . $_POST['project_id'];
      //envia os arquivo para a pasta determinada   

      $file = $site->uploadPdf($dir, $upload, $location);
      $ecu_key = $_POST['ecu_key'];
      if($_POST['action_crud']){
        $diagram_hardware->edit($data['info_software_integrations'][$ecu_key]['info_diagram_hardware']['id'], $file); 
      
      }else{
        $diagram_hardware->add($data['info_software_integrations']['id'], $data['info_software_integrations']['ecu_id'], $file); 
      }

      

      header("Location: " . BASE_URL . "softwareintegration/first_result?project_id=" . $_GET['project_id']);
      exit;
    }

    

    //template, view, data
    $this->loadTemplate("home", "software_integration/result/first_result", $data);
  }

  public function second_result()
  {   
    $data  = array();
    $accounts = new accounts();
    $software_integrations = new software_integrations();

    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if(!isset($_GET['project_id']) || empty($_GET['project_id'])){
      header("Location: " . BASE_URL . "softwareintegration/chooseProjectResults");
      exit;
    } 

    $data['info_software_integrations'] = $software_integrations->getByProjectId($_GET['project_id']);

    foreach ($data['info_software_integrations'] as $key => $value) {
      $data['info_software_integrations'][$key]['releases_softwares'] = $software_integrations->getByReleasesSoftware($value['id']);
    }

    
    //template, view, data
    $this->loadTemplate("home", "software_integration/result/second_result", $data);
  }

  public function second_result_download()
  {   
    $data  = array();
    $accounts = new accounts();
    $site = new site();
    $software_integrations = new software_integrations();

    $data['page'] = 'software_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if(!isset($_GET['project_id']) || empty($_GET['project_id'])){
      header("Location: " . BASE_URL . "softwareintegration/chooseProjectResults");
      exit;
    } 

    $data['info_software_integrations'] = $software_integrations->getByProjectId($_GET['project_id']);

    foreach ($data['info_software_integrations'] as $key => $value) {
      $data['info_software_integrations'][$key]['releases_softwares'] = $software_integrations->getByReleasesSoftware($value['id']);
    }
    ob_start();//inicia a inclusão da view na memória
    $this->loadTemplate("download", "software_integration/result/second_result_download", $data);
    $html = ob_get_contents();//armazena a view invés de mostrar
    ob_end_clean();//finaliza a inclusão da view na memória

    $name_file = 'primeiro-resultado-Modulo-1.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L']);
    exit;
    
    
  }



}
