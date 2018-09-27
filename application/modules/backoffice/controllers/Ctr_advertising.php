<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;


class Ctr_advertising extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_adv');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('Ctr_functions');
    }

    public function index($type_adv = NULL)
    {
        if (!$this->session->userdata('loginFlag')) {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');
        } else {

            if (!is_null($type_adv)) {

                if ($type_adv == "banner" || $type_adv == "column") {
                    $data['type_adv'] = $type_adv;
                } else {
                    $data['type_adv'] = "banner";
                }
            } else {
                $data['type_adv'] = "banner";
            }

            $result = $this->Mdl_adv->backoffice_adv_list($data['type_adv']);
            $data['table'] = "";
            if ($result) {
                $data['table'] = $this->format_adv($result);
            }

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_adv/vw_index', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_adv/include/adv_indexjs');
        }
    }

    /**
     * Funcion para mostrar el index y nuestra un listado de los usuario
     */
    public function add($type_adv = NULL)
    {
        if ($this->session->userdata('loginFlag')) {

            if (!is_null($type_adv)) {

                if ($type_adv == "banner" || $type_adv == "column") {
                    $data['type_adv'] = $type_adv;
                } else {
                    $data['type_adv'] = "banner";
                }
            } else {
                $data['type_adv'] = "banner";
            }

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_adv/vw_add', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_adv/include/adv_addjs');
        } else {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');

        }

    }

    public function save_adv()
    {

        $response = FALSE;
        $message = "";

        if ($this->session->userdata('loginFlag')) {

            $data_conditions = [];
            $data_conditions['image_name_es'] = $this->ctr_functions->cleanString($this->input->post('image_name_es'));
            $data_conditions['image_name_preview_es'] = $this->ctr_functions->cleanString($this->input->post('image_name_preview_es'));
            $data_conditions['image_name_en'] = $this->ctr_functions->cleanString($this->input->post('image_name_en'));
            $data_conditions['image_name_preview_en'] = $this->ctr_functions->cleanString($this->input->post('image_name_preview_en'));
            $data_conditions['type_adv'] = $this->ctr_functions->cleanString($this->input->post('type_adv'));

            if (!empty($data_conditions)) {

                $result = $this->Mdl_adv->backoffice_adv_save($data_conditions);

                if ($result[0]['save_adv']) {

                    $response = TRUE;
                    $message = " La publicidad se agrego con éxito";

                } else {
                    $message = "Error al guardar la publicidad";
                }

            } else {

                $message = "Faltan parametros";
            }

        } else {

            $message = "No hay sesión activa";
        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }


    /**
     * Funcion para dar formato a la publicidad
     * @param array $result
     * @return string
     */
    private function format_adv($result = array())
    {

        $adv = "";
        if (!empty($result)) {

            $adv .= "<table class='dataTable table table-striped table-hover table-bordered' id='table_user'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Imagen ES</th>
                                <th>Imagen EN</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>";
            $category = "";
            $count = 1;
            foreach ($result AS $key => $value) {

                $adv .= "<tr>
                            <td>" . $count . "</td>";

                $adv .= "<td><img src='" . URL_IMAGES . "advs/thumbs/" . $value['image_es_thumb'] . "' style='width: 30%; display: block; !important;'></td>
                            <td><img src='" . URL_IMAGES . "advs/thumbs/" . $value['image_en_thumb'] . "' style='width: 30%; display: block; !important;'></td>
                            <td>
                                <a href='" . ROOT_URL_BACK . "Ctr_advertising/edit/" . $value['id'] . "'><button class='btn btn-warning'> Editar</button></a>
                                <button class='btn btn-danger' onclick='return DialogDeleteAdv(" . $value['id'] . ");'> Eliminar</button>                            
                            </td>
                        </tr>";

                $count++;
            }

            $adv .= "</tbody>
                        </table>
                    </div>";

        }

        return $adv;
    }

    /**
     * Funcion para editar la publicidad
     * @param null $blog_id
     */
    public function edit($adv_id = NULL)
    {
        if ($this->session->userdata('loginFlag')) {

            $data = [];

            if (isset($adv_id) && is_numeric($adv_id) && !is_null($adv_id)) {

                $response = $this->Mdl_adv->backoffice_adv_list_by_id($adv_id);

                if (!empty($response)) {

                    $data['adv_id'] = $response[0]['id'];
                    $data['image_es'] = $response[0]['image_es'];
                    $data['image_en'] = $response[0]['image_en'];
                    $data['image_es_thumb'] = $response[0]['image_es_thumb'];
                    $data['image_en_thumb'] = $response[0]['image_en_thumb'];
                    $data['type_adv'] = $response[0]['type'];

                }

            }

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_adv/vw_edit', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_adv/include/adv_editjs');


        } else {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');

        }

    }

    /**
     * Funcion para actualizar la informacion de la publicidad
     */
    public function update_adv()
    {

        $response = FALSE;
        $message = "";
        $data_conditions = [];

        if ($this->session->userdata('loginFlag')) {

            $data_conditions['adv_id'] = $this->input->post('adv_id');

            if (isset($data_conditions['adv_id']) && !empty($data_conditions['adv_id'])) {

                $data_conditions['image_name_es'] = $this->ctr_functions->cleanString($this->input->post('image_name_es'));
                $data_conditions['image_name_preview_es'] = $this->ctr_functions->cleanString($this->input->post('image_name_preview_es'));
                $data_conditions['image_name_en'] = $this->ctr_functions->cleanString($this->input->post('image_name_en'));
                $data_conditions['image_name_preview_en'] = $this->ctr_functions->cleanString($this->input->post('image_name_preview_en'));
                $data_conditions['type_adv'] = $this->ctr_functions->cleanString($this->input->post('type_adv'));


                $response = $this->Mdl_adv->backoffice_adv_update($data_conditions);

                if ($response[0]['update_adv']) {

                    $response = TRUE;
                    $message = "Se actualizó la publicidad";
                } else {
                    $message = "Error al actualizar la publicidad.";
                }

            } else {

                $message = "Falta blog_id";
            }

        } else {

            $message = "No existe sesión activa.";

        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }

    /**
     * Funcion para eliminar la publicidad
     */
    public function delete()
    {
        $response = FALSE;
        $message = "";

        if ($this->session->userdata('loginFlag')) {

            $adv_id = $this->input->post('adv_id');

            if (isset($adv_id) && !empty($adv_id)) {

                $response = $this->Mdl_adv->backoffice_adv_delete($adv_id);

                if ($response[0]['delete_adv']) {

                    $response = TRUE;
                    $message = "La publicidad se borro con éxito";

                } else {
                    $message = "Error al eliminar la publicidad.";
                }

            } else {
                $message = "Faltan parametros.";
            }

        } else {

            $message = "No hay sesión activa";

        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }

}
