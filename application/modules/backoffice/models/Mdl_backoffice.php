<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_backoffice extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function userAuth($data) {
        $query = "CALL userAuth(
                        '$data[username]',
                        '$data[password]'
                    );";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

}

?>