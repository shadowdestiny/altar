<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_privacy extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Funcion para mostrar terminos y condiciones
     * @return bool
     */
    public function get_privacy( ) {
        $query = "CALL get_privacy();";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para guardar terminos y condiciones
     * @return bool
     */
    public function save_privacy( $data ) {
        $query = "CALL save_privacy(
                                            '$data[privacyTitleEs]',
                                            '$data[privacyTitleEn]',
                                            '$data[privacyContentEs]',
                                            '$data[privacyContentEn]'
                                        );";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return true;
        else
            return false;
    }


}

?>