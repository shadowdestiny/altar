<?php
defined("BASEPATH") or die("El acceso al script no está permitido");

/**
 * Class Sendmessage
 *
 * Esta clase se encarda de enviar correos, solo necesita mandar los siguintes parametros
 *
 * [
 * 'view' => 'vista que va a cargar' Es obligatorio
 * 'email' => 'aquien lo va a enviar' Es obligatorio
 * 'fullname' => 'en caso de que exista' Es opcional al igual que otros parametros
 * ]
 *
 * @autor Ricardo Daniel Carrada <rdcarrada@gmail.com>
 *
 */
class Sendmessage
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library("email");
        $this->mailFrom = 'ALTAR';
        $this->subject = 'PRE REGISTRO ALTAR';

    }

    /**
     * Funcion de configuracion para enviar correos
     * @return array
     */
    private function dataConfig()
    {

        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => USER_MAIL,
            'smtp_pass' => PASS_MAIL,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'smtp_crypto' => "smtp",
            'newline' => "\r\n"
        );

        return $configGmail;
    }

    /**
     * Funcion para enviar correo
     * @param array $params
     * @return bool
     */
    public function sendEmail(array $params = array())
    {

        if ($params != NULL) {

            if(isset($params['subject']) && !empty($params['subject'])){
                $this->subject = $params['subject'];
            }

            $this->CI->email->initialize($this->dataConfig());
            $this->CI->email->from($this->mailFrom);
            $this->CI->email->to($params['email']);
            $this->CI->email->subject($this->subject);
            $bodyTemplate = $this->CI->load->view($params['view'], $params, TRUE);
            $this->CI->email->message($bodyTemplate);

            if (!$this->CI->email->send()) {
                $this->CI->email->print_debugger();
                return FALSE;

            }

            return TRUE;
        }

    }
}