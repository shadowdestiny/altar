<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Ctr_register
 * Esta clase se encarga de guardar los nuevos registros de usuarios
 */
class Ctr_register extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Mdl_register');
        $this->load->library('session');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->library('Sendmessage');
        $this->load->library('Putlanguage');

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
     * Funcion index pagína principal
     */
    public function index_u($category)
    {
        if ($this->session->userdata('user_id')) {
            $uri = ROOT_URL . 'altar/Ctr_account/';
            redirect($uri, 'refresh');
        } else {
            $lang = $this->session->userdata('Setlanguage');
            $section1 = $this->Mdl_register->front_creative_section_register($lang);

            $data['title'] = "";
            $data['subtitle'] = "";
            $data['content'] = "";
            if (!empty($section1)) {

                $data['title'] = $section1[0]['title'];
                $data['subtitle'] = $section1[0]['subtitle'];
                $data['content'] = $section1[0]['content'];

            }
            $this->load->view('include/include_altarcreative/includes/header', $category);
            $this->load->view('vw_register/vw_index', $data);
            $this->load->view('include/include_altarcreative/includes/footer.php', $category);
            $this->load->view('vw_register/include/registerjs');
            $this->load->view('include/include_altarcreative/includes/closeBody.php');
        }
        
    }

    /**
     * Funcion para guardar los datos del nuevo usuario
     */
    public function save()
    {

        $lang = $this->session->userdata('Setlanguage');
        $request = $this->putlanguage->setLanguage($lang, 'index');

        $data_validate = [];
        $return = FALSE;
        $message = "";
        $data_validate['name'] = $this->input->post('name');
        $data_validate['email'] = $this->input->post('email');
        $data_validate['nickname'] = $this->input->post('username');
        $data_validate['phone'] = $this->input->post('phone');
        $data_validate['password'] = $this->input->post('password');
        $data_validate['activation'] = $this->generateCode(50);
        $data_validate['view'] = 'vw_register/include/email_register';
        if (!empty($data_validate)) {


            if ($this->register_save($data_validate)) {


                $data_validate['subject']= $this->lang->line('register_mail_subject');
                if ($this->sendmessage->sendEmail($data_validate)) {
                    $return = TRUE;
                    $message = $this->lang->line('register_mail_success');
                } else {
                    $message = $this->lang->line('register_mail_error');
                }

            } else {
                $message = $this->lang->line('register_mail_user_exist');
            }

        } else {
            $message = $this->lang->line('register_mail_missing_params');
        }

        echo json_encode(['response' => $return, 'message' => $message]);


    }

    /**
     * Funcion para validar que no exista el usuario con el mismo correo y el mismo username
     * @param array $params
     * @return bool
     */
    private function register_save($params = array())
    {
        $return = FALSE;

        if (!empty($params)) {

            list($first_name, $second_name, $first_surname, $second_surname) = $this->generateName($params['name']);

            $params['name'] = $first_name;
            $params['second_name'] = $second_name;
            $params['firstSurname'] = $first_surname;
            $params['secondSurname'] = $second_surname;

            $result = $this->Mdl_register->register_save($params);
            $flag_return = $result->result()[0]->flag_register;
            $register_id = $result->result()[0]->id_register;

            if ($flag_return) {
                $return = TRUE;
            }

        }

        return $return;
    }

    /**
     * Funcion para separar el nombre completo por secciones
     * primer nombre
     * segundo nombre
     * primer apellido
     * segundo apellido
     * @param $nombreCompleto
     * @return array
     */
    private function generateName($fullname = NULL)
    {
        $first_name = "";
        $second_name = "";
        $first_surname = "";
        $second_surname = "";

        if ($fullname != NULL) {
            $fullname = explode(" ", $fullname);

            if (isset($fullname[0]) && $fullname[0] != NULL) {
                $first_name = $fullname[0];
            }
            if (isset($fullname[1]) && $fullname[1] != NULL) {
                $second_name = $fullname[1];
            }
            if (isset($fullname[2]) && $fullname[2] != NULL) {
                $first_surname = $fullname[2];
            }
            if (isset($fullname[3]) && $fullname[3] != NULL) {
                $second_surname = $fullname[3];
            }

        }


        return [$first_name, $second_name, $first_surname, $second_surname];
    }

    /**
     * Funcion para generar codigo de activacion
     * @param $size
     * @return string
     */
    private function generateCode($size)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $size; $i++)
            $key .= $pattern{mt_rand(0, $max)};
        return $key;
    }

    /**
     * Funcion para verificar que la activacion exista
     */
    public function verify_activation($activation = NULL)
    {
        $flagExist = FALSE;
        $data['fullname'] = '';
        $data['mensaje'] = '';

        if ($activation != NULL) {

            $this->Mdl_register->time();
            $result = $this->Mdl_register->register_verify_activation($activation);

            if ($result->result()[0]->flag_exist) {
                $data_session['user_id'] = $result->result()[0]->id;
                $data_session['name'] = $result->result()[0]->name;
                $data_session['firstSurname'] = $result->result()[0]->firstSurname;
                $data_session['secondSurname'] = $result->result()[0]->secondSurname;
                $data_session['email'] = $result->result()[0]->email;
                $data_session['nickname'] = $result->result()[0]->nickname;
                $data_session['email'] = $result->result()[0]->email;
                $data_session['redirect'] = ROOT_URL . 'altar/Ctr_account/';

                $result_clear = $this->Mdl_register->register_clear_activation($data_session['user_id']);
                $flagExist = $result_clear->result()[0]->updateRegistro;

                $this->generate_session($data_session);
            } else {
                $uri = ROOT_URL . 'altar/Ctr_register/';
                redirect($uri, 'refresh');
            }
        }
    }

    /**
     * Funcion para generar la sesion
     * @param array $params
     */
    private function generate_session($params = array())
    {

        if (!empty($params)) {
            $this->session->set_userdata($params);
            redirect($params['redirect'], 'refresh');
        }

    }

    /**
     * Esta funcion cierra la session y redirecciona
     */
    private function closeSession()
    {

        // redirect(base_url() . 'backoffice', 'refresh');
    }

}
