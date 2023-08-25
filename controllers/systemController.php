<?php

class systemController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  { //action

    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $data['page'] = "system";
    $accounts = new accounts();
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

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

    $type_ecu = new type_ecu();

    $data['type_ecu'] = $type_ecu->getAll();

    //template, view, data
    $this->loadTemplate("home", "system/add_ecu", $data);
  }

  public function add_library_ecu()
  {
    $ecu = new data_ecu();

    if (!empty($_FILES['library'])) {
      $file = new DOMDocument();
      $file->load($_FILES['library']['tmp_name']);

      $first_line = true;
      $row = $file->getElementsByTagName("Table")->item(0)->getElementsByTagName("Row");
      foreach ($row as $value) {
        if ($first_line == false) {

          $name = $value->getElementsByTagName("Cell")->item(0)->nodeValue;
          $function = $value->getElementsByTagName("Cell")->item(1)->nodeValue;
          $acronimo = $value->getElementsByTagName("Cell")->item(2)->nodeValue;

          $ecu->add($name, $function, $acronimo);
        }
        $first_line = false;
      }
      setcookie("success_library_ecu", "Suas funções ECU foram registradas com sucesso!", time() + 100);
      header("Location: " . BASE_URL . "system");
      exit;
    }
  }

  public function add_library_can()
  { //action

    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $data['page'] = "system";
    $accounts = new accounts();
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

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

    $can = new data_can();
    $type_can = new type_can();

    $data['type_can'] = $type_can->getAll();

    if (!empty($_FILES['library']) && !empty($_POST['rede_can'])) {
      $file = new DOMDocument();
      $file->load($_FILES['library']['tmp_name']);

      $first_line = true;

      $row = $file->getElementsByTagName("Table")->item(0)->getElementsByTagName("Row");
      foreach ($row as $value) {
        if ($first_line == false) {

          $rede_can = addslashes($_POST['rede_can']);
          $signal_name = $value->getElementsByTagName("Cell")->item(0)->nodeValue;
          $signal_function = $value->getElementsByTagName("Cell")->item(1)->nodeValue;

          $can->add($rede_can, $signal_name, $signal_function);
        }
        $first_line = false;
      }
      $can->deleteDuplicates($_POST['rede_can']);

      setcookie("success_library_can", "Seus dados CANs foram registrados com sucesso!", time() + 100);
      header("Location: " . BASE_URL . "system/add_library_can");
      exit;
    }

    //template, view, data
    $this->loadTemplate("home", "system/add_can", $data);
  }

  public function add_parameters()
  {
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $data['page'] = "system";
    $accounts = new accounts();
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

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

    $parameters = new data_parameters();
    $type_parameters = new type_parameters();

    $data['type_parameters'] = $type_parameters->getAll();

    if (!empty($_FILES['library']) && !empty($_POST['type'])) {
      $file = new DOMDocument();
      $file->load($_FILES['library']['tmp_name']);

      $first_line = true;
      $row = $file->getElementsByTagName("Table")->item(0)->getElementsByTagName("Row");
      foreach ($row as $value) {
        if ($first_line == false) {

          $pos = $value->getElementsByTagName("Cell")->item(0)->nodeValue;
          $sachnummer = $value->getElementsByTagName("Cell")->item(1)->nodeValue;
          $benennung = $value->getElementsByTagName("Cell")->item(2)->nodeValue;
          $codebedingung = $value->getElementsByTagName("Cell")->item(3)->nodeValue;
          $kem_ab = $value->getElementsByTagName("Cell")->item(4)->nodeValue;
          $werke = $value->getElementsByTagName("Cell")->item(5)->nodeValue;
          $pg_kz = $value->getElementsByTagName("Cell")->item(6)->nodeValue;
          $type = addslashes($_POST['type']);

          $parameters->add($pos, $sachnummer, $benennung, $codebedingung, $kem_ab, $werke, $pg_kz, $type);
        }
        $first_line = false;
      }
      setcookie("success_add_parameters", "Seus parâmetros foram registrados com sucesso!", time() + 100);
      header("Location: " . BASE_URL . "system/add_parameters");
      exit;
    }

    //template, view, data
    $this->loadTemplate("home", "system/add_parameter", $data);
  }

  public function add_vehicle_portfolio()
  { //action

    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $data['page'] = "system";
    $accounts = new accounts();
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

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

    $vehicles = new vehicles();

    if (!empty($_FILES['library'])) { //verificando se o arquivo foi enviado
      $file = new DOMDocument(); //instanciando o metodo DOM
      $file->load($_FILES['library']['tmp_name']); //carregando o arquivo

      $first_line = true; //
      $row = $file->getElementsByTagName("Row"); //pegando o elemento row para fazer o loop

      foreach ($row as $value) { //percorre todas as linhas da planilha
        if ($first_line == false) { //exclui a primeira linha da planilha que é usada para o nome das colunas

          $family = $value->getElementsByTagName("Cell")->item(0)->nodeValue; //pega o valor do elemento atravez da tag Cell
          $vehicle = $value->getElementsByTagName("Cell")->item(1)->nodeValue;

          $vehicles->add($family, $vehicle); //manda pro banco de dados antes de verificar a proxima linha
        }
        $first_line = false;
      }
      setcookie("success_portfolio_vehicle", "Seu portfolio foi registrado com sucesso!", time() + 100);
      header("Location: " . BASE_URL . "system/add_vehicle_portfolio"); //Ao final do foreach, encaminha o usuário para a página novamente
      exit;
    }

    //template, view, data
    $this->loadTemplate("home", "system/add_vehicle", $data);
  }

  public function useful_links()
  { //action

    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $data['page'] = "system";
    $accounts = new accounts();
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

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

    $useful_links = new useful_links();
    $data['list_useful_links'] = $useful_links->getAll();


    //template, view, data
    $this->loadTemplate("home", "system/useful_links", $data);
  }
}
