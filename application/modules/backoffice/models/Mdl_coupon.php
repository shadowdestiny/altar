<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_coupon extends CI_Model
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
    public function time()
    {
        $query = "CALL time();";
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
    public function backoffice_coupon_list($type)
    {
        $query = "CALL backoffice_coupon_list('$type');";
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
    public function backoffice_coupon_list_used($type)
    {
        $query = "CALL backoffice_coupon_list_used('$type');";
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
    public function backoffice_coupon_save($data)
    {
        $query = "CALL backoffice_coupon_save(
                                '$data[code_coupon]',
                                '$data[cantidad]',    
                                '$data[type_coupon]'
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
    public function backoffice_coupon_update($data)
    {
        $query = "CALL backoffice_coupon_update(    
                                $data[coupon_id],
                                '$data[code_edit_coupon]',
                                '$data[cantidad_edit]',    
                                '$data[type_edit_coupon]'
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
    public function backoffice_coupon_delete($cupon_id)
    {
        $query = "CALL backoffice_coupon_delete(
                               $cupon_id                           
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
    public function backoffice_coupon_validate($code_coupon)
    {
        $query = "CALL backoffice_coupon_validate(
                               '$code_coupon'                      
                                );";


        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return false;
    }

}
