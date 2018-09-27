<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_autor extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_autor');
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

            $result = $this->Mdl_autor->backoffice_autor_list();
            $data['table'] = $this->format_autor($result);

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_autor/vw_index', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_autor/include/indexjs');
        }

    }

    /**
     * Funcion para dar formato a la informacion de las preguntas
     * @param array $result
     * @return string
     */
    private function format_autor($result = array())
    {

        $users = "";
        if (!empty($result)) {

            $users .= "<table class='dataTable table table-striped table-hover table-bordered' id='table_user'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nombre</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>";
            $count = 1;
            foreach ($result AS $key => $value) {

                $users .= "<tr class='gradeX'>
                            <td>" . $count . "</td>
                            <td>" . $value['name'] . "</td>
                            <td>" . $value['created'] . "</td>
                            <td class='center'>
                            <button type='button' class='btn btn-warning' onclick='return autor_edit(" . $value['id'] . ",\"" . $value['name'] . "\");'>Edit</button>
                            <button type='button' class='btn btn-danger' onclick='return autor_delete(" . $value['id'] . ");'>Delete</button>
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
    public function autor_add()
    {
        $data['name'] = $this->input->post('name');
        $response = FALSE;
        $message = "";

        if (!empty($data)) {
            $result = $this->Mdl_autor->backoffice_autor_add($data);

            if ($result[0]['flag_add']) {

                $response = TRUE;
                $message = "El autor se guardo con éxito.";
            }


        } else {
            $message = "Faltan parámetros";
        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }


    /**
     * FUncion para actualizar las preguntas
     */
    public function autor_update()
    {
        $data['name'] = $this->input->post('name');
        $data['autor_id'] = $this->input->post('autor_id');
        $response = FALSE;
        $message = "";

        if (!empty($data)) {
            $result = $this->Mdl_autor->backoffice_autor_update($data);

            if ($result[0]['flag_update']) {

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
    public function autor_delete()
    {

        $autor_id = $this->input->post('autor_id');
        $response = FALSE;
        $message = "";
        if (!empty($autor_id)) {

            $result = $this->Mdl_autor->backoffice_autor_delete($autor_id);

            if ($result[0]['flag_delete']) {
                $response = TRUE;
                $message = "Se elimino con éxito";
            }

        } else {
            $message = "Faltan parametros";
        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }


}
