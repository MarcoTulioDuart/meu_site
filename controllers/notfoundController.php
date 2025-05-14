<?php
class notfoundController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();
        $this->loadTemplate("notfound", $data);
    }
}
