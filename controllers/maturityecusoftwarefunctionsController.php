<?php

class maturityecusoftwarefunctionsController extends Controller
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

    $data['page'] = 'maturityecusoftwarefunctions';
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

        header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseMaturityecusoftwarefunctions?project_id=" . $_GET['project_id']);
        exit;
    
    }



    //template, view, data
    $this->loadTemplate("home", "maturityecusoftwarefunctions/choose_project_processing", $data);
  }

  public function chooseMaturityecusoftwarefunctions()
  {
    //básico

    $data  = array();
    $filters = array();
    $accounts = new accounts();
    $maturityecusoftwarefunctions = new maturityecusoftwarefunctions();

    $data['page'] = 'maturityecusoftwarefunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_protsa'])) {
      unset($_SESSION['project_protsa']);
    }

    if (isset($_COOKIE['error']) && !empty($_COOKIE['error'])) {
      unset($_COOKIE['error']);
    }    
    

    if(isset($_POST['maturityecusoftwarefunctions_id'])){
      if($_POST['maturityecusoftwarefunctions_id'] == "not-generated"){       
        $maturityecusoftwarefunctions_id = $maturityecusoftwarefunctions->add($_POST['project_id']);
        header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?project_id=" . $_POST['project_id'] . "&maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id);
        exit;
      }else{
        header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?project_id=" . $_POST['project_id'] . "&maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id']);
        exit;
      }
    }  
    

    if (!isset($_GET['project_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwarefunctions");
      exit;
    }

    $filters['project_id'] = addslashes($_GET['project_id']);
    $data['list_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->getAll($filters);
    


    //template, view, data
    $this->loadTemplate("home", "maturityecusoftwarefunctions/choose_maturityecusoftwarefunctions", $data);
  }


  public function chooseStep()
  {
    $data  = array();
    $accounts = new accounts();
    $projects = new projects();
    $maturityecusoftwarefunctions = new maturityecusoftwarefunctions();
    

    $data['page'] = 'maturityecusoftwarefunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);




    if (!isset($_GET['project_id']) || empty($_GET['maturityecusoftwarefunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseMaturityecusoftwarefunctions");
      exit;
    }

    $this->loadTemplate("home", "maturityecusoftwarefunctions/choose_step", $data);
  }

  public function software_information()
  {
    $data  = array();
    $filters  = array();
    $accounts = new accounts();
    $list_ecu = new list_ecu();
    $data_ecu = new data_ecu();
    $maturityecusoftwarefunctions = new maturityecusoftwarefunctions();
    $maturityecusoftwarefunctions_software_informations = new maturityecusoftwarefunctions_software_informations();
    $site = new site();

    $data['page'] = 'maturityecusoftwarefunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);


    if (isset($_POST['responsible_name']) && !empty($_POST['maturityecusoftwarefunctions_id'])) {

      $responsible_name = (isset($_POST['responsible_name'])) ? addslashes($_POST['responsible_name']) : "";
      $info_ecu = $data_ecu->get(addslashes($_POST['info_ecu']));
      $list_ecu_function = implode(", ", $_POST['list_ecu_function']);
      $project_id = $_POST['project_id'];    
      

      if(isset($_POST['type_form']) && $_POST['type_form'] == "edit"){    
        $data['info_maturityecusoftwarefunctions_software_informations'] = $maturityecusoftwarefunctions_software_informations->getByMaturityecusoftwarefunctionId($_POST['maturityecusoftwarefunctions_id']);    
        $maturityecusoftwarefunctions_software_informations->edit($responsible_name, $info_ecu['id'], $list_ecu_function, $data['info_maturityecusoftwarefunctions_software_informations']['id']);
      }else{
        $maturityecusoftwarefunctions_software_informations->add($_POST['maturityecusoftwarefunctions_id'], $responsible_name, $info_ecu['id'], $list_ecu_function);
      }
      
      if ($responsible_name != "") {
        $email_responsible_name = explode(";", $responsible_name);

        foreach ($email_responsible_name as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Informações do Software - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message =
            "<b>Nome ECU: </b>" . $info_ecu['name'] . "<br> <br>" .
            "<b>Funções da ECU: </b>" . $list_ecu_function . "<br> <br>" .
            "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/software_information_provider?project_id=" . $project_id . "&maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id'] . "'>Clique no Link para responder</a>";

          $site->sendMessage($email, $name[0], $subject, $message);
          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?project_id=" . $project_id . "&maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id']);
          exit;
         
        }
      }
    }

   

    $data['list_ecu'] = $list_ecu->getAll($filters, $_GET['project_id']);
    $data['info_maturityecusoftwarefunctions_software_informations'] = $maturityecusoftwarefunctions_software_informations->getByMaturityecusoftwarefunctionId($_GET['maturityecusoftwarefunctions_id']);


    if (!isset($_GET['project_id']) || empty($_GET['maturityecusoftwarefunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep");
      exit;
    }


    $this->loadTemplate("home", "maturityecusoftwarefunctions/software_information", $data);
  }

  public function software_information_provider()
  {
    $data  = array();
    $filters  = array();
    $accounts = new accounts();
    $projects = new projects();
    $list_ecu = new list_ecu();
    $maturityecusoftwarefunctions = new maturityecusoftwarefunctions();
    $maturityecusoftwarefunctions_software_informations = new maturityecusoftwarefunctions_software_informations();
    $site = new site();
    $data['page'] = 'maturityecusoftwarefunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['list_projects'] = $projects->getAll($id);

    $data['list_ecu'] = $list_ecu->getAll($filters, $_GET['project_id']);
    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);

    if (!isset($_GET['project_id']) || empty($_GET['maturityecusoftwarefunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwarefunctions");
      exit;
    }

    $this->loadTemplate("home", "maturityecusoftwarefunctions/software_information_provider", $data);
  } 

  public function complete_stage(){
    $maturityecusoftwarefunctions = new maturityecusoftwarefunctions();
    $percentage = $_GET['percentage'];
    $current_stage = $_GET['step'];
    $project_id = $_GET['project_id'];
    $maturityecusoftwarefunctions_id = $_GET['maturityecusoftwarefunctions_id'];
    $maturityecusoftwarefunctions->complete_stage($current_stage, $percentage, $maturityecusoftwarefunctions_id);
    header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?project_id=" . $project_id . "&maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id);
    exit;
    



  }

 

  
}
