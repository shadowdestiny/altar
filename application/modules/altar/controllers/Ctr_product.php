<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ctr_product extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Mdl_product');
        $this->load->library('session');
        $this->load->library('Putlanguage');
        $this->load->library('Vimeoapi');
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
    public function view($video_id = NULL)
    {
        $data['lang'] = $this->session->userdata('Setlanguage');
        $category = $this->putlanguage->setLanguage($data['lang'], 'index');

        $data['id_video'] = $video_id;
        $data['categoryHeader'] = $category['categoryHeader'];
        $data['categoryFooter'] = $category['categoryFooter'];
        $data['categoryFilter'] = $category['categoryFilter'];

        $data['download_button'] = "";
        if ($this->session->userdata('user_id')) {
            $data['id_user'] = $this->session->userdata('user_id');
            $resultdata = $this->Mdl_product->index_product($data);

            $temFavorite = $resultdata[0]['favorite'];
            $data['id_autor'] = $resultdata[0]['id_autor'];
            $favorite = $this->formFavorite($temFavorite, $data['id_video'], $data['id_user']);
            if(isset($resultdata[0]['video_payout']) &&  (int)$resultdata[0]['video_payout'] != 0){
                $data['download_button'] = $this->generate_button_download($resultdata[0]['vimeo_id']);
            }else{
                $data['download_button'] = "";
            }

        } else {

            $resultdata = $this->Mdl_product->index_product_without_session($data);
            $data['id_autor'] = $resultdata[0]['id_autor'];
            $favorite = $this->formFavorite(0, $data['id_video'], NULL);
        }

        if (!empty($resultdata)) {

            $datat['price'] = $resultdata[0]['price'];
            $datat['offerPrice'] = $resultdata[0]['offerPrice'];

            $resultcate = $this->Mdl_product->categorys_video($data);
            $resultrecommen = $this->Mdl_product->recommendations_video($data);
            $resultautor = $this->Mdl_product->autor_video($data);
            $resultcomment = $this->Mdl_product->front_product_comment_list($data);
            $previewVideo = $this->vimeoapi->show_video($resultdata[0]['vimeoPreview_id']);

            list($priceformat, $price) = $this->formPrice($datat);
            $categorylist = $this->formCategory($resultcate);
            $recommenlist = $this->formRecommen($resultrecommen);
            $autorlist = $this->formAutor($resultautor);

            $comments = $this->formComments($resultcomment);

            $data['video_id'] = $resultdata[0]['id'];
            $data['title'] = $resultdata[0]['title'];
            $data['description'] = $resultdata[0]['description'];
            $data['image'] = $resultdata[0]['previewPath'];
            $data['image_thumb'] = $resultdata[0]['previewThumPath'];
            $data['price'] = $priceformat;
            $data['price_money'] = (float)$price;
            $data['previewVideo'] = $previewVideo;
            $data['category'] = $categorylist;
            $data['recommendations'] = $recommenlist;
            $data['autor_video'] = $autorlist;
            $data['buttonfavorite'] = $favorite;
            $data['comments'] = $comments;
            $data['views'] = $resultdata[0]['views'];
            $data['format'] = $resultdata[0]['format'];
            $data['count_commentary'] = $resultdata[0]['count_commentary'];
            $data['autor'] = $resultdata[0]['autor'];


            /*REDES SOCIALES*/
            $data['social_video_title'] = $data['title'];
            $data['social_video_descript'] = $data['description'];
            $data['social_video_image'] = URL_IMAGES . "videos/" . $data['image'];
            $data['social_video_current_url'] = current_url();
            $data['current_url'] = current_url();

        }

        $this->load->view('include/include_altarcreative/includes/header', $data);
        $this->load->view('vw_product/vw_index', $data);
        $this->load->view('vw_product/include/modal_shared_product', $data);
        $this->load->view('vw_product/include/modal_comment_product', $data);
        $this->load->view('include/include_altarcreative/includes/footer.php', $data);
        $this->load->view('include/include_altarcreative/includes/closeBody.php');
        $this->load->view('vw_product/include/indexjs');


    }

    public function generate_button_download($vimeo_id = NULL)
    {

        $download = "";

        if (!is_null($vimeo_id)) {

            $download = $this->vimeoapi->download_video($vimeo_id);

            if (!isset($download['error'])) {
                $download_link = $download['resolution_link'];

                $download = "<div class='cart nobottommargin clearfix'>
                            <a href='" . $download_link . "'><button class='button nomargin'>
                                " . $this->lang->line('product_video_download') . "
                            </button></a>
                        </div>";
            } else {
                $download = "";
            }


        } else {


        }

        return $download;


    }

    /**
     * Funcion para dar formato al precio del video
     * @param $data
     * @return string
     */
    private function formPrice($data)
    {


        $result = "";
        $price = 0;
        if ($data['offerPrice'] == null || trim($data['offerPrice']) == '') {

            $result .= "<ins>
                        <span class='signopesos'>$</span>$data[price]
                     </ins>";
            $price = $data['price'];
        } else {

            $result .= "<del>
                        <span class='signopesos'>$</span>$data[price]
                    </del> 
                    <ins>
                        <span class='signopesos'>$</span>$data[offerPrice]
                     </ins>";

            $price = $data['offerPrice'];
        }

        return [$result, $price];

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

    /**
     * Funciojn para generar la vista de recomendaciones
     * @param $data
     * @return string
     */
    private function formRecommen($data)
    {

        $result = "";

        foreach ($data as $key => $value) {

            $price = "";

            if ($value['offerPrice'] == null || trim($value['offerPrice']) == '') {

                $price .= "<ins>
                            <span class='signopesos'>$</span>$value[price]
                         </ins>";

            } else {

                $price .= "<del>
                            <span class='signopesos'>$</span>$value[price]
                        </del> 
                        <ins>
                            <span class='signopesos'>$</span>$value[offerPrice]
                         </ins>";

            }

            $result .= "
                <div class='oc-item'>
                    <div class='product iproduct clearfix'>
                        <div class='product-image'>
                            <a href='" . ROOT_URL . "altar/Ctr_product/view/" . $value['id'] . "'>
                                <img src='" . URL_IMAGES . "videos/thumbs/" . $value['previewThumPath'] . "' alt=''>
                            </a>
                            <div class='product-overlay'>
                                <a class='add-to-cart addElementShoppingCart changeCursorHand' 
                                    video-id ='" . $value['id'] . "' 
                                    video-value ='" . $value['price'] . "' 
                                    video-preview ='" . URL_IMAGES . "videos/thumbs/" . $value['previewThumPath'] . "' 
                                    video-title ='" . $value['name'] . "' 
                                    video-url ='" . ROOT_URL . "altar/Ctr_product/view/$value[id]' >
                                <i class='icon-shopping-cart'></i><span> " . $this->lang->line('quick_view_shop_car') . "</span></a>
                                <a href='" . ROOT_URL . "altar/Ctr_filtervideo/quick_view/" . $value['id'] . "' class='item-quick-view' data-lightbox='ajax'><i class='icon-zoom-in2'></i><span> " . $this->lang->line('video_quickview') . "</span></a>
                            </div>
                        </div>
                        <div class='product-desc center'>
                            <div class='product-title'><h3><a href='#'>" . $value['name'] . "</a></h3></div>
                            <div class='product-price'>
                                $price
                            </div>
                        </div>
                    </div>
                </div>
            ";

        }

        return $result;

    }

    /**
     * Funciojn para generar la vista de recomendaciones
     * @param $data
     * @return string
     */
    private function formAutor($data = array())
    {

        $result = "";

        if (!empty($data)) {

            foreach ($data as $key => $value) {

                $result .= "
                <div class='oc-item'>
                    <div class='product iproduct clearfix'>
                        <div class='product-image'>
                            <a href='" . ROOT_URL . "altar/Ctr_product/view/" . $value['id'] . "'>
                                <img src='" . URL_IMAGES . "videos/thumbs/" . $value['previewThumPath'] . "' alt=''>
                            </a>
                            <div class='product-overlay'>
                                <a class='add-to-cart addElementShoppingCart changeCursorHand' 
                                    video-id ='" . $value['id'] . "' 
                                    video-value ='" . $value['price'] . "' 
                                    video-preview ='" . URL_IMAGES . "videos/thumbs/" . $value['previewThumPath'] . "' 
                                    video-title ='" . $value['name'] . "' 
                                    video-url ='" . ROOT_URL . "altar/Ctr_product/view/$value[id]' >
                                <i class='icon-shopping-cart'></i><span> " . $this->lang->line('quick_view_shop_car') . "</span></a>
                                <a href='" . ROOT_URL . "altar/Ctr_filtervideo/quick_view/" . $value['id'] . "' class='item-quick-view' data-lightbox='ajax'><i class='icon-zoom-in2'></i><span> " . $this->lang->line('video_quickview') . "</span></a>
                            </div>
                        </div>                     
                    </div>
                </div>
            ";

            }
        }


        return $result;

    }

    /**
     * Funcion para generar la vista de Favoritos
     * @param $data
     * @return string
     */
    private function formFavorite($data, $video_id, $user_id = NULL)
    {

        $result = "";
        $value = "";

        if (!is_null($user_id)) {

            if ((int)$data == 0) {

                $value = "
                    <div class='desactivado'>
                        <a>
                            <i class='icon-heart right' id='iconheartfavorite'></i> 
                            " . $this->lang->line('video_favorities') . "  
                        </a>
                    </div>";

            } else {

                $value = "
                    <div class='desactivado'>
                        <a>
                            <i class='icon-heart3 right' id='iconheartfavorite'></i> 
                          " . $this->lang->line('video_favorities') . "  
                        </a>
                    </div>";

            }

            $result = " <div class='favoritos favoritosproductosingle buttonAddFavorite changeCursorHand'
                                 video-id='" . $video_id . "' user-id='" . $user_id . "'>
                                 " . $value . "
                            </div>";
        } else {

            $result = " <div class='favoritos favoritosproductosingle'
                                 video-id='0' user-id='NULL'>
                             <div class='desactivado'>
                                <a href='" . ROOT_URL . "altar/Ctr_account/login'>
                                    <i class='icon-heart right' id='iconheartfavorite'></i> 
                                     " . $this->lang->line('video_favorities') . "  
                                </a>
                            </div>
                        </div>";
        }


        return $result;

    }

    /**
     * Funcion para generar la vista de los comentarios por video
     * @param $result
     * @return string
     */
    private function formComments($result)
    {
        $comment = "";

        if (!empty($result)) {

            foreach ($result AS $key => $value) {

                $date_comment = date("F j, Y, g:i A", strtotime($value['created']));

                $comment .= "<li class='comment even thread-even depth-1' id='li-comment-1'>
                            <div id='comment-1' class='comment-wrap clearfix'>
                        
                                <div class='comment-meta'>
                                    <div class='comment-author vcard'>
                                        <span class='comment-avatar clearfix'>
                                        <img alt='user'
                                             src='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60'
                                             height='60' width='60'/></span>
                                    </div>
                                </div>                        
                                <div class='comment-content clearfix'>
                                    <div class='comment-author'>" . $value['nickname'] . "<span>
                                        <a href='#' title='Permalink to this comment'>" . $date_comment . "</a></span>
                                    </div>
                                    <p>" . $value['commentary'] . "</p>                       
                                </div>
                                <div class='clear'></div>
                            </div>
                        </li>";
            }

        }

        return $comment;

    }

    /**
     * Funcion para agregar un comentario por video y por user_id
     */
    public function add_comment()
    {
        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'index');

        $response = FALSE;
        $message = "";
        $data = [];

        $data['user_id'] = $this->session->userdata('user_id');
        $data['video_id'] = $this->input->post('video_id');
        $data['return_uri'] = $this->input->post('return_uri');
        $data['rating'] = $this->input->post('rating');
        $data['comment'] = $this->input->post('comment');


        if (!empty($data)) {

            $result = $this->Mdl_product->front_product_add_comment($data);
            if ($result) {

                $response = TRUE;
                $message = $this->lang->line('product_video_modal_review_response_true');
            } else {
                $message = $this->lang->line('error_validation_review_modal_addcomment');
            }

        } else {
            $message = $this->lang->line('error_validation_review_modal_params');
        }

        echo json_encode(['response' => $response, 'message' => $message, 'return' => $data['return_uri']]);

    }

}
