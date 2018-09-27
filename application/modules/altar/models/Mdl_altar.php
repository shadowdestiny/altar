<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_altar extends CI_Model {

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


    public function savePre_register($data) {
        $query = "CALL savePre_register(
                        '$data[firstName]',
                        '$data[lastName]',
                        '$data[email]',
                        $data[notified],
                        '$data[activation]',
                        $data[checkContribution],
                        '$data[conCountry]',
                        '$data[conQuestion1]',
                        '$data[conQuestion2]',
                        '$data[conQuestion3]'
                    );";

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
    public function verify_activation($activation) {
        $query = "CALL verify_activation('$activation');";
        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        //echo $this->db->last_query();
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
    public function clear_pre_activation($registro_id) {
        $query = "CALL clear_pre_activation($registro_id);";
        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        //echo $this->db->last_query();
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
    public function get_country_preregister() {
        $query = "CALL get_country_preregister();";
        //mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        //echo $this->db->last_query();
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }



}

?>