<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
    if (!empty($_FILES['upload_ecu_reference_full']) && !empty($_FILES['upload_ecu_reference'])) {

      $file_reference_full = $_FILES['upload_ecu_reference_full'];
      $file_reference = $_FILES['upload_ecu_reference'];

      $dir_reference_full = "assets/upload/failsafetest/full_spreadsheet/teste_" . $fail_safe_id . "/"; //endereço da pasta

      $location = "Location: " . BASE_URL . "failsafetest/basic_info_upload?fail_safe_id=" . $fail_safe_id;

      $delete = true;

      $file_1 = $site->uploadPdf($dir_reference_full, $file_reference_full, $location, $delete);

      $dir = "assets/upload/failsafetest/reference_fail_ecu/teste_" . $fail_safe_id . "/"; //endereço da pasta

      //envia os arquivo para a pasta determinada
      if ($file_2 = $site->uploadPdf($dir, $file_reference, $location, $delete)) {
        setcookie("error", "", time() - 200);

        $list_basic_info->upload($file_1, $file_2, $fail_safe_id);

        ini_set('memory_limit', '1024M');

        // Arquivo XLSX a ser lido
        $dir_upload = $dir . $_FILES['upload_ecu_reference']['name'];

        $reader = IOFactory::createReaderForFile($dir_upload);

        $spreadsheet = $reader->load($dir_upload);

        $worksheet = $spreadsheet->getActiveSheet(); //pega somente a aba ativa
        //pega a quantidade total de linhas
        $highestRow = $worksheet->getHighestRow();

        for ($row = 36; $row < $highestRow; ++$row) {

          $vehicle = $worksheet->getCell("A" . $row)->getValue();
          $date = $worksheet->getCell("B" . $row)->getFormattedValue();
          $ecu = $worksheet->getCell("C" . $row)->getValue();
          $fc = $worksheet->getCell("D" . $row)->getValue();
          $fc_description = $worksheet->getCell("E" . $row)->getValue();
          $cw = $worksheet->getCell("F" . $row)->getValue();
          $fail_status = $worksheet->getCell("G" . $row)->getValue();
          $solution = $worksheet->getCell("H" . $row)->getValue();

          if ($fail_code->add($vehicle, $date, $ecu, $fc, $fc_description, $cw, $fail_status, $solution, $fail_safe_id)) {
            //continuar...
          } else {
            setcookie("failed_data_excell", "Ocorreu um erro com a tranferencia de dados, verifique as dicas da página, ou entre em contato com o suporte técnico.", time() + 100);
            header("Location: " . BASE_URL . "failsafetest/basic_info_upload?fail_safe_id=" . $fail_safe_id);
            exit;
          }
        }
        //deleta as linhas que nulas que foram registradas
        $fail_code->deleteNull($fail_safe_id);

        setcookie("failed_data_excell", "", time() - 100);
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
    $list_test_ecu = new list_test_ecu();
    $list_basic_info = new list_basic_info();

    $basic_info = $list_basic_info->get($basic_info_id);

    $data['list_fail_code'] = $fail_code->getAllListBasic($fail_safe_id, $basic_info['ecu_name']);

    if (isset($_POST['fail_code']) && !empty($_POST['fail_code'])) {

      $fail_code = $_POST['fail_code'];

      for ($i = 0; $i < count($fail_code); $i++) {
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
    $data['page'] = "fail_test";
    $site = new site();

    //etapa 6

    $fail_safe_id = $_GET['fail_safe_id'];
    $basic_info_id = $_GET['basic_info_id'];
    $list_test_ecu = new list_test_ecu();
    $list_basic_info = new list_basic_info();

    $basic_info = $list_basic_info->get($basic_info_id);

    $data['result'] = $list_test_ecu->getResultEcu($fail_safe_id, $basic_info_id);

    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "fail_safe_test/downloads/single_ecu_download", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'resultado-de-teste-de-ecu-' . $basic_info['ecu_name'] . '-Modulo-6.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L']);
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

      for ($i = 0; $i < count($vehicles); $i++) {
        $vehicle_id = $vehicles[$i];

        $list_test_vehicle->add($vehicle_id, $fail_safe_id);
      }
      header("Location: " . BASE_URL . "failsafetest/vehicle_out_put_result?fail_safe_id=" . $fail_safe_id);
      exit;
    }
  }

  public function vehicle_out_put_result()
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
    $data['page'] = "fail_test";
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

    $fail_safe_id = $_GET['fail_safe_id'];

    $list_test_ecu = new list_test_ecu();

    $data['graphic_result'] = $list_test_ecu->getSolutions($fail_safe_id);

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/graphic_view", $data);
  }

  public function meeting()
  {

    if (!empty($_POST['title']) && !empty($_POST['date_meeting'])) {
      $title = addslashes($_POST['title']);
      $date_meeting = addslashes($_POST['date_meeting']);

      $site = new site();

      $attachmens = [
        $_FILES['pdf_first_result'],
        $_FILES['pdf_second_result'],
        $_FILES['graphic_result'],
      ];

      if (isset($_POST['participant']) && !empty($_POST['participant'])) {
        $participants = addslashes($_POST['participant']);
        $emails = explode(';', $participants);

        for ($i = 0; $i < count($emails); $i++) {
          $name = ' ';
          $email = $emails[$i];

          $subject = "Uma reunião foi agendada!";
          $message = 'Foi marcada uma reunião para o seguinte dia e horário: ' . $date_meeting . '. <br>
          O tema da reunião será: ' . $title . '. <br>
          Os arquivos em anexo contém os resultados da etapa de Integração entre funções - Classificação de funções (Cliente e Serviço), Mensagens das funções, Descrição das funções e Mensagens em comum. <br>
          Aconselhamos que salve este email até o dia da reunião <br>';

          if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
            $recommendation = addslashes($_POST['recommendation']);

            $message .= $recommendation . '<br>';
          }

          $message .= 'Aguardamos sua presença na reunião!';
          $site->sendMessageAttachment($email, $name, $subject, $message, $attachmens);
        }
      }

      header("Location: " . BASE_URL . "functionintegration/second_result");
      exit;
    }
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

    $fail_safe_test = new fail_safe_test();

    if (!isset($_GET['safe_test_id']) || empty($_GET['safe_test_id'])) {
      $data['list_fail_safe_test'] = $fail_safe_test->getAll($id);
    }


    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/process_results/results", $data);
  }

  public function choose_test()
  {
    //form 1

    if (isset($_POST['safe_test_id']) && !empty($_POST['safe_test_id'])) {

      $safe_test_id = $_POST['safe_test_id'];

      header("Location: " . BASE_URL . "failsafetest/results?safe_test_id=" . $safe_test_id);
      exit;
    }
  }

  //até aqui perfeito

  public function all_results()
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

    $safe_test_id = $_GET['safe_test_id'];

    $list_test_ecu = new list_test_ecu();

    $data['result_ecu'] = $list_test_ecu->getAllResults($safe_test_id);

    $list_test_vehicle = new list_test_vehicle();

    $data['vehicles_result'] = $list_test_vehicle->getAllResults($safe_test_id);

    $fail_safe_test = new fail_safe_test();

    $data['graphic_image'] = $fail_safe_test->getGraphic($safe_test_id);

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/process_results/all_results", $data);
  }

  public function add_graphic_upload()
  {
    
    $safe_test_id = $_GET['safe_test_id'];

    $site = new site();
    $fail_safe_test = new fail_safe_test();
   
    if (isset($_FILES['graphic_result']) && !empty($_FILES['graphic_result'])) {
      $graphic_result = $_FILES['graphic_result'];
 
      $location = "Location: " . BASE_URL . "failsafetest/all_results?safe_test_id=" . $safe_test_id;

      $delete = true;

      $dir = "assets/upload/failsafetest/graphic_chart/teste_" . $safe_test_id . "/"; //endereço da pasta

      //envia os arquivo para a pasta determinada
      if ($file = $site->uploadPdf($dir, $graphic_result, $location, $delete)) {

        $fail_safe_test->editGraphic($safe_test_id, $file);
        header("Location: " . BASE_URL . "failsafetest/all_results?safe_test_id=" . $safe_test_id);
        exit;

      }
    }
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

  public function graphic_result()
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
    $this->loadTemplate("home", "fail_safe_test/process_results/choose_format", $data);
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

    $this->loadTemplate("home", "fail_safe_test/process_results/workshop_meeting", $data);
  }
}
