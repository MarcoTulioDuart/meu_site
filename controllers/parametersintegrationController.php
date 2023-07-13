<?php

class parametersintegrationController extends Controller
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

    $data['page'] = 'parameters_integration';
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

    //form 1: escolha de projeto
    $projects = new projects();

    $data['list_projects'] = $projects->getAll($id);

    //template, view, data
    $this->loadTemplate("home", "parameters_integration/choose_project", $data);
  }

  public function choose_project()
  {
    //form 1

    if (isset($_POST['project_id']) && !empty($_POST['project_id'])) {

      $parameters_integration = new parameters_integration();
      $project_id = addslashes($_POST['project_id']);
      $_SESSION['parameters_project_id_proTSA'] = $project_id;

      $parameters_integration->add($project_id);
      header("Location: " . BASE_URL . "parametersintegration/definition_vehicles?question=1");
      exit;
    }
  }

  public function definition_vehicles()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'parameters_integration';
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

    $vehicles = new vehicles();

    $data['list_vehicles'] = $vehicles->getAll();

    $this->loadTemplate("home", "parameters_integration/process", $data);
  }

  public function add_point_vehicle()
  {
    $list_parameters_vehicles = new list_parameters_vehicles();
    $points = new points();

    $parameters_integration_id = $_SESSION['parameters_id_proTSA']; //id do processo
    $project_id = $_SESSION['parameters_project_id_proTSA']; //id do projeto sendo processado
    $vehicle_id = $_POST['vehicle'];

    $scores = $points->get(2); //pega a pontuação registrada de cada questão

    $question = 'point_question_' . $_GET['question']; //gera o nome de acordo com a questão

    if ($vehicle = $list_parameters_vehicles->get($vehicle_id, $parameters_integration_id)) {
      //true = se o veículo existe (Atualizar)

      $total_score = $scores[$question] + $vehicle['current_score'];

      $list_parameters_vehicles->edit($parameters_integration_id, $project_id, $vehicle_id, $total_score);

      if ($_GET['question'] == 5) {
        header("Location: " . BASE_URL . "parametersintegration/first_result");
      } else {
        header("Location: " . BASE_URL . "parametersintegration/definition_vehicles?question=" . $_GET['question'] + 1);
      }
      exit;
    } else {
      //false = se não existe o veículo (Adicionar)

      $list_parameters_vehicles->add($parameters_integration_id, $project_id, $vehicle_id, $scores[$question]);

      if ($_GET['question'] == 5) {
        header("Location: " . BASE_URL . "parametersintegration/first_result");
      } else {
        header("Location: " . BASE_URL . "parametersintegration/definition_vehicles?question=" . $_GET['question'] + 1);
      }
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

    $data['page'] = 'parameters_integration';
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

    $parameters_integration = new parameters_integration();

    if (!isset($_GET['parameters_id_proTSA']) || empty($_GET['parameters_id_proTSA'])) {

      $data['list_parameters_integration'] = $parameters_integration->getAll();
    }

    if (isset($_GET['parameters_id_proTSA']) && !empty($_GET['parameters_id_proTSA'])) {
      $_SESSION['parameters_id_proTSA'] = $_GET['parameters_id_proTSA'];
    }

    //template, view, data
    $this->loadTemplate("home", "parameters_integration/results", $data);
  }

  public function choose_test()
  {

    if (isset($_POST['parameters_id']) && !empty($_POST['parameters_id'])) {
      $_SESSION['parameters_id_proTSA'] = addslashes($_POST['parameters_id']);

      header("Location: " . BASE_URL . "parametersintegration/results");
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

  public function header_first_result()
  {
    $data  = array();

    $this->loadView("parameters_integration/first_download/header", $data);
  }

  public function footer_first_result()
  {
    $data  = array();

    $this->loadView("parameters_integration/first_download/footer", $data);
  }

  public function download_first_result()
  {
    $list_parameters_vehicles = new list_parameters_vehicles();
    $site = new site();
    $parameters_integration_id = $_SESSION['parameters_id_proTSA'];

    $list_vehicles = $list_parameters_vehicles->getAllProcess($parameters_integration_id);

    $pdf = file_get_contents(BASE_URL . "parametersintegration/header_first_result");

    $pdf .= '<div class="section row mtn">';
    $pdf .= '<div class="tab-block">';
    $pdf .= '<div class="tab-content">';
    foreach ($list_vehicles as $key => $value) {
      $pdf .= '<p class="ph20 pb10 fs20 text-center ' . ($key == 0) ? "text-primary" : "" . '">';
      $pdf .= $key + 1 . 'º ' . $value['name_vehicle'] . '</p>';
      $pdf .= '<p class="text-center mb20">Total: ' . $value['total_score'] . ' pts</p>';
    }
    $pdf .= '</div>';
    $pdf .= '</div>';
    $pdf .= '</div>';

    $pdf .= file_get_contents(BASE_URL . "parametersintegration/footer_first_result");
    //Criar PDF

    $name_file = 'primeiro-resultado-Modulo-4.pdf';
    $site->create_PDF_landscape($pdf, $name_file);
  }

  public function parameters_value() {
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
    $this->loadTemplate("home", "parameters_integration/parameters_value", $data);
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
    $this->loadTemplate("home", "parameters_integration/second_result", $data);
  }

  public function second_process()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'parameters_integration';
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
    $this->loadTemplate("home", "parameters_integration/second_process", $data);
  }

  public function delete_parameters_integration($id)
  {
    $list_parameters_vehicles = new list_parameters_vehicles();
    $parameters_integration = new parameters_integration();

    $parameters = $parameters_integration->get($id);

    $list_parameters_vehicles->delete($id);
    $parameters_integration->delete($id);

    header("Location: " . BASE_URL . "project/project_view/" . $parameters['project_id']);
    exit;
  }
}
