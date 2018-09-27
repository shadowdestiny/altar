<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para el controlador del modulo de Contacto
 */
class Ctr_advertising extends CI_Controller
{
    private $CI;

    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('language');
        $this->CI->load->helper('url');
        $this->CI->load->model('Mdl_adv');


        $this->CI->load->library('Putlanguage');
        if ($this->CI->session->userdata('Setlanguage') == null) {
            $this->CI->session->set_userdata('Setlanguage', 'es');
        }
    }

    public function banners()
    {
        $lang = $this->CI->session->userdata('Setlanguage');

        $result = $this->CI->Mdl_adv->front_adv_list_banner($lang);
        $adv = "";
        if (!empty($result)) {

            foreach ($result AS $key => $value) {

                $adv .= "<div class='oc-item'>
                            <a href='#'>
                                <img src='" . URL_IMAGES . "advs/" . $value['image'] . "' alt='Publicidad'>
                            </a>
                        </div>";

            }

        }

        return $adv;

    }

    public function columns()
    {

        $lang = $this->CI->session->userdata('Setlanguage');

        $result = $this->CI->Mdl_adv->front_adv_list_column($lang);
        $adv = "";
        if (!empty($result)) {

            foreach ($result AS $key => $value) {

                $adv .= "<div class='oc-item'>
                            <a href='#'>
                                <img src='" . URL_IMAGES . "advs/" . $value['image'] . "' alt='Publicidad'>
                            </a>
                        </div>";

            }

        }

        return $adv;

    }

}

