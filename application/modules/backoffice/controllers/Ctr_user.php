<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_user');
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
            $uri = ROOT_URL_BACK;
            redirect($uri, 'refresh');
        } else {

            $result = $this->Mdl_user->backoffice_user_list();
            $data['table'] = $this->format_users($result);

            $this->load->view('include/back/head');
            $this->load->view('include/back/chat_panel');
            $this->load->view('include/back/chat_window');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_ctr_user/vw_index', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_ctr_user/include/scripts');
        }

    }

    /**
     * Funcion para dar formato a la informacion de todos los usuarios
     * @param array $result
     * @return string
     */
    private function format_users($result = array())
    {

        $users = "";
        if (!empty($result)) {

            $users .= "<table class='dataTable table table-striped table-hover table-bordered' id='table_user'>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Contraseña</th>
                                <th>Estatus</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>";
            $count = 1;
            foreach ($result->result() AS $key => $value) {


                if ((int)$value->activeFlag == 0) {
                    $check = "<i class='fa fa-times' aria-hidden='true' style='color: red;'></i>";

                } elseif ((int)$value->activeFlag == 1) {
                    $check = "<i class='fa fa-check' aria-hidden='true' style='color: green;'></i>";
                }
                $users .= "<tr class='gradeX'>
                            <td>" . $count . "</td>
                            <td>" . $value->name . " " . $value->firstSurname . " " . $value->secondSurname . "</td>
                            <td class='center'>" . $value->email . "</td>
                            <td class='center'>" . $value->password . "</td>
                            <td class='center'>" . $check . "</td>
                            <td class='center'>" . $value->creationDate . "</td>
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
            $data['fullname'] = $info_user->name . ' ' . $info_user->firstSurname;


            //$data['table'] = $this->format_profile($result);

            $this->load->view('include/back/head');
            $this->load->view('include/back/chat_panel');
            $this->load->view('include/back/chat_window');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_ctr_user/include/modal_upload_image');
            $this->load->view('vw_ctr_user/vw_profile', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_ctr_user/include/scripts');
        } else {
            redirect('backoffice/', 'redirect');
        }

    }


}
