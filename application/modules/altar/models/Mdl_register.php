<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_register extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Funcion abrir hilo
     * @return boolean
     */
    public function time()
    {
        $query = "CALL time();";

        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

    /**
     * Funcion para validar que si existe el usuario
     * @param $data
     * @return bool
     */
    public function register_save($data) {
        $query = "CALL register_save(
                        '$data[name] $data[second_name]' ,
                        '$data[firstSurname]',
                        '$data[secondSurname]',
                        '$data[email]',
                        '$data[nickname]',
                        '$data[password]', 
                        '$data[activation]',
                        '$data[phone]'                       
                    );";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

    /**
     * Funcion para verificar que exista la verificacion
     * @param $activation
     * @return bool
     */
    public function register_verify_activation($activation) {

        $query = "CALL register_verify_activation('$activation');";
        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

    /**
     * Funcion para limpiar la verificacion de la tabla user
     * @param $id_register
     * @return bool
     */
    public function register_clear_activation($id_register) {
        $query = "CALL register_clear_activation($id_register);";
        mysqli_next_result($this->db->conn_id);
        //echo $this->db->last_query();
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }


    /**
     * Funcion para verificar que el correo para restaurar exista en la base de datos
     * @param $data
     * @return bool
     */
    public function front_creative_section_register($lang)
    {

        $query = "CALL front_creative_section_register('$lang');";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }



}

?>