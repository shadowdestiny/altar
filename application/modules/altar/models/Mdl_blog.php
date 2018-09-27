<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_blog extends CI_Model
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
    public function front_blog_list($data)
    {
        $query = "CALL front_blog_list('$data[lang]', $data[limit]);";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para listar el blog por ID
     * @param $data
     * @return bool
     */
    public function front_blog_by_id($data)
    {
        $query = "CALL front_blog_by_id('$data[lang]', $data[blog_id]);";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para la paginacion de los Blogs
     * @param $data
     * @return bool
     */
    public function front_blog_list_paginate($data)
    {
        $query = "CALL front_blog_list_paginate('$data[lang]',  $data[_start], $data[_limit]);";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para listar los blogs mas vistos
     * @param $data
     * @return bool
     */
    public function front_blog_more_views($data)
    {
        $query = "CALL front_blog_more_views('$data[lang]');";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * Funcion para listar los blogs mas recientes por fecha
     * @param $data
     * @return bool
     */
    public function front_blog_recent($data)
    {
        $query = "CALL front_blog_recent('$data[lang]');";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }
    /**
     * Funcion para listar los blogs mas recientes por fecha
     * @param $data
     * @return bool
     */
    public function front_blog_related($data)
    {
        $query = "CALL front_blog_related('$data[lang]', $data[blog_id]);";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }





}

?>