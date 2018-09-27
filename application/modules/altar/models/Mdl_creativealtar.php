<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_creativealtar extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /*
    * Metodo para realizar busqueda de temas de manera dinamica
    */
    public function searchTitle($data)
    {
        $query = "CALL autoSearchTitle(
        								'$data[lang]',
        								'$data[phrase]'
        							);";
        //mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
* Metodo para realizar busqueda de temas de manera dinamica
*/
    public function front_category_image($lang)
    {
        $query = "CALL front_category_image(
        								'$lang'
        							);";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
* Metodo para realizar busqueda de temas de manera dinamica
*/
    public function front_list_video_new($data)
    {
        $query = "CALL front_list_video_new(
                                            '$data[lang]',
                                            '$data[limit]'
                                            );";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        // echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
* Metodo para realizar busqueda de temas de manera dinamica
*/
    public function front_list_video_popular($data)
    {
        $query = "CALL front_list_video_popular(
                                                '$data[lang]',
                                                '$data[limit]'
                                                
                                                );";
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
    public function front_video_free($lang)
    {
        $query = "CALL front_video_free(
                                         '$lang'                                                
                                        );";
        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /**
     * Funcion para guardar el preregistro
     * @param $data
     * @return bool
     */
    public function front_creative_preregister($data)
    {
        $query = "CALL front_creative_preregister(
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
    public function front_creative_section1($lang)
    {

        $query = "CALL front_creative_section1('$lang');";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para verificar que el correo para restaurar exista en la base de datos
     * @param $data
     * @return bool
     */
    public function front_creative_section2($lang)
    {

        $query = "CALL front_creative_section2('$lang');";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para verificar que el correo para restaurar exista en la base de datos
     * @param $data
     * @return bool
     */
    public function front_creative_section3($lang)
    {

        $query = "CALL front_creative_section3('$lang');";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para verificar que el correo para restaurar exista en la base de datos
     * @param $data
     * @return bool
     */
    public function front_creative_section4($lang)
    {

        $query = "CALL front_creative_section4('$lang');";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }


}
