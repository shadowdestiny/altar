<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class creativealtar extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Mdl_creativealtar');
        $this->load->model('Mdl_filtervideo');
        $this->load->model('Mdl_altar');
        $this->load->library('Vimeoapi');
        $this->load->library('session');
        $this->load->library('Sendmessage');
        $this->load->library('MailChimp');
        $this->load->library('Ctr_functions');
        $this->list_id = 'd19c2580e4';
        $this->load->library('recaptcha');
        $this->load->library('Putlanguage');
        $this->load->helper('url');
        $this->limit_videos = 3;

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
     * Funcion index pagína principal
     */
    public function index_u($category)
    {
        $lang = $this->session->userdata('Setlanguage');

        $data['categoryHeader'] = $category['categoryHeader'];
        $data['categoryFooter'] = $category['categoryFooter'];
        $data['categoryFilter'] = $category['categoryFilter'];

        $result_category = $this->Mdl_creativealtar->front_category_image($lang);
        $data['category_seccion2'] = $this->form_category($result_category);

        list($new, $popular, $params) = $this->list_videos_new_popular();

        $result_download_free = $this->Mdl_creativealtar->front_video_free($lang);
        $data['video_free'] = $this->form_video_free($result_download_free);

        /*Metodos para formar los recapcha*/
        $data['widget'] = $this->recaptcha->getWidget();
        $data['script'] = $this->recaptcha->getScriptTag();

        $result = $this->Mdl_altar->get_country_preregister();
        $data['contrys'] = $this->pre_format_contry($result);

        /*Secciones*/
        $data['section1'] = $this->section1();
        $data['section2'] = $this->section2($data['category_seccion2']);
        $data['section3'] = $this->section3($new, $popular);
        $data['params'] = $params;
        $data['section4'] = $this->section4($data['contrys'], $data['widget'], $data['script']);

        $this->load->view('include/include_altarcreative/includes/header', $data);
        $this->load->view('vw_creativealtar/index', $data);
        $this->load->view('vw_creativealtar/include/modal_subscribe', $data);
        $this->load->view('include/include_altarcreative/includes/footer.php', $data);
        $this->load->view('vw_creativealtar/include/indexjs');
        $this->load->view('include/include_altarcreative/includes/closeBody.php');

    }

    /**
     * Funcion para formar el fondo  y el cambio del titulo de la primera seccion
     * @return string
     */
    private function section1()
    {
        $lang = $this->session->userdata('Setlanguage');
        $info = "";
        $section1 = $this->Mdl_creativealtar->front_creative_section1($lang);
        if (!empty($section1)) {

            if ($section1[0]['type_media'] == "video") {

                $info = "
                        <div class='swiper-slide dark'>
                            <div class='container clearfix'>
                                <div class='slider-caption slider-caption-center'>
                                    <h2 class='respondemesta'
                                        data-caption-animate='fadeInUp'>" . $section1[0]['title'] . "</h2>
                                </div>
                            </div>
                            <div class='video-wrap'>
                                <video poster='" . URL_TEMPLATEALTARVIDEO1 . "' preload='auto' loop autoplay muted>
                                    <source src='" . URL_IMAGES . "content/" . $section1[0]['image'] . "' type='video/mp4'/>
                                    <source src='" . URL_IMAGES . "content/" . $section1[0]['image'] . "' type='video/webm'/>
                                </video>
                                <div class='video-overlay'></div>
                            </div>
                        </div>";

            } elseif ($section1[0]['type_media'] == "image") {

                $info = " <div class='swiper-slide dark'>
                            <div class='container clearfix'>
                               
                            </div>
                            <div class='video-wrap'>
                                <img src='" . URL_IMAGES . "content/" . $section1[0]['image'] . "'>
                                <div class='video-overlay'></div>
                            </div>
                        </div>";

            }

        }

        return $info;
    }

    /**
     * Funcion para formar el fondo  y el cambio del titulo de la primera seccion
     * @return string
     */
    private function section2($category_seccion2)
    {
        $lang = $this->session->userdata('Setlanguage');
        $info = "";
        $section1 = $this->Mdl_creativealtar->front_creative_section2($lang);
        if (!empty($section1)) {

            if ($section1[0]['type_media'] == "video") {

                $info = "
                        <div class='content-wrap categories-creativealtar' style='padding: 0px 0; !important;'>
                                
                                 <video poster='" . URL_TEMPLATEALTARVIDEO1 . "' preload='auto' loop autoplay muted style='position: absolute'>
                                    <source src='" . URL_IMAGES . "content/" . $section1[0]['image'] . "' type='video/mp4'/>
                                    <source src='" . URL_IMAGES . "content/" . $section1[0]['image'] . "' type='video/webm'/>
                                </video>
                                
                                <div class='container bottommargin center'>
                                    <h1>" . $section1[0]['title'] . "</h1>
                                    <h5 class='notopmargin light'>" . $section1[0]['subtitle'] . "</h5>
                                </div>
                                <div class='container clearfix'>
                                    <div id='portfolio' class='portfolio grid-container portfolio-3 portfolio-masonry clearfix'>
                            
                                        " . $category_seccion2 . "
                            
                                    </div>
                            
                                </div>
                            </div>";

            } elseif ($section1[0]['type_media'] == "image") {

                $info = " <div class='content-wrap categories-creativealtar'
                                style='background-image: url(" . URL_IMAGES . "content/" . $section1[0]['image'] . ");'>
                                
                                <div class='container bottommargin center'>
                                    <h1>" . $section1[0]['title'] . "</h1>
                                    <h5 class='notopmargin light'>" . $section1[0]['subtitle'] . "</h5>
                                </div>
                                <div class='container clearfix'>
                                    <div id='portfolio' class='portfolio grid-container portfolio-3 portfolio-masonry clearfix'>
                            
                                        " . $category_seccion2 . "
                            
                                    </div>
                            
                                </div>
                            </div>
                            ";

            }

        }


        return $info;
    }

    /**
     * Funcion para formar el fondo  y el cambio del titulo de la primera seccion
     * @return string
     */
    private function section3($videos_new, $videos_popular)
    {
        $lang = $this->session->userdata('Setlanguage');
        $info = "";
        $section1 = $this->Mdl_creativealtar->front_creative_section3($lang);
        if (!empty($section1)) {

            if ($section1[0]['type_media'] == "video") {

                $info = "
                        <div class='content-wrap categories-creativealtar' style='padding: 0px 0; !important;'>
                                
                                <video poster='" . URL_TEMPLATEALTARVIDEO1 . "' preload='auto' loop autoplay muted style='position: absolute'>
                                    <source src='" . URL_IMAGES . "content/" . $section1[0]['image'] . "' type='video/mp4'/>
                                    <source src='" . URL_IMAGES . "content/" . $section1[0]['image'] . "' type='video/webm'/>
                                </video>
                                
                                <div class='container bottommargin center' style='padding-top: 35px;'>
                                    <h1>" . $section1[0]['title'] . "</h1>
                                    <h5 class='notopmargin light'>" . $section1[0]['subtitle'] . "</h5>
                                </div>
                                <div class='container clearfix'>
                                    <ul id='portfolio-filter' class='portfolio-filter clearfix'>
                                        <li class='activeFilter'><a href='#' data-filter='*'>" . $this->lang->line('video_carrucel_all') . "</a>
                                        </li>
                                        <li><a href='#' data-filter='.pf-nuevos'>" . $this->lang->line('video_carrucel_new') . "</a></li>
                                        <li><a href='#' data-filter='.pf-populares'>" . $this->lang->line('video_carrucel_popular') . "</a></li>
                                    </ul>
                                    <div class='clear'></div>
                                    <div id='demo-gallery' class='col-3' data-lightbox='gallery'>
                                        " . $videos_new . "
                                        " . $videos_popular . "
                                    </div>
                                </div>
                            </div>";


            } elseif ($section1[0]['type_media'] == "image") {

                $info = " <div class='content-wrap parallax' style='background-image: url(" . URL_IMAGES . "content/" . $section1[0]['image'] . ");'
                             data-stellar-background-ratio='0.3'>
                            <div class='topmargin-sm center heading-block topmargin-sm center' style='padding-top: 35px;'>
                                <h2 class='last-content nobottommargin'>" . $section1[0]['title'] . "<span style='font-weight: bold;color:black'> ".$section1[0]['subtitle']."</span></h2>
                                <br />
                            </div>
                            <div class='container clearfix'>
                                <div class='section-list'>
                                    <ul id='portfolio-filter' class='portfolio-filter clearfix'>
                                        <li class='activeFilter'><a href='#' data-filter='*'>" . $this->lang->line('video_carrucel_all') . "</a>
                                        </li>
                                        <li><a href='#' data-filter='.pf-nuevos'>" . $this->lang->line('video_carrucel_new') . "</a></li>
                                        <li><a href='#' data-filter='.pf-populares'>" . $this->lang->line('video_carrucel_popular') . "</a></li>
                                    </ul>
                                    <div class='line-section'></div>
                                    <div class='clear'></div>
                                    <div id='demo-gallery' class='col-3' data-lightbox='gallery'>
                                        " . $videos_new . "
                                        " . $videos_popular . "
                                    </div>
                                </div>
                                <br/>
                            </div>                            
                        </div>";

            }

        }


        return $info;
    }

    /**
     * Funcion para formar el fondo  y el cambio del titulo de la primera seccion
     * @return string
     */
    private function section4($contrys, $widget, $script)
    {
        $lang = $this->session->userdata('Setlanguage');
        $info = "";
        $section1 = $this->Mdl_creativealtar->front_creative_section4($lang);
        if (!empty($section1)) {


            if ($section1[0]['type_media'] == "video") {

                $info = "
                        <div class='content-wrap categories-creativealtar' style='padding: 0px 0; !important;'>
                                
                                 <video poster='" . URL_TEMPLATEALTARVIDEO1 . "' preload='auto' loop autoplay muted style='position: absolute'>
                                    <source src='" . URL_IMAGES . "content/" . $section1[0]['image'] . "' type='video/mp4'/>
                                    <source src='" . URL_IMAGES . "content/" . $section1[0]['image'] . "' type='video/webm'/>
                                </video>
                                
                                <div class='container bottommargin center' style='padding-top: 35px;'>
                                    <h1>" . $section1[0]['title'] . "</h1>
                                    <h5 class='notopmargin light'>" . $section1[0]['subtitle'] . "</h5>                                    
                                     <button class='btn btn-primary' data-target='#subscribeForm' data-toggle='modal' data-backdrop='static' data-keyboard='false'>" . $this->lang->line('subscribe_button') . "</button>
                                </div>
                            </div>";


            } elseif ($section1[0]['type_media'] == "image") {

                $info = " <div class='content-wrap parallax' style='background-image: url(" . URL_IMAGES . "content/" . $section1[0]['image'] . ");'
                             data-stellar-background-ratio='0.3'>
                            <div class='topmargin-sm center' style='padding-top: 35px;'>
                                <h1 class='last-content nobottommargin'>" . $section1[0]['title'] . "</h1>
                                <h1>" . $section1[0]['subtitle'] . "</h1>
                                 <button class='btn btn-primary' data-target='#subscribeForm' data-toggle='modal' data-backdrop='static' data-keyboard='false'>" . $this->lang->line('subscribe_button') . "</button>
                            </div>                                                        
                        </div>";

            }

        }


        return $info;
    }

    /**
     * Funcion para dar formato a los paises
     * @param null $result
     * @return string
     */
    private function pre_format_contry($result = NULL)
    {
        $contry = "";
        if ($result) {
            $contry .= "<option value=''> " . $this->lang->line('subscribe_modal_placeholder_select_country') . "</option>";
            foreach ($result->result() as $key => $value) {

                $contry .= "<option value='" . $value->Code . "'>" . $value->Name . "</option>";

            }

        }

        return $contry;
    }

    /**
     * Funcion para formar las categorias
     * @param array $result
     * @return string
     */
    private function form_category($result = array())
    {
        $category = "";
        if (!empty($result)) {

            foreach ($result AS $key => $value) {

                $category .= "<article class='portfolio-item pf-media pf-icons'>
                        <div class='portfolio-image'>
                            <a href='" . ROOT_URL . "altar/Ctr_filtervideo/view/" . $value['id_category'] . "'>
                                <img src='" . URL_IMAGES . "videos/thumbs/" . $value['image_thumb'] . "' alt='Open Imagination'>
                            </a>
                            <div class='portfolio-overlay'>
                                <a href='" . ROOT_URL . "altar/Ctr_filtervideo/view/" . $value['id_category'] . "' class='right-icon'><i class='icon-line-plus'></i></a>
                                <h4>" . $value['text'] . "</h4>
                            </div>
                        </div>                    
                    </article>";
            }

        }

        return $category;
    }

    /**
     * Funcion para formar las categorias
     * @param array $result
     * @return string
     */
    private function form_video_free($result = array())
    {
        $video = "";

        if (!empty($result)) {

            $download = $this->vimeoapi->download_video($result[0]['vimeo_id']);

            if (!isset($download['error'])) {
                $download = $download['resolution_link'];
            } else {
                $download = "";
            }

            $video .= " <div class='content-wrap'>
                            <div class='container clearfix'>
                                <div class='heading-block topmargin-sm center'>
                                   <h1 style='color: #ffce00;'>" . $this->lang->line('title_download1') . "
                                        <span class='free-download' style='color: #ffce00;'>
                                            " . $this->lang->line('button_download2') . "
                                        </span>
                                    </h1>
                                </div>
                                <div class='row right-section' style=''>
                                    <div class='col-md-7 image-section-download'>
                                        <a href='" . ROOT_URL . "altar/Ctr_filtervideo/quick_view/" . $result[0]['id'] . "' class='item-quick-view' data-lightbox='ajax'>
                                            <img class='response-image-left' src='" . URL_IMAGES . "videos/thumbs/" . $result[0]['image_thumb'] . "' alt='Video Free'>                                            
                                        </a>
                                        <div class='video-component-section'>
                                            <div>
                                                 ►
                                            </div>
                                        </div>
                                        <div class='opacity'>
                                        
                                        </div>
                                    </div>
                                    <div class='col-md-5 right-section'>
                                        <div class='col_last cnetradoresponsivo col_last heading-block' style='margin-bottom: 20px;'>
                                            <h1 class='nobottommargin topmargin'>" . $result[0]['text'] . "</h1>
                                        </div>
                                        <div class='font-title-1'>
                                            Altares y construcciones
                                        </div>
                                        <br />
                                        <div class='font-title-2'>
                                            Arquitectura investigacion 
                                        </div>
                                        <br />
                                        
                                        <button id='modal_button' class='default-button' data-toggle=\"modal\" data-target=\"#videoinfo\">
                                            ".$this->lang->line('video_download')."
                                        </button>
                                         
                                        <div style='text-align: right'>
                                            <a hfer='#'>Ver más videos gratuitos</a>                                     
                                        </a>
                                    </div>
                                </div>                                                                                                 
                            </div>
                        </div>      
                                                                                                                  
                                                                                                                  
                                                                                                                  
                                                                                                                                          
                                                                                                                  
                        ";

        }

        return $video;
    }


    /**
     * Funcion para generar las vistas de los videos
     * @return array
     */
    protected function list_videos_new_popular()
    {
        $data_conditions['lang'] = $this->session->userdata('Setlanguage');
        $data_conditions['limit'] = $this->limit_videos;
        $result_new = $this->Mdl_creativealtar->front_list_video_new($data_conditions);
        $result_popular = $this->Mdl_creativealtar->front_list_video_popular($data_conditions);

        $new = $this->form_list_videos($result_new, 'nuevos');
        $popular = $this->form_list_videos($result_popular, 'populares');

        return [$new["videos"], $popular["videos"], $new["params"]];
    }

    /**
     * Funcion para obtener el tiempo menos 2 dias
     * @return array
     */
    private function get_time_new()
    {
        $now = date('Y-m-d H:i:s');
        $finicialMenosInicial = strtotime('-2 day', strtotime($now));
        $finicial = date('Y-m-d H:i:s', $finicialMenosInicial);

        return [$finicial, $now];
    }


    private function form_list_videos($result = array(), $type)
    {
        $videos = "";
        if (!empty($result)) {

            foreach ($result AS $key => $value) {

              
                if (strlen($value['text']) > 10) {
                    $value['text'] = substr($value['text'], 0, 25) . '...';
                }

                if(isset($value['offerPrice']) && !is_null($value['offerPrice']) && $value['offerPrice'] != 0){

                    $value['price'] = $value['offerPrice'];
                }

                $videos .= "<div class='col-md-3 col-sm-6 pf-" . $type . "'>
                            <div class='product clearfix'>
                                <div class='product-image'>
                                    <a href='" . ROOT_URL . "altar/Ctr_product/view/$value[id]'>
                                    <img src='" . URL_IMAGES . "videos/thumbs/" . $value['image_thumb'] . "' alt='Producto'></a>
                                    <div class='product-overlay'>
                                        <a class='add-to-cart addElementShoppingCart changeCursorHand' video-id='$value[id]' video-value='$value[price]' video-preview='" . URL_IMAGES . "videos/thumbs/" . $value['image_thumb'] . "' video-title='" . $value['text'] . "' video-url='" . ROOT_URL . "altar/Ctr_product/view/$value[id]'>
                                            <i class='icon-shopping-cart'></i>
                                            <span>" . $this->lang->line('quick_view_shop_car') . "</span></a>
                                        <a href='" . ROOT_URL . "altar/Ctr_filtervideo/quick_view/" . $value['id'] . "' class='item-quick-view' data-lightbox='ajax'><i
                                                    class='icon-zoom-in2'></i><span>" . $this->lang->line('video_quickview') . "</span></a>
                                    </div>
                                </div>
                                <div class='product-desc center'>
                                    <div class='product-title'>
                                        <h3>
                                            <a href='" . ROOT_URL . "altar/Ctr_product/view/$value[id]'>" . $value['text'] . " $</span>" . $value['price'] . "</a>                                            
                                        </h3>
                                    </div>                                    
                        
                                </div>
                            </div>
                        </div>
                        
                        ";
            }


        }

        $videos = array(
          "videos" => $videos,
          "params" =>  $value
        );

        return $videos;

    }


    public function searchTitle()
    {

        $data['lang'] = $this->session->userdata('Setlanguage');
        $data['phrase'] = $this->input->post('phrase');
        $result = $this->Mdl_creativealtar->searchTitle($data);
        echo $result[0]['jsonData'];

    }


    /**
     * Funcion para guardar un pre registro de los usuarios
     */
    public function pre_register()
    {
        $lang = $this->session->userdata('Setlanguage');
        $request = $this->putlanguage->setLanguage($lang, "index");

        $response2 = FALSE;
        $message = '';
        $firstName = $this->input->post('firstName');
        $lastName = $this->input->post('lastName');
        $email = $this->input->post('email');
        $notified = $this->input->post('check_notificaciones');
        $contributors = $this->input->post('contributor');
        $pais = $this->input->post('pais');

        $checkContribution = 0;

        if (trim($this->input->post('contributor')) != '') {
            $checkContribution = trim($this->input->post('contributor'));
        }

        $conCountry = $this->input->post('con_country');
        $conQuestion1 = $this->input->post('con_question1');
        $conQuestion2 = $this->input->post('con_question2');
        $conQuestion3 = $this->input->post('con_question3');


        if (!isset($contributors)) {
            $contributors = 0;
        }

        if ($notified == 'true') {
            $notified = 1;
        } else {
            $notified = 0;
        }
        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {

            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
                $data_conditions['activation'] = $this->ctr_functions->generateCode(50);
                $dataUser = [
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'notified' => $notified,
                    'activation' => $data_conditions['activation'],
                    'checkContribution' => $checkContribution,
                    'conCountry' => $conCountry,
                    'conQuestion1' => $conQuestion1,
                    'conQuestion2' => $conQuestion2,
                    'conQuestion3' => $conQuestion3
                ];

                $result = $this->Mdl_creativealtar->front_creative_preregister($dataUser);
                $flagRegister = $result->result()[0]->flagRegister;
                if ($flagRegister) {

                    if ($contributors == 1) {
                        $id_register = $result->result()[0]->id_register;
                    }


                    $this->mailchimp->post("lists/$this->list_id/members",
                        ['email_address' => $email,
                            'merge_fields' =>
                                [
                                    'FNAME' => $firstName,
                                    'LNAME' => $lastName
                                ],
                            'status' => 'subscribed',
                        ]);
                    $data_conditions['view'] = 'vw_altar/include/email_preregister';
                    $data_conditions['fullname'] = $firstName . ' ' . $lastName;
                    $data_conditions['email'] = $email;
                    $data_conditions['subject'] = "Subscripción";

                    if ($this->sendmessage->sendEmail($data_conditions)) {
                        $response2 = TRUE;
                        $message = $this->lang->line('subscribe_success');
                    } else {
                        $message = $this->lang->line('subscribe_error_send_email');
                    }

                } else {
                    $message = $this->lang->line('subscribe_error_user_exist');
                }
            } else {
                $message = $this->lang->line('subscribe_error_update_page');
            }
        } else {
            $message = $this->lang->line('subscribe_error_recapcha');
        }

        echo json_encode(['response' => $response2, 'message' => $message]);

    }


}
