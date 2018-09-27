<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_account extends CI_Model
{

    function __construct()
    {
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
 * Funcion abrir hilo
 * @return boolean
 */
    public function account_user($user_id)
    {
        $query = "CALL account_user($user_id);";

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
    public function account_verify_login($data)
    {
        $query = "CALL account_verify_login(                        
                        '$data[email]',
                        '$data[password]'
                    );";

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
    public function account_recovery($data)
    {
        $query = "CALL account_recovery(
                            '$data[email]',
                            '$data[activation]',
                            '$data[modified]'                                            
                    );";

        $result = $this->db->query($query);
        ///echo $this->db->last_query();
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
    public function account_verify_activation($activation)
    {
        $query = "CALL account_verify_activation(
                            '$activation'                                           
                    );";

        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        ///echo $this->db->last_query();
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
    public function account_new_password($data)
    {
        $query = "CALL account_new_password(
                            '$data[user_id]',                                           
                            '$data[password]'                                           
                    );";

        //mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        ///echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

    /**
     * Funcion para editar la informacion del usuario
     * @param $data
     * @return bool
     */
    public function account_edit($data)
    {
        $query = "CALL account_edit(
                            $data[user_id],                                           
                            '$data[name]',                                         
                            '$data[firstSurname]',                                         
                            '$data[secondSurname]',                                          
                            '$data[username]',                                           
                            '$data[phone]',                                           
                            '$data[password]'                                           
                    );";

        //mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

    /**
     * Funcion para obtener favoritos de usuario
     * @param $data
     * @return bool
     */
    public function user_favorite($data)
    {
        $query = "CALL user_favorite( '$data[lang]', $data[user_id] )";

        //mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }


    /**
     * Funcion para obtener categorias de video
     * @param $data
     * @return bool
     */
    public function get_category_video($data)
    {
        $query = "CALL get_category_video( '$data[lang]', $data[video_id] )";

        mysqli_next_result($this->db->conn_id);

        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /**
     * Funcion para obtener categorias de video
     * @param $data
     * @return bool
     */
    public function front_account_get_orders($data)
    {
        $query = "CALL front_account_get_orders( $data[user_id], $data[limit])";

        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /**
     * Funcion para obtener categorias de video
     * @param $data
     * @return bool
     */
    public function front_account_get_orders_videos($data)
    {
        $query = "CALL front_account_get_orders_videos( $data[order_id], '$data[lang]')";

        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /**
     * Funcion para obtener categorias de video
     * @param $data
     * @return bool
     */
    public function front_account_cancel_account($data)
    {
        $query = "CALL front_account_cancel_account( $data[user_id], '$data[reason]')";

        //mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

}

?>