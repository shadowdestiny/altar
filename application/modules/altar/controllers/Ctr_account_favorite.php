<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Ctr_account
 * Esta Clase se encarga de procesar toda la información del usuario
 * @autor <rdcarrada@gmail.com>
 */
class Ctr_account_favorite extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Mdl_account');
        $this->load->library('session');
        $this->load->helper('language');
        $this->load->library('Putlanguage');
        $this->load->helper('url');
        $this->load->library('Sendmessage');

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
     * Funcion para mostrar el Account
     */
    public function index_u($category)
    {
        if ($this->session->userdata('user_id')) {
            $user_id    = $this->session->userdata('user_id');
            $lang       = $this->session->userdata('Setlanguage');
            $datafa['lang']     = $lang;
            $datafa['user_id']  = $user_id;
            $data = [];
            $data['categoryHeader'] = $category['categoryHeader'];
            $data['categoryFooter'] = $category['categoryFooter'];
            $data['categoryFilter'] = $category['categoryFilter'];

            $result     = $this->Mdl_account->user_favorite( $datafa );
            $tempFav    = $this->formfavoriteuser( $result , $lang, $user_id);

            $data['allfavorite']    = $tempFav;


            $this->load->view('include/include_altarcreative/includes/header', $data);
            $this->load->view('vw_account_favorite/vw_index', $data);
            $this->load->view('include/include_altarcreative/includes/footer.php', $data);
            $this->load->view('vw_register/include/registerjs');
            $this->load->view('include/include_altarcreative/includes/closeBody.php');
        } else {
            $uri = ROOT_URL . 'altar/Ctr_account/login';
            redirect($uri, 'refresh');
        }
    }


    private function formfavoriteuser( $data, $lang, $user_id ){

        $result     = "";

        foreach ($data as $key => $value) {

            $datat['video_id']  = $value['id'];
            $datat['lang']      = $lang;

            $Acategory   = $this->Mdl_account->get_category_video( $datat );

            $allcategori    = "";
            $con            = 1;


            foreach ($Acategory as $key1 => $value1) {

                if( count( $Acategory ) ==  $con ){
                    $allcategori .= "<a href='" . ROOT_URL . "altar/Ctr_filtervideo?videoCategory=$value1[id]'>$value1[title]</a>";
                }else{
                    $allcategori .= "<a href='" . ROOT_URL . "altar/Ctr_filtervideo?videoCategory=$value1[id]'>$value1[title]</a>, ";
                }
               
                $con++;

            }
            
            $result .= "
                <div class='spost clearfix'>
                    <div class='entry-image'>
                        <a href='". ROOT_URL ."altar/Ctr_product/view/$value[id]'><img src='" . URL_IMAGES . "videos/thumbs/" . $value['previewThumPath'] . "' alt='Image'></a>
                    </div>
                    <div class='entry-c'>
                        <div class='entry-title'>
                            <h4><a href='". ROOT_URL ."altar/Ctr_product/view/$value[id]'>$value[title]</a></h4>
                            <h5>$allcategori</h5>
                            
                        </div>
                        <ul class='entry-meta'>
                        <div class='favoritos buttonAddFavorite changeCursorHand' video-id='$value[id]' user-id='$user_id'>                            
                            <div class='desactivado'>
                                <i class='icon-heart3 right'></i>    
                            </div>
                        </div>
                            
                        </ul>
                    </div>
                </div>
            "; 


        }

        return $result;

    }


}
