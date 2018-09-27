<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para el controlador del modulo de Contacto
 */
class Ctr_contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->library('Sendmessage');
        $this->load->library('Putlanguage');
        $this->load->library('Ctr_advertising');

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
     * Funcion contacto pagína contacto
     */
    public function index_u($category)
    {
        $data['categoryHeader'] = $category['categoryHeader'];
        $data['categoryFooter'] = $category['categoryFooter'];
        $data['categoryFilter'] = $category['categoryFilter'];
        $data['publicidad'] = $this->ctr_advertising->banners();

        $this->load->view('include/include_altarcreative/includes/header', $data);
        $this->load->view('vw_contact/vw_index');
        $this->load->view('include/include_altarcreative/includes/footer.php', $data);
        $this->load->view('vw_contact/includes/contactojs');
        $this->load->view('include/include_altarcreative/includes/closeBody.php');

    }

    /**
     *Clase que recibe los datos de formulario y se conecta cun el metodo SenEmail para mandar el correo.
     */
    public function contact_mail_send()
    {
        $data_conditions['fullname'] = $this->input->post('contactform_name');
        $data_conditions['contact_mail'] = $this->input->post('contactform_email');
        $data_conditions['phone'] = $this->input->post('contactform_phone');
        $data_conditions['subject'] = $this->input->post('contactform_subject');
        $data_conditions['mensaje'] = $this->input->post('contactform_message');
        $data_conditions['email'] = CORREO_CONTACTO;
        $data_conditions['view'] = 'vw_contact/includes/email_contacto';
        $response = FALSE;
        $message = '';

        if ($this->sendmessage->sendEmail($data_conditions)) {
            $response = TRUE;
            $message = 'Tu mensaje ha sido enviado';
        } else {
            $message = 'Error al enviar correo.';
        }
        echo json_encode(['response' => $response, 'message' => $message]);

    }
}

