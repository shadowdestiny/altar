<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_help extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function help_get_info($data)
    {
        $query = "CALL help_get_info('$data[lang]');";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }


    /*
    * Metodo para mostrar los video mas vendidos
    */
    public function view_more_sold($data)
    {

        $query = "CALL view_more_sold( '$data[lang]' );";
        //mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();

    }

    /*
    * Metodo para mostrar el video gratis
    */
    public function front_video_free($data)
    {
        $query = "CALL front_video_free(
                                         '$data[lang]'                                                
                                        );";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }


}

?>