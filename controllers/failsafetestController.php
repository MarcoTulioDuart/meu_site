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
    //Session do Segundo Módulo

    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //fim do básico

    //form 2
    $fail_safe_test = new fail_safe_test();
    $list_basic_info = new list_basic_info();
    $site = new site();
    $fail_code = new fail_code();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $fail_safe_test->add($id);

      $fail_safe_id = $_SESSION['safe_test_id_proTSA']; //id do teste
      $list_ecu_id = $_POST['list_ecu_id'];
      $responsible_name = addslashes($_POST['responsible_name']);
      $responsible_email = addslashes($_POST['responsible_email']);

      $list_basic_info->add($list_ecu_id, $responsible_name, $responsible_email, $fail_safe_id); //add informação e cria a sessão do teste

      $files = $_FILES['upload_ecu_reference'];

      $dir = "assets/upload/failsafetest/reference_fail_ecu/teste_" . $fail_safe_id . "/"; //endereço da pasta pra onde serão enviados os arquivos

      $location = "Location: " . BASE_URL . "failsafetest/basic_info_ecu";

      //envia os arquivo para a pasta determinada
      if ($file = $site->uploadPdf($dir, $files, $location)) {

        $list_basic_info->upload($file, $id, $fail_safe_id);
        $list_baisc_info_id = $_SESSION['list_baisc_info_id'];

        if (isset($_FILES['upload_ecu_reference']) && !empty($_FILES['upload_ecu_reference'])) {
          ini_set('memory_limit', '2024M');
          $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");

          $spreadsheet = $reader->load($_FILES['upload_ecu_reference']['tmp_name']);

          $worksheet = $spreadsheet->getActiveSheet(); //pega somente a aba ativa
          //pega a quantidade total de linhas
          $highestRow = $worksheet->getHighestRow();

          for ($row = 3; $row < $highestRow; ++$row) {
            $cell = $worksheet->getCell("A" . $row)->getValue();
            if ($cell != 0 || !is_null($cell)) {
              $a = $worksheet->getCell("A" . $row)->getValue();
              $b = $worksheet->getCell("B" . $row)->getValue();
              $d = $worksheet->getCell("D" . $row)->getValue();
              $e = $worksheet->getCell("E" . $row)->getValue();
              $f = $worksheet->getCell("F" . $row)->getValue();
              $g = $worksheet->getCell("G" . $row)->getValue();
              $h = $worksheet->getCell("H" . $row)->getValue();
              $i = $worksheet->getCell("I" . $row)->getValue();
              echo $a . " | " . $b . " | " . $d . " | " . $e . " | " . $f . " | " . $g . " | " . $h . " | " . $i;
              echo "<br>";
              exit;
            }
          }
        }
        header("Location: " . BASE_URL . "failsafetest/confirmations?form=1");
        exit;
      } else {
        header("Location: " . BASE_URL . "failsafetest/basic_info_ecu");
        exit;
      }
    }

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/basic_info_ecu", $data);
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
    //Session do Segundo Módulo

    //Session do Terceiro Módulo
    if (isset($_SESSION['signals_id_proTSA'])) {
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //fim do básico



    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/select_ecu_output", $data);
  }
  public function confirmations()
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
    }
    //Session do Quarto Módulo
    if (isset($_SESSION['parameters_id_proTSA'])) {
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //fim do básico

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/confirmations", $data);
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
