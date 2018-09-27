<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_help extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_help');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->helper('url');

    }

    /**
     * Funcion para mostrar el index y tabla de preguntas
     */
    public function index()
    {
        if (!$this->session->userdata('loginFlag')) {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');
        } else {

            $result = $this->Mdl_help->backoffice_help_list();
            $data['table'] = $this->format_help($result);

            $this->load->view('include/back/head');
            $this->load->view('include/back/chat_panel');
            $this->load->view('include/back/chat_window');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_help/vw_index', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_help/include/helpjs');
        }

    }

    /**
     * Funcion para dar formato a la informacion de las preguntas
     * @param array $result
     * @return string
     */
    private function format_help($result = array())
    {

        $users = "";
        if (!empty($result)) {

            $users .= "<table class='dataTable table table-striped table-hover table-bordered' id='table_user'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Título en Español</th>
                                <th>Título en Ingles</th>
                                <th>Contenido en Español</th>
                                <th>Contenido en Ingles</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>";
            $count = 1;
            foreach ($result->result() AS $key => $value) {

                $users .= "<tr class='gradeX'>
                            <td>" . $count . "</td>
                            <td>" . $value->title_spanish . "</td>
                            <td>" . $value->title_english . "</td>
                            <td class='center'>" . $value->content_spanish . "</td>
                            <td class='center'>" . $value->content_english . "</td>
                            <td class='center'>
                            <button type='button' class='btn btn-warning' onclick='return help_edit($value->id,\"$value->title_spanish\", \"$value->title_english\", \"$value->content_spanish\", \"$value->content_english\");'>Edit</button>
                            <button type='button' class='btn btn-danger' onclick='return help_delete($value->id);'>Delete</button>                            
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
     * FUncion para agregar las preguntas
     */
    public function help_add()
    {
        $data['title_spanish'] = $this->input->post('title_spanish');
        $data['title_english'] = $this->input->post('title_english');
        $data['cont_spanish'] = $this->input->post('cont_spanish');
        $data['cont_english'] = $this->input->post('cont_english');
        $data['type_help'] = $this->input->post('type_help');
        $response = FALSE;
        $message = "";

        if (!empty($data)) {
            $result = $this->Mdl_help->backoffice_help_add($data);

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
     * FUncion para actualizar las preguntas
     */
    public function help_update()
    {
        $data['title_spanish'] = $this->input->post('title_spanish');
        $data['title_english'] = $this->input->post('title_english');
        $data['cont_spanish'] = $this->input->post('cont_spanish');
        $data['cont_english'] = $this->input->post('cont_english');
        $data['help_id'] = $this->input->post('help_id');
        $response = FALSE;
        $message = "";

        if (!empty($data)) {
            $result = $this->Mdl_help->backoffice_help_update($data);

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
     * Funcion para eliminar Preguntas
     */
    public function help_delete()
    {

        $help_id = $this->input->post('help_id');
        $response = FALSE;
        $message = "";
        if (!empty($help_id)) {

            $result = $this->Mdl_help->backoffice_help_delete($help_id);

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
