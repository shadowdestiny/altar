<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ctr_changelanguage extends CI_Controller
{

    function __construct()
    {

        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');

    }

    /**
     * Funcion index pagína principal para el funcionamiento del manejo de idioma
     */
    public function index()
    {
        $method = $this->input->get('method');
        $lang = $this->input->get('lang');

        $this->session->set_userdata('Setlanguage', $lang);

        redirect($method);

    }

}
