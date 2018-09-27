<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para el controlador del modulo de Contacto
 */
class Ctr_sendemail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_sendemail');
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
     * Funcion para enviar email
     */
    public function shared_video()
    {
        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'send_email');

        $data_validate['email'] = $this->input->post('email');
        $data_validate['subject'] = $this->input->post('subject');
        $data_validate['video_id'] = $this->input->post('id_video');
        $data_validate['current_url'] = $this->input->post('current_url');
        $data_validate['view'] = 'vw_sendemail/email_shared_video';
        $data_validate['lang'] = $lang;
        $response = FALSE;
        $message = "";

        if (!empty($data_validate)) {
            $result = $this->Mdl_sendemail->front_sendemail_getinfo_video_id($data_validate);
            $data_validate['title'] = $result[0]['text'];
            $data_validate['descrip'] = $result[0]['descrip'];
            $data_validate['image'] = $result[0]['image'];
            $data_validate['image_thumb'] = $result[0]['image_thumb'];
            $data_validate['price'] = $result[0]['price'];
            $data_validate['offerPrice'] = $result[0]['offerPrice'];

            if (!empty($result)) {

                if ($this->sendmessage->sendEmail($data_validate)) {
                    $response = TRUE;
                    $message = $this->lang->line('send_email_modal_title_success');
                } else {
                    $message = $this->lang->line('error_send_email');
                }

            } else {
                $message = $this->lang->line('error_video_id');
            }
        }else{
            $message = $this->lang->line('error_video_id');
        }

        echo json_encode(['response' => $response, 'message' => $message, 'return' => $data_validate['current_url']]);

    }

    /**
     * Funcion para copartir blog
     */
    public function shared_blog()
    {
        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'send_email');

        $data_validate['email'] = $this->input->post('email');
        $data_validate['subject'] = $this->input->post('subject');
        $data_validate['blog_id'] = $this->input->post('id_blog');
        $data_validate['current_url'] = $this->input->post('current_url');
        $data_validate['view'] = 'vw_sendemail/email_shared_blog';
        $data_validate['lang'] = $lang;
        $response = FALSE;
        $message = "";

        if (!empty($data_validate)) {
            $result = $this->Mdl_sendemail->front_sendemail_getinfo_blog_id($data_validate);
            $data_validate['title'] = $result[0]['title'];
            $data_validate['descrip'] = $result[0]['content'];
            $data_validate['image'] = $result[0]['image'];
            $data_validate['image_thumb'] = $result[0]['image_thumb'];

            if (!empty($result)) {

                if ($this->sendmessage->sendEmail($data_validate)) {
                    $response = TRUE;
                    $message = $this->lang->line('send_email_modal_title_success');
                } else {
                    $message = $this->lang->line('error_send_email');
                }

            } else {
                $message = $this->lang->line('error_video_id');
            }
        }else{
            $message = $this->lang->line('error_video_id');
        }

        echo json_encode(['response' => $response, 'message' => $message, 'return' => $data_validate['current_url']]);

    }

}

