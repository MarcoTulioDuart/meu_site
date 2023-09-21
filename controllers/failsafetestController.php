<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class failsafetestController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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
    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA']) || isset($_SESSION['signal_integration_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }

    //fim do básico

    //etapa 1
    $type_ecu = new type_ecu();

    $data['list_ecu'] = $type_ecu->getAll();

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/basic_info/basic_info_ecu_1", $data);
  }

  public function select_ecu_basic()
  {
    //etapa 1
    $id = $_SESSION['proTSA_online'];
    $fail_safe_test = new fail_safe_test();
    $list_basic_info = new list_basic_info();

    if (isset($_POST['ecu_id']) && !empty($_POST['ecu_id'])) {
      $fail_safe_id = $fail_safe_test->add($id);

      $ecus = $_POST['ecu_id'];

      for ($i = 0; $i < count($ecus); $i++) {
        $type_ecu_id = $ecus[$i];

        $list_basic_info->add($type_ecu_id, $fail_safe_id);
      }
      setcookie("ecus_failed", "", time() - 100);
      header("Location: " . BASE_URL . "failsafetest/basic_info_ecu_2?fail_safe_id=" . $fail_safe_id);
      exit;
    }

    setcookie("ecus_failed", "Houve um problema, não foram selecionas Ecus para o teste, por favor tente novamente selecionando uma ou mais Ecus.", time() + 100);
    header("Location: " . BASE_URL . "failsafetest");
    exit;
  }

  public function basic_info_ecu_2()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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
    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA']) || isset($_SESSION['signal_integration_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //fim do básico

    //etapa 2
    $list_basic_info = new list_basic_info();

    $fail_safe_id = $_GET['fail_safe_id'];

    $data['all_ecus_basic_info'] = $list_basic_info->getAllEcus($fail_safe_id);

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/basic_info/basic_info_ecu_2", $data);
  }

  public function add_responsible()
  {
    //etapa 2
    $fail_safe_id = $_GET['fail_safe_id']; //id do processo

    $list_basic_info = new list_basic_info();

    if (!empty($_POST['responsible_name']) && !empty($_POST['responsible_email'])) {

      $ecus = $list_basic_info->getAllEcus($fail_safe_id);

      foreach ($ecus as $key => $value) {
        $responsible_name = $_POST['responsible_name'][$key];
        $responsible_email = $_POST['responsible_email'][$key];
        $id = $value['basic_info_id'];
        $list_basic_info->edit_responsibles($responsible_name, $responsible_email, $id);
      }

      header("Location: " . BASE_URL . "failsafetest/basic_info_upload?fail_safe_id=" . $fail_safe_id);
      exit;
    }
  }

  //até aqui perfeito

  public function basic_info_upload()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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
    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA']) || isset($_SESSION['signal_integration_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //fim do básico

    //etapa 3

    $fail_safe_id = $_GET['fail_safe_id']; //id do processo

    $list_basic_info = new list_basic_info();
    $site = new site();
    $fail_code = new fail_code();

    if (isset($_FILES['upload_ecu_reference']) && !empty($_FILES['upload_ecu_reference'])) {

      $files = $_FILES['upload_ecu_reference'];

      $dir = "assets/upload/failsafetest/reference_fail_ecu/teste_" . $fail_safe_id . "/"; //endereço da pasta pra onde serão enviados os arquivos

      $location = "Location: " . BASE_URL . "failsafetest/basic_info_upload?fail_safe_id=" . $fail_safe_id;

      //envia os arquivo para a pasta determinada
      if ($file = $site->uploadPdf($dir, $files, $location)) {

        $list_basic_info->upload($file, $fail_safe_id);

        ini_set('memory_limit', '2024M');
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($dir . $_FILES['upload_ecu_reference']['name']);

        /*echo "<pre>";
        var_dump($_FILES['upload_ecu_reference']);
        exit;*/

        $spreadsheet = $reader->load($dir . $_FILES['upload_ecu_reference']['name']);

        $worksheet = $spreadsheet->getActiveSheet(); //pega somente a aba ativa
        //pega a quantidade total de linhas
        $highestRow = $worksheet->getHighestRow();

        for ($row = 36; $row < $highestRow; ++$row) {

          $vehicle = $worksheet->getCell("A" . $row)->getValue();
          $date = $worksheet->getCell("B" . $row)->getValue();
          $ecu = $worksheet->getCell("C" . $row)->getValue();
          $fc = $worksheet->getCell("D" . $row)->getValue();
          $fc_description = $worksheet->getCell("E" . $row)->getValue();
          $cw = $worksheet->getCell("F" . $row)->getValue();
          $fail_status = $worksheet->getCell("G" . $row)->getValue();
          $solution = $worksheet->getCell("H" . $row)->getCalculatedValue();

          $fail_code->add($vehicle, $date, $ecu, $fc, $fc_description, $cw, $fail_status, $solution, $fail_safe_id);
        }
        header("Location: " . BASE_URL . "failsafetest/select_ecu_output?fail_safe_id=" . $fail_safe_id);
        exit;
      } else {
        header("Location: " . BASE_URL . "failsafetest/basic_info_upload?fail_safe_id=" . $fail_safe_id);
        exit;
      }
    }

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/basic_info/basic_info_upload", $data);
  }

  public function select_ecu_output()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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
    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA']) || isset($_SESSION['signal_integration_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //fim do básico

    //etapa 4

    $list_basic_info = new list_basic_info();

    $fail_safe_id = $_GET['fail_safe_id'];

    $data['all_ecus_basic_info'] = $list_basic_info->getAllEcus($fail_safe_id); //pega as ecus que foram escolhidas na etapa passada


    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/fail_ecu_out_put/select_ecu_output", $data);
  }

  public function select_fail_code()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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
    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA']) || isset($_SESSION['signal_integration_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //fim do básico

    //etapa 5
    $fail_safe_id = $_GET['fail_safe_id'];
    $basic_info_id = $_GET['basic_info_id'];

    $fail_code = new fail_code();
    $list_basic_info = new list_basic_info();
    $list_test_ecu = new list_test_ecu();

    $basic_info = $list_basic_info->get($basic_info_id);

    $data['list_fail_code'] = $fail_code->getAllListBasic($fail_safe_id, $basic_info['ecu_name']);

    if (isset($_POST['fail_code']) && !empty($_POST['fail_code'])) {

      $fail_code = $_POST['fail_code'];

      for ($i = 0; $i < $fail_code; $i++) {
        $code_id = $fail_code[$i];

        $list_test_ecu->add($code_id, $basic_info_id, $fail_safe_id);
      }
      header("Location: " . BASE_URL . "failsafetest/fail_out_put?fail_safe_id=" . $fail_safe_id . "&basic_info_id=" . $basic_info_id);
      exit;
    }

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/fail_ecu_out_put/select_fail_output", $data);
  }

  public function fail_out_put()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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
    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA']) || isset($_SESSION['signal_integration_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //fim do básico

    //etapa 6

    $fail_safe_id = $_GET['fail_safe_id'];
    $basic_info_id = $_GET['basic_info_id'];
    $list_test_ecu = new list_test_ecu();

    $data['result'] = $list_test_ecu->getResultEcu($fail_safe_id, $basic_info_id);

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/fail_ecu_out_put/fail_out_put_result", $data);
  }

  public function single_ecu_download()
  {
    $data = array();
    $site = new site();

    //etapa 6

    $fail_safe_id = $_GET['fail_safe_id'];
    $basic_info_id = $_GET['basic_info_id'];
    $list_test_ecu = new list_test_ecu();

    $data['result'] = $list_test_ecu->getResultEcu($fail_safe_id, $basic_info_id);

    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "fail_safe_test/downloads/single_ecu_download", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'resultado-de-teste-de-ecu-Modulo-6.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-P', 'orientation' => 'P']);
    exit;
  }

  public function select_vehicle_out_put()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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
    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA']) || isset($_SESSION['signal_integration_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }

    //fim do básico

    //etapa 7

    $fail_safe_id = $_GET['fail_safe_id'];
    $fail_code = new fail_code();

    $data['all_vehicles'] = $fail_code->getAllVehicles($fail_safe_id);

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/fail_vehicle_out_put/select_vehicle", $data);
  }

  public function select_vehicle()
  {
    //etapa 7

    $fail_safe_id = $_GET['fail_safe_id'];
    $list_test_vehicle = new list_test_vehicle();

    if (isset($_POST['vehicle_id']) && !empty($_POST['vehicle_id'])) {
      $vehicles = $_POST['vehicle_id'];

      for ($i = 0; $i < $vehicles; $i++) {
        $vehicle_id = $vehicles[$i];

        $list_test_vehicle->add($vehicle_id, $fail_safe_id);
      }
      header("Location: " . BASE_URL . "failsafetest/vehicle_ou_put_result");
      exit;
    }
  }

  public function vehicle_ou_put_result()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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
    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA']) || isset($_SESSION['signal_integration_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }

    //fim do básico
    //etapa 8

    $fail_safe_id = $_GET['fail_safe_id'];
    $list_test_vehicle = new list_test_vehicle();

    $data['vehicles_result'] = $list_test_vehicle->getAllResults($fail_safe_id);

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/fail_vehicle_out_put/vehicle_result", $data);
  }

  public function vehicle_result_download()
  {
    $data = array();
    $site = new site();

    //etapa 8

    $fail_safe_id = $_GET['fail_safe_id'];
    $list_test_vehicle = new list_test_vehicle();

    $data['vehicles_result'] = $list_test_vehicle->getAllResults($fail_safe_id);

    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "fail_safe_test/downloads/vehicle_download", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'resultado-de-teste-de-veiculos-Modulo-6.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-P', 'orientation' => 'P']);
    exit;
  }

  public function graphic_view()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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
    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA']) || isset($_SESSION['signal_integration_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
      unset($_SESSION['signal_integration_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }

    //fim do básico

    


    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/graphic_view", $data);
  }

  public function results()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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

    //fim do básico
    $list_basic_info = new list_basic_info();

    if (!isset($_GET['safe_test_id']) || empty($_GET['safe_test_id'])) {

      $fail_safe_id = $_GET['safe_test_id'];
      $data['list_fail_safe_test'] = $list_basic_info->getAll($fail_safe_id);
    }

    if (isset($_GET['safe_test_id']) && !empty($_GET['safe_test_id'])) {
      $_SESSION['safe_test_id_proTSA'] = $_GET['safe_test_id'];
    }

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/results", $data);
  }

  public function choose_test()
  {
    //form 1

    if (isset($_POST['safe_test_id']) && !empty($_POST['safe_test_id'])) {

      $_SESSION['safe_test_id_proTSA'] = $_POST['safe_test_id'];

      header("Location: " . BASE_URL . "failsafetest/results");
      exit;
    }
  }

  public function first_result()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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

    //fim do básico

    $list_parameters_vehicles = new list_parameters_vehicles();
    $parameters_integration_id = $_SESSION['parameters_id_proTSA'];

    $data['list_classification_vehicles'] = $list_parameters_vehicles->getAllProcess($parameters_integration_id);

    //template, view, data
    $this->loadTemplate("home", "parameters_integration/first_result", $data);
  }

  public function download_first_result()
  {
    $data  = array();

    $data['page'] = 'first_result';
    $site = new site();
    $list_parameters_vehicles = new list_parameters_vehicles();
    $parameters_integration_id = $_SESSION['parameters_id_proTSA'];

    $data['list_classification_vehicles'] = $list_parameters_vehicles->getAllProcess($parameters_integration_id);

    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "parameters_integration/downloads/first_download", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'primeiro-resultado-Modulo-4.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-P', 'orientation' => 'P']);
    exit;
  }

  public function second_result()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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

    //fim do básico


    //template, view, data
    $this->loadTemplate("home", "parameters_integration/second_result/choose_format", $data);
  }

  public function second_download()
  {
    $data  = array();

    $data['page'] = 'first_result';

    //fim do básico
    $site = new site();

    $list_parameters_compare = new list_parameters_compare();
    $project_id = $_SESSION['parameters_project_id_proTSA'];
    $parameters_integration_id = $_SESSION['parameters_id_proTSA'];

    if ($_GET['format'] == "like") {
      $data['title_format'] = "em comum";

      $format = 'IN';

      $data['list_parameters'] = $list_parameters_compare->getResultParameters($parameters_integration_id, $project_id, $format);
    } elseif ($_GET['format'] == "unlike") {
      $data['title_format'] = "diferentes";

      $format = "NOT IN";

      $data['list_parameters'] = $list_parameters_compare->getResultParameters($parameters_integration_id, $project_id, $format);
    }

    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "parameters_integration/downloads/second_download", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'segundo-resultado-Modulo-4.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L']);
    exit;
  }

  public function send_workshop()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'fail_test';
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

    //fim do básico

    $meetings = new meetings();
    $project_id = $_SESSION['parameters_project_id_proTSA'];

    if (!empty($_POST['title']) && !empty($_POST['date_meeting']) && !empty($_POST['participant'])) {
      $title = addslashes($_POST['title']);
      $date_meeting = addslashes($_POST['date_workshop']);
      $model = 4;

      $meetings->addMeeting($project_id, $title, $date_meeting, $model);

      $site = new site();

      $attachmens = [$_FILES['pdf_upload']];
      $link = addslashes($_POST['link']);
      $version = addslashes($_POST['version']);
      $open_points = addslashes($_POST['open_points']);
      $test_vehicle = addslashes($_POST['test_vehicle']);

      if (isset($_POST['participant_test']) && !empty($_POST['participant_test'])) {
        $participants = addslashes($_POST['participant_test']);
        $emails = explode(';', $participants);

        for ($i = 0; $i < count($emails); $i++) {
          $name = ' ';
          $email = $emails[$i];

          $subject = "Uma reunião foi agendada!";
          $message = 'Foi marcada uma reunião para o seguinte dia e horário: ' . $date_meeting . '. <br>
          O tema da reunião será: ' . $title . '. <br>
          Versão: ' . $version . '<br>
          Pontos em aberto: ' . $open_points . '<br>
          Veículos de teste: ' . $test_vehicle . '<br>
          Link onde serão armazenadas as informações: <a href="' . $link . '" target="_blank">Clique aqui</a> <br>
          Aconselhamos que salve este email até o dia da reunião <br>';

          if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
            $recommendation = addslashes($_POST['recommendation']);

            $message .= $recommendation . '<br>';
          }

          $message .= 'Aguardamos sua presença na reunião!';
          $site->sendMessageAttachment($email, $name, $subject, $message, $attachmens);
        }
      }

      if (isset($_POST['participant_parameter']) && !empty($_POST['participant_parameter'])) {
        $participants = addslashes($_POST['participant_parameter']);
        $emails = explode(';', $participants);

        for ($i = 0; $i < count($emails); $i++) {
          $name = ' ';
          $email = $emails[$i];

          $subject = "Uma reunião foi agendada!";
          $message = 'Foi marcada uma reunião para o seguinte dia e horário: ' . $date_meeting . '. <br>
          O tema da reunião será: ' . $title . '. <br>
          Versão: ' . $version . '<br>
          Pontos em aberto: ' . $open_points . '<br>
          Veículos de teste: ' . $test_vehicle . '<br>
          Link onde serão armazenadas as informações: <a href="' . $link . '" target="_blank">Clique aqui</a> <br>
          Aconselhamos que salve este email até o dia da reunião <br>';

          if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
            $recommendation = addslashes($_POST['recommendation']);

            $message .= $recommendation . '<br>';
          }

          $message .= 'Aguardamos sua presença na reunião!';
          $site->sendMessageAttachment($email, $name, $subject, $message, $attachmens);
        }
      }

      header("Location: " . BASE_URL . "parametersintegration/results");
      exit;
    }

    $this->loadTemplate("home", "parameters_integration/workshop_meeting", $data);
  }
}
