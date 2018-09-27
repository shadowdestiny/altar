<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_user extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function time() {
        $query = "CALL time();";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }


    /**
     * Funcion para buscar todos los usuarios de los usuarios
     * @return bool
     */
    public function backoffice_user_list() {
        $query = "CALL backoffice_user_list();";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

    /**
     * Funcion para trar los datos del usuario
     * @return bool
     */
    public function profile($user_id) {
        $query = "CALL profile($user_id);";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

}

?>