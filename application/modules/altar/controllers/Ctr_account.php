<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Ctr_account
 * Esta Clase se encarga de procesar toda la información del usuario
 * @autor <rdcarrada@gmail.com>
 */
class Ctr_account extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_account');
        $this->load->model('Mdl_filtervideo');
        $this->load->library('session');
        $this->load->helper('language');
        $this->load->library('Vimeoapi');
        $this->load->library('Putlanguage');
        $this->load->helper('url');
        $this->load->library('Sendmessage');
        $this->load->library('Ctr_functions');
        $this->perPage = 5;

        if ($this->session->userdata('Setlanguage') == null) {
            $this->session->set_userdata('Setlanguage', 'es');
        }

    }

    /**
     * Funcion index pagína principal para el funcionamiento del manejo de idioma
     */
    public function index()
    {
        $this->fileLanguage = 'index';
        $this->redirect($this->fileLanguage);
    }

    public function redirect($fileLanguage)
    {

        $lang = $this->session->userdata('Setlanguage');

        $request = $this->putlanguage->setLanguage($lang, $fileLanguage);
        $this->index_u($request);

    }

    /**
     * Funcion para mostrar el Account
     */
    public function index_u($category)
    {
        if ($this->session->userdata('user_id')) {

            $user_id = $this->session->userdata('user_id');
            $lang = $this->session->userdata('Setlanguage');
            $data = [];
            $data['categoryHeader'] = $category['categoryHeader'];
            $data['categoryFooter'] = $category['categoryFooter'];
            $data['categoryFilter'] = $category['categoryFilter'];
            $result = $this->Mdl_account->account_user($user_id);


            if ($result->result()[0]->flag_exist) {

                $data['name'] = $result->result()[0]->name;
                $data['firstSurname'] = $result->result()[0]->firstSurname;
                $data['secondSurname'] = $result->result()[0]->secondSurname;
                $data['email'] = $result->result()[0]->email;
                $data['nickname'] = $result->result()[0]->nickname;
                $data['phone'] = $result->result()[0]->phone;

            }

            $this->load->view('include/include_altarcreative/includes/header', $data);
            $this->load->view('vw_account/vw_index', $data);
            $this->load->view('include/include_altarcreative/includes/footer.php', $data);
            $this->load->view('vw_register/include/registerjs');
            $this->load->view('include/include_altarcreative/includes/closeBody.php');
        } else {
            $uri = ROOT_URL . 'altar/Ctr_account/login';
            redirect($uri, 'refresh');
        }
    }

    /**
     * Funcion para login
     */
    public function login()
    {
        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'login');

        if ($this->session->userdata('user_id')) {

            $uri = ROOT_URL . 'altar/Ctr_account/';
            redirect($uri, 'refresh');

        } else {

            $this->load->view('vw_account/vw_login');
            $this->load->view('vw_account/include/account_loginjs');
        }
    }

    /**
     * Funcion para validar el usuario y contraseña
     */
    public function verify_login()
    {
        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'login');

        $data_verify['email'] = $this->input->post('email');
        $data_verify['password'] = $this->input->post('password');
        $response = FALSE;
        $message = '';
        if (!empty($data_verify)) {

            $result = $this->Mdl_account->account_verify_login($data_verify);

            if ($result->result()[0]->flag_login) {
                $data_session['user_id'] = $result->result()[0]->id;
                $data_session['name'] = $result->result()[0]->name;
                $data_session['firstSurname'] = $result->result()[0]->firstSurname;
                $data_session['secondSurname'] = $result->result()[0]->secondSurname;
                $data_session['email'] = $result->result()[0]->email;
                $data_session['nickname'] = $result->result()[0]->nickname;
                $data_session['email'] = $result->result()[0]->email;
                $data_session['redirect'] = ROOT_URL . 'altar/Ctr_account/';

                $response = TRUE;
                $message = $this->lang->line('login_verify_welcome') . ' ' . $data_session['nickname'];

                $this->ctr_functions->generate_session($data_session);

            } else {
                $message = $this->lang->line('login_verify_user_exist');
            }
        }
        echo json_encode(['response' => $response, 'message' => $message]);
    }

    /**
     * Esta funcion cierra la session y redirecciona
     */
    public function closeSession_cancel()
    {

        $this->session->sess_destroy();
    }

    /**
     * Esta funcion cierra la session y redirecciona
     */
    public function closeSession()
    {

        $this->session->sess_destroy();
        $uri = ROOT_URL . 'altar/Ctr_account/';
        redirect($uri, 'refresh');
    }

    /**
     * Funcion para mostrar la vista de recuperar contraseña
     */
    public function recovery()
    {
        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'login');

        if ($this->session->userdata('user_id')) {

            $uri = ROOT_URL . 'altar/Ctr_account/';
            redirect($uri, 'refresh');

        } else {

            $this->load->view('vw_account/vw_recovery');
            $this->load->view('vw_account/include/account_recoveryjs');
        }

    }

    /**
     * Funcion para recuperar contraseña
     */
    public function recovery_request()
    {
        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'login');

        $data_validate['email'] = $this->input->post('email');
        $data_validate['activation'] = $this->ctr_functions->generateCode(50);
        $data_validate['modified'] = $date = date('Y-m-d H:i:s');
        $data_validate['view'] = 'vw_account/include/email_recovery';
        $data_validate['subject'] = 'RESTAURAR CONTRASEÑA ALTAR';
        $response = FALSE;
        $message = "";

        if (!empty($data_validate)) {
            $result = $this->Mdl_account->account_recovery($data_validate);

            if ($result->result()[0]->flag_update) {

                if ($this->sendmessage->sendEmail($data_validate)) {
                    $response = TRUE;
                    $message = $this->lang->line('recovery_message_send_success');
                } else {
                    $message = $this->lang->line('error_send_email');
                }

            } else {
                $message = $this->lang->line('recovery_message_user_dontexist');
            }
        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }

    /**
     * Funcion para verificar que la activacion exista
     */
    public function verify_activation($activation = NULL)
    {
        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'login');

        $data['message'] = '';
        $data['response'] = FALSE;

        if ($activation != NULL) {

            $this->Mdl_account->time();
            $result = $this->Mdl_account->account_verify_activation($activation);

            if ($result->result()[0]->flag_exist) {

                #var_dump($result->result()[0]);
                
                $data['user_id'] = $result->result()[0]->id;
                $data['email'] = $result->result()[0]->email;
                $data['fullname'] = $result->result()[0]->fullname;
                $data_conditions['modified'] = $result->result()[0]->modified;
                $data_validate['date_now'] = $date = date('Y-m-d H:i:s');

                $timeout = $this->ctr_functions->minutos_transcurridos($data_conditions['modified'], $data_validate['date_now']);

                if ($timeout >= TIME_SESSION) {
                    $data['message'] = $this->lang->line('error_validation_time_out') . "<br>
                                        <a href='" . ROOT_URL . "altar/Ctr_account/recovery/' style='color: #FFCE00'>Solicitar código de activación.</a>";
                } else {

                    $this->ctr_functions->generate_session($data);
                    $data['response'] = TRUE;
                }

            } else {

                $data['mensaje'] = $this->lang->line('error_validation_user_exist');

            }
            $this->load->view('vw_account/vw_verify_activation', $data);
            $this->load->view('vw_account/include/account_recovery_newpassjs');
        }
    }


    /**
     * Funcion para actualizar la nueva contraseña es invocado por un elemento ajax
     */
    public function new_password()
    {

        $data['password'] = $this->input->post('password');
        $data['user_id'] = $this->input->post('user_id');
        $response = FALSE;
        $message = "";

        if (!empty($data)) {

            $result = $this->Mdl_account->account_new_password($data);

            if ($result->result()[0]->flag_exist) {

                $data_session['user_id'] = $result->result()[0]->id;
                $data_session['name'] = $result->result()[0]->name;
                $data_session['firstSurname'] = $result->result()[0]->firstSurname;
                $data_session['secondSurname'] = $result->result()[0]->secondSurname;
                $data_session['email'] = $result->result()[0]->email;
                $data_session['nickname'] = $result->result()[0]->nickname;
                $data_session['email'] = $result->result()[0]->email;
                $data_session['redirect'] = ROOT_URL . 'altar/Ctr_account/';

                $this->ctr_functions->generate_session($data_session);
                $response = TRUE;
                $message = "Se actualizo tu contraseña.";

            } else {
                $message = "Este usuario no existe en nuestros registros";
            }

        } else {

        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }

    /**
     *Funcion para visualizar los datos de actualizacion
     */
    public function edit()
    {
        $lang = $this->session->userdata('Setlanguage');
        $response = $this->putlanguage->setLanguage($lang, 'login');
        $data = [];
        $data_lang['categoryHeader'] = $response['categoryHeader'];
        $data_lang['categoryFooter'] = $response['categoryFooter'];
        $data_lang['categoryFilter'] = $response['categoryFilter'];

        if ($this->session->userdata('user_id')) {

            $user_id = $this->session->userdata('user_id');
            $result = $this->Mdl_account->account_user($user_id);

            if ($result->result()[0]->flag_exist) {

                $data['name'] = $result->result()[0]->name;
                $data['firstSurname'] = $result->result()[0]->firstSurname;
                $data['secondSurname'] = $result->result()[0]->secondSurname;
                $data['email'] = $result->result()[0]->email;
                $data['nickname'] = $result->result()[0]->nickname;
                $data['phone'] = $result->result()[0]->phone;

            }


            $this->load->view('include/include_altarcreative/includes/header', $data_lang);
            $this->load->view('vw_account/vw_edit', $data);
            $this->load->view('include/include_altarcreative/includes/footer.php', $data_lang);
            $this->load->view('vw_account/include/account_editjs');
            $this->load->view('include/include_altarcreative/includes/closeBody.php');

        } else {
            $uri = ROOT_URL . 'altar/Ctr_account/login';
            redirect($uri, 'refresh');
        }

    }

    /**
     * Funcion para actualizar los datos del usuario
     */
    public function edit_update()
    {

        $response = FALSE;
        $message = "";
        $data_conditions = [];

        if ($this->session->userdata('user_id')) {

            $data_conditions['user_id'] = $this->session->userdata('user_id');
            $data_conditions['name'] = $this->input->post('name');
            list($first_name, $second_name, $first_surname, $second_surname) = $this->ctr_functions->generateName($data_conditions['name']);
            $data_conditions['name'] = $first_name . ' ' . $second_name;
            $data_conditions['firstSurname'] = $first_surname;
            $data_conditions['secondSurname'] = $second_surname;
            $data_conditions['email'] = $this->input->post('email');
            $data_conditions['username'] = $this->input->post('username');
            $data_conditions['phone'] = $this->input->post('phone');
            $data_conditions['password'] = $this->input->post('password');

            if (!empty($data_conditions)) {

                $result = $this->Mdl_account->account_edit($data_conditions);

                if ($result->result()[0]->flag_edit) {
                    $response = TRUE;
                    //Se define el nickname con la variable enviada por post
                    $this->session->set_userdata('nickname',$data_conditions['username']);
                    $message = "Los datos fuerón actualizados.";

                }

            } else {
                $message = "Faltan parametros";
            }

        } else {
            $message = "No existe sessión activa, es necesario iniciar sesión.";
        }

        echo json_encode(['response' => $response, 'message' => $message]);


    }

    /**
     * Metrodo para historial de pedidos
     */
    public function orders_history()
    {

        $data = [];

        $data_conditions['lang'] = $this->session->userdata('Setlanguage');
        $response = $this->putlanguage->setLanguage($data_conditions['lang'], 'index');
        $data_lang['categoryHeader'] = $response['categoryHeader'];
        $data_lang['categoryFooter'] = $response['categoryFooter'];
        $data_lang['categoryFilter'] = $response['categoryFilter'];

        if ($this->session->userdata('user_id')) {

            $data_conditions['user_id'] = $this->session->userdata('user_id');
            $data_conditions['limit'] = $this->perPage;
            $result = $this->Mdl_account->front_account_get_orders($data_conditions);

            if (!empty($result)) {

                $data['orders'] = $this->generate_orders_format($result);

            } else {
                $data['orders'] = $this->lang->line('order_history_empty');
            }

            $this->load->view('include/include_altarcreative/includes/header', $data_lang);
            $this->load->view('vw_account/vw_history_order', $data);
            $this->load->view('include/include_altarcreative/includes/footer.php', $data_lang);
            $this->load->view('vw_account/include/account_editjs');
            $this->load->view('include/include_altarcreative/includes/closeBody.php');

        } else {
            $uri = ROOT_URL . 'altar/Ctr_account/login';
            redirect($uri, 'refresh');
        }

    }

    /**
     * Funcion para generar las orden de compras ya pagadas
     * @param null $result
     * @return string
     */
    private function generate_orders_format($result = NULL)
    {
        $data_conditions['lang'] = $this->session->userdata('Setlanguage');
        $order = "";
        if (!is_null($result)) {

            foreach ($result AS $key => $value) {

                $data_conditions['order_id'] = $value['id'];
                $result_orders_videos = $this->Mdl_account->front_account_get_orders_videos($data_conditions);


                $value['created'] = date("j F Y", strtotime($value['created']));

                $order .= "  <div class='panel panel-default tabladepedido'>
                                <!--
							    <div class='panel-heading'>
                                    <div class='col-md-4'>" . $value['order_number'] . "</div>
                                    <div class='col-md-4 center'>" . $value['created'] . "</div>
                                    <div class='col-md-4 paraimprimirrecibo'>
                                        <a href='#'><span>Imprimir recibo</span>
                                            <i class='icon-line2-printer fright'></i>
                                        </a>
                                    </div>							
							    </div>
							    -->
							    <table class='table order'>
								<!--<thead>
									<tr>
										<th></th>
										<th>Producto</th>
										<th>Precio</th>
										<th>Descargar</th>
									</tr>
								</thead>-->
								<tbody>";


                foreach ($result_orders_videos AS $key2 => $value2) {


                    if (isset($value2['offerPrice']) && !is_null($value2['offerPrice'])) {
                        $value2['price'] = $value2['offerPrice'];
                    }

                    $download = $this->vimeoapi->download_video($value2['vimeo_id']);

                    if (!isset($download['error'])) {
                        $download = $download['resolution_link'];
                    } else {
                        $download = "";
                    }

                    $order .= "<tr> 
                                    <td style='width:200px'>
                                    <a href='" . ROOT_URL . "altar/Ctr_filtervideo/quick_view/" . $value2['id'] . "' class='item-quick-view' data-lightbox='ajax'>
                                    <img width='200' height='135' src='" . URL_IMAGES . "videos/thumbs/" . $value2['image_thumb'] . "' alt='" . $value2['sku'] . "'></a>
                                    </td>
                                    <td><a href='" . ROOT_URL . "altar/Ctr_product/view/" . $value2['id'] . "'>" . $value2['sku'] . "</a></td>
                                    <td><span class='signopesos'>$</span>" . $value2['price'] . "</td>
                                    <td><a href='" . $download . "'><i class='icon-line-download'></i></a></td>
                                </tr>";
                }

                $order .= "
								</tbody>
							</table>							
						</div>
						<div>
						    <table class='table order' style='width: 40%!important;'>
							    <tbody>
							        <tr>
							            <td></td>
                                        <td><b>TOTAL</b></td>
                                        <td><span class='signopesos'>$</span>" . $value['total_to_paid'] . "</td>
                                        <td></td>
									</tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
          ";
            }

        }

        return $order;
    }

    /**
     * Funcion para generar la vista previa de cada video por el ID del video
     */
    public function quick_view($id = NULL)
    {
        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'quick_view');
        $message = "";
        $data = [];
        $data['id'] = $id;
        $data['lang'] = $lang;
        if ($data['id']) {
            $result = $this->Mdl_filtervideo->front_filtervideo_quickview($data);
            if ($result) {

                $message = $this->format_quick_view($result);
            }

        } else {
            $message = $this->lang->line('error_video_id');
        }

        echo $message;
    }


    /**
     * Funcion para dar formatoa  a la visa rapida de cada video
     * @param array $result
     * @return mixed
     */
    private function format_quick_view($result = array())
    {
        $data = [];
        $data['lang'] = $this->session->userdata('Setlanguage');
        if (!empty($result)) {

            $data['video_id'] = $result[0]['video_id'];
            $data['sku'] = $result[0]['sku'];
            $data['vimeoPreview_id'] = $this->vimeoapi->show_video($result[0]['vimeoPreview_id']);
            $data['image'] = $result[0]['image'];
            $data['image_thumb'] = $result[0]['image_thumb'];

            if ($result[0]['offerPrice'] == null || trim($result[0]['offerPrice']) == '') {
                $data['price'] = $result[0]['price'];
            } else {
                $data['price'] = $result[0]['offerPrice'];

            }
            $data['price'] = $result[0]['price'];
            $data['offerPrice'] = $result[0]['offerPrice'];
            $data['price_money'] = $data['price'];
            $data['title'] = $result[0]['title'];
            $data['intro'] = $result[0]['intro'];
            $data['descrip'] = $result[0]['descrip'];


            $download = $this->vimeoapi->download_video($result[0]['vimeo_id']);

            if (!isset($download['error'])) {
                $download = $download['resolution_link'];
            } else {
                $download = "";
            }
            $data['link'] = $download;

        }

        return $this->load->view('vw_filtervideo/include/quick_view_free', $data, TRUE);
    }


    /**
     * Metrodo para mostrar la cancelacion de la cuenta
     */
    public function cancel_account()
    {
        $data = [];
        $data_conditions['lang'] = $this->session->userdata('Setlanguage');
        $response = $this->putlanguage->setLanguage($data_conditions['lang'], 'index');
        $data_lang['categoryHeader'] = $response['categoryHeader'];
        $data_lang['categoryFooter'] = $response['categoryFooter'];
        $data_lang['categoryFilter'] = $response['categoryFilter'];

        if ($this->session->userdata('user_id')) {

            $this->load->view('include/include_altarcreative/includes/header', $data_lang);
            $this->load->view('vw_account/vw_cancel_account');
            $this->load->view('include/include_altarcreative/includes/footer.php', $data_lang);
            $this->load->view('vw_account/include/account_cancel');
            $this->load->view('include/include_altarcreative/includes/closeBody.php');


        } else {
            $uri = ROOT_URL . 'altar/Ctr_account/login';
            redirect($uri, 'refresh');
        }

    }

    public function cancel_account_execute()
    {
        $response = FALSE;
        $message = "";

        $data['reason'] = $this->input->post('reason_of_cancel');

        if ($this->session->userdata('user_id')) {
            $data['user_id'] = $this->session->userdata('user_id');

            $result = $this->Mdl_account->front_account_cancel_account($data);

            if ($result[0]['cancel_account']) {

                $this->closeSession_cancel();

                $response = TRUE;
                $message = "Se cancelo la cuenta.";

            } else {
                $message = "Error al cancelar cuenta";
            }

        } else {
            $message = "Faltan parametros";
        }

        echo json_encode(['response' => $response, 'message' => $message]);
    }


}
