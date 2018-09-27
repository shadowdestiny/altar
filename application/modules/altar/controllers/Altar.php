<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class altar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_altar');
        $this->load->library('encryption');
        $this->load->library('MailChimp');
        $this->list_id = 'd19c2580e4';
        $this->load->library('recaptcha');
        $this->load->library('Sendmessage');
        $this->load->library('session');
        $this->load->helper('url');

    }

    /**
     * Funcion para mostrar login en caso de no
     */
    public function index()
    {
        $data = [];
        if ($this->session->userdata('loginFlag')) {
            redirect('backoffice/Ctr_index/', 'redirect');
        } else {
            $data['widget'] = $this->recaptcha->getWidget();
            $data['script'] = $this->recaptcha->getScriptTag();

            $result = $this->Mdl_altar->get_country_preregister();
            $data['contrys'] = $this->pre_format_contry($result);

            $this->load->view('vw_altar/vw_newregister', $data);
            $this->load->view('vw_altar/include/modal_error');
            $this->load->view('vw_altar/include/modal_success');
            $this->load->view('vw_altar/include/script');
        }

    }

    /**
     * Funcion para dar formato a los paises
     * @param null $result
     * @return string
     */
    private function pre_format_contry($result = NULL)
    {
        $contry = "";
        if ($result) {
            $contry .= "<option value=''> Selecciona un pais</option>";
            foreach ($result->result() as $key => $value) {

                $contry .= "<option value='" . $value->Code . "'>" . $value->Name . "</option>";

            }

        }

        return $contry;
    }


    /**
     * Funcion para guardar un pre registro de los usuarios
     */
    public function pre_register()
    {

        $response = FALSE;
        $message = '';
        $firstName = $this->input->post('firstName');
        $lastName = $this->input->post('lastName');
        $email = $this->input->post('email');
        $notified = $this->input->post('checkbox');
        $contributors = $this->input->post('contributors');
        $pais = $this->input->post('pais');

        $checkContribution = 0;

        if (trim($this->input->post('contributor')) != '') {
            $checkContribution = trim($this->input->post('contributor'));
        }

        $conCountry = $this->input->post('con_country');
        $conQuestion1 = $this->input->post('con_question1');
        $conQuestion2 = $this->input->post('con_question2');
        $conQuestion3 = $this->input->post('con_question3');


        if ($contributors == 'true') {
            $contributors = 1;
        } else {
            $contributors = 0;
        }

        if ($notified == 'true') {
            $notified = 1;
        } else {
            $notified = 0;
        }
        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {

            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
                $data_conditions['activation'] = $this->generateCode(50);
                $dataUser = [
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'notified' => $notified,
                    'activation' => $data_conditions['activation'],
                    'checkContribution' => $checkContribution,
                    'conCountry' => $conCountry,
                    'conQuestion1' => $conQuestion1,
                    'conQuestion2' => $conQuestion2,
                    'conQuestion3' => $conQuestion3
                ];

                $result = $this->Mdl_altar->savePre_register($dataUser);
                $flagRegister = $result->result()[0]->flagRegister;
                if ($flagRegister) {

                    if ($contributors == 1) {
                        $id_register = $result->result()[0]->id_register;
                    }


                    $this->mailchimp->post("lists/$this->list_id/members",
                        ['email_address' => $email,
                            'merge_fields' =>
                                [
                                    'FNAME' => $firstName,
                                    'LNAME' => $lastName
                                ],
                            'status' => 'subscribed',
                        ]);
                    $data_conditions['view'] = 'vw_altar/include/email_preregister';
                    $data_conditions['fullname'] = $firstName . ' ' . $lastName;
                    $data_conditions['email'] = $email;

                    if ($this->sendmessage->sendEmail($data_conditions)) {
                        $response = TRUE;
                        $message = 'El usuario se registró correctamente, por favor revisa tu correo.';
                    } else {
                        $message = 'Error al enviar correo.';
                    }

                } else {
                    $message = 'El usuario ya existe en nuestros registros!.';
                }
            } else {
                $message = 'Es necesario actualizar la página.';
            }
        } else {
            $message = 'Es necesario validar que no eres un robot.';
        }

        echo json_encode(['response' => $response, 'message' => $message]);

    }

    /**
     * Funcion para generar codigo de activacion
     * @param $size
     * @return string
     */
    private
    function generateCode($size)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $size; $i++)
            $key .= $pattern{mt_rand(0, $max)};
        return $key;
    }


    /**
     * Esta funcion minutos_transcurridos() se encarga de verificar la fecha de modificacion con la fecha de hoy y devuelve
     * los minutos transcurridos
     * @param type $fecha_inicial
     * @param type $fecha_final
     * @return type int $minutos
     */
    private function minutos_transcurridos($fecha_inicial, $fecha_final)
    {

        $minutos = (strtotime($fecha_inicial) - strtotime($fecha_final)) / 60;
        $minutos = abs($minutos);
        $minutos = floor($minutos);

        return $minutos;
    }

    /**
     * Funcion para verificar que la activacion exista y este dentro del tiempo establecido
     */
    public  function verify_activation($activation = NULL)
    {
        $flagExist = FALSE;
        $data['fullname'] = '';
        $data['mensaje'] = '';

        $data = array(
            'widget' => $this->recaptcha->getWidget(),
            'script' => $this->recaptcha->getScriptTag(),
        );

        if ($activation != NULL) {

            $this->Mdl_altar->time();
            $dateModified = $this->Mdl_altar->verify_activation($activation);


            if ($dateModified->result()[0]->flag_exist) {
                $id_registro = $dateModified->result()[0]->id_registro;
                $this->Mdl_altar->clear_pre_activation($id_registro);
                $flagExist = TRUE;
                $data['activacion'] = $activation;
                $data['id_registro'] = $id_registro;
                $data['mensaje'] = " Bienvenido " . $dateModified->result()[0]->fullname;

            } else {
                $data['activacion'] = '';
                $data['id_registro'] = '';
                $data['mensaje'] = "No existe este código de validación.";
            }
        }

        if ($flagExist) {
            $this->load->view('vw_altar/vw_newpre_active', $data);
        } else {
            $this->load->view('vw_altar/vw_pre_error', $data);
        }


    }


}
