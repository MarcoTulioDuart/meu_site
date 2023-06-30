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

      $integration_signals = new integration_signals();
      $project_id = addslashes($_POST['project_id']);
      $_SESSION['parameters_project_id_proTSA'] = $project_id;

      $integration_signals->add($project_id);
      header("Location: " . BASE_URL . "parametersintegration/definition_vehicles");
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

  public function first_result($signal_integration_id)
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
      unset($_SESSION['project_proTSA']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      unset($_SESSION['integration_id_proTSA']);
    }
    //fim do básico

    $list_signals_can = new list_signals_can();
    $list_signals_function = new list_signals_function();

    //Função de teste principal

    $data['main_function'] = $list_signals_function->getMainFunction($signal_integration_id); //pega a função principal do teste
    $le_main_id = $data['main_function']['le_id']; //id da função principal
    $data['all_signals_main'] = $list_signals_can->getAll($signal_integration_id, $le_main_id); //pega todos os sinais da função principal
    $data['signals_main'] = $list_signals_can->getSignalsFunction($le_main_id, $signal_integration_id); //pega só os sinais em comum da função principal com a comum

    //Função de teste comum

    $data['commom_function'] = $list_signals_function->getCommomFunction($signal_integration_id); //pega a função comum do teste
    $le_commom_id = $data['commom_function']['le_id']; //id da função comum
    $data['all_signals_commom'] = $list_signals_can->getAll($signal_integration_id, $le_commom_id); //pega todos os sinais da função comum
    $data['signals_commom'] = $list_signals_can->getSignalsFunction($le_commom_id, $signal_integration_id); //pega só os sinais em comum da função comum com a principal


    //template, view, data
    $this->loadTemplate("home", "signal_integration/first_result", $data);
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
      unset($_SESSION['project_proTSA']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      unset($_SESSION['integration_id_proTSA']);
    }

    //fim do básico
    $signal_integration_id = $_SESSION['signal_integration_id_proTSA'];
    $list_signals_can = new list_signals_can();
    $list_signals_function = new list_signals_function();
    //Função de teste principal

    $data['main_function'] = $list_signals_function->getMainFunction($signal_integration_id); //pega a função principal do teste
    $le_main_id = $data['main_function']['le_id']; //id da função principal
    $data['signals_main'] = $list_signals_can->getAll($signal_integration_id, $le_main_id); //pega só os sinais em comum da função principal com a comum

    //template, view, data
    $this->loadTemplate("home", "signal_integration/second_result", $data);
  }

  public function second_process() {
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
}
