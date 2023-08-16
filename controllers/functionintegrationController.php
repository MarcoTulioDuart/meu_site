<?php

class functionintegrationController extends Controller
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

    $data['page'] = 'function_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    if (isset($_SESSION['project_proTSA'])) {
      //Session de projeto
      unset($_SESSION['project_proTSA']);
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
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

    $projects = new projects();

    $data['list_projects'] = $projects->getAll($id);

    if (isset($_SESSION['project_id_proTSA']) && !empty($_SESSION['project_id_proTSA'])) {
      $project_id = $_SESSION['project_id_proTSA'];
    }

    //form 2: escolhe o ECU 

    $list_ecu = new list_ecu();
    $type_ecu = new type_ecu();

    if (isset($_GET['form']) && $_GET['form'] == 2) {

      $data['list_ecu_name'] = $list_ecu->getEcuProject($project_id); //Pega somente os types ecu que foram registrados no projeto

      if (isset($_POST['name_ecu']) && !empty($_POST['name_ecu'])) { //quando o type ecu é escolhido

        $filters['name_ecu'] = $_POST['name_ecu']; //filtro para puxar somente as funções do ecu escolhido

        $ecu_id = $type_ecu->getId($filters); //pega o id especifico do ecu escolhido
        $_SESSION['ecu_project_proTSA'] = $ecu_id['id'];
        setcookie("repeated_function", "", time() - 100);
        header("Location: " . BASE_URL . "functionintegration?form=3");
      }

      //a função selecionada será cadastrada na action: select_function_ecu
    }

    //form 3: filtra as funções por tipo

    if (isset($_GET['form']) && $_GET['form'] == 3) {

      $ecu_id = $_SESSION['ecu_project_proTSA'];
      $data['name_ecu'] = $type_ecu->getName($ecu_id);
      $filters['name_ecu'] = $data['name_ecu']['name'];

      $data['list_ecu'] = $list_ecu->getAll($filters, $project_id); //pega a função de acordo com o ecu escolhido

    }

    //form 4: Upload de especificações de funções

    $list_integration_ecu = new list_integration_ecu();

    if (isset($_GET['form']) && $_GET['form'] == 4) {

      $function_id = $_SESSION['function_ecu'];

      $data['list_integration_ecu'] = $list_integration_ecu->get($project_id, $function_id);

      //na view será gerado para cada função cadastrada nesta tabela, o nome e um campo de upload.
      //após os arquivos serem escolhidos, serão cadastrados na action: upload_file_ecu
    }

    //form 5: Selecionar signals ligados a função ecu

    $list_can = new list_can();

    if (isset($_GET['form']) && $_GET['form'] == 5) {
      $ecu_id = $_SESSION['ecu_project_proTSA'];
      $data['list_can_name'] = $list_can->getCanProject($project_id, $ecu_id); //Pega as rede cans que existem no projeto e que estão ligadas ao ecu escolhido

      if (isset($_GET['name_can']) && !empty($_GET['name_can'])) { //quando a rede can é escolhida

        $filters['name_can'] = $_GET['name_can'];

        $data['list_can'] = $list_can->getAllInProject($filters, $ecu_id, $project_id); //pegas os signals filtrando por rede can, projeto, ecu e pesquisa: caso seja usada
        //Os checkbox escolhidos seram cadastrados na action: select_signal_can
      }
    }

    //form 6: apenas confirmação
    if (isset($_GET['form']) && $_GET['form'] == 6) {

      $ecu_id = $_SESSION['ecu_project_proTSA'];
      $data['name_ecu'] = $type_ecu->getName($ecu_id);

      unset($_SESSION['function_ecu']);
    }

    //form 7: Questionario sobre as funções

    if (isset($_GET['form']) && $_GET['form'] == 7) {

      $ecu_id = $_SESSION['ecu_project_proTSA'];

      $name_ecu = $type_ecu->getName($ecu_id);

      $data['list_ecu'] = $list_integration_ecu->getAll($project_id, $name_ecu);

      $points = new points();
      $id_point = 1;
      $data['list_points'] = $points->get($id_point);

      //As respostas serão cadastradas na action: answer_questions
    }

    //form 8:

    if (isset($_GET['form']) && $_GET['form'] == 8) {
      $function_classification = new function_classification;

      $ecu_id = $_SESSION['ecu_project_proTSA'];

      $name_ecu = $type_ecu->getName($ecu_id);
      $counts = $list_integration_ecu->count_points($project_id, $name_ecu['name']);

      unset($_SESSION['ecu_project_proTSA']);

      for ($i = 0; $i < count($counts); $i++) {
        $integration_ecu_id = $counts[$i]['lie_id'];
        $score = $counts[$i]['score'];

        $function_classification->add($integration_ecu_id, $score, $project_id);
      }

      $classifica = $function_classification->getAll($project_id);

      $first = 'true';

      for ($i = 0; $i < count($classifica); $i++) {

        $classification_id = $classifica[$i]['id'];
        $score = $classifica[$i]['score'];

        if ($first == 'true') {
          $classification = "Função Cliente";
          $function_classification->classification($classification, $classification_id);
        } else if ($first == 'false' && $score == $classifica[0]['score']) {
          $classification = "Função Cliente";
          $function_classification->classification($classification, $classification_id);
        } else {
          $classification = "Função Serviço";
        }

        $function_classification->classification($classification, $classification_id);

        $first = 'false';
      }

      $data['id_project'] = $project_id;
    }


    //template, view, data
    $this->loadTemplate("home", "function_integration/test_processing", $data);
  }

  public function choose_project()
  {
    //form 1
    $list_integration_ecu = new list_integration_ecu();

    if (isset($_POST['project_id']) && !empty($_POST['project_id'])) {

      if ($list_integration_ecu->getProject($_POST['project_id'])) {
        setcookie("project_exist", "O projeto selecionado já foi processado, escolha outro projeto ou exclua os dados do módulo 1 deste projeto.", time() + 100);
        header("Location: " . BASE_URL . "functionintegration");
        exit;
      } else {
        $_SESSION['project_id_proTSA'] = addslashes($_POST['project_id']);

        header("Location: " . BASE_URL . "functionintegration?form=2");
        exit;
      }
    }
  }

  public function select_function_ecu()
  {
    //form 3
    $list_integration_ecu = new list_integration_ecu();

    if (isset($_POST['list_ecu_id']) && !empty($_POST['list_ecu_id'])) {
      $list_ecu_id = $_POST['list_ecu_id']; //pega todos os ecus selecionados no checkbox
      $_SESSION['function_ecu'] = $list_ecu_id;
      $project_id = $_SESSION['project_id_proTSA']; //id do projeto

      if ($list_integration_ecu->get($project_id, $list_ecu_id)) {
        setcookie("repeated_function", "A função escolhida já foi registrada neste processo, escolha outra função nesta ou em outra ECU", time() + 100);
        header("Location: " . BASE_URL . "functionintegration?form=3");
        exit;
      } else {
        $list_integration_ecu->add($list_ecu_id, $project_id); //cadastra os ecus selecionados nessa tabela
        setcookie("repeated_function", "", time() - 100);
        header("Location: " . BASE_URL . "functionintegration?form=4");
        exit;
      }
    }
  }

  public function upload_file_ecu()
  {
    //form 4
    $project_id = $_SESSION['project_id_proTSA'];
    $list_integration_ecu = new list_integration_ecu();
    $site = new site();

    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
      $files = $_FILES['files']; //pega todos os campos que contem um arquivo enviado

      $dir = "assets/upload/functionintegration/function_ecu/project_" . $project_id . '/'; //endereço da pasta pra onde serão enviados os arquivos

      $location = "Location: " . BASE_URL . "functionintegration?form=5";

      //envia os arquivo para a pasta determinada
      if ($file = $site->uploadPdf($dir, $files, $location)) {
        $list_ecu_id = $_POST['list_ecu_id']; //pega o array de id's dos list_ecu

        $list_integration_ecu->addFile($list_ecu_id, $file); //faz o cadastro do caminho do arquivo atravez do id do list_ecu

        header("Location: " . BASE_URL . "functionintegration?form=5");
        exit;
      } else {
        header("Location: " . BASE_URL . "functionintegration?form=4");
        exit;
      }
    }
  }

  public function select_signal_can()
  {
    //form 5
    $list_integration_can = new list_integration_can();

    if (isset($_POST['can_id']) && !empty($_POST['can_id'])) {
      $cans = $_POST['can_id'];
      for ($i = 0; $i < count($cans); $i++) {

        $data_can_id = $cans[$i];
        $project_id = $_SESSION['project_id_proTSA'];
        $function_id = $_SESSION['function_ecu'];
        $list_integration_can->add($data_can_id, $project_id, $function_id);
      }
      header("Location: " . BASE_URL . "functionintegration?form=5");
      exit;
    }
  }

  public function select_all_signal_can()
  {
    //form 5
    $filters = array();
    $list_can = new list_can();
    $list_integration_can = new list_integration_can();

    $filters['name_can'] = $_GET['name_can'];
    $ecu_id = $_SESSION['ecu_project_proTSA'];
    $project_id = $_SESSION['project_id_proTSA'];

    $cans = $list_can->getAllInProject($filters, $ecu_id, $project_id);

    for ($i = 0; $i < count($cans); $i++) {

      $data_can_id = $cans[$i]['dc_id'];
      $function_id = $_SESSION['function_ecu'];
      $list_integration_can->add($data_can_id, $project_id, $function_id);
    }
    setcookie("success_all_signal_can", "Todos os signal names desta rede can foram cadastrados com sucesso.", time() + 100);
    header("Location: " . BASE_URL . "functionintegration?form=5&name_can=" . $_GET['name_can']);
    exit;
  }

  public function answer_questions()
  {
    //form 7

    $list_integration_ecu = new list_integration_ecu();

    if (isset($_POST['function_id']) && !empty($_POST['function_id'])) {
      $function_id = $_POST['function_id'];

      for ($i = 0; $i < count($function_id); $i++) {
        $id_functions = $function_id[$i];
        $q_1 = 'question_1_' . $i;
        $q_2 = 'question_2_' . $i;
        $q_3 = 'question_3_' . $i;
        $question_1 = $_POST[$q_1];
        $question_2 = $_POST[$q_2];
        $question_3 = $_POST[$q_3];

        $list_integration_ecu->answer_questions($question_1, $question_2, $question_3, $id_functions);
      }
      header("Location: " . BASE_URL . "functionintegration?form=8");
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

    $data['page'] = 'function_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    if (isset($_SESSION['project_proTSA'])) {
      //Session de projeto
      unset($_SESSION['project_proTSA']);
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
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }

    //fim do básico

    //form 1 
    if (!isset($_GET['project']) || empty($_GET['project'])) {

      $list_integration_ecu = new list_integration_ecu();
      $data['list_projects'] = $list_integration_ecu->select_projects(); //Seleciona apenas projetos com a id registrada na tabela lis_integration_ecu

    }

    if (isset($_GET['project']) && !empty($_GET['project'])) {
      $_SESSION['integration_id_proTSA'] = $_GET['project'];
    }

    //template, view, data
    $this->loadTemplate("home", "function_integration/test_results", $data);
  }

  public function choose_project_test()
  {
    //form 1

    if (isset($_POST['project_id']) && !empty($_POST['project_id'])) {
      $_SESSION['integration_id_proTSA'] = addslashes($_POST['project_id']);

      header("Location: " . BASE_URL . "functionintegration/results");
      exit;
    }
  }

  public function first_result()
  { //básico
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
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    
    //fim do básico

    //Primeiro resultado
    $project_id = $_SESSION['integration_id_proTSA'];
    $function_classification = new function_classification();

    $data['classifica'] = $function_classification->getCustomer($project_id);

    if (isset($_POST['function_id']) && !empty($_POST['function_id'])) {
      $integration_ecu_id = $_POST['function_id'];
      $classification = "Função Serviço";

      $function_classification->correctCustomer($classification, $integration_ecu_id, $project_id);
      header("Location: " . BASE_URL . "functionintegration/first_result");
      exit;
    }

    $points = new points();
    $points_id = 1;
    $data['list_classification'] = $function_classification->getResult($project_id);
    $data['list_points'] = $points->get($points_id);

    $list_integration_can = new list_integration_can();
    $data['list_commom_signals'] = $list_integration_can->commomMessages($project_id);

    //template, view, data
    $this->loadTemplate("home", "function_integration/first_result", $data);
  }

  public function download_first_result()
  {
    $data  = array();
    $data['page'] = 'first_result';

    //Primeiro resultado
    $project_id = $_SESSION['integration_id_proTSA'];
    $function_classification = new function_classification();

    $data['classifica'] = $function_classification->getCustomer($project_id);

    if (isset($_POST['function_id']) && !empty($_POST['function_id'])) {
      $integration_ecu_id = $_POST['function_id'];
      $classification = "Função Serviço";

      $function_classification->correctCustomer($classification, $integration_ecu_id, $project_id);
      header("Location: " . BASE_URL . "functionintegration/first_result");
      exit;
    }

    $points = new points();
    $points_id = 1;
    $data['list_classification'] = $function_classification->getResult($project_id);
    $data['list_points'] = $points->get($points_id);

    $list_integration_can = new list_integration_can();
    $data['list_commom_signals'] = $list_integration_can->commomMessages($project_id);

    //Primeiro Pdf Download
    $site = new site();

    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "function_integration/downloads/first_download", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'primeiro-resultado-Modulo-1.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-P', 'orientation' => 'P']);
    exit;
  }

  public function download_especifications()
  {
    $project_id = $_SESSION['integration_id_proTSA'];
    // Diretório onde os arquivos estão armazenados
    $dir = 'assets/upload/functionintegration/function_ecu/project_' . $project_id . '/';

    // Nome do arquivo compactado
    $zipFile = 'especificacoes-de-funcoes.zip';

    // Cria um novo objeto ZipArchive
    $zip = new ZipArchive();

    // Abre o arquivo ZIP para escrever
    if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
      // Obtém a lista de arquivos no diretório

      $files = scandir($dir);

      // Adiciona cada arquivo ao arquivo ZIP
      foreach ($files as $file) {
        // Ignora diretórios e arquivos ocultos
        if (!is_dir($file) && !in_array($file, ['.', '..'])) {
          $zip->addFile($dir . $file, $file);
        }
      }

      // Fecha o arquivo ZIP
      $zip->close();

      // Define os cabeçalhos para o download do arquivo compactado
      header('Content-Type: application/zip');
      header('Content-Disposition: attachment; filename="' . $zipFile . '"');
      header('Content-Length: ' . filesize($zipFile));

      // Envia o arquivo compactado para o usuário
      readfile($zipFile);

      // Exclui o arquivo compactado após o download
      unlink($zipFile);
    } else {
      echo 'Falha ao criar o arquivo ZIP.';
    }
  }

  public function add_meeting()
  {
    $meetings = new meetings();
    $project_id = $_SESSION['integration_id_proTSA'];

    if (!empty($_POST['title']) && !empty($_POST['date_meeting'])) {
      $title = addslashes($_POST['title']);
      $date_meeting = addslashes($_POST['date_meeting']);
      $link = addslashes($_POST['link']);
      $model = 1;

      $meetings->addMeeting($project_id, $title, $date_meeting, $model);

      $site = new site();
      $list_participants = new list_participants();
      $meeting_participants = $list_participants->getAllParticipants($project_id);

      $attachmens = [
        $_FILES['pdf_first_result'],
        $_FILES['especifications'],
      ];

      for ($i = 0; $i < count($meeting_participants); $i++) {
        $name = $meeting_participants[$i]['full_name'];
        $email = $meeting_participants[$i]['email'];

        $subject = "Uma reunião foi agendada!";
        $message = 'Foi marcada uma reunião para o seguinte dia e horário: ' . $date_meeting . '. <br>
        O tema da reunião será: ' . $title . '. <br>
        Os arquivos em anexo contém os resultados da etapa de Integração entre funções - Classificação de funções (Cliente e Serviço), Mensagens das funções, Descrição das funções e Mensagens em comum. <br>
        Para participar da reunião <a href="' . $link . '" target="_blank">Clique aqui</a>
        Aconselhamos que salve este email até o dia da reunião. <br>';

        if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
          $recommendation = addslashes($_POST['recommendation']);

          $message .= $recommendation . '<br>';
        }

        $message .= 'Aguardamos sua presença na reunião!';

        $site->sendMessageAttachment($email, $name, $subject, $message, $attachmens);
      }

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
          Para participar da reunião <a href="' . $link . '" target="_blank">Clique aqui</a>
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

    //Segundo resultado
    $project_id = $_SESSION['integration_id_proTSA'];
    $meetings = new meetings();
    $filters['model'] = 1;

    $data['list_meeting'] = $meetings->getAll($project_id, $filters);

    //template, view, data
    $this->loadTemplate("home", "function_integration/second_result", $data);
  }

  public function response_meeting($id_meeting)
  {
    //básico
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
    $data  = array();
    $filters = array();
    $accounts = new accounts();

    $data['page'] = 'function_integration';
    $id = $_SESSION['proTSA_online'];
    $data['info_user'] = $accounts->get($id);

    if (isset($_SESSION['project_proTSA'])) {
      //Session de projeto
      unset($_SESSION['project_proTSA']);
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

    $meetings = new meetings();
    $data['list'] = $meetings->get($id_meeting);

    if (!empty($_POST['text'])) {

      $text = addslashes($_POST['text']);

      $meetings->meetingConcluded($id_meeting, $text);
      header("Location: " . BASE_URL . "functionintegration/second_result");
      exit;
    }

    //template, view, data
    $this->loadTemplate("home", "function_integration/response_meeting", $data);
  }

  public function download_second_result($id_meeting)
  {
    $data  = array();
    $data['page'] = 'first_result';

    $meetings = new meetings();
    $data['list'] = $meetings->get($id_meeting);

    //segundo Pdf Download
    $site = new site();

    ob_start(); //inicia a inclusão da view na memória
    $this->loadTemplate("download", "function_integration/downloads/second_download", $data);
    $html = ob_get_contents(); //armazena a view invés de mostrar
    ob_end_clean(); //finaliza a inclusão da view na memória

    $name_file = 'segundo-resultado-Modulo-1.pdf';
    $site->create_PDF($html, $name_file, ['mode' => 'utf-8', 'format' => 'A4-P', 'orientation' => 'P']);
    exit;
  }

  public function send_sencond_result()
  {
    $site = new site();
    $project_id = $_SESSION['integration_id_proTSA'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $list_participants = new list_participants();
      $meeting_participants = $list_participants->getAllParticipants($project_id);
      $attachment = [$_FILES['pdf_result']];

      for ($i = 0; $i < count($meeting_participants); $i++) {
        $name = $meeting_participants[$i]['full_name'];
        $email = $meeting_participants[$i]['email'];

        $subject = "Relatório de reunião!";
        $message = 'O arquivo em anexo contém a ata da reunião realizada para o teste de Integração entre funções.';

        if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
          $recommendation = addslashes($_POST['recommendation']);

          $message .= '<br>' . $recommendation;
        }

        $site->sendMessageAttachment($email, $name, $subject, $message, $attachment);
      }

      if (isset($_POST['participant']) && !empty($_POST['participant'])) {
        $participants = addslashes($_POST['participant']);
        $emails = explode(';', $participants);

        for ($i = 0; $i < count($emails); $i++) {
          $name = ' ';
          $email = $emails[$i];

          $subject = "Relatório de reunião!";
          $message = 'O arquivo em anexo contém a ata da reunião realizada para o teste de Integração entre funções.';

          if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
            $recommendation = addslashes($_POST['recommendation']);

            $message .= '<br>' . $recommendation;
          }

          $site->sendMessageAttachment($email, $name, $subject, $message, $attachment);
        }
      }
      setcookie("success_send_result", "Seu segundo resultado foi enviado com sucesso.", time() + 100);
      header("Location: " . BASE_URL . "functionintegration/second_result");
      exit;
    }
  }

  public function third_result()
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
    //Session do Quinto Módulo

    //Session do Sexto Módulo
    if (isset($_SESSION['safe_test_id_proTSA'])) {
      unset($_SESSION['safe_test_id_proTSA']);
    }
    //fim do básico

    //terceiro resultado

    $flowchart = new flowchart();
    $project_id = $_SESSION['integration_id_proTSA'];

    $data['flowchart'] = $flowchart->get($project_id);

    if (isset($_FILES['flowchart_upload']) && !empty($_FILES['flowchart_upload'])) {
      $site = new site();

      $upload = $_FILES['flowchart_upload']; //pega todos os campos que contem um arquivo enviado
      $dir = "assets/upload/functionintegration/flowchart/project_" . $project_id . "/"; //endereço da pasta pra onde serão enviados os arquivos

      $location = "Location: " . BASE_URL . "functionintegration/third_result";
      //envia os arquivo para a pasta determinada
      $file = $site->uploadPdf($dir, $upload, $location);

      $flowchart->add($project_id, $file); //faz o cadastro do caminho do arquivo atravez do id do projeto

      header("Location: " . BASE_URL . "functionintegration/third_result");
      exit;
    }

    //template, view, data
    $this->loadTemplate("home", "function_integration/third_result", $data);
  }

  public function edit_flowchart()
  {
    $data  = array();
    $flowchart = new flowchart();

    $project_id = $_SESSION['integration_id_proTSA'];

    if (isset($_FILES['flowchart_update']) && !empty($_FILES['flowchart_update'])) {
      $site = new site();

      $dir = "assets/upload/functionintegration/flowchart/project_" . $project_id . "/"; //endereço da pasta pra onde serão enviados os arquivos

      $upload = $_FILES['flowchart_update']; //pega todos os campos que contem um arquivo enviado

      $location = "Location: " . BASE_URL . "functionintegration/third_result";
      $delete = true; // Este parametro só é enviado quando se usa uma substituição de arquivo

      //envia os arquivo para a pasta determinada
      $file = $site->uploadPdf($dir, $upload, $location, $delete);

      $flowchart->edit($project_id, $file);

      setcookie("success_update_flowchart", "Seu fluxograma foi atualizado com sucesso.", time() + 100);
      header("Location: " . BASE_URL . "functionintegration/third_result");
      exit;
    }
  }

  public function send_flowchart()
  {
    $site = new site();
    $project_id = $_SESSION['integration_id_proTSA'];

    $attachment = [$_FILES['pdf_result']];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $list_participants = new list_participants();
      $meeting_participants = $list_participants->getAllParticipants($project_id);

      for ($i = 0; $i < count($meeting_participants); $i++) {
        $name = $meeting_participants[$i]['full_name'];
        $email = $meeting_participants[$i]['email'];

        $subject = "Fluxograma";
        $message = 'O arquivo em anexo contém o fluxograma de teste para o teste de Integração entre funções.';

        if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
          $recommendation = addslashes($_POST['recommendation']);

          $message .= '<br>' . $recommendation;
        }

        $site->sendMessageAttachment($email, $name, $subject, $message, $attachment);
      }

      if (isset($_POST['participant']) && !empty($_POST['participant'])) {
        $participants = addslashes($_POST['participant']);
        $emails = explode(';', $participants);

        for ($i = 0; $i < count($emails); $i++) {
          $name = ' ';
          $email = $emails[$i];

          $subject = "Fluxograma";
          $message = 'O arquivo em anexo contém o fluxograma de teste para o teste de Integração entre funções.';

          if (isset($_POST['recommendation']) && !empty($_POST['recommendation'])) {
            $recommendation = addslashes($_POST['recommendation']);

            $message .= '<br>' . $recommendation;
          }

          $site->sendMessageAttachment($email, $name, $subject, $message, $attachment);
        }
      }

      header("Location: " . BASE_URL . "functionintegration/third_result");
      exit;
    }
  }

  public function delete_function_integration($project_id)
  {
    $flowchart = new flowchart();
    $function_classification = new function_classification();
    $meetings = new meetings();
    $list_integration_ecu = new list_integration_ecu();
    $list_integration_can = new list_integration_can();
    $site = new site();

    //reuniões
    $model = 1;
    $meetings->delete($project_id, $model);

    //Diagrama / Fluxograma
    $dir = "assets/upload/functionintegration/flowchart/project_" . $project_id . "/";
    $site->deleteDirectory($dir);
    $flowchart->delete($project_id);

    //Classificação de funções
    $function_classification->delete($project_id);

    //Lista da Cans
    $list_integration_can->delete($project_id);

    //Lista de funções
    $dir2 = "assets/upload/functionintegration/function_ecu/project_" . $project_id . '/';
    $site->deleteDirectory($dir2);
    $list_integration_ecu->delete($project_id);

    header("Location: " . BASE_URL . "project/project_view/" . $project_id);
    exit;
  }
}
