<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_termsconditions extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Funcion para recuperar terminos y condiciones
     */
    public function get_termsConditions() {
        $query = "CALL get_termsConditions();";
        //mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

}

?>