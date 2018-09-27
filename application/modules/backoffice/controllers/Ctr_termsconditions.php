<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_termsconditions extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_termsconditions');
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

            $result = $this->Mdl_termsconditions->get_termsConditions();

            $dataTerms = $this->formatTermsCondition($result);

            $this->load->view('include/back/head');
            $this->load->view('vw_ctr_terms/include/modal_update_terms');
            $this->load->view('include/back/chat_panel');
            $this->load->view('include/back/chat_window');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_ctr_terms/vw_index', $dataTerms);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_ctr_terms/include/scripts');
        }

    }

    public function saveTermsconditions()
    {

        $saveFlag = false;

        $termsTitleEs = $this->input->post('termsTitleEs');
        $termsTitleEn = $this->input->post('termsTitleEn');
        $termsContentEs = $this->input->post('termsContentEs');
        $termsContentEn = $this->input->post('termsContentEn');

        $data = array(
            'termsTitleEs' => $termsTitleEs,
            'termsTitleEn' => $termsTitleEn,
            'termsContentEs' => $termsContentEs,
            'termsContentEn' => $termsContentEn
        );

        $result = $this->Mdl_termsconditions->save_termsConditions($data);

        if ($result == true) {
            $saveFlag = true;
        }

        $dataJson = array(
            'flag' => $saveFlag
        );

        echo json_encode($dataJson);

    }

    private function formatTermsCondition($result)
    {

        $tempResult = $result[0];

        $termsTitleEs = $tempResult['title_spanish'];
        $termsTitleEn = $tempResult['title_english'];
        $termsContentEs = $tempResult['content_spanish'];
        $termsContentEn = $tempResult['content_english'];

        $data = array(
            'termsTitleEs' => $termsTitleEs,
            'termsTitleEn' => $termsTitleEn,
            'termsContentEs' => $termsContentEs,
            'termsContentEn' => $termsContentEn
        );

        return $data;

    }


}
