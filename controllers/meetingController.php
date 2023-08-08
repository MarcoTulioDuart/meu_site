<?php

class meetingController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!isset($_SESSION['proTSA_online'])) {
      header("Location: " . BASE_URL);
      exit;
    }
  }

  public function index()
  {
    $data  = array();
    $filters = array();
    $meetings = new meetings();
    $software_integrations = new software_integrations();
    $accounts = new accounts();

    $filters['model'] = 2;    
    $data['page'] = 'chooseResult';
    $id = $_SESSION['proTSA_online'];
    
   
    if (!empty($_POST['title']) && !empty($_POST['date_meeting'])) {

      $title = addslashes($_POST['title']);
      $project_id = addslashes($_POST['project_id']);
      $date_meeting = addslashes($_POST['date_meeting']);
      $link = addslashes($_POST['link']);
      $text = addslashes($_POST['recommendation']);
      $model = 2;

      $meetings->addMeeting($project_id, $title, $date_meeting, $model, $text);

      $site = new site();
      $list_participants = new list_participants();
      $meeting_participants = $list_participants->getAllParticipants($project_id);

      $data['info_software_integrations'] = $software_integrations->getByProjectId($project_id);
      
      /* quando o file vim através de um array é necessáiro esse foreach */
      foreach ($data['info_software_integrations'] as $key => $value) {
        $attachmens[$key]['name'] = $_FILES['files_ecu']['name'][$key];
        $attachmens[$key]['full_path'] = $_FILES['files_ecu']['full_path'][$key];
        $attachmens[$key]['type'] = $_FILES['files_ecu']['type'][$key];
        $attachmens[$key]['tmp_name'] = $_FILES['files_ecu']['tmp_name'][$key];
        $attachmens[$key]['error'] = $_FILES['files_ecu']['error'][$key];
        $attachmens[$key]['size'] = $_FILES['files_ecu']['size'][$key];        
      }
    
      array_push($attachmens, $_FILES['releases_softwares']);
      
      for ($i = 0; $i < count($meeting_participants); $i++) {
        $name = $meeting_participants[$i]['full_name'];
        $email = $meeting_participants[$i]['email'];

        $subject = "Uma reunião foi agendada!";
        $message = 'Foi marcada uma reunião para o seguinte dia e horário: ' . $date_meeting . '. <br>
        O tema da reunião será: ' . $title . '. <br>
        Os arquivos em anexo contém os resultados da etapa de Integração entre Softwares - Diagramas de Bloco de Cada ECU e Releases de softwares. <br>
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

      header("Location: " . BASE_URL . "meeting?project_id=" . $project_id);
      exit;
    }

    if(!isset($_GET['project_id']) || empty($_GET['project_id'])){
      header("Location: " . BASE_URL . "softwareintegration/chooseProjectResults");
      exit;
    }

    $data['list_meeting'] = $meetings->getAll($_GET['project_id'], $filters);    
    $data['info_user'] = $accounts->get($id);
    

    $data['info_software_integrations'] = $software_integrations->getByProjectId($_GET['project_id']);

    foreach ($data['info_software_integrations'] as $key => $value) {
      $data['info_software_integrations'][$key]['releases_softwares'] = $software_integrations->getByReleasesSoftware($value['id']);
    }


    $this->loadTemplate("home", "meeting/list", $data);
  }

  public function view($id_meeting)
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
    $data['info'] = $meetings->get($id_meeting);

    if (!empty($_POST['text'])) {

      $text = addslashes($_POST['text']);

      $meetings->meetingConcluded($id_meeting, $text);
      header("Location: " . BASE_URL . "functionintegration/second_result");
      exit;
    }

    //template, view, data
    $this->loadTemplate("home", "meeting/view", $data);
  }


 

 

 

 

 

 

  

 

  

 

  


  

}
