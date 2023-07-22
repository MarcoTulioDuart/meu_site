<?php

class homeController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  { //action

    $data  = array();
    $filters = array();
    $data['page'] = "login";
    $accounts = new accounts();

    if (isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL . "home/home_page");
      exit;
    }

    if (!empty($_POST['login']) && !empty($_POST['password'])) {

      $login = addslashes($_POST['login']);
      $password = addslashes($_POST['password']);

      if ($accounts->verifyLogin($login, $password)) {
        setcookie("error_login", "", -1000);
        header("Location: " . BASE_URL . "home/home_page");
        exit;
      } else {
        setcookie("error_login", "Email ou senha incorretos, Tente Novamente", +1000);
        header("Location:" . BASE_URL);
        exit;
      }
    }

    //template, view, data
    $this->loadView("login", $data);
  }

  public function under_construction()
  { //action

    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $filters = array();
    $data['page'] = "under_construction";
    $accounts = new accounts();
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);
    if (isset($_SESSION['project_proTSA'])) {
      unset($_SESSION['project_proTSA']);
    }
    if (isset($_SESSION['integration_id_proTSA'])) {
      unset($_SESSION['integration_id_proTSA']);
    }
    //fim do básico

    //template, view, data
    $this->loadTemplate("home", "under_construction", $data);
  }


  public function register()
  { //action

    $data  = array();
    $filters = array();

    $data['page'] = "register";
    $accounts = new accounts();

    
    if (isset($_GET['invite']) && !empty($_GET['invite']) && !empty($_POST['login'])) {
      $name = addslashes($_POST['name']);
      $last_name = addslashes($_POST['last_name']);
      $login = addslashes($_POST['login']);
      $company_id = addslashes($_POST['company_id']);
      $options = array('cost' => 11);
      $password = password_hash(addslashes($_POST['password']), PASSWORD_DEFAULT, $options);
      $responsibility = addslashes($_POST['responsibility']);
      $project_id = $_GET['invite']; //id do projeto mandado na url pelo email

      if ($accounts->addInvite($name, $last_name, $login, $password, $responsibility, $company_id, $project_id)) {
        header("Location: " . BASE_URL . "project/user_projects");
        exit;
      } else {
        header("Location: " . BASE_URL . "home/register");
        exit;
      }
    }

    if (!empty($_POST['company_id']) && !empty($_POST['login']) && !empty($_POST['password'])) {
      $name = addslashes($_POST['name']);
      $last_name = addslashes($_POST['last_name']);
      $login = addslashes($_POST['login']);
      $company_id = addslashes($_POST['company_id']);
      $options = array('cost' => 11);
      $password = password_hash(addslashes($_POST['password']), PASSWORD_DEFAULT, $options);
      $responsibility = addslashes($_POST['responsibility']);

      if ($accounts->add($name, $last_name, $login, $password, $responsibility, $company_id)) {
        setcookie("error_register", "", -1000);
        header("Location: " . BASE_URL . "home/home_page");
        exit;
      } else {
        setcookie("error_register", "Não foi possível completar o seu cadastro, verifique se as informações estão corretas", 1000);
        header("Location: " . BASE_URL . "home/register");
        exit;
      }
    }

    //template, view, data
    $this->loadView("register", $data);
  }

  public function home_page()
  { //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'home_page';
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
    if (isset($_SESSION['parameters_id_proTSA'])) {
      //Session do Quarto Módulo
      unset($_SESSION['parameters_id_proTSA']);
      unset($_SESSION['parameters_project_id_proTSA']);
    }
    //fim do básico

    //template, view, data
    $this->loadTemplate("home", "home", $data);
  }

  public function new_password()
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

    if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
      $options = array('cost' => 11);
      $new_password = password_hash(addslashes($_POST['new_password']), PASSWORD_DEFAULT, $options);
      $login = $data['info_user']['login'];

      if ($accounts->recover_password($new_password, $login)) {
        setcookie("new_password_failed", "", -200);
        setcookie("new_password_success", "Sua senha foi atualizada com sucesso!", 200);
        header("Location: " . BASE_URL . "home/new_password");
        exit;
      } else {
        setcookie("new_password_success", "", -200);
        setcookie("new_password_failed", "Ocorreu um erro e sua senha não pode ser atualizada, verifique se os campos foram preenchidos corretamente, ou entre em contato com o suporte do site", 200);
        header("Location: " . BASE_URL . "home/new_password");
        exit;
      }
    }

    //template, view, data
    $this->loadTemplate("home", "user/new_password", $data);
  }

  public function forgot_password()
  {
    $site = new site();

    if (isset($_POST['email']) && !empty($_POST['email'])) {
      $email = addslashes($_POST['email']);
      $name = addslashes($_POST['name']);
      $subject = "Recuperação de senha";
      $message = 'Por favor, clique no link para criar uma nova senha.<br>
      <a href="' . BASE_URL . 'home/recover_password?login=' . $email . '">Confirmar e-mail</a>';
      if ($site->sendMessage($email, $name, $subject, $message)) {
        header("Location: " . BASE_URL);
        exit;
      } else {

        header("Location: " . BASE_URL);
        exit;
      }
    }
  }

  public function recover_password()
  {
    if (!isset($_GET['login']) || empty($_GET['login'])) {
      header("Location: " . BASE_URL);
      exit;
    }

    $data  = array();
    $filters = array();
    $data['page'] = "recover_password";
    $accounts = new accounts();

    if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
      $options = array('cost' => 11);
      $new_password = password_hash(addslashes($_POST['new_password']), PASSWORD_DEFAULT, $options);
      $login = $_GET['login'];

      if ($accounts->recover_password($new_password, $login)) {
        setcookie("new_password_failed", "", -200);
        setcookie("new_password_success", "Sua senha foi atualizada com sucesso!", 200);
        header("Location: " . BASE_URL);
        exit;
      } else {
        setcookie("new_password_success", "", -200);
        setcookie("new_password_failed", "Ocorreu um erro e sua senha não pode ser atualizada, verifique se os campos foram preenchidos corretamente, ou entre em contato com o suporte do site", 200);
        header("Location: " . BASE_URL);
        exit;
      }
    }

    //template, view, data
    $this->loadView("recover_password", $data);
  }

  public function logout()
  { //action

    unset($_SESSION['proTSA_online']);
    if(isset($_SESSION['project_proTSA'])) {
      unset($_SESSION['project_proTSA']);
    }
    header("Location: " . BASE_URL);
    exit;
  }
}
