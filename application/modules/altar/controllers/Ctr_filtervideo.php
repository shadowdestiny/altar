<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');


class Ctr_filtervideo extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Mdl_filtervideo');
        $this->load->model('Mdl_creativealtar');
        $this->load->library('session');
        $this->load->library('Putlanguage');
        $this->load->library('Vimeoapi');
        $this->load->helper('url');
        $this->load->library('Ajax_pagination');
        $this->load->library('Ctr_advertising');
        $this->perPage = 1;

        if ($this->session->userdata('Setlanguage') == null) {
            $this->session->set_userdata('Setlanguage', 'es');
        }

    }

    /**
     * FUncion para configurar la paginacion
     * @param type $total_rows
     * @param type $cur_page
     * @param type $url
     * @return string
     */
    public function paginateConf($total_rows = NULL, $cur_page = NULL, $url = NULL)
    {
        $config['target'] = '#postList';
        $config['base_url'] = $url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->perPage;
        $config['cur_page'] = $cur_page;
        $config['link_func'] = 'getData';
        $this->ajax_pagination->initialize($config);

        $paginate = "<div class='col-md-12 responsivepadding post-list'>
                            " . $this->ajax_pagination->create_links() . "
                       </div>";
        return $paginate;
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
        $this->view(NULL);
    }

    /**
     * Funcion index pagína terminos y condiciones
     */
    public function view($category_video = NULL)
    {
        $data['lang'] = $this->session->userdata('Setlanguage');
        $category = $this->putlanguage->setLanguage($data['lang'], 'index');
        $data['categoryHeader'] = $category['categoryHeader'];
        $data['categoryFooter'] = $category['categoryFooter'];
        $data['categoryFilter'] = $category['categoryFilter'];

        $params = ['videoTitle' => '', 'videoCategory' => ''];
        $this->session->unset_userdata($params);

        if ((int)$this->input->post('typefilter') == 1) {
            $videoTitle = trim($this->input->post('videoTitle'));
            $videoCategory = trim($this->input->post('videoCategory'));

            $params = ['videoTitle' => $videoTitle, 'videoCategory' => $videoCategory];
            $this->session->set_userdata($params);
        } else {

            $videoTitle = '';
            $videoCategory = trim($category_video);
            $params = ['videoTitle' => $videoTitle, 'videoCategory' => $videoCategory];
            $this->session->set_userdata($params);

        }
        $data['lang'] = $this->session->userdata('Setlanguage');
        $data['videoTitle'] = $this->session->userdata('videoTitle');
        $data['videoCategory'] = $this->session->userdata('videoCategory');


        $data_conditions['lang'] = $data['lang'];
        $data_conditions['limit'] = $this->perPage;
        $data_conditions['videoTitle'] = $params['videoTitle'];
        $data_conditions['videoCategory'] = $params['videoCategory'];

        $result = $this->Mdl_filtervideo->index_filter($data_conditions);

        if (!empty($result)) {
            /**PAGINACIÖN*/
            $url = ROOT_URL . 'altar/Ctr_filtervideo/index_paginate';
            $link_func = "getData";
            $paginate = $this->paginateConf($result[0]['totalRow'], 0, $url, $link_func);

            $videos = $this->formFilerterVideo($result, $paginate);
        } else {
            $videos = "
                <center>
                    <img src='" . URL_TEMPLATEALTAR . "img/productos/lulp.jpg' />
                    <div>
                        " . $this->lang->line('video_no_record') . "
                    </div>                    
                </center>";
        }

        $indexData['videos'] = $videos;
        $indexData['category'] = $category['categoryHeader'];
        $resultmost = $this->Mdl_filtervideo->view_more_sold($data);
        $resultfree = $this->Mdl_filtervideo->front_video_free($data);

        $mostsold = $this->formMostSold($resultmost);
        $freevideo = $this->formFreeVideo($resultfree);

        $indexData['category'] = $category['categoryHeader'];
        $indexData['videos'] = $videos;
        $indexData['mostsold'] = $mostsold;
        $indexData['freevideo'] = $freevideo;
        $indexData['publicidad'] = $this->ctr_advertising->columns();

        $this->load->view('include/include_altarcreative/includes/header', $data);
        $this->load->view('vw_filtervideo/vw_index', $indexData);
        $this->load->view('include/include_altarcreative/includes/footer.php', $data);
        $this->load->view('vw_filtervideo/include/indexjs');
        $this->load->view('include/include_altarcreative/includes/closeBody.php');
    }

    /**
     * Funcion para paginacion
     */
    public function index_paginate()
    {
        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'index_paginate');

        $data = [];
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

        $data['_start'] = $offset;
        $data['_limit'] = $this->perPage;
        $data['lang'] = $lang;
        $data['videoTitle'] = $this->session->userdata('videoTitle');
        $data['videoCategory'] = $this->session->userdata('videoCategory');
        $result = $this->Mdl_filtervideo->index_filter_paginate($data);
        if (!empty($result)) {
            /* pagination configuration*/
            $url = ROOT_URL . 'altar/Ctr_filtervideo/index_paginate';
            $link_func = "getData";
            $paginate = $this->paginateConf($result[0]['totalRow'], $data['_start'], $url, $link_func);

            echo $this->formFilerterVideo($result, $paginate);
        } else {
            echo "<center><h1>" . $this->lang->line('video_no_record') . "</h1></center>";
        }

    }

    /**
     * Funcion para dar formato a la vista
     * @param $result
     * @return string
     */
    private function formFilerterVideo($result, $paginate)
    {

        $data = "";

        $data .= "<div id='shop' class='shop product-3 clearfix'>";

        foreach ($result as $key => $value) {

            $title = '';

            if ($this->session->userdata('Setlanguage') == 'es') {
                $title = $value['text_spanish'];
            } elseif ($this->session->userdata('Setlanguage') == 'en') {
                $title = $value['text_english'];
            }
            if (strlen($title) > 10) {
                $title = substr($title, 0, 25) . '...';
            }


            $data .= "
            <div class='product clearfix'>
                <div class='product-image'>
                    <a href='" . ROOT_URL . "altar/Ctr_product/view/$value[id]'><img src='" . URL_IMAGES . "videos/thumbs/" . $value['previewThumPath'] . "' alt='Producto'></a>
                    <div class='product-overlay'>
                        <a class='add-to-cart addElementShoppingCart changeCursorHand' video-id='$value[id]' video-value='$value[price]' video-preview='" . URL_IMAGES . "videos/thumbs/" . $value['previewThumPath'] . "' video-title='$title' video-url='" . ROOT_URL . "altar/Ctr_product/view/$value[id]' >
                            <i class='icon-shopping-cart'>
                            </i><span>" . $this->lang->line('quick_view_shop_car') . "</span>
                        </a>
                        <a href='" . ROOT_URL . "altar/Ctr_filtervideo/quick_view/" . $value['id'] . "' class='item-quick-view' data-lightbox='ajax'><i class='icon-zoom-in2'></i><span> " . $this->lang->line('video_quickview') . ".</span></a>
                    </div>
                </div>
                <div class='product-desc center'>
                    <div class='product-title'><h3><a href='" . ROOT_URL . "altar/Ctr_product/view/$value[id]'>$title</a></h3></div>
                    <div class='product-price'> <ins>\$$value[price]</ins></div>

                </div>
            </div>
            ";

        }

        $data .= "</div>" . $paginate;

        return $data;

    }


    /**
     * Funcion para generar la vista previa de cada video por el ID del video
     */
    public function quick_view($id = NULL)
    {
        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'quick_view');
        $message = "";
        $data = [];
        $data['id'] = $id;
        $data['lang'] = $lang;
        if ($data['id']) {
            $result = $this->Mdl_filtervideo->front_filtervideo_quickview($data);
            if ($result) {

                $message = $this->format_quick_view($result);
            }

        } else {
            $message = $this->lang->line('error_video_id');
        }

        echo $message;
    }


    /**
     * Funcion para dar formatoa  a la visa rapida de cada video
     * @param array $result
     * @return mixed
     */
    private function format_quick_view($result = array())
    {
        $data = [];
        $data['lang'] = $this->session->userdata('Setlanguage');
        if (!empty($result)) {

            $data['video_id'] = $result[0]['video_id'];
            $data['sku'] = $result[0]['sku'];
            $data['vimeoPreview_id'] = $this->vimeoapi->show_video($result[0]['vimeoPreview_id']);
            $data['image'] = $result[0]['image'];
            $data['image_thumb'] = $result[0]['image_thumb'];

            //se pasan parametros para el procedimiento almacenado categorys_video
            $resultcategory = $this->Mdl_filtervideo->categorys_video($data);
            //asigna a data[category] los links generados en fromCategory
            $data['category'] = $this->formCategory($resultcategory);

            if ($result[0]['offerPrice'] == null || trim($result[0]['offerPrice']) == '') {
                $data['price'] = $result[0]['price'];
            } else {
                $data['price'] = $result[0]['offerPrice'];

            }
            $data['price'] = $result[0]['price'];
            $data['offerPrice'] = $result[0]['offerPrice'];
            $data['price_money'] = $data['price'];
            $data['title'] = $result[0]['title'];
            $data['intro'] = $result[0]['intro'];
            $data['descrip'] = $result[0]['descrip'];
            $data['autor'] = $result[0]['autor'];

            if ($result[0]['isfree']) {

                $download = $this->vimeoapi->download_video($result[0]['vimeo_id']);

                if (!isset($download['error'])) {
                    $download = $download['resolution_link'];
                } else {
                    $download = "";
                }
                $data['link'] = $download;
                return $this->load->view('vw_filtervideo/include/quick_view_free', $data, TRUE);
            } else {
                return $this->load->view('vw_filtervideo/include/quick_view', $data, TRUE);
            }

        }

        return $this->load->view('vw_filtervideo/include/quick_view', $data, TRUE);
    }

    /*Documenta EFREN*/
    private function formMostSold($result)
    {

        $data = "";

        foreach ($result as $key => $value) {

            if (isset($value['offerPrice']) && !is_null($value['offerPrice']) && $value['offerPrice'] != 0) {
                $value['price'] = $value['offerPrice'];
            }

            $data .= "
            <div class='spost clearfix'>
                <div class='entry-image'>
                    <a href='#''><img src='" . URL_IMAGES . "videos/thumbs/" . $value['previewThumPath'] . "' alt='Image'></a>
                </div>
                <div class='entry-c'>
                    <div class='entry-title'>
                        <h4><a href='#''>$value[title]</a></h4>
                        <h5><a href='" . ROOT_URL . "altar/Ctr_filtervideo/view/$value[id_category]'>$value[categoryname]</a></h5>
                        
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

    /*Documenta EFREN*/
    private function formFreeVideo($result)
    {

        $data = "";


        foreach ($result as $key => $value) {

            $download = $this->vimeoapi->download_video($value['vimeo_id']);

            if (!isset($download['error'])) {
                $download = $download['resolution_link'];
            } else {
                $download = "";
            }


            $data .= "
            <div class='oc-item'>
                <div class='product iproduct clearfix'>
                    <div class='product-image'>
                        <a href='" . ROOT_URL . "altar/Ctr_filtervideo/quick_view/" . $result[0]['id'] . "' class='item-quick-view' data-lightbox='ajax'>
                            <img src='" . URL_IMAGES . "videos/thumbs/" . $value['image_thumb'] . "' alt='Checked Short Dress'>
                            <br>
                            <div style='text-align: center'>
                                <button class='default-button'>".$this->lang->line('video_download')."</button>                      
                            </div>                            
                        </a>
                        <!--
                        <div class='product-overlay'>
                          <a class='button button-3d' href='" . $download . "' style='width:100%; margin-left:0px;'>
                          <i class='icon-line-download'></i>" . $this->lang->line('video_download') . "</a>
                        </div>
                        -->
                    </div>
                    <div class='product-desc center'>
                        <div class='product-title' style='text-align: center'><h3><a href='#'>$value[text]</a></h3></div>
                        <div class='product-price'><ins>" . $this->lang->line('video_is_free') . "</ins></div>                        
                    </div>
                </div>
            </div>
            ";

        }

        return $data;

    }

    /**
     * Funcion para dar formato a la categoria
     * @param $data
     * @return string
     */
    private function formCategory($data)
    {

        $result = "";
        $count = count($data);

        foreach ($data as $key => $value) {

            $result .= "
                <a href='" . ROOT_URL . "altar/Ctr_filtervideo?videoCategory=$value[id]' rel='tag'>$value[name]</a>
            ";

            if ($key < ($count - 1)) {
                $result .= ", ";
            } else {
                $result .= ". ";
            }

        }

        return $result;

    }


    public function categories()
    {

        $data['lang'] = $this->session->userdata('Setlanguage');
        $lang = $data['lang'];
        $category = $this->putlanguage->setLanguage($data['lang'], 'index');
        $data['categoryHeader'] = $category['categoryHeader'];
        $data['categoryFooter'] = $category['categoryFooter'];
        $data['categoryFilter'] = $category['categoryFilter'];

        $result_category = $this->Mdl_creativealtar->front_category_image($lang);
        $section2 = $this->Mdl_creativealtar->front_creative_section2($lang);
        $data['category_title'] = $section2[0]['title'];
        $data['category_subtitle'] = $section2[0]['subtitle'];
        $data['category'] = $this->formCategory_search($result_category, $section2);

        $this->load->view('include/include_altarcreative/includes/header', $data);
        $this->load->view('vw_filtervideo/vw_categories', $data);
        $this->load->view('include/include_altarcreative/includes/footer.php', $data);
        $this->load->view('vw_filtervideo/include/indexjs');
        $this->load->view('include/include_altarcreative/includes/closeBody.php');

    }


    /**
     * Funcion para dar formato a la categoria
     * @param $data
     * @return string
     */
    private function formCategory_search($data)
    {

        $result = "";

        if (!empty($data)) {

            foreach ($data as $key => $value) {

                $result .= "<article class='portfolio-item pf-media pf-icons'>
                                <div class='portfolio-image'>
                                    <a href='" . ROOT_URL . "altar/Ctr_filtervideo/view/" . $value['id_category'] . "'>
                                        <img style='width:100%' src='" . URL_IMAGES . "videos/thumbs/" . $value['image_thumb'] . "' alt='Open Imagination'>
                                    </a>
                                    <div class='portfolio-overlay'>
                                        <a href='" . ROOT_URL . "altar/Ctr_filtervideo/view/" . $value['id_category'] . "' class='right-icon'>
                                        <!--<i class='icon-line-plus'></i>-->
                                        <h4>".$value['text']."</h4>
                                        </a>                                        
                                    </div>
                                </div>                            
                            </article>
            ";

            }
        }


        return $result;

    }


}
