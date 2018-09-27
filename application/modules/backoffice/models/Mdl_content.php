<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_content extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Funcion para buscar todas las preguntas
     * @return bool
     */
    public function backoffice_content_index()
    {
        $query = "CALL backoffice_content_index();";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }
    /**
     * Funcion para buscar todas las preguntas
     * @return bool
     */
    public function backoffice_content_register()
    {
        $query = "CALL backoffice_content_register();";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para buscar todas las preguntas
     * @return bool
     */
    public function backoffice_section_updateinfo($data)
    {
        $query = "CALL backoffice_section_updateinfo(
                                    $data[section_id],
                                    '$data[title_es]',
                                    '$data[title_en]',
                                    '$data[subtitle_es]',
                                    '$data[subtitle_en]',
                                    '$data[content_es]',
                                    '$data[content_en]',
                                    '$data[image_name]',
                                    '$data[image_name_thumb]',
                                    '$data[section_number]',
                                    '$data[type_media]'
                                    
        );";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

}
