<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_category extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_category');
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

            $result = $this->Mdl_category->backoffice_category_list();
            $data['table'] = $this->format_category($result);
            $this->load->view('include/back/head');
            $this->load->view('include/back/chat_panel');
            $this->load->view('include/back/chat_window');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_category/vw_index', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_category/include/scripts');
        }

    }

    /**
     * Funcion para dar formato a la informacion de todos los usuarios
     * @param array $result
     * @return string
     */
    private function format_category($result = array())
    {

        $users = "";
        if (!empty($result)) {

            $users .= "<table class='dataTable table table-striped table-hover table-bordered' id='table_user'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Texto en Español</th>
                                <th>Texto en Ingles</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>";
            $count = 1;
            foreach ($result->result() AS $key => $value) {

                $users .= "<tr class='gradeX'>                            
                            <td>" . $count . "</td>
                            <td><img src='" . URL_IMAGES . "videos/thumbs/" . $value->image_thumb_path . "' style='width: 20%;'></td>
                            <td>" . $value->text_spanish . "</td>
                            <td class='center'>" . $value->text_english . "</td>
                            <td class='center'>
                            <button type='button' class='btn btn-warning' onclick='return category_edit($value->id,$value->lang_id, \"$value->text_spanish\", \"$value->text_english\", \"$value->image_path\", \"$value->image_thumb_path\");'>Edit</button>
                            <button type='button' class='btn btn-danger' onclick='return category_delete($value->id,$value->lang_id);'>Delete</button>                            
                        </td>
                        </tr>";
                $count++;
            }

            $users .= "</tbody>
                        </table>
                    </div>";

        }

        return $users;
    }

    /**
     * Funcion para visualizar el perfil del usuario
     */
    public function profile()
    {
        if ($this->session->userdata('loginFlag')) {
            $user_id = $this->session->userdata('admin_id');

            $result = $this->Mdl_user->profile($user_id);
            $info_user = $result->result()[0];
            $data['fullname'] = $info_user->name . ' ' . $info_user->middle_name;


            //$data['table'] = $this->format_profile($result);

            $this->load->view('include/back / head');
            $this->load->view('include/back / chat_panel');
            $this->load->view('include/back / chat_window');
            $this->load->view('include/back / top_nav');
            $this->load->view('include/back / left_nav');
            $this->load->view('vw_ctr_user / include/modal_upload_image');
            $this->load->view('vw_ctr_user / vw_profile', $data);
            $this->load->view('include/back / script_footer');
            $this->load->view('vw_ctr_user / include/scripts');
        } else {
            redirect('backoffice / ', 'redirect');
        }

    }

    /**
     * FUncion para actualizar la categoria
     */
    public function category_add()
    {
        $data['text_spanish'] = $this->input->post('text_spanish');
        $data['text_english'] = $this->input->post('text_english');
        $data['image_name'] = $this->input->post('image_name');
        $data['image_name_preview'] = $this->input->post('image_name_preview');
        $response = FALSE;
        $message = "";

        if (!empty($data)) {
            $result = $this->Mdl_category->backoffice_category_add($data);

            if ($result->result()[0]->flag_add) {

                $response = TRUE;
                $message = "Los datos se actualizarón con éxito.";
            }


        } else {
            $message = "Faltan parámetros";
        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }


    /**
     * FUncion para actualizar la categoria
     */
    public function category_update()
    {
        $data['category_id'] = $this->input->post('category_id');
        $data['lang_id'] = $this->input->post('lang_id');
        $data['text_spanish'] = $this->input->post('text_spanish');
        $data['text_english'] = $this->input->post('text_english');
        $data['image_name'] = $this->input->post('image_name');
        $data['image_name_preview'] = $this->input->post('image_name_preview');
        $response = FALSE;
        $message = "";

        if (!empty($data)) {
            $result = $this->Mdl_category->backoffice_category_update($data);

            if ($result->result()[0]->flag_update) {

                $response = TRUE;
                $message = "Los datos se actualizarón con éxito.";
            }


        } else {
            $message = "Faltan parámetros";
        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }

    /**
     * Funcion para eliminar categorias
     */
    public function category_delete()
    {

        $category_id = $this->input->post('category_id');
        $response = FALSE;
        $message = "";
        if (!empty($category_id)) {

            $result = $this->Mdl_category->backoffice_category_delete($category_id);

            if ($result->result()[0]->flag_delete) {
                $response = TRUE;
                $message = "Se elimino con éxito";
            }

        } else {
            $message = "Faltan parametros";
        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }


}
