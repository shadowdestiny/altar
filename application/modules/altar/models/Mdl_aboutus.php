<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_aboutus extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function about_get_info() {
        $query = "CALL about_get_info();";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

    



}

?>