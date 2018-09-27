<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ctr_termsconditions extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Mdl_termsconditions');

        $this->load->library('session');
        $this->load->library('Putlanguage');
        $this->load->helper('url');

        if ($this->session->userdata('Setlanguage') == null) {
            $this->session->set_userdata('Setlanguage', 'es');
        }

    }

    /**
     * Funcion index pagína principal para el funcionamiento del manejo de idioma
     */
    public function index()
    {
        $this->fileLanguage = 'index';
        $this->redirect($this->fileLanguage);
    }


    public function redirect($fileLanguage)
    {

        $lang = $this->session->userdata('Setlanguage');
        $request = $this->putlanguage->setLanguage($lang, $fileLanguage);
        $this->index_u($request);
    }

    /**
     * Funcion index pagína terminos y condiciones
     */
    public function index_u( $category )
    {

        $result =  $this->Mdl_termsconditions->get_termsConditions();

        $data = $this->formatTermsConditions( $result );

        $this->load->view('include/include_altarcreative/includes/header', $category);
        $this->load->view('vw_termsconditions/vw_index', $data);
        $this->load->view('include/include_altarcreative/includes/footer.php', $category);
        $this->load->view('include/include_altarcreative/includes/closeBody.php');

    }

    /**
     * Funcion para dar formato a los terminos y condiciones
     * @param $result
     * @return array
     */
    private function formatTermsConditions( $result ){

        $temResult = $result[0];

        $title       = null;
        $content     = null;

        if( $this->session->userdata('Setlanguage') == 'es' ){
            $title      = $temResult['title_spanish'];
            $content    = $temResult['content_spanish'];
        }else if( $this->session->userdata('Setlanguage') == 'en' ){
            $title      = $temResult['title_english'];
            $content    = $temResult['content_english'];
        }

        $data = array(
                'title'     => $title,
                'content'   => $content
            );

        return $data;
    }

}
