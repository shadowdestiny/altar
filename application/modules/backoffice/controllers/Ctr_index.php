<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_index extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_Backoffice');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->helper('url');

    }

    /**
     * Funcion para mostrar login en caso de no
     */
    public function index()
    {
        if (!$this->session->userdata('loginFlag')) {
            $uri = ROOT_URL_BACK;
            redirect($uri, 'refresh');
        } else {
            $this->load->view('include/back/head');
            //$this->load->view('include/back/chat_panel');
            //$this->load->view('include/back/chat_window');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_ctr_index/vw_index');
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_ctr_user/include/scripts');
        }

    }


}
