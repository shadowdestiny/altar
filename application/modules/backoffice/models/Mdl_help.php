<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_help extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Funcion para buscar todas las preguntas
     * @return bool
     */
    public function backoffice_help_list() {
        $query = "CALL backoffice_help_list();";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

    /**
     * Funcion para agregar las preguntas
     * @return bool
     */
    public function backoffice_help_add($data) {
        $querys = $this->db->query("SELECT MAX(page_info.order)+1 as last_order FROM page_info where page_info.type = 'page_help';");
            $ord = $querys->result()[0]->last_order;
            
        $query = "CALL backoffice_help_add(
                                        '$data[title_spanish]',
                                        '$data[title_english]',
                                        '$data[cont_spanish]',
                                        '$data[cont_english]',
                                        '$data[type_help]',
                                        $ord
                                        );";

        $results = $this->db->query($query);
        if ($results->num_rows() > 0)
            return $results;
        else
            return false;
    }

    /**
     * Funcion para actualizar las preguntas
     * @return bool
     */
    public function backoffice_help_update($data) {
        $query = "CALL backoffice_aboutus_update(
                                        $data[help_id],
                                        '$data[title_spanish]',
                                        '$data[title_english]',
                                        '$data[cont_spanish]',
                                        '$data[cont_english]',
                                        '',
                                        ''
                                        );";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

    /**
     * Funcion para eliminar las preguntas
     * @return bool
     */
    public function backoffice_help_delete($help_id) {
        $query = "CALL backoffice_help_delete($help_id);";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }


}

?>