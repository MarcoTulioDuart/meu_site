<?php
class notfoundController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    { //action/metodo

        $data  = array();
        $data['page'] = 'notfound';
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

        $this->loadTemplate("home", "notfound", $data);
    }
}
