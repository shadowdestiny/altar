<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_privacy extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_privacy');
        $this->load->library('encryption');
        $this->load->library('session');


    }

    /**
     * Funcion para mostrar los terminos y condiiciones
     */
    public function index()
    {
        if (!$this->session->userdata('loginFlag')) {
            redirect('backoffice/', 'redirect');
        } else {

            $result     = $this->Mdl_privacy->get_privacy();

            $dataTerms  = $this->formatPrivacy( $result );

            //$data['table'] = $this->format_users($result);

            $this->load->view('include/back/head');
            $this->load->view('vw_ctr_privacy/include/modal_update_privacy');
            $this->load->view('include/back/chat_panel');
            $this->load->view('include/back/chat_window');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_ctr_privacy/vw_index', $dataTerms);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_ctr_privacy/include/scripts');
        }

    }

    public function savePrivacy(){

        $saveFlag = false;

        $privacyTitleEs       = $this->input->post('privacyTitleEs');
        $privacyTitleEn       = $this->input->post('privacyTitleEn');
        $privacyContentEs     = $this->input->post('privacyContentEs');
        $privacyContentEn     = $this->input->post('privacyContentEn');

        $data = array(
                'privacyTitleEs'   => $privacyTitleEs,
                'privacyTitleEn'   => $privacyTitleEn,
                'privacyContentEs' => $privacyContentEs,
                'privacyContentEn' => $privacyContentEn
            );

        $result = $this->Mdl_privacy->save_privacy( $data );

        if( $result == true ){
            $saveFlag = true;
        }
        
        $dataJson = array(
                'flag'      => $saveFlag
            );

        echo json_encode( $dataJson );

    }

    private function formatPrivacy( $result ){

        $tempResult = $result[0];

        $privacyTitleEs       = $tempResult['title_spanish'];
        $privacyTitleEn       = $tempResult['title_english'];
        $privacyContentEs     = $tempResult['content_spanish'];
        $privacyContentEn     = $tempResult['content_english'];

        $data = array(
                'privacyTitleEs'  => $privacyTitleEs,
                'privacyTitleEn'  => $privacyTitleEn,
                'privacyContentEs'=> $privacyContentEs,
                'privacyContentEn'=> $privacyContentEn
            );

        return $data;

    }  


}
