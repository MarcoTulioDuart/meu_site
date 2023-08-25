<?php

class signalintegrationController extends Controller
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

    $data['page'] = 'signal_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_protsa'])) {
      //Session de projeto
      unset($_SESSION['project_protsa']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['parameters_id_proTSA'])) {
      //Session do Quarto Módulo
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

    //form 1: escolha de projeto
    $projects = new projects();

    $data['list_projects'] = $projects->getAll($id);

    //template, view, data
    $this->loadTemplate("home", "signal_integration/choose_project", $data);
  }

  public function choose_project()
  {
    //form 1

    if (isset($_POST['project_id']) && !empty($_POST['project_id'])) {

      $integration_signals = new integration_signals();
      $project_id = addslashes($_POST['project_id']);
      $_SESSION['project_signals_id_proTSA'] = $project_id;

      $integration_signals->add($project_id);
      header("Location: " . BASE_URL . "signalintegration/select_function_processing?form=2");
      exit;
    }
  }

  public function select_function_processing()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'signal_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_protsa'])) {
      //Session de projeto
      unset($_SESSION['project_protsa']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['parameters_id_proTSA'])) {
      //Session do Quarto Módulo
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //fim do básico


    if (isset($_SESSION['project_signals_id_proTSA']) && !empty($_SESSION['project_signals_id_proTSA'])) {
      $project_id = $_SESSION['project_signals_id_proTSA'];
    }

    //form 2: escolhe o ECU 

    $list_ecu = new list_ecu();
    $type_ecu = new type_ecu();

    if (isset($_GET['form']) && $_GET['form'] == 2) {

      $data['list_ecu_name'] = $list_ecu->getEcuProject($project_id); //Pega somente os types ecu que foram registrados no projeto

      if (isset($_POST['name_ecu']) && !empty($_POST['name_ecu'])) { //quando o type ecu é escolhido

        $filters['name_ecu'] = $_POST['name_ecu']; //filtro para puxar somente as funções do ecu escolhido

        $ecu_id = $type_ecu->getId($filters); //pega o id especifico do ecu escolhido
        $_SESSION['ecu_project_protsa'] = $ecu_id['id']; //Armazena o id em uma session
        header("Location: " . BASE_URL . "signalintegration/select_function_processing?form=3");
      }
    }

    //form 3: filtra as funções por tipo

    if (isset($_GET['form']) && $_GET['form'] == 3) {

      $ecu_id = $_SESSION['ecu_project_protsa'];
      $data['name_ecu'] = $type_ecu->getName($ecu_id);
      $filters['name_ecu'] = $data['name_ecu']['name'];

      $data['list_ecu'] = $list_ecu->getAll($filters, $project_id); //pega a função de acordo com o ecu escolhido
      //a função escolhida será cadastrada na action: select_function_ecu
    }


    //form 4: Descrição de função

    $list_signals_function = new list_signals_function();

    if (isset($_GET['form']) && $_GET['form'] == 4) {

      $function_id = $_SESSION['function_ecu'];
      $integration_signals_id = $_SESSION['signals_id_proTSA']; //id do teste
      $data['list_signals_ecu'] = $list_signals_function->get($integration_signals_id, $function_id);

      //o arquivo escolhido, será cadastrado na action: description_ecu
    }

    $this->loadTemplate("home", "signal_integration/select_function_processing", $data);
  }

  public function select_function_ecu()
  {
    //form 3
    $list_signals_function = new list_signals_function();

    if (isset($_POST['list_ecu_id']) && !empty($_POST['list_ecu_id'])) {
      $list_ecu_id = $_POST['list_ecu_id'];
      $_SESSION['function_ecu'] = $list_ecu_id;
      $integration_signals_id = $_SESSION['signals_id_proTSA']; //id do teste

      if ($list_signals_function->get($integration_signals_id, $list_ecu_id)) {
        setcookie("repeated_function", "A função escolhida já foi registrada neste processo, escolha outra função nesta ou em outra ECU", time() + 100);
        header("Location: " . BASE_URL . "signalintegration/select_function_processing?form=3");
        exit;
      } else {
        $list_signals_function->add($list_ecu_id, $integration_signals_id); //cadastra os ecus selecionados nessa tabela
        setcookie("repeated_function", "", time() - 100);
        header("Location: " . BASE_URL . "signalintegration/select_function_processing?form=4");
        exit;
      }
    }
  }

  public function description_ecu()
  {
    //form 4
    $list_signals_function = new list_signals_function();

    if (isset($_POST['description']) && !empty($_POST['description'])) {
      $list_ecu_id = $_SESSION['function_ecu'];
      $integration_signals_id = $_SESSION['signals_id_proTSA']; //id do teste
      $description = $_POST['description'];

      $list_signals_function->addDescription($list_ecu_id, $integration_signals_id, $description); //cadastra os ecus selecionados nessa tabela

      header("Location: " . BASE_URL . "signalintegration/signal_processing?form=5");
      exit;
    }
  }

  public function signal_processing()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'signal_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_protsa'])) {
      //Session de projeto
      unset($_SESSION['project_protsa']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['parameters_id_proTSA'])) {
      //Session do Quarto Módulo
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

    if (isset($_SESSION['project_signals_id_proTSA']) && !empty($_SESSION['project_signals_id_proTSA'])) {
      $project_id = $_SESSION['project_signals_id_proTSA'];
    }

    //form 5: Selecionar can e os sinais de entrada

    $list_can = new list_can();

    if (isset($_GET['form']) && $_GET['form'] == 5) {
      $ecu_id = $_SESSION['ecu_project_protsa'];
      $data['list_can_name'] = $list_can->getCanProject($project_id, $ecu_id); //Pega as rede cans que existem no projeto e que estão ligadas ao ecu escolhido

      if (isset($_GET['name_can']) && !empty($_GET['name_can'])) { //quando a rede can é escolhida

        $filters['name_can'] = $_GET['name_can'];

        $data['list_can'] = $list_can->getAllInProject($filters, $ecu_id, $project_id); //pegas os signals filtrando por rede can, projeto, ecu e pesquisa: caso seja usada
        //Os checkbox escolhidos seram cadastrados na action: select_signal_can
      }
    }

    //form 6: Questionario de disponibilidade

    $list_signals_can = new list_signals_can();

    if (isset($_GET['form']) && $_GET['form'] == 6) {
      $integration_signals_id = $_SESSION['signals_id_proTSA'];
      $list_ecu_id = $_SESSION['function_ecu'];

      $data['list_can'] = $list_signals_can->getAll($integration_signals_id, $list_ecu_id,);

      //As respostas serão cadastradas na action: answer_questions
    }

    //form 7: Selecionar can e os sinais de saída

    if (isset($_GET['form']) && $_GET['form'] == 7) {
      $ecu_id = $_SESSION['ecu_project_protsa'];
      $data['list_can_name'] = $list_can->getCanProject($project_id, $ecu_id); //Pega as rede cans que existem no projeto e que estão ligadas ao ecu escolhido

      if (isset($_GET['name_can']) && !empty($_GET['name_can'])) { //quando a rede can é escolhida

        $filters['name_can'] = $_GET['name_can'];

        $data['list_can'] = $list_can->getAllInProject($filters, $ecu_id, $project_id); //pegas os signals filtrando por rede can, projeto, ecu e pesquisa: caso seja usada
        //Os checkbox escolhidos seram cadastrados na action: select_signal_can
      }
    }

    //template, view, data
    $this->loadTemplate("home", "signal_integration/signal_processing", $data);
  }

  public function select_signal_can()
  {
    //form 5
    $list_signals_can = new list_signals_can();

    if (isset($_POST['can_id']) && !empty($_POST['can_id'])) {
      $cans = $_POST['can_id'];
      for ($i = 0; $i < count($cans); $i++) {

        $data_can_id = $cans[$i];
        $integration_signals_id = $_SESSION['signals_id_proTSA'];
        $list_ecu_id = $_SESSION['function_ecu'];
        $input_or_output = $_GET['input_or_output'];
        $list_signals_can->add($data_can_id, $list_ecu_id, $integration_signals_id, $input_or_output);
      }
      header("Location: " . BASE_URL . "signalintegration/signal_processing?form=5&name_can=" . $_GET['name_can']);
      exit;
    }
  }

  public function select_all_signal_can()
  {
    //form 5
    $filters = array();
    $list_can = new list_can();
    $list_signals_can = new list_signals_can();

    $filters['name_can'] = $_GET['name_can'];
    $ecu_id = $_SESSION['ecu_project_protsa'];
    $project_id = $_SESSION['project_signals_id_proTSA'];
    $integration_signals_id = $_SESSION['signals_id_proTSA'];

    $cans = $list_can->getAllInProject($filters, $ecu_id, $project_id);
    $input_or_output = $_GET['input_or_output'];
    for ($i = 0; $i < count($cans); $i++) {

      $data_can_id = $cans[$i]['dc_id'];
      $list_ecu_id = $_SESSION['function_ecu'];
      $list_signals_can->add($data_can_id, $list_ecu_id, $integration_signals_id, $input_or_output);
    }
    setcookie("success_all_signal_can", "Todos os signal names desta rede can foram cadastrados com sucesso.", time() + 50);

    header("Location: " . BASE_URL . "signalintegration/signal_processing?form=5&name_can=" . $_GET['name_can']);
    exit;
  }

  public function answer_questions()
  {
    //form 6

    $list_signals_can = new list_signals_can();

    if (isset($_POST['signal_id']) && !empty($_POST['signal_id'])) {
      $list_ecu_id = $_SESSION['function_ecu'];
      $can_id = $_POST['signal_id'];
      $integration_signals_id = $_SESSION['signals_id_proTSA'];

      for ($i = 0; $i < count($can_id); $i++) {
        $data_can_id = $can_id[$i];
        $question = 'available_type_' . $data_can_id;
        $available_type = $_POST[$question];

        $list_signals_can->answer_questions($integration_signals_id, $data_can_id, $list_ecu_id, $available_type);
      }

      header("Location: " . BASE_URL . "signalintegration/signal_processing?form=7");
      exit;
    }
  }

  public function select_output_signal()
  {
    //form 7
    $list_signals_can = new list_signals_can();

    if (isset($_POST['can_id']) && !empty($_POST['can_id'])) {
      $cans = $_POST['can_id'];
      for ($i = 0; $i < count($cans); $i++) {

        $data_can_id = $cans[$i];
        $integration_signals_id = $_SESSION['signals_id_proTSA'];
        $list_ecu_id = $_SESSION['function_ecu'];
        $input_or_output = $_GET['input_or_output'];
        $list_signals_can->add($data_can_id, $list_ecu_id, $integration_signals_id, $input_or_output);
      }

      header("Location: " . BASE_URL . "signalintegration/signal_processing?form=7");
      exit;
    }
  }

  public function select_all_output_signal()
  {
    //form 7
    $filters = array();
    $list_can = new list_can();
    $list_signals_can = new list_signals_can();

    $filters['name_can'] = $_GET['name_can'];
    $ecu_id = $_SESSION['ecu_project_protsa'];
    $project_id = $_SESSION['project_signals_id_proTSA'];
    $integration_signals_id = $_SESSION['signals_id_proTSA'];

    $cans = $list_can->getAllInProject($filters, $ecu_id, $project_id);
    $input_or_output = $_GET['input_or_output'];
    for ($i = 0; $i < count($cans); $i++) {

      $data_can_id = $cans[$i]['dc_id'];
      $list_ecu_id = $_SESSION['function_ecu'];
      $list_signals_can->add($data_can_id, $list_ecu_id, $integration_signals_id, $input_or_output);
    }
    setcookie("success_all_signal_can", "Todos os signal names desta rede can foram cadastrados com sucesso.", time() + 50);

    header("Location: " . BASE_URL . "signalintegration/signal_processing?form=7");
    exit;
  }

  public function add_comment()
  {
    //form 8
    $integration_signals = new integration_signals();

    if (isset($_POST['comment']) && !empty($_POST['comment'])) {
      $integration_signals_id = $_SESSION['signals_id_proTSA']; //id do teste
      $comment = $_POST['comment'];

      $integration_signals->addComment($integration_signals_id, $comment); //cadastra os ecus selecionados nessa tabela

      header("Location: " . BASE_URL . "signalintegration/confirmations?form=9");
      exit;
    }
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

    $data['page'] = 'signal_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_protsa'])) {
      //Session de projeto
      unset($_SESSION['project_protsa']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['parameters_id_proTSA'])) {
      //Session do Quarto Módulo
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

    $type_ecu = new type_ecu();

    //form 9: apenas confirmação

    if (isset($_GET['form']) && $_GET['form'] == 9) {

      $ecu_id = $_SESSION['ecu_project_protsa'];
      $data['name_ecu'] = $type_ecu->getName($ecu_id);

      unset($_SESSION['function_ecu']);
    }

    //form 10: apenas confirmação

    if (isset($_GET['form']) && $_GET['form'] == 10) {

      unset($_SESSION['ecu_project_protsa']);
    }

    //template, view, data
    $this->loadTemplate("home", "signal_integration/confirmations", $data);
  }

  public function select_main_function()
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'signal_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_protsa'])) {
      //Session de projeto
      unset($_SESSION['project_protsa']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['parameters_id_proTSA'])) {
      //Session do Quarto Módulo
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }

    //fim do básico

    //form 11
    $integration_signals_id = $_SESSION['signals_id_proTSA']; //id do teste
    $list_signals_function = new list_signals_function();

    $data['list_function'] = $list_signals_function->getAll($integration_signals_id);

    if (isset($_POST['main_function']) && !empty($_POST['main_function'])) {
      $integration_signals_id = $_SESSION['signals_id_proTSA']; //id do teste
      $list_ecu_id = $_POST['main_function'];
      $main_function = 1;

      $list_signals_function->mainFunction($list_ecu_id, $integration_signals_id, $main_function); //cadastra os ecus selecionados nessa tabela

      header("Location: " . BASE_URL . "signalintegration/results");
      exit;
    }

    //template, view, data
    $this->loadTemplate("home", "signal_integration/main_function", $data);
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

    $data['page'] = 'signal_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_protsa'])) {
      //Session de projeto
      unset($_SESSION['project_protsa']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['parameters_id_proTSA'])) {
      //Session do Quarto Módulo
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }

    //fim do básico

    $integration_signals = new integration_signals();

    if (!isset($_GET['signal_integration_id_proTSA']) || empty($_GET['signal_integration_id_proTSA'])) {

      $data['list_integration_signals'] = $integration_signals->getAll();
    }

    if (isset($_GET['signal_integration_id_proTSA']) && !empty($_GET['signal_integration_id_proTSA'])) {
      $_SESSION['signal_integration_id_proTSA'] = $_GET['signal_integration_id_proTSA'];
    }

    //template, view, data
    $this->loadTemplate("home", "signal_integration/results", $data);
  }

  public function choose_test()
  {

    if (isset($_POST['signal_id']) && !empty($_POST['signal_id'])) {
      $_SESSION['signal_integration_id_proTSA'] = addslashes($_POST['signal_id']);

      header("Location: " . BASE_URL . "signalintegration/results");
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
    if (isset($_SESSION['project_protsa'])) {
      //Session de projeto
      unset($_SESSION['project_protsa']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['parameters_id_proTSA'])) {
      //Session do Quarto Módulo
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

    $list_signals_can = new list_signals_can();
    $list_signals_function = new list_signals_function();
    $signal_integration_id = $_SESSION['signal_integration_id_proTSA'];

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

  public function update_status()
  {
    $list_signals_can = new list_signals_can();
    $signal_integration_id = $_SESSION['signal_integration_id_proTSA'];
    if (isset($_POST['c_id']) && !empty($_POST['c_id'])) {

      $c_id = $_POST['c_id'];
      $status = $_POST['status'];
      $comment =  $_POST['comment'];

      for ($i = 0; $i < count($c_id); $i++) {

        $list_signals_can->editStatus($c_id[$i], $status[$i], $comment[$i]);
      }
      header("Location: " . BASE_URL . "signalintegration/first_result");
      exit;
    }
  }

  public function first_download()
  {
    $data  = array();
    $filters = array();
    $data['page'] = 'first_result';
    $site = new site();

    $list_signals_can = new list_signals_can();
    $list_signals_function = new list_signals_function();
    $signal_integration_id = $_SESSION['signal_integration_id_proTSA'];

    //Função de teste principal

    $data['main_function'] = $list_signals_function->getMainFunction($signal_integration_id); //pega a função principal do teste
    $le_main_id = $data['main_function']['le_id']; //id da função principal
    $data['signals_main'] = $list_signals_can->getSignalsFunction($le_main_id, $signal_integration_id); //pega só os sinais em comum da função principal com a comum

    //Função de teste comum

    $data['commom_function'] = $list_signals_function->getCommomFunction($signal_integration_id); //pega a função comum do teste
    $le_commom_id = $data['commom_function']['le_id']; //id da função comum
    $data['signals_commom'] = $list_signals_can->getSignalsFunction($le_commom_id, $signal_integration_id); //pega só os sinais em comum da função comum com a principal

    ob_start();//inicia a inclusão da view na memória
    $this->loadTemplate("download", "signal_integration/downloads/first_download", $data);
    $html = ob_get_contents();//armazena a view invés de mostrar
    ob_end_clean();//finaliza a inclusão da view na memória

    $name_file = 'primeiro-resultado-Modulo-3.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L']);
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

    if (isset($_SESSION['project_protsa'])) {
      //Session de projeto
      unset($_SESSION['project_protsa']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      //Session do Primeiro Módulo
      unset($_SESSION['integration_id_proTSA']);
    }
    if (isset($_SESSION['parameters_id_proTSA'])) {
      //Session do Quarto Módulo
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }

    //fim do básico
    
    $signal_integration_id = $_SESSION['signal_integration_id_proTSA'];
    $list_signals_can = new list_signals_can();
    $list_signals_function = new list_signals_function();

    //Função de teste principal

    $data['main_function'] = $list_signals_function->getMainFunction($signal_integration_id); //pega a função principal do teste
    $le_main_id = $data['main_function']['le_id']; //id da função principal
    $data['signals_main'] = $list_signals_can->getAll($signal_integration_id, $le_main_id); //pega só os sinais em comum da função principal com a comum

    //Função de teste comum

    $data['commom_function'] = $list_signals_function->getCommomFunction($signal_integration_id); //pega a função comum do teste
    $le_commom_id = $data['commom_function']['le_id']; //id da função comum
    $data['signals_commom'] = $list_signals_can->getAll($signal_integration_id, $le_commom_id); //pega todos os sinais da função comum

    //template, view, data
    $this->loadTemplate("home", "signal_integration/second_result", $data);
  }

  public function second_download()
  {
    $data  = array();
    $filters = array();
    $data['page'] = 'first_result';
    $site = new site();

    $signal_integration_id = $_SESSION['signal_integration_id_proTSA'];
    $list_signals_can = new list_signals_can();
    $list_signals_function = new list_signals_function();

    //Função de teste principal

    $data['main_function'] = $list_signals_function->getMainFunction($signal_integration_id); //pega a função principal do teste
    $le_main_id = $data['main_function']['le_id']; //id da função principal
    $data['signals_main'] = $list_signals_can->getAll($signal_integration_id, $le_main_id); //pega só os sinais em comum da função principal com a comum

    //Função de teste comum

    $data['commom_function'] = $list_signals_function->getCommomFunction($signal_integration_id); //pega a função comum do teste
    $le_commom_id = $data['commom_function']['le_id']; //id da função comum
    $data['signals_commom'] = $list_signals_can->getAll($signal_integration_id, $le_commom_id); //pega todos os sinais da função comum

    ob_start();//inicia a inclusão da view na memória
    $this->loadTemplate("download", "signal_integration/downloads/second_download", $data);
    $html = ob_get_contents();//armazena a view invés de mostrar
    ob_end_clean();//finaliza a inclusão da view na memória

    $name_file = 'segundo-resultado-Modulo-3.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-L', 'orientation' => 'L']);
    exit;
  }

  public function send_report()
  {
    $site = new site();
    $integration_signals = new integration_signals();
    $signal_integration_id = $_SESSION['signal_integration_id_proTSA'];
    $project_id = $integration_signals->get($signal_integration_id);

    //array com anexos para a ferramenta dinâmixa futura
    $attachmens = [
      $_FILES['pdf_first_result'],
      $_FILES['pdf_second_result'],
      $_FILES['can_trace'],
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $list_participants = new list_participants();
      $meeting_participants = $list_participants->getAllParticipants($project_id['lis_project_id']);

      for ($i = 0; $i < count($meeting_participants); $i++) {
        $name = $meeting_participants[$i]['full_name'];
        $email = $meeting_participants[$i]['email'];

        $subject = "Relatório de Integração de sinais";
        $message = 'O arquivo em anexo contém os resultados de teste para o teste de Integração entre Sinais.';

        if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
          $recommendation = addslashes($_POST['recommendation']);

          $message .= '<br>' . $recommendation;
        }

        $site->sendMessageAttachment($email, $name, $subject, $message, $attachmens);
      }

      if (isset($_POST['participant']) && !empty($_POST['participant'])) {
        $participants = addslashes($_POST['participant']);
        $emails = explode(';', $participants);

        for ($i = 0; $i < count($emails); $i++) {
          $name = ' ';
          $email = $emails[$i];

          $subject = "Relatório de Integração de sinais";
          $message = 'O arquivo em anexo contém os resultados de teste para o teste de Integração entre Sinais.';

          if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
            $recommendation = addslashes($_POST['recommendation']);

            $message .= '<br>' . $recommendation;
          }

          $site->sendMessageAttachment($email, $name, $subject, $message, $attachmens);
        }
      }

      header("Location: " . BASE_URL . "signalintegration/second_result");
      exit;
    }
  }

  public function delete_signal_integration($id)
  {
    $list_signals_can = new list_signals_can;
    $list_signals_function = new list_signals_function();
    $integration_signals = new integration_signals();

    $signal = $integration_signals->get($id);
    $list_signals_can->delete($id);
    $list_signals_function->delete($id);
    $integration_signals->delete($id);

    header("Location: " . BASE_URL . "project/project_view/" . $signal['lis_project_id']);
    exit;
  }
}
