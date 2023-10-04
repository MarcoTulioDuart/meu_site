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

    $projects = new projects();

    $data['list_projects'] = $projects->getAll($id);

    $data['info_latest_maturity_ecu_software_functions'] = $maturityecusoftwarefunctions->getLatestMaturityEcuSoftwareFunctions();

    if (isset($_GET['project_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseMaturity?project_id=" . $_GET['project_id']);
      exit;
    }





    //template, view, data
    $this->loadTemplate("home", "maturityecusoftwarefunctions/choose_project_processing", $data);
  }

  public function addMaturity()
  {
    $maturityecusoftwarefunctions = new maturityecusoftwarefunctions();
    if (isset($_GET['project_id'])) {
      $maturityecusoftwarefunctions_id = $maturityecusoftwarefunctions->add($_GET['project_id']);
      header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id);
      exit;
    }
  }

  public function chooseMaturity()
  {
    //básico

    $data  = array();
    $filters = array();
    $accounts = new accounts();
    $maturityecusoftwarefunctions = new maturityecusoftwarefunctions();
    $projects = new projects();

    $data['page'] = 'maturityecusoftwarefunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_protsa'])) {
      unset($_SESSION['project_protsa']);
    }

    if (isset($_COOKIE['error']) && !empty($_COOKIE['error'])) {
      unset($_COOKIE['error']);
    }

    if (isset($_GET['maturityecusoftwarefunctions_id']) && !empty($_GET['maturityecusoftwarefunctions_id'])) {

      header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $_GET['maturityecusoftwarefunctions_id']);
      exit;
    }





    if (!isset($_GET['project_id']) || empty($_GET['project_id'])) {

      header("Location: " . BASE_URL . "maturityecusoftwarefunctions");
      exit;
    }

    $filters['project_id'] = $_GET['project_id'];
    $filters['order'] = "maturityecusoftwarefunctions.id DESC";


    $data['info_maturity_ecu_software_functions'] = $maturityecusoftwarefunctions->getAll($filters);



    //template, view, data
    $this->loadTemplate("home", "maturityecusoftwarefunctions/choose_maturity", $data);
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




    if (!isset($_GET['maturityecusoftwarefunctions_id']) || empty($_GET['maturityecusoftwarefunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwarefunctions");
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


      if (isset($_POST['type_form']) && $_POST['type_form'] == "edit") {
        $data['info_maturityecusoftwarefunctions_software_informations'] = $maturityecusoftwarefunctions_software_informations->getByMaturityecusoftwarefunctionId($_POST['maturityecusoftwarefunctions_id']);
        $maturityecusoftwarefunctions_software_informations->edit($responsible_name, $info_ecu['id'], $list_ecu_function, $data['info_maturityecusoftwarefunctions_software_informations']['id']);
      } else {
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
            "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/software_information_provider?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id'] . "'>Clique no Link para responder</a>";

          $site->sendMessage($email, $name[0], $subject, $message);
          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id']);
          exit;
        }
      }
    }



    $data['list_ecu'] = $list_ecu->getAll($filters, $data['info_maturityecusoftwarefunctions']['project_id']);
    $data['info_maturityecusoftwarefunctions_software_informations'] = $maturityecusoftwarefunctions_software_informations->getByMaturityecusoftwarefunctionId($_GET['maturityecusoftwarefunctions_id']);


    if (!isset($_GET['maturityecusoftwarefunctions_id']) || empty($_GET['maturityecusoftwarefunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwarefunctions");
      exit;
    }


    $this->loadTemplate("home", "maturityecusoftwarefunctions/software_information/software_information", $data);
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
    $maturityecusoftwarefunctions_software_informations_providers = new maturityecusoftwarefunctions_software_informations_providers();
    $site = new site();
    $data['page'] = 'maturityecusoftwarefunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['list_projects'] = $projects->getAll($id);


    if (isset($_POST['maturityecusoftwarefunctions_id']) && !empty($_POST['description_function_software'])) {

      $maturityecusoftwarefunctions_id = addslashes($_POST['maturityecusoftwarefunctions_id']);
      $data['maturityecusoftwarefunctions_software_informations_providers'] = $maturityecusoftwarefunctions_software_informations_providers->getByMaturityecusoftwarefunctionId($maturityecusoftwarefunctions_id);
      $list_ecu_function = addslashes($_POST['list_ecu_function']);
      $description_function_software = addslashes($_POST['description_function_software']);
      $motivation_applying_function_software = addslashes($_POST['motivation_applying_function_software']);
      $parameters['pid'] = $_POST['pid'];
      $parameters['fragment'] = $_POST['fragment'];
      $parameters['values'] = $_POST['values'];
      $releases_date = $_POST['releases_date'];
      $releases_desc = $_POST['releases_desc'];

      if ($_FILES['report1']['full_path'] != "") {
        $upload = $_FILES['report1']; //pega todos os campos que contem um arquivo enviado
        $dir = "assets/upload/maturityecusoftwarefunctions/report/"; //endereço da pasta pra onde serão enviados os arquivos
        $location = "Location: " . BASE_URL . "maturityecusoftwarefunctions/software_information_provider?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id;
        //envia os arquivo para a pasta determinada      
        $report1 = $site->uploadPdf($dir, $upload, $location);
      } else if (isset($data['maturityecusoftwarefunctions_software_informations_providers']) && count($data['maturityecusoftwarefunctions_software_informations_providers']) > 0) {
        $report1 = $data['maturityecusoftwarefunctions_software_informations_providers']['report1'];
      } else {
        $report1 = "";
      }

      if ($_FILES['report2']['full_path'] != "") {
        $upload = $_FILES['report2']; //pega todos os campos que contem um arquivo enviado
        $dir = "assets/upload/maturityecusoftwarefunctions/report/"; //endereço da pasta pra onde serão enviados os arquivos
        $location = "Location: " . BASE_URL . "maturityecusoftwarefunctions/software_information_provider?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id;
        //envia os arquivo para a pasta determinada      
        $report2 = $site->uploadPdf($dir, $upload, $location);
      } else if (isset($data['maturityecusoftwarefunctions_software_informations_providers']) && count($data['maturityecusoftwarefunctions_software_informations_providers']) > 0) {
        $report2 = $data['maturityecusoftwarefunctions_software_informations_providers']['report2'];
      } else {
        $report2 = "";
      }

      if (isset($_POST['type_form']) && $_POST['type_form'] == "edit") {

        $data['info_maturityecusoftwarefunctions_software_informations'] = $maturityecusoftwarefunctions_software_informations->getByMaturityecusoftwarefunctionId($_POST['maturityecusoftwarefunctions_id']);
        $maturityecusoftwarefunctions_software_informations_providers->edit($data['maturityecusoftwarefunctions_software_informations_providers']['id'], $list_ecu_function, $description_function_software, $motivation_applying_function_software, $parameters, $releases_date, $releases_desc, $report1, $report2);
        header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id);
        exit;
      } else {
        $maturityecusoftwarefunctions_software_informations_providers->add($maturityecusoftwarefunctions_id, $list_ecu_function, $description_function_software, $motivation_applying_function_software, $parameters, $releases_date, $releases_desc, $report1, $report2);
        header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id);
        exit;
      }
    }

    if (isset($_POST['responsible_name']) && !empty($_POST['maturityecusoftwarefunctions_id'])) {

      $responsible_name = (isset($_POST['responsible_name'])) ? addslashes($_POST['responsible_name']) : "";
      $reason_rejection = $_POST['reason_rejection'];

      if ($responsible_name != "") {
        $email_responsible_name = explode(";", $responsible_name);

        foreach ($email_responsible_name as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Informações do Software - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message =
            "<b>Motivo da reprovação: </b>" . $reason_rejection . "<br> <br>" .
            "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/software_information_provider?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id'] . "'>Clique no Link para responder</a>";

          $site->sendMessage($email, $name[0], $subject, $message);
          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id']);
          exit;
        }
      }
    }



    if (!isset($_GET['maturityecusoftwarefunctions_id']) || empty($_GET['maturityecusoftwarefunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwarefunctions");
      exit;
    }

    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);
    $data['list_ecu'] = $list_ecu->getAll($filters, $data['info_maturityecusoftwarefunctions']['project_id']);
    $data['info_maturityecusoftwarefunctions_software_informations'] = $maturityecusoftwarefunctions_software_informations->getByMaturityecusoftwarefunctionId($_GET['maturityecusoftwarefunctions_id']);

    $data['info_maturityecusoftwarefunctions_software_informations']['list_ecu_function'] = explode(", ", $data['info_maturityecusoftwarefunctions_software_informations']['list_ecu_function']);

    $data['maturityecusoftwarefunctions_software_informations_providers'] = $maturityecusoftwarefunctions_software_informations_providers->getByMaturityecusoftwarefunctionId($_GET['maturityecusoftwarefunctions_id']);




    $this->loadTemplate("home", "maturityecusoftwarefunctions/software_information/software_information_provider", $data);
  }

  public function complete_stage()
  {
    $maturityecusoftwarefunctions = new maturityecusoftwarefunctions();
    $current_stage = $_GET['step'];
    $percentual_step = $_GET['percentual_step'];
    $maturityecusoftwarefunctions_id = $_GET['maturityecusoftwarefunctions_id'];
    $maturityecusoftwarefunctions->complete_stage($current_stage, $percentual_step, $maturityecusoftwarefunctions_id);
    header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id);
    exit;
  }

  public function softwareInformationDownload()
  {
    $data  = array();
    $filters  = array();
    $accounts = new accounts();
    $type_ecu = new type_ecu();
    $site = new site();
    $maturityecusoftwarefunctions = new maturityecusoftwarefunctions();
    $maturityecusoftwarefunctions_software_informations = new maturityecusoftwarefunctions_software_informations();

    $data['page'] = 'maturityecusoftwarefunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);


    $data['info_maturityecusoftwarefunctions_software_informations'] = $maturityecusoftwarefunctions_software_informations->getByMaturityecusoftwarefunctionId($_GET['maturityecusoftwarefunctions_id']);
    $data['info_maturityecusoftwarefunctions_software_informations']['selected_ecu'] = $type_ecu->getName($data['info_maturityecusoftwarefunctions_software_informations']['selected_ecu'])['name'];



    if (!isset($_GET['maturityecusoftwarefunctions_id']) || empty($_GET['maturityecusoftwarefunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwarefunctions");
      exit;
    }




    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "maturityecusoftwarefunctions/software_information/result/software_information_download", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'Informações do Montadora - Etapa1.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L']);
    exit;
  }

  public function softwareInformationProviderDownload()
  {
    $data  = array();
    $filters  = array();
    $accounts = new accounts();
    $projects = new projects();
    $list_ecu = new list_ecu();
    $maturityecusoftwarefunctions = new maturityecusoftwarefunctions();
    $maturityecusoftwarefunctions_software_informations = new maturityecusoftwarefunctions_software_informations();
    $maturityecusoftwarefunctions_software_informations_providers = new maturityecusoftwarefunctions_software_informations_providers();
    $site = new site();
    $data['page'] = 'maturityecusoftwarefunctions';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    $data['list_projects'] = $projects->getAll($id);

    if (!isset($_GET['maturityecusoftwarefunctions_id']) || empty($_GET['maturityecusoftwarefunctions_id'])) {
      header("Location: " . BASE_URL . "maturityecusoftwarefunctions");
      exit;
    }

    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);
    $data['list_ecu'] = $list_ecu->getAll($filters, $data['info_maturityecusoftwarefunctions']['project_id']);
    $data['info_maturityecusoftwarefunctions_software_informations'] = $maturityecusoftwarefunctions_software_informations->getByMaturityecusoftwarefunctionId($_GET['maturityecusoftwarefunctions_id']);

    $data['info_maturityecusoftwarefunctions_software_informations']['list_ecu_function'] = explode(", ", $data['info_maturityecusoftwarefunctions_software_informations']['list_ecu_function']);

    $data['info_maturityecusoftwarefunctions_software_informations_providers'] = $maturityecusoftwarefunctions_software_informations_providers->getByMaturityecusoftwarefunctionId($_GET['maturityecusoftwarefunctions_id']);


    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "maturityecusoftwarefunctions/software_information/result/software_information_provider_download", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'Informações do Fornecedor - Etapa1.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L']);
    exit;
  }

  /* ----------- TESTE UNITÁRIOS OU CONCEITO -------------------*/

  public function unit_concept_tests_provider()
  {
    $data = array();
    $accounts = new accounts();
    $site = new site();
    $maturityecusoftwarefunctions_unit_concept_tests_provider = new maturityecusoftwarefunctions_unit_concept_tests_provider();
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

    if (isset($_POST['suppliers_email']) && !empty($_POST['maturityecusoftwarefunctions_id'])) {

      $suppliers_email = (isset($_POST['suppliers_email'])) ? addslashes($_POST['suppliers_email']) : "";
      $maturityecusoftwarefunctions_id = addslashes($_POST['maturityecusoftwarefunctions_id']);
      $reason_email = $_POST['reason_email'];

      if ($suppliers_email != "") {
        $suppliers_email_individual = explode(";", $suppliers_email);
        $link = "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/unit_concept_tests_provider?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id . "'>Clique para responder.</a>";
        $maturityecusoftwarefunctions_unit_concept_tests_provider->addLink($maturityecusoftwarefunctions_id, $reason_email, $suppliers_email, $link);
        foreach ($suppliers_email_individual as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Testes unitários ou conceito - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message =
            "<b>Descrição: </b>" . $reason_email . "<br> <br>" .
            $link;

          $site->sendMessage($email, $name[0], $subject, $message);

          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id);
          exit;
        }
      }
    }

    if (isset($_POST['assembler_email']) && !empty($_POST['maturityecusoftwarefunctions_id'])) {

      $assembler_email = (isset($_POST['assembler_email'])) ? addslashes($_POST['assembler_email']) : "";
      $maturityecusoftwarefunctions_id = addslashes($_POST['maturityecusoftwarefunctions_id']);
      $email_description = $_POST['email_description'];
      $data['info_maturityecusoftwarefunctions_unit_concept_tests_provider'] = $maturityecusoftwarefunctions_unit_concept_tests_provider->getByMaturityEcuSoftwareFunctions_id($maturityecusoftwarefunctions_id);
      if ($_FILES['result_file']['full_path'] != "") {
        $upload = $_FILES['result_file']; //pega todos os campos que contem um arquivo enviado
        $dir = "assets/upload/unit_concept_tests_provider/result_file/"; //endereço da pasta pra onde serão enviados os arquivos
        $location = "Location: " . BASE_URL . "maturityecusoftwarefunctions/software_information_provider?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id;
        //envia os arquivo para a pasta determinada      
        $result_file = $site->uploadPdf($dir, $upload, $location);
      } else if (isset($data['info_maturityecusoftwarefunctions_unit_concept_tests_provider']) && count($data['info_maturityecusoftwarefunctions_unit_concept_tests_provider']) > 0) {
        $result_file = $data['info_maturityecusoftwarefunctions_unit_concept_tests_provider']['result_file'];
      } else {
        $result_file = "";
      }


      $maturityecusoftwarefunctions_unit_concept_tests_provider->addInfoProvider($data['info_maturityecusoftwarefunctions_unit_concept_tests_provider']['id'], $assembler_email, $email_description, $result_file);


      if ($assembler_email != "") {
        $email_responsible_name = explode(";", $assembler_email);

        foreach ($email_responsible_name as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Testes unitários ou conceito - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message =
            "<b>Descrição: </b>" . $email_description . "<br> <br>" .
            "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/unit_concept_tests_provider?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id'] . "'>Clique para visualizar.</a>";

          $site->sendMessage($email, $name[0], $subject, $message);
          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id']);
          exit;
        }
      }
    }

    if (isset($_POST['suppliers_email']) && !empty($_POST['reason_rejection'])) {

      $suppliers_email = (isset($_POST['suppliers_email'])) ? addslashes($_POST['suppliers_email']) : "";
      $reason_rejection = $_POST['reason_rejection'];

      if ($suppliers_email != "") {
        $email_responsible_name = explode(";", $suppliers_email);

        foreach ($email_responsible_name as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Testes unitários ou conceito - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message =
            "<b>Motivo da reprovação: </b>" . $reason_rejection . "<br> <br>" .
            "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/unit_concept_tests_provider?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id'] . "'>Clique no Link para responder</a>";

          $site->sendMessage($email, $name[0], $subject, $message);
          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id']);
          exit;
        }
      }
    }

    $data['info_maturityecusoftwarefunctions_unit_concept_tests_provider'] = $maturityecusoftwarefunctions_unit_concept_tests_provider->getByMaturityEcuSoftwareFunctions_id($_GET['maturityecusoftwarefunctions_id']);
    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);

    $this->loadTemplate("home", "maturityecusoftwarefunctions/unit_concept_tests/provider", $data);
  }

  public function unitConceptTestsProviderDownload()
  {
    $data = array();
    $accounts = new accounts();
    $site = new site();
    $maturityecusoftwarefunctions_unit_concept_tests_provider = new maturityecusoftwarefunctions_unit_concept_tests_provider();
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

    $data['info_maturityecusoftwarefunctions_unit_concept_tests_provider'] = $maturityecusoftwarefunctions_unit_concept_tests_provider->getByMaturityEcuSoftwareFunctions_id($_GET['maturityecusoftwarefunctions_id']);
    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);


    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "maturityecusoftwarefunctions/unit_concept_tests/result/provider", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'Informações do Fornecedor - Etapa1.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L']);
    exit;
  }

  /* ----------- Testes em Hill no fornecedor ou montadora -------------------*/

  public function hill_tests_supapplication_testplier_assembler()
  {
    $data = array();
    $accounts = new accounts();
    $site = new site();
    $maturityecusoftwarefunctions_hill_tests_supplier_assembler = new maturityecusoftwarefunctions_hill_tests_supplier_assembler();
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

    if (isset($_POST['suppliers_email']) && !empty($_POST['reason_email'])) {

      $suppliers_email = (isset($_POST['suppliers_email'])) ? addslashes($_POST['suppliers_email']) : "";
      $maturityecusoftwarefunctions_id = addslashes($_POST['maturityecusoftwarefunctions_id']);
      $reason_email = $_POST['reason_email'];

      if ($suppliers_email != "") {
        $suppliers_email_individual = explode(";", $suppliers_email);
        $link = "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/hill_tests_supplier_assembler?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id . "'>Clique para responder.</a>";
        $maturityecusoftwarefunctions_hill_tests_supplier_assembler->addLink($maturityecusoftwarefunctions_id, $reason_email, $suppliers_email, $link);
        foreach ($suppliers_email_individual as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Testes unitários ou conceito - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message =
            "<b>Descrição: </b>" . $reason_email . "<br> <br>" .
            $link;

          $site->sendMessage($email, $name[0], $subject, $message);

          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id);
          exit;
        }
      }
    }

    if (isset($_POST['assembler_email']) && !empty($_POST['maturityecusoftwarefunctions_id'])) {

      $assembler_email = (isset($_POST['assembler_email'])) ? addslashes($_POST['assembler_email']) : "";
      $maturityecusoftwarefunctions_id = addslashes($_POST['maturityecusoftwarefunctions_id']);
      $email_description = $_POST['email_description'];
      $data['info_maturityecusoftwarefunctions_hill_tests_supplier_assembler'] = $maturityecusoftwarefunctions_hill_tests_supplier_assembler->getByMaturityEcuSoftwareFunctions_id($maturityecusoftwarefunctions_id);
      if ($_FILES['result_file']['full_path'] != "") {
        $upload = $_FILES['result_file']; //pega todos os campos que contem um arquivo enviado
        $dir = "assets/upload/hill_tests_supplier_assembler/result_file/"; //endereço da pasta pra onde serão enviados os arquivos
        $location = "Location: " . BASE_URL . "maturityecusoftwarefunctions/software_information_provider?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id;
        //envia os arquivo para a pasta determinada      
        $result_file = $site->uploadPdf($dir, $upload, $location);
      } else if (isset($data['info_maturityecusoftwarefunctions_hill_tests_supplier_assembler']) && count($data['info_maturityecusoftwarefunctions_hill_tests_supplier_assembler']) > 0) {
        $result_file = $data['info_maturityecusoftwarefunctions_hill_tests_supplier_assembler']['result_file'];
      } else {
        $result_file = "";
      }


      $maturityecusoftwarefunctions_hill_tests_supplier_assembler->addInfoProvider($data['info_maturityecusoftwarefunctions_hill_tests_supplier_assembler']['id'], $assembler_email, $email_description, $result_file);


      if ($assembler_email != "") {
        $email_responsible_name = explode(";", $assembler_email);

        foreach ($email_responsible_name as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Testes unitários ou conceito - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message =
            "<b>Descrição: </b>" . $email_description . "<br> <br>" .
            "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/hill_tests_supplier_assembler?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id'] . "'>Clique para visualizar.</a>";

          $site->sendMessage($email, $name[0], $subject, $message);
          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id']);
          exit;
        }
      }
    }

    if (isset($_POST['suppliers_email']) && !empty($_POST['reason_rejection'])) {

      $suppliers_email = (isset($_POST['suppliers_email'])) ? addslashes($_POST['suppliers_email']) : "";
      $reason_rejection = $_POST['reason_rejection'];

      if ($suppliers_email != "") {
        $email_responsible_name = explode(";", $suppliers_email);

        foreach ($email_responsible_name as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Testes unitários ou conceito - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message =
            "<b>Motivo da reprovação: </b>" . $reason_rejection . "<br> <br>" .
            "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/hill_tests_supplier_assembler?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id'] . "'>Clique no Link para responder</a>";

          $site->sendMessage($email, $name[0], $subject, $message);
          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id']);
          exit;
        }
      }
    }

    $data['info_maturityecusoftwarefunctions_hill_tests_supplier_assembler'] = $maturityecusoftwarefunctions_hill_tests_supplier_assembler->getByMaturityEcuSoftwareFunctions_id($_GET['maturityecusoftwarefunctions_id']);
    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);

    $this->loadTemplate("home", "maturityecusoftwarefunctions/hill_tests_supplier_assembler/provider", $data);
  }

  public function hillTestsSupplierAssemblerDownload()
  {
    $data = array();
    $accounts = new accounts();
    $site = new site();
    $maturityecusoftwarefunctions_hill_tests_supplier_assembler = new maturityecusoftwarefunctions_hill_tests_supplier_assembler();
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

    $data['info_maturityecusoftwarefunctions_hill_tests_supplier_assembler'] = $maturityecusoftwarefunctions_hill_tests_supplier_assembler->getByMaturityEcuSoftwareFunctions_id($_GET['maturityecusoftwarefunctions_id']);
    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);


    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "maturityecusoftwarefunctions/hill_tests_supplier_assembler/result/provider", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'Informações do Fornecedor - Etapa1.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L']);
    exit;
  }

  /* ----------- Testes de aplicação -------------------*/



  public function applicationTest()
  {
    $data = array();
    $accounts = new accounts();
    $site = new site();
    $maturityecusoftwarefunctions_application_test = new maturityecusoftwarefunctions_application_test();
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

    if (isset($_POST['suppliers_email']) && !empty($_POST['reason_email'])) {

      $suppliers_email = (isset($_POST['suppliers_email'])) ? addslashes($_POST['suppliers_email']) : "";
      $maturityecusoftwarefunctions_id = addslashes($_POST['maturityecusoftwarefunctions_id']);
      $reason_email = $_POST['reason_email'];

      if ($suppliers_email != "") {
        $suppliers_email_individual = explode(";", $suppliers_email);
        $link = "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/application_test?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id . "'>Clique para responder.</a>";
        $maturityecusoftwarefunctions_application_test->addLink($maturityecusoftwarefunctions_id, $reason_email, $suppliers_email, $link);
        foreach ($suppliers_email_individual as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Testes unitários ou conceito - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message =
            "<b>Descrição: </b>" . $reason_email . "<br> <br>" .
            $link;

          $site->sendMessage($email, $name[0], $subject, $message);

          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id);
          exit;
        }
      }
    }

    if (isset($_POST['assembler_email']) && !empty($_POST['maturityecusoftwarefunctions_id'])) {

      $assembler_email = (isset($_POST['assembler_email'])) ? addslashes($_POST['assembler_email']) : "";
      $maturityecusoftwarefunctions_id = addslashes($_POST['maturityecusoftwarefunctions_id']);
      $email_description = $_POST['email_description'];
      $data['info_maturityecusoftwarefunctions_application_test'] = $maturityecusoftwarefunctions_application_test->getByMaturityEcuSoftwareFunctions_id($maturityecusoftwarefunctions_id);
      if ($_FILES['result_file']['full_path'] != "") {
        $upload = $_FILES['result_file']; //pega todos os campos que contem um arquivo enviado
        $dir = "assets/upload/application_test/result_file/"; //endereço da pasta pra onde serão enviados os arquivos
        $location = "Location: " . BASE_URL . "maturityecusoftwarefunctions/software_information_provider?maturityecusoftwarefunctions_id=" . $maturityecusoftwarefunctions_id;
        //envia os arquivo para a pasta determinada      
        $result_file = $site->uploadPdf($dir, $upload, $location);
      } else if (isset($data['info_maturityecusoftwarefunctions_application_test']) && count($data['info_maturityecusoftwarefunctions_application_test']) > 0) {
        $result_file = $data['info_maturityecusoftwarefunctions_application_test']['result_file'];
      } else {
        $result_file = "";
      }


      $maturityecusoftwarefunctions_application_test->addInfoProvider($data['info_maturityecusoftwarefunctions_application_test']['id'], $assembler_email, $email_description, $result_file);


      if ($assembler_email != "") {
        $email_responsible_name = explode(";", $assembler_email);

        foreach ($email_responsible_name as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Testes unitários ou conceito - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message =
            "<b>Descrição: </b>" . $email_description . "<br> <br>" .
            "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/application_test?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id'] . "'>Clique para visualizar.</a>";

          $site->sendMessage($email, $name[0], $subject, $message);
          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id']);
          exit;
        }
      }
    }

    if (isset($_POST['suppliers_email']) && !empty($_POST['reason_rejection'])) {

      $suppliers_email = (isset($_POST['suppliers_email'])) ? addslashes($_POST['suppliers_email']) : "";
      $reason_rejection = $_POST['reason_rejection'];

      if ($suppliers_email != "") {
        $email_responsible_name = explode(";", $suppliers_email);

        foreach ($email_responsible_name as $key => $value) {
          $name = explode("@", $value);
          $email = $value;
          $subject = "Testes unitários ou conceito - Maturidade de ECU's, Softwares e Funções | Protsa";
          $message =
            "<b>Motivo da reprovação: </b>" . $reason_rejection . "<br> <br>" .
            "<a target='_blank' href='" . BASE_URL . "maturityecusoftwarefunctions/application_test?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id'] . "'>Clique no Link para responder</a>";

          $site->sendMessage($email, $name[0], $subject, $message);
          header("Location: " . BASE_URL . "maturityecusoftwarefunctions/chooseStep?maturityecusoftwarefunctions_id=" . $_POST['maturityecusoftwarefunctions_id']);
          exit;
        }
      }
    }

    $data['info_maturityecusoftwarefunctions_application_test'] = $maturityecusoftwarefunctions_application_test->getByMaturityEcuSoftwareFunctions_id($_GET['maturityecusoftwarefunctions_id']);
    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);

    $this->loadTemplate("home", "maturityecusoftwarefunctions/application_test/provider", $data);
  }

  public function applicationTestDownload()
  {
    $data = array();
    $accounts = new accounts();
    $site = new site();
    $maturityecusoftwarefunctions_application_test = new maturityecusoftwarefunctions_application_test();
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

    $data['info_maturityecusoftwarefunctions_application_test'] = $maturityecusoftwarefunctions_application_test->getByMaturityEcuSoftwareFunctions_id($_GET['maturityecusoftwarefunctions_id']);
    $data['info_maturityecusoftwarefunctions'] = $maturityecusoftwarefunctions->get($_GET['maturityecusoftwarefunctions_id']);


    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "maturityecusoftwarefunctions/application_test/result/provider", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'Informações do Fornecedor - Etapa1.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L']);
    exit;
  }
}
