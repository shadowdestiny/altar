<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_aboutus extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_aboutus');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->helper('url');

    }

    /**
     * Funcion para mostrar el index y nuestra un listado de los usuario
     */
    public function index()
    {
        if (!$this->session->userdata('loginFlag')) {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');
        } else {

            $result = $this->Mdl_aboutus->about_get_info();
            $data['list'] = $this->format_index($result);        
            $data['previewPath'] = $result->result()[0]->image;
            $data['previewThumPath'] = $result->result()[0]->image_thumb;


            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_aboutus/vw_aboutus', $data);
            $this->load->view('include/back/script_footer');
             $this->load->view('vw_aboutus/include/aboutusjs');
        }

    }

    public function format_index($result = NULL){
        
        $page_info = "";

        if ($result) {

            foreach ($result->result() as $key => $value) {
          
            
            $page_info .= " <div class='row'>
                    
                        <div class='col-xs-6 form-group'>
                            <label>Titulo en Español</label>
                            <input class='form-control' type='text' name='tle_esp[]' id='tle_esp[]'  placeholder='Escribe titulo en español.' value='".$value->title_spanish."'/>
                        </div>
                        <div class='col-xs-6 form-group'>
                            <label>Title en English</label>
                            <input class='form-control' type='text' name='tle_eng[]' id='tle_eng[]' placeholder='Escribe titulo en ingles.' value='".$value->title_english."'/>
                        </div>
                        <div class='col-xs-6 form-group'>
                            <label>Descripción en Español</label>
                            <textarea class='form-control' rows='5' name='cnt_esp[]' id='cnt_esp[]' placeholder='Escribe el contenido en Español' >".$value->content_spanish."</textarea>
                        </div>
                        <div class='col-xs-6 form-group'>
                            <label>Descripción en English</label>
                            <textarea class='form-control' rows='5' name='cnt_eng[]' id='cnt_eng[]' placeholder='Escribe el contenido en Ingles'>".$value->content_english."</textarea>
                        </div>
                        <div class='col-xs-12 form-group' style='overflow: hidden;'>
                            <input class='form-control' type='hidden' name='ord[]' id='ord[]' placeholder='Selecciona el orden para visualizar' value='".$value->order."'  />
                            <input class='form-control' type='hidden' name='infoid[]' id='infoid[]' placeholder='Selecciona el orden para visualizar' value='".$value->id."' />
                        </div>
                    </div>";
                }
        }

        return $page_info; 

    }

    /**
     * FUncion para actualizar la seccion Acerca de Nosotros
     */
    public function aboutus_update()
    {
        $infoid = $this->input->post('infoid');
        $tle_esp = $this->input->post('tle_esp');
        $tle_eng = $this->input->post('tle_eng');
        $cnt_esp = $this->input->post('cnt_esp');
        $cnt_eng = $this->input->post('cnt_eng');
        $image_name = $this->input->post('image_name');
        $image_name_preview = $this->input->post('image_name_preview');


        $data = array();
       
        $length = count($infoid);

        for($i = 0; $i < $length; $i++) {

            $data[$i]['infoid'] = $infoid[$i];
            $data[$i]['tle_esp'] = $tle_esp[$i];
            $data[$i]['tle_eng'] = $tle_eng[$i];
            $data[$i]['cnt_esp'] = $cnt_esp[$i];
            $data[$i]['cnt_eng'] = $cnt_eng[$i];
            
        }

        $data[0]['image'] = $image_name;
        $data[0]['image_thumb'] = $image_name_preview;

        $response = FALSE;
        $message = "";

        if (!empty($data)) {
            $result = $this->Mdl_aboutus->backoffice_aboutus_update($data);

            if ($result->result()[0]->flag_update) {

                $response = TRUE;
                $message = "Los datos se actualizarón con éxito.";
            }


        } else {
            $message = "Faltan parámetros";
        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }

}
