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
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_blog_list()
    {
        $query = "CALL backoffice_blog_list();";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_blog_list_by_id($blog_id)
    {
        $query = "CALL backoffice_blog_list_by_id($blog_id);";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_blog_save($data)
    {
        $query = "CALL backoffice_blog_save(
                                $data[admin_id],
                                '$data[title_es]',
                                '$data[title_en]',
                                '$data[content_es]',
                                '$data[content_en]',
                                '$data[image_name]',
                                '$data[image_name_preview]'                                
                                );";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_blog_update($data)
    {
        $query = "CALL backoffice_blog_update(
                                $data[admin_id],
                                $data[blog_id],
                                '$data[title_es]',
                                '$data[title_en]',
                                '$data[content_es]',
                                '$data[content_en]',
                                '$data[image_name]',
                                '$data[image_name_preview]'                                
                                );";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

    /**
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_blog_delete($blog_id)
    {
        $query = "CALL backoffice_blog_delete(
                               $blog_id                           
                                );";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

}
