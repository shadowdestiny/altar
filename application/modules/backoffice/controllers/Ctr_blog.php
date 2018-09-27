<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;


class Ctr_blog extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_blog');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('Ctr_functions');
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

            $result = $this->Mdl_blog->backoffice_blog_list();
            $data['table'] = "";
            if ($result) {
                $data['table'] = $this->format_blog($result);
            }

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_blog/vw_index', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_blog/include/blog_indexjs');
        }

    }

    /**
     * Funcion para mostrar el index y nuestra un listado de los usuario
     */
    public function add()
    {
        if ($this->session->userdata('loginFlag')) {

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_blog/vw_add');
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_blog/include/blog_addjs');
        } else {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');

        }

    }

    public function save_blog()
    {

        $response = FALSE;
        $message = "";

        if ($this->session->userdata('loginFlag')) {

            $data_conditions = [];
            $data_conditions['admin_id'] = $this->session->userdata('admin_id');
            $data_conditions['title_es'] = $this->ctr_functions->cleanString($this->input->post('title_es'));
            $data_conditions['title_en'] = $this->ctr_functions->cleanString($this->input->post('title_en'));
            $data_conditions['content_es'] = $this->ctr_functions->cleanString($this->input->post('content_es'));
            $data_conditions['content_en'] = $this->ctr_functions->cleanString($this->input->post('content_en'));
            $data_conditions['image_name'] = $this->ctr_functions->cleanString($this->input->post('image_name'));
            $data_conditions['image_name_preview'] = $this->ctr_functions->cleanString($this->input->post('image_name_preview'));

            if (!empty($data_conditions)) {

                $result = $this->Mdl_blog->backoffice_blog_save($data_conditions);

                if ($result[0]['save_blog']) {

                    $response = TRUE;
                    $message = " El blog se agrego con éxito";

                } else {
                    $message = "Error al guardar el Blog";
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
     * Funcion para dar formato a la informacion de todos los videos
     * @param array $result
     * @return string
     */
    private function format_blog($result = array())
    {

        $videos = "";
        if (!empty($result)) {

            $videos .= "<table class='dataTable table table-striped table-hover table-bordered' id='table_user'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Titulo</th>
                                <th>Introducción</th>
                                <th>Imagen</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>";
            $category = "";
            $count = 1;
            foreach ($result AS $key => $value) {

                $videos .= "<tr>
                            <td>" . $count . "</td>";

                if (strlen($value['title']) > 10) {
                    $value['title'] = substr($value['title'], 0, 25) . '...';
                }
                if (strlen($value['content']) > 10) {
                    $value['content'] = substr($value['content'], 0, 25) . '...';
                }

                $videos .= "<td>" . $value['title'] . "</td>
                            <td>" . $value['content'] . "</td>
                            <td><img src='" . URL_IMAGES . "blogs/thumbs/" . $value['image_thumb'] . "' style='width: 30%;'></td>
                            <td>
                                <a href='" . ROOT_URL_BACK . "Ctr_blog/edit/" . $value['id'] . "'><button class='btn btn-warning'> Editar</button></a>
                                <button class='btn btn-danger' onclick='return DialogDeleteBlog(" . $value['id'] . ");'> Eliminar</button>                            
                            </td>
                        </tr>";

                $count++;
            }

            $videos .= "</tbody>
                        </table>
                    </div>";

        }

        return $videos;
    }

    /**
     * Funcipon para editar el BLog
     * @param null $blog_id
     */
    public function edit($blog_id = NULL)
    {
        if ($this->session->userdata('loginFlag')) {

            $data = [];

            if (isset($blog_id) && is_numeric($blog_id) && !is_null($blog_id)) {

                $response = $this->Mdl_blog->backoffice_blog_list_by_id($blog_id);

                if (!empty($response)) {

                    $data['blog_id'] = $response[0]['id'];
                    $data['image'] = $response[0]['image'];
                    $data['image_thumb'] = $response[0]['image_thumb'];
                    $data['title_es'] = $response[0]['title_es'];
                    $data['title_en'] = $response[0]['title_en'];
                    $data['content_es'] = $response[0]['content_es'];
                    $data['content_en'] = $response[0]['content_en'];

                }

            }

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_blog/vw_edit', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_blog/include/blog_editjs');


        } else {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');

        }

    }

    /**
     * Funcion para actualizar la informacion del blog
     */
    public function update_blog()
    {

        $response = FALSE;
        $message = "";
        $data_conditions = [];

        if ($this->session->userdata('loginFlag')) {

            $data_conditions['admin_id'] = $this->session->userdata('admin_id');
            $data_conditions['blog_id'] = $this->input->post('blog_id');

            if (isset($data_conditions['blog_id']) && !empty($data_conditions['blog_id'])) {

                $data_conditions['title_es'] = $this->ctr_functions->cleanString($this->input->post('title_es'));
                $data_conditions['title_en'] = $this->ctr_functions->cleanString($this->input->post('title_en'));
                $data_conditions['content_es'] = $this->ctr_functions->cleanString($this->input->post('content_es'));
                $data_conditions['content_en'] = $this->ctr_functions->cleanString($this->input->post('content_en'));
                $data_conditions['image_name'] = $this->ctr_functions->cleanString($this->input->post('image_name'));
                $data_conditions['image_name_preview'] = $this->ctr_functions->cleanString($this->input->post('image_name_preview'));


                $response = $this->Mdl_blog->backoffice_blog_update($data_conditions);

                if ($response[0]['update_blog']) {

                    $response = TRUE;
                    $message = "Se actualizó el blog";
                } else {

                    $message = "Error al actualizar el blog.";

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
     * Funcion para eliminar el BLog
     */
    public function delete()
    {
        $response = FALSE;
        $message = "";

        if ($this->session->userdata('loginFlag')) {

            $blog_id = $this->input->post('blog_id');

            if (isset($blog_id) && !empty($blog_id)) {

                $response = $this->Mdl_blog->backoffice_blog_delete($blog_id);

                if ($response[0]['delete_blog']) {

                    $response = TRUE;
                    $message = "El blog se borro con exito";

                } else {
                    $message = "Error al eliminar el blog";
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
