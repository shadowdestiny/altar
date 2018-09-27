<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_sitemap extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function get_category_name() {
        $query = "CALL get_category_name();";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            
            return $result->result_array();
        else
            return false;
    }

    



}

?>