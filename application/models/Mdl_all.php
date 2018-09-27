<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_all extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Funcion para obtener las categorias
     * @param $data
     * @return bool
     */
    public function get_category_lang( $lang ) {
        $query = "CALL get_category_lang( '$lang' );";
        //mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        //echo $this->db->last_query();

        mysqli_next_result($this->db->conn_id);

        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

}

?>