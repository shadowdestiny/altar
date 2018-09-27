<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_termsconditions extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Funcion para mostrar terminos y condiciones
     * @return bool
     */
    public function get_termsConditions( ) {
        $query = "CALL get_termsConditions();";

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
    public function save_termsConditions( $data ) {
        $query = "CALL save_termsConditions(
                                            '$data[termsTitleEs]',
                                            '$data[termsTitleEn]',
                                            '$data[termsContentEs]',
                                            '$data[termsContentEn]'
                                        );";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return true;
        else
            return false;
    }


}

?>