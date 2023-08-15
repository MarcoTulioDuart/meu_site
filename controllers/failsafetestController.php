<?php

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
    if (isset($_SESSION['project_proTSA'])) {
      unset($_SESSION['project_proTSA']);
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

    //fim do básico

    //form 1: escolha de projeto
    $projects = new projects();

    $data['list_projects'] = $projects->getAll($id);

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/choose_project", $data);
  }

  public function choose_project()
  {
    //form 1

    if (isset($_GET['project_id']) && !empty($_GET['project_id'])) {

      $fail_safe_test = new fail_safe_test();
      $project_id = addslashes($_GET['project_id']);
      $_SESSION['safe_test_project_id_proTSA'] = $project_id;

      $fail_safe_test->add($project_id);
      header("Location: " . BASE_URL . "failsafetest/basic_info_ecu");
      exit;
    }
  }

  public function basic_info_ecu()
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
    if (isset($_SESSION['project_proTSA'])) {
      unset($_SESSION['project_proTSA']);
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

    //fim do básico

    //form 2
    $list_basic_info = new list_basic_info();
    $list_ecu = new list_ecu();
    $site = new site();

    $fail_safe_id = $_SESSION['safe_test_id_proTSA'];
    $project_id = $_SESSION['safe_test_project_id_proTSA'];

    $data['list_ecu'] = $list_ecu->getEcuProject($project_id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $list_ecu_id = $_POST['list_ecu_id'];
      $responsible_name = addslashes($_POST['responsible_name']);
      $responsible_email = addslashes($_POST['responsible_email']);
      $files = $_FILES['upload_ecu_reference'];

      $dir = "assets/upload/failsafetest/reference_fail_ecu/project_" . $project_id . "/"; //endereço da pasta pra onde serão enviados os arquivos

      $location = "Location: " . BASE_URL . "failsafetest/basic_info_ecu";

      //envia os arquivo para a pasta determinada
      if ($file = $site->uploadPdf($dir, $files, $location)) {

        $list_basic_info->add($fail_safe_id, $project_id, $list_ecu_id, $responsible_name, $responsible_email, $file);
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
    if (isset($_SESSION['project_proTSA'])) {
      unset($_SESSION['project_proTSA']);
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

    //fim do básico

    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/confirmations", $data);
  }

  public function align_disponibility()
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
    if (isset($_SESSION['project_proTSA'])) {
      unset($_SESSION['project_proTSA']);
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
    //fim do básico


    //template, view, data
    $this->loadTemplate("home", "fail_safe_test/align_disponibility", $data);
  }

  public function send_email()
  {
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
    if (isset($_SESSION['project_proTSA'])) {
      unset($_SESSION['project_proTSA']);
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

    //fim do básico

    $fail_safe_test = new fail_safe_test();

    if (!isset($_GET['safe_test_id']) || empty($_GET['safe_test_id'])) {

      $data['list_fail_safe_test'] = $fail_safe_test->getAll();
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

    $data['page'] = 'first_result';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    if (isset($_SESSION['project_proTSA'])) {
      //Session de projeto
      unset($_SESSION['project_proTSA']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['signals_id_proTSA'])) {
      //Session do Terceiro Módulo
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
    }
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

    $data['page'] = 'first_result';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    if (isset($_SESSION['project_proTSA'])) {
      //Session de projeto
      unset($_SESSION['project_proTSA']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['signals_id_proTSA'])) {
      //Session do Terceiro Módulo
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
    }
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

    $data['page'] = 'first_result';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    if (isset($_SESSION['project_proTSA'])) {
      //Session de projeto
      unset($_SESSION['project_proTSA']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['signals_id_proTSA'])) {
      //Session do Terceiro Módulo
      unset($_SESSION['signals_id_proTSA']);
      unset($_SESSION['project_signals_id_proTSA']);
    }
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

  public function delete_fail_safe_test($id) //id do processo
  {
    $fail_safe_test = new fail_safe_test();
    $list_basic_info = new list_basic_info();


    $$list_basic_info->delete($id);
    $project_id = $fail_safe_test->get($id); //pega a id do projeto

    header("Location: " . BASE_URL . "project/project_view/" . $project_id['fst_project_id']);
    exit;
  }
}
