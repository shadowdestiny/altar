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
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_adv_list($type)
    {
        $query = "CALL backoffice_adv_list('$type');";
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
    public function backoffice_adv_list_by_id($adv_id)
    {
        $query = "CALL backoffice_adv_list_by_id($adv_id);";
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
    public function backoffice_adv_save($data)
    {
        $query = "CALL backoffice_adv_save(
                                '$data[image_name_es]',
                                '$data[image_name_preview_es]',    
                                '$data[image_name_en]',
                                '$data[image_name_preview_en]',                                
                                '$data[type_adv]'                               
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
    public function backoffice_adv_update($data)
    {
        $query = "CALL backoffice_adv_update(    
                                $data[adv_id],
                                '$data[image_name_es]',
                                '$data[image_name_preview_es]',    
                                '$data[image_name_en]',
                                '$data[image_name_preview_en]'
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
    public function backoffice_adv_delete($adv_id)
    {
        $query = "CALL backoffice_adv_delete(
                               $adv_id                           
                                );";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

}
