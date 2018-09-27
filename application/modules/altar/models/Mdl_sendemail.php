<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_sendemail extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Funcion abrir hilo
     * @return boolean
     */
    public function time()
    {
        $query = "CALL time();";

        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

    /**
     * Funcion abrir hilo
     * @return boolean
     */
    public function front_sendemail_getinfo_video_id($data)
    {
        $query = "CALL front_sendemail_getinfo_video_id(
                        $data[video_id],
                        '$data[lang]'
                        );";

        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion abrir hilo
     * @return boolean
     */
    public function front_sendemail_getinfo_blog_id($data)
    {
        $query = "CALL front_sendemail_getinfo_blog_id(
                        $data[blog_id],
                        '$data[lang]'
                        );";

        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

}

?>