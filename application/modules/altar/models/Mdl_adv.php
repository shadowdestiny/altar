<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_adv extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Funcion para listar todos los blogs
     * @param $data
     * @return bool
     */
    public function front_adv_list_banner($lang)
    {
        $query = "CALL front_adv_list_banner('$lang');";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para listar todos los blogs
     * @param $data
     * @return bool
     */
    public function front_adv_list_column($lang)
    {
        $query = "CALL front_adv_list_column('$lang');";
        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);

        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }




}

?>