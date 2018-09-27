<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_autor extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Funcion para buscar todas las preguntas
     * @return bool
     */
    public function backoffice_autor_list() {
        $query = "CALL backoffice_autor_list();";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para agregar las preguntas
     * @return bool
     */
    public function backoffice_autor_add($data) {

        $query = "CALL backoffice_autor_add(
                                        '$data[name]'
                                        );";

        $results = $this->db->query($query);
        if ($results->num_rows() > 0)
            return $results->result_array();
        else
            return false;
    }

    /**
     * Funcion para actualizar las preguntas
     * @return bool
     */
    public function backoffice_autor_update($data) {
        $query = "CALL backoffice_autor_update(
                                        $data[autor_id],
                                        '$data[name]'
                                        );";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para eliminar las preguntas
     * @return bool
     */
    public function backoffice_autor_delete($autor_id) {
        $query = "CALL backoffice_autor_delete($autor_id);";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }


}

?>