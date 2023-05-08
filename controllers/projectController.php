<?php

class projectController extends Controller
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
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'project';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    //form 2

    $ecu = new data_ecu();
    $type_ecu = new type_ecu();
    $data['list_ecu_name'] = $type_ecu->getAll();

    if (isset($_GET['form']) && $_GET['form'] == 2) {

      if (isset($_POST['name_ecu']) && !empty($_POST['name_ecu'])) {
        $filters['name_ecu'] = $_POST['name_ecu'];
        $data['selected'] = $_POST['name_ecu'];
        $data['list_ecu'] = $ecu->getAll($filters);

        $ecu_id = $type_ecu->getId($filters);
        $_SESSION['ecu_project_proTSA'] = $ecu_id['id'];
      }
    }

    //form 3

    $can = new data_can();
    $type_can = new type_can();
    $data['list_can_name'] = $type_can->getAll();

    if (isset($_GET['form']) && $_GET['form'] == 3) {

      $data['form'] = "project_3";
      if (isset($_POST['name_can']) && !empty($_POST['name_can'])) {
        if (isset($_SESSION['name_can']) && !empty($_SESSION['name_can'])) {
          unset($_SESSION['name_can']);
        }
        $_SESSION['name_can'] = $_POST['name_can'];
        $filters['name_can'] = $_SESSION['name_can'];
        $data['selected'] = $_SESSION['name_can'];

        $data['list_can'] = $can->getAll($filters); //pegas as informações
      }
    }

    //form 4

    $parameters = new data_parameters();
    $type_parameters = new type_parameters();
    $data['list_parameters_name'] = $type_parameters->getAll();

    if (isset($_GET['form']) && $_GET['form'] == 4) {
      if (isset($_SESSION['name_can']) && !empty($_SESSION['name_can'])) {
        unset($_SESSION['name_can']);
      }
      $data['form'] = "project_4";
      if (isset($_POST['type_parameter']) && !empty($_POST['type_parameter'])) {
        $_SESSION['type_parameter'] = $_POST['type_parameter'];
        $filters['type_parameter'] = $_SESSION['type_parameter'];
        $data['selected'] = $_SESSION['type_parameter'];

        $data['list_paramters'] = $parameters->getAll($filters);
      }
    }

    //form 5

    if (isset($_GET['form']) && $_GET['form'] == 5) {

      unset($_SESSION['ecu_project_proTSA']);
    }

    //form 6

    if (isset($_GET['form']) && $_GET['form'] == 6) {

      $data['list_participants'] = $accounts->getAll($filters);
    }

    //form 7

    if (isset($_GET['form']) && $_GET['form'] == 7) {
      unset($_SESSION['project_proTSA']);
    }

    //template, view, data
    $this->loadTemplate("home", "project/new_project", $data);
  }

  public function new_project()
  {
    $filters = array();
    $projects = new projects();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
      $name = addslashes($_POST['name']);
      $admin_project = $_SESSION['proTSA_online'];

      if ($projects->add($name, $admin_project)) {
        header("Location: " . BASE_URL . "project?form=2");
        exit;
      } else {
        setcookie("Fail_new_project", "Por favor dê um nome ao projeto.", time() + 100);
        header("Location: " . BASE_URL . "project");
        exit;
      }
    }
  }

  public function select_function_ecu()
  {
    $filters = array();
    $list_ecu = new list_ecu();

    if (isset($_POST['data_ecu_id']) && !empty($_POST['data_ecu_id'])) {
      $ecus = $_POST['data_ecu_id'];
      for ($i = 0; $i < count($ecus); $i++) {

        $ecu_id = $_SESSION['ecu_project_proTSA'];
        $data_ecu_id = $ecus[$i];
        $project_id = $_SESSION['project_proTSA'];

        $list_ecu->add($ecu_id, $project_id, $data_ecu_id);
      }
      header("Location: " . BASE_URL . "project?form=3");
      exit;
    }
  }

  public function select_signal_can()
  {
    $list_can = new list_can();

    if (isset($_POST['can_id']) && !empty($_POST['can_id'])) {
      $cans = $_POST['can_id'];
      for ($i = 0; $i < count($cans); $i++) {

        $can_id = $cans[$i];
        $ecu_id = $_SESSION['ecu_project_proTSA'];
        $project_id = $_SESSION['project_proTSA'];

        $list_can->add($can_id, $ecu_id, $project_id);
      }
      header("Location: " . BASE_URL . "project?form=3");
      exit;
    }
  }

  public function select_parameters()
  {
    $list_parameters = new list_parameters();

    if (isset($_POST['paramter_id']) && !empty($_POST['paramter_id'])) {
      $param = $_POST['paramter_id'];
      for ($i = 0; $i < count($param); $i++) {

        $parameters_id = $param[$i];
        $ecu_id = $_SESSION['ecu_project_proTSA'];
        $project_id = $_SESSION['project_proTSA'];

        $list_parameters->add($parameters_id, $ecu_id, $project_id);
      }
      header("Location: " . BASE_URL . "project?form=4");
      exit;
    }
  }

  public function select_participants()
  {
    $list_participants = new list_participants();

    if (isset($_POST['participant_id']) && !empty($_POST['participant_id'])) {
      $part = $_POST['participant_id'];
      for ($i = 0; $i < count($part); $i++) {

        $participant_id = $part[$i];
        $project_id = $_SESSION['project_proTSA'];

        $list_participants->add($participant_id, $project_id);
      }
      header("Location: " . BASE_URL . "project?form=7");
      exit;
    }
  }

  public function user_projects()
  { //action

    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $data['page'] = "config";
    $accounts = new accounts();
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    $projects = new projects();

    $data['list_projects'] = $projects->getAll($id);

    //template, view, data
    $this->loadTemplate("home", "user/user_projects", $data);
  }

  public function project_view($project_id)
  {
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $filters  = array();
    $data['page'] = "config";
    $accounts = new accounts();
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    $projects = new projects();

    $data['list_projects'] = $projects->get($project_id);

    $list_ecu = new list_ecu();
    $list_can = new list_can();
    $list_parameters = new list_parameters();
    $list_participants = new list_participants();

    $data['list_ecu'] = $list_ecu->getAll($filters, $project_id);
    $data['list_can'] = $list_can->getAll($project_id);
    $data['list_parameters'] = $list_parameters->getAll($project_id);
    $data['list_participants'] = $list_participants->getAll($project_id);

    $site = new site();

    if (!empty($_POST['email']) && !empty($_POST['name'])) {
      $name = addslashes($_POST['name']);
      $email = addslashes($_POST['email']);

      $subject = "Você foi convidado para fazer parte de um Projeto!";
      $message = 'Por favor clique no link abaixo para corfirmar sua participação, e faça o cadastro no site.<br>
      <a href="' . BASE_URL . 'home/register?invite=' . $project_id . '">Participar</a>';

      if ($site->sendMessage($email, $name, $subject, $message)) {
        setcookie("invitation_sent_failed", "", -200);
        setcookie("invitation_sent_success", "Seu convite foi enviado com sucesso!", 200);
        header("Location: " . BASE_URL . "project/project_view/" . $project_id);
        exit;
      } else {
        setcookie("invitation_sent_success", "", -200);
        setcookie("invitation_sent_failed", "Infelizmente seu convite não pode ser enviado, veja se os campos foram preenchidos corretamente ou entre em contato com o suporte do site", 200);
        header("Location: " . BASE_URL . "project/project_view/" . $project_id);
        exit;
      }
    }

    //template, view, data
    $this->loadTemplate("home", "user/project_view", $data);
  }

  public function test_results()
  { //action

    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $data['page'] = "config";
    $accounts = new accounts();
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    //template, view, data
    $this->loadTemplate("home", "project/test_results", $data);
  }

  public function delete_project($id)
  {
    $projects = new projects();
    $list_ecu = new list_ecu();
    $list_can = new list_can();
    $list_parameters = new list_parameters();
    $list_participants = new list_participants();

    $projects->delete($id);
    $list_ecu->delete($id);
    $list_can->delete($id);
    $list_parameters->delete($id);
    $list_participants->delete($id);

    header("Location: " . BASE_URL . "project/user_projects");
    exit;
  }
}
