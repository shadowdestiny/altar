<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;


class Ctr_coupon extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_coupon');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('Ctr_functions');
    }

    /**
     * Method index()
     * @param null $type_adv
     */
    public function index($type_cupon = NULL)
    {
        if ($this->session->userdata('loginFlag')) {

            if (!is_null($type_cupon)) {

                if ($type_cupon == "price" || $type_cupon == "percentage") {
                    $data['type_cupon'] = $type_cupon;
                } else {
                    $data['type_cupon'] = "price";
                }
            } else {
                $data['type_cupon'] = "price";
            }

            $result = $this->Mdl_coupon->backoffice_coupon_list($data['type_cupon']);
            $data['table'] = "";
            if ($result) {
                $data['table'] = $this->format_cupon($result);
            }

            $data['cupon_generate'] = $this->ctr_functions->generate_coupon(10);

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_coupon/vw_index', $data);
            $this->load->view('vw_coupon/include/modal_coupon', $data);
            $this->load->view('vw_coupon/include/modal_coupon_edit');
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_coupon/include/coupon_indexjs');
        } else {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');
        }
    }


    public function cupon_save()
    {

        $response = FALSE;
        $message = "";

        if ($this->session->userdata('loginFlag')) {

            $data_conditions = [];
            $data_conditions['code_coupon'] = $this->ctr_functions->cleanString($this->input->post('code_coupon'));
            $data_conditions['cantidad'] = $this->ctr_functions->cleanString($this->input->post('cantidad'));
            $data_conditions['type_coupon'] = $this->ctr_functions->cleanString($this->input->post('type_coupon'));

            if (!empty($data_conditions)) {

                $result = $this->Mdl_coupon->backoffice_coupon_save($data_conditions);

                if ($result[0]['save_coupon']) {

                    $response = TRUE;
                    $message = " El cupon se agrego con éxito";

                } else {
                    $message = "Error al guardar el cupón";
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
     * Funcion para visualizar si el cupon ya fue usado y si fue usado, por quien?
     * @param null $coupon_id
     */
    public function view($coupon_id = NULL)
    {

        if ($this->session->userdata('loginFlag')) {


            if (!is_null($coupon_id)) {
                $result = $this->Mdl_coupon->backoffice_coupon_list_used($coupon_id);
                $data['table'] = "";
                if ($result) {
                    $data['table'] = $this->format_cupon_order($result);
                }

            } else {
                $data['table'] = "Falta el id del cupon";
            }

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_coupon/vw_view', $data);
            $this->load->view('include/back/script_footer');
            //$this->load->view('vw_adv/include/adv_indexjs');

        } else {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');

        }


    }


    /**
     * Funcion para dar formato a la publicidad
     * @param array $result
     * @return string
     */
    private function format_cupon($result = array())
    {

        $coupon = "";
        if (!empty($result)) {

            $coupon .= "<table class='dataTable table table-striped table-hover table-bordered' id='table_user'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Codigo</th>
                                <th>Cantidad</th>
                                <th>Tipo</th>
                                <th>Estatus</th>                                
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>";
            $category = "";
            $count = 1;
            foreach ($result AS $key => $value) {

                $value['count_used'] = (int)$value['count_used'];

                $coupon .= "<tr>
                            <td>" . $count . "</td>";

                $coupon .= "   <td>" . $value['code_coupon'] . "</a> </td>
                            <td>" . $value['quantity'] . "</td>
                            <td>" . $value['type'] . "</td>
                            <td>" . $value['activeFlag'] . "</td>
                            <td>";

                if ($value['count_used'] == 0) {

                    $coupon .= "<button class='btn btn-warning' onclick='return EditCoupon($value[id], \"$value[code_coupon]\", \"$value[quantity]\", \"$value[type]\" )'> Editar</button>";
                    $coupon .= " <button class='btn btn-danger' onclick='return DialogDeleteCoupon(" . $value['id'] . ");'> Eliminar</button>";


                } elseif ($value['count_used'] == 1) {

                    $coupon .= "<a href='" . ROOT_URL_BACK . "Ctr_coupon/view/" . $value['id'] . "'><button class='btn btn-info'> Ver</button></a>";

                }

                $coupon .= "</td>
                        </tr>";

                $count++;
            }

            $coupon .= "</tbody>
                        </table>
                    </div>";

        }

        return $coupon;
    }

    /**
     * Funcion para dar formato a la publicidad
     * @param array $result
     * @return string
     */
    private function format_cupon_order($result = array())
    {

        $adv = "";
        if (!empty($result)) {

            $adv .= "<table class='dataTable table table-striped table-hover table-bordered' id='table_user'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Orden</th>
                                <th>Usuario</th>
                                <th>Cantidad Pagada</th>
                                <th>Tipo</th>
                                <th>Estatus</th>                                
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>";
            $category = "";
            $count = 1;
            foreach ($result AS $key => $value) {

                $adv .= "<tr>
                            <td>" . $count . "</td>
                            <td>" . $value['order_number'] . "</td>
                            <td>" . $value['username'] . "</td>
                            <td>" . $value['total_to_paid'] . "</td>
                            <td>" . $value['status'] . "</td>
                            <td>
                                <a href='" . ROOT_URL_BACK . "Ctr_coupon/edit/" . $value['id'] . "'><button class='btn btn-warning'> Editar</button></a>
                                <button class='btn btn-danger' onclick='return DialogDeleteCoupon(" . $value['id'] . ");'> Eliminar</button>                            
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
     * Funcion para actualizar la informacion de la publicidad
     */
    public function cupon_update()
    {

        $response = FALSE;
        $message = "";
        $data_conditions = [];

        if ($this->session->userdata('loginFlag')) {

            $data_conditions['coupon_id'] = $this->input->post('coupon_id');

            if (isset($data_conditions['coupon_id']) && !empty($data_conditions['coupon_id'])) {

                $data_conditions['code_edit_coupon'] = $this->ctr_functions->cleanString($this->input->post('code_edit_coupon'));
                $data_conditions['cantidad_edit'] = $this->ctr_functions->cleanString($this->input->post('cantidad_edit'));
                $data_conditions['type_edit_coupon'] = $this->ctr_functions->cleanString($this->input->post('type_edit_coupon'));


                $response = $this->Mdl_coupon->backoffice_coupon_update($data_conditions);

                if ($response[0]['update_coupon']) {

                    $response = TRUE;
                    $message = "Se actualizó el cupón";
                } else {
                    $message = "Error al actualizar el cupón.";
                }

            } else {

                $message = "Falta el cupon_id";
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

            $cupon_id = $this->input->post('cupon_id');

            if (isset($cupon_id) && !empty($cupon_id)) {

                $response = $this->Mdl_coupon->backoffice_coupon_delete($cupon_id);

                if ($response[0]['delete_coupon']) {

                    $response = TRUE;
                    $message = "El cupón se borro con éxito";

                } else {
                    $message = "Error al eliminar el cupon.";
                }

            } else {
                $message = "Faltan parametros.";
            }

        } else {

            $message = "No hay sesión activa";

        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }

    /**
     * Funcion para generar codigos de cupon validos
     */
    public function generate_code_coupon()
    {

        $response = FALSE;
        $message = "";

        $code_coupon = $this->ctr_functions->generate_coupon(10);
        $result = $this->Mdl_coupon->backoffice_coupon_validate($code_coupon);

        if ($result[0]['validate_coupon']) {

            $this->generate_code_coupon();

        } else {
            $response = TRUE;
            $message = "Código generado.";
            echo json_encode(['response' => $response, 'message' => $message, 'code_coupon' => $code_coupon]);
        }

    }

}
