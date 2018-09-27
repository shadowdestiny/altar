<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para el controlador del modulo de Contacto
 */
class Ctr_aboutus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->model('Mdl_aboutus');

        $this->load->library('Putlanguage');

        if ($this->session->userdata('Setlanguage') == null) {
            $this->session->set_userdata('Setlanguage', 'es');
        }
    }

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
     * Funcion contacto pagína contacto
     */
    public function index_u($category)
    {
        //$data['info'] = $this->Mdl_aboutUs->about_get_info();
        $result = $this->Mdl_aboutus->about_get_info();
        $data['info'] = $this->view_info_index($result);       
        $data['previewThumPath'] = $result->result()[0]->image_thumb;

        $this->load->view('include/include_altarcreative/includes/header', $category);
        $this->load->view('vw_aboutus/vw_index', $data);
        $this->load->view('include/include_altarcreative/includes/footer.php', $category);
        $this->load->view('include/include_altarcreative/includes/closeBody.php');

    }
    public function view_info_index($result = NULL){
        
        $page_info = "";

        if ($result) {

            foreach ($result->result() as $key => $value) {
    
                if ($value->order == 1) {
        
                    $page_info.=" <div class='container clearfix'>
                        <h1>".$value->title_spanish."</h1>
                        <span>".$value->content_spanish."</span>
                                                            </div>";
                    
                }
            }
        
            $page_info.= "</section>
                            <section id='content'>
                                <div class='content-wrap'>
                                    <div class='container clearfix'>";
            $count = 0;
            $last_row = "";
            foreach ($result->result() as $key => $value) {
    
                if ($value->order != 1) {
                    if($count == 3){
                        $last_row = "col_last";
                    }
    
                $page_info.=" <div class='col_one_third  ". $last_row."'  >
                            <div class='heading-block fancy-title nobottomborder title-bottom-border'>
                                <h4>". $value->title_spanish."</h4>
                            </div>
                            <p>".$value->content_spanish."</p>
                        </div>";
                        
                }
                $count++;
                }
            }

        return $page_info; 

    }


}

