<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para el controlador del modulo de Contacto
 */
class Ctr_help extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->model('Mdl_help');
        $this->load->model('Mdl_filtervideo');
        $this->load->library('Ctr_advertising');

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
        $data_lang['lang'] = $this->session->userdata('Setlanguage');

        $result = $this->Mdl_help->help_get_info($data_lang);
        $data['info_help'] = $this->view_info_index($result);

        $resultmost = $this->Mdl_filtervideo->view_more_sold($data_lang);
        $resultfree = $this->Mdl_filtervideo->front_video_free($data_lang);

        $mostsold = $this->formMostSold($resultmost);
        $freevideo = $this->formFreeVideo($resultfree);
        $data['mostsold'] = $mostsold;
        $data['freevideo'] = $freevideo;
        $data['publicidad'] = $this->ctr_advertising->columns();

        $this->load->view('include/include_altarcreative/includes/header', $category);
        $this->load->view('vw_help/vw_index', $data);
        $this->load->view('include/include_altarcreative/includes/footer.php', $category);
        $this->load->view('include/include_altarcreative/includes/closeBody.php');

    }

    public function view_info_index($result = NULL)
    {

        $page_info = "";

        if ($result) {

            foreach ($result->result() as $key => $value) {

                if ($value->order == 1) {

                    $page_info .= "<div id='faqs-list' class='fancy-title title-bottom-border'>
                                <h3>" . $value->text . "</h3>
                            </div>";
                }
            }
            $page_info .= "<ul class='iconlist faqlist'>";
            foreach ($result->result() as $key => $value) {

                if ($value->order != 1) {

                    $page_info .= " <li><i class='icon-caret-right'></i><strong><a href='#' data-scrollto='#faq-" . $value->order . "'>" . $value->text . "</a></strong></li>";

                }

            }
            $page_info .= "</ul><div class='divider'><i class='icon-circle'></i></div>";
            foreach ($result->result() as $key => $value) {

                if ($value->order != 1) {

                    $page_info .= "<h3 id='faq-" . $value->order . "'>" . $value->text . "</h3>
                            <p>" . $value->content . "</p>

                            <div class='divider divider-right'><a href='#' data-scrollto='#faqs-list'><i class='icon-chevron-up'></i></a></div>";

                }

            }
        }

        return $page_info;

    }

    /**
     * Funcion para dar formato a los videos mas vendidos
     * @param $result
     * @return string
     */
    private function formMostSold($result)
    {

        $data = "";

        foreach ($result as $key => $value) {

            $data .= "
            <div class='spost clearfix'>
                <div class='entry-image'>
                    <a href='#''><img src='" . URL_IMAGES . "videos/thumbs/" . $value['previewThumPath'] . "' alt='Image'></a>
                </div>
                <div class='entry-c'>
                    <div class='entry-title'>
                        <h4><a href='#''>$value[title]</a></h4>
                        <h5><a href='" . ROOT_URL . "altar/Ctr_filtervideo?videoCategory=$value[id_category]'>$value[categoryname]</a></h5>
                        
                    </div>
                    <ul class='entry-meta'>
                        <li >\$$value[price]</li>
                        
                    </ul>
                </div>
            </div>
            ";

        }

        return $data;

    }

    /**
     * Funcion para dar formato al video gratis
     * @param $result
     * @return string
     */
    private function formFreeVideo($result)
    {

        $data = "";

        foreach ($result as $key => $value) {

            $data .= "
            <div class='oc-item'>
                <div class='product iproduct clearfix'>
                    <div class='product-image'>
                        <a href='#'><img src='" . URL_IMAGES . "videos/thumbs/" . $value['image_thumb'] . "' alt='Checked Short Dress'></a>
                        <div class='product-overlay'>
                          <a class='button button-3d' href='#' style='width:100%; margin-left:0px;'><i class='icon-line-download'></i>" . $this->lang->line('video_download') . "</a>
                        </div>
                    </div>
                    <div class='product-desc center'>
                        <div class='product-title'><h3><a href='#'>$value[text]</a></h3></div>
                        <div class='product-price'><ins>" . $this->lang->line('video_is_free') . "</ins></div>                        
                    </div>
                </div>
            </div>
            ";

        }

        return $data;

    }

}

