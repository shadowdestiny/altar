<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_category extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Funcion para buscar todos los usuarios de los usuarios
     * @return bool
     */
    public function backoffice_category_list() {
        $query = "CALL backoffice_category_list();";

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
    public function backoffice_category_add($data) {
        $query = "CALL backoffice_category_add(
                                        '$data[text_spanish]',
                                        '$data[text_english]',
                                        '$data[image_name]',
                                        '$data[image_name_preview]'
                                        );";

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
    public function backoffice_category_update($data) {
        $query = "CALL backoffice_category_update(
                                        $data[category_id],
                                        $data[lang_id],
                                        '$data[text_spanish]',
                                        '$data[text_english]',
                                        '$data[image_name]',
                                        '$data[image_name_preview]'
                                        );";

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
    public function backoffice_category_delete($category_id) {
        $query = "CALL backoffice_category_delete($category_id);";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }


}

?>