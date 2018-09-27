<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class backoffice extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_backoffice');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->helper('url');

    }

    /**
     * Funcion para mostrar login en caso de no
     */
    public function index()
    {
        if ($this->session->userdata('loginFlag')) {

            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');

        } else {
            $this->load->view('vw_backoffice/vw_login');
            $this->load->view('vw_backoffice/include/script');
        }

    }

    /**
     * Esta funcion se encarga de validar que el usuario y contraseña sean correctos
     * Esta funcion es invocada desde un ajax en el login en caso que no coincidan
     * los datos del usuario regresa un valor BOOL FALSE
     */
    public function userAuth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $dataUser = ['username' => $username, 'password' => $password];

        $result = $this->Mdl_backoffice->userAuth($dataUser);
        $flagLogin = $result->result()[0]->flagLogin;
        if ($flagLogin != 0) {

            $authUser = [
                'loginFlag' => TRUE,
                'admin_id' => $result->result()[0]->id,
                'username' => $result->result()[0]->email
            ];
            //var_dump($authUser);
            $this->session->set_userdata($authUser);
            /*
             * Verifica que tipo de usuario es
             */
            echo json_encode(['response' => TRUE]);
        } else {
            echo json_encode(['response' => FALSE]);
        }

    }

    /**
     * Esta funcion cierra la session y redirecciona
     */
    public function closeSession()
    {

        $this->session->unset_userdata('loginFlag');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('rol_id');
        $this->session->unset_userdata('rol_name');

        //redirect('backoffice', 'refresh');
        redirect(base_url() . 'backoffice', 'refresh');
    }

}
