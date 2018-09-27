<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Ctr_content extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_content');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('Ctr_functions');
    }

    /**
     * Method index()
     * @param null $type_adv
     */
    public function index()
    {
        if ($this->session->userdata('loginFlag')) {

            $result = $this->Mdl_content->backoffice_content_index();
            $data['sections'] = $this->format_info_section($result);

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_content/vw_index', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_content/include/indexjs');
        } else {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');
        }
    }

    /**
     * Method index()
     * @param null $type_adv
     */
    public function register()
    {
        if ($this->session->userdata('loginFlag')) {

            $result = $this->Mdl_content->backoffice_content_register();
            $data['sections'] = $this->format_info_section_register($result);

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_content/vw_index', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_content/include/indexjs');
        } else {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');
        }
    }


    private function format_info_section($result = array())
    {
        $section = "";
        if (!empty($result)) {

            foreach ($result AS $key => $value) {

                $section .= "<div class='row'>
                                    <div class='col-lg-12'>
                                        <div class='panel'>
                                            <div class='panel-heading'>
                                                <div class='pull-left'><h4><i class='icon-table'></i>" . $value['section'] . "</h4></div>
                                                <div class='tools pull-right'>
                                                </div>
                                                <div class='clearfix'></div>
                                            </div>
                                            <div class='panel-body'>
                                                <form id='form_sections_" . $value['section'] . "' onsubmit='return section_update(\"$value[section]\"); ' >
                                                    <div class='row'>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Titulo Español</label>
                                                            <input class='form-control' type='text' id='title_es' name='title_es'
                                                                   placeholder='Escribe titulo en español.' value='" . $value['title_es'] . "'/>
                                                        </div>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Titulo Inglés</label>
                                                            <input class='form-control' type='text' id='title_en' name='title_en'
                                                                   placeholder='Escribe titulo en ingles.' value='" . $value['title_en'] . "'/>
                                                        </div>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Subtitulo Español</label>
                                                            <input class='form-control' type='text' id='subtitle_es' name='subtitle_es'
                                                                   placeholder='Escribe titulo en español.' value='" . $value['subtitle_es'] . "'/>
                                                        </div>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Subtitulo Inglés</label>
                                                            <input class='form-control' type='text' id='subtitle_en' name='subtitle_en'
                                                                   placeholder='Escribe titulo en ingles.' value='" . $value['subtitle_en'] . "'/>
                                                        </div>
                                                        <div class='clearfix'></div>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Contenido Español</label>
                                                            <textarea class='form-control' rows='5' id='content_es' name='content_es'
                                                                      placeholder='Escribe una introduccion en Español'>" . $value['content_en'] . "</textarea>
                                                        </div>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Contenido Inglés</label>
                                                            <textarea class='form-control' rows='5' id='content_en' name='content_en'
                                                                      placeholder='Escribe una introduccion en Ingles'>" . $value['content_es'] . "</textarea>
                                                        </div>
                                                        <div class='clearfix'></div>
                                                        <div class='row'>
                                                            <div class='col-xs-4 form-group'>
                                                                <label>Imagen</label>
                                                                <input class='form-control image_temp' type='file' name='image_temp' data-section='" . $value['section'] . "'
                                                                       placeholder='Agrega una imagen.'/>
                                                            </div>
                                                        </div>
                                                        <div class='clearfix'></div>
                                                        <div class='row'>
                                                            <div class='col-xs-6'>
                                                                <div class='thumbnail' id='div_content_image_temp_" . $value['section'] . "'>
                                                                <div class='image view view-first'>
                                                                    <a href='#' class='remove_image'>X</a>";

                if ($value['type_media'] == "image") {

                    $section .= "<img style='width: 30%; display: block;' src='" . URL_IMAGES . "content/" . $value['image'] . "' alt='Imagen'/>";

                } elseif ($value['type_media'] == "video") {

                    $section .= "<video width='350' controls>
                                  <source src='" . URL_IMAGES . "content/" . $value['image'] . "' type='video/mp4'>
                                  Your browser does not support HTML5 video.
                                </video>";

                }

                $section .= "</div>
                                                                <input type='hidden' id='image_name' name='image_name'
                                                                       value='" . $value['image'] . "'> 
                                                                <input type='hidden' id='image_name_thumb' name='image_name_thumb'
                                                                       value='" . $value['image_thumb'] . "'>                            
                                                                </div>
                                                            </div>";

                $section .= "<div class='col-xs-6 form-group'>
                                                                <label for='sel1'>Tipo de media:</label>
                                                                <select class='form-control' id='type_media' name='type_media'>
                                                                    <option value=''>Selecciona una opción</option>
                                                                    <option value='image' ";

                if ($value['type_media'] == "image") {
                    $section .= " selected";
                }

                $section .= ">Imagen</option>
                                                                    <option value='video'";
                if ($value['type_media'] == "video") {
                    $section .= " selected";
                }
                $section .= ">Video</option>
                                                                </select>
                                                            </div>";
                $section .= "</div>
                                                    </div>
                                                    
                                                    <input type='hidden' name='section_id' value='" . $value['id'] . "'>
                                                    <input type='hidden' name='section_number' value='" . $value['section'] . "'>
                                                    <div class='pull-right'>
                                                        <button class='btn btn-success' type='submit'>Guardar Sección
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";

            }

        }

        return $section;

    }


    private function format_info_section_register($result = array())
    {
        $section = "";
        if (!empty($result)) {

            foreach ($result AS $key => $value) {

                $section .= "<div class='row'>
                                    <div class='col-lg-12'>
                                        <div class='panel'>
                                            <div class='panel-heading'>
                                                <div class='pull-left'><h4><i class='icon-table'></i>" . $value['section'] . "</h4></div>
                                                <div class='tools pull-right'>
                                                </div>
                                                <div class='clearfix'></div>
                                            </div>
                                            <div class='panel-body'>
                                                <form id='form_sections_" . $value['section'] . "' onsubmit='return section_update(\"$value[section]\"); ' >
                                                    <div class='row'>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Titulo Español</label>
                                                            <input class='form-control' type='text' id='title_es' name='title_es'
                                                                   placeholder='Escribe titulo en español.' value='" . $value['title_es'] . "'/>
                                                        </div>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Titulo Inglés</label>
                                                            <input class='form-control' type='text' id='title_en' name='title_en'
                                                                   placeholder='Escribe titulo en ingles.' value='" . $value['title_en'] . "'/>
                                                        </div>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Subtitulo Español</label>
                                                            <input class='form-control' type='text' id='subtitle_es' name='subtitle_es'
                                                                   placeholder='Escribe titulo en español.' value='" . $value['subtitle_es'] . "'/>
                                                        </div>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Subtitulo Inglés</label>
                                                            <input class='form-control' type='text' id='subtitle_en' name='subtitle_en'
                                                                   placeholder='Escribe titulo en ingles.' value='" . $value['subtitle_en'] . "'/>
                                                        </div>
                                                        <div class='clearfix'></div>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Contenido Español</label>
                                                            <textarea class='form-control' rows='5' id='content_es' name='content_es'
                                                                      placeholder='Escribe una introduccion en Español'>" . $value['content_en'] . "</textarea>
                                                        </div>
                                                        <div class='col-xs-6 form-group'>
                                                            <label>Contenido Inglés</label>
                                                            <textarea class='form-control' rows='5' id='content_en' name='content_en'
                                                                      placeholder='Escribe una introduccion en Ingles'>" . $value['content_es'] . "</textarea>
                                                        </div>
                                                        <div class='clearfix'></div>                                                    
                                                        <input type='hidden' name='image_name' value=''>
                                                        <input type='hidden' name='image_name_thumb' value=''>
                                                        <input type='hidden' name='type_media' value=''>
                                                        
                                                        <input type='hidden' name='section_id' value='" . $value['id'] . "'>
                                                        <input type='hidden' name='section_number' value='" . $value['section'] . "'>
                                                        <div class='pull-right'>
                                                            <button class='btn btn-success' type='submit'>Guardar Sección
                                                            </button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";

            }

        }

        return $section;

    }


    public function update_content()
    {

        $response = FALSE;
        $message = "";

        $data_conditions = [];

        $data_conditions['section_id'] = (int)$this->input->post('section_id');
        $data_conditions['title_es'] = $this->ctr_functions->cleanString($this->input->post('title_es'));
        $data_conditions['title_en'] = $this->ctr_functions->cleanString($this->input->post('title_en'));
        $data_conditions['subtitle_es'] = $this->ctr_functions->cleanString($this->input->post('subtitle_es'));
        $data_conditions['subtitle_en'] = $this->ctr_functions->cleanString($this->input->post('subtitle_en'));
        $data_conditions['content_es'] = $this->ctr_functions->cleanString($this->input->post('content_es'));
        $data_conditions['content_en'] = $this->ctr_functions->cleanString($this->input->post('content_en'));
        $data_conditions['image_name'] = $this->ctr_functions->cleanString($this->input->post('image_name'));
        $data_conditions['image_name_thumb'] = $this->ctr_functions->cleanString($this->input->post('image_name_thumb'));
        $data_conditions['section_number'] = $this->ctr_functions->cleanString($this->input->post('section_number'));
        $data_conditions['type_media'] = $this->ctr_functions->cleanString($this->input->post('type_media'));

        if (isset($data_conditions['section_id']) && !empty($data_conditions['section_id'])) {

            $result = $this->Mdl_content->backoffice_section_updateinfo($data_conditions);

            if ($result[0]['section_update']) {

                $response = TRUE;
                $message = "La informacion se actualizo con éxito.";
            } else {
                $message = "Error al actualizar la informacion.";
            }

        } else {

            $message = "Falta el ID de la sección";
        }


        echo json_encode(['response' => $response, 'message' => $message]);


    }

}
