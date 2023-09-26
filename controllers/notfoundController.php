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

        //fim do básico

        $this->loadTemplate("home", "notfound", $data);
    }
}
