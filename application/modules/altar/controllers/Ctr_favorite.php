<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para el controlador del modulo de Contacto
 */
class Ctr_favorite extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->model('Mdl_favorite');
    }

    public function changeStatus(){

        $cont       = 0;

        $idUser     = $this->input->post('userId');
        $idVideo    = $this->input->post('videoId');
        $date       = date('Y-m-d H:i:s');

        $data['idUser']     = $idUser;
        $data['idVideo']    = $idVideo;
        $data['date']       = $date;

        $result = $this->Mdl_favorite->change_favoriteStatus( $data );

        if( $result ){

            $cont = $result[0]['_con'];

        }

        $dataR['cont'] = $cont;

        echo json_encode( $dataR );

    }


}

