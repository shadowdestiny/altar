<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_purchases extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
   * funcion para guardar la orden
   */
    public function time()
    {

        $query = "CALL time();";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /**
     * Funcion para recuperar detalle de los videos
     */
    public function get_videodetailpurchase($data)
    {

        if ($data['lang'] == 'es') {

            $query = "
            SELECT
                v.id,
                v.previewThumPath,
                ( 
                    SELECT 
                        text_spanish 
                    FROM 
                        text_language 
                    WHERE 
                        id = language_title_id 
                ) AS title,
                IFNULL(offerPrice, price) AS realPrice
            FROM
                video AS v
            WHERE
                v.id = $data[id_video]";

        } else if ($data['lang'] == 'en') {

            $query = "
            SELECT
                v.id,
                v.previewThumPath,
                ( 
                    SELECT 
                        text_english 
                    FROM 
                        text_language 
                    WHERE 
                        id = language_title_id 
                ) AS title,
                IFNULL(offerPrice, price) AS realPrice
            FROM
                video AS v
            WHERE
                v.id = $data[id_video]";

        }

        $result = $this->db->query($query);

        //
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * funcion para guardar la orden
    */
    public function front_purchases_save_order($data)
    {

        $query = "CALL front_purchases_save_order( 
                                        $data[user_id],
                                        '$data[order_number]',
                                        '$data[order_status]'
                                                );";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);

        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * funcion para guardar la orden
    */
    public function front_purchases_save_order_update($data)
    {

        $query = "CALL front_purchases_save_order_update( 
                                        $data[user_id],
                                        '$data[order_number]'
                                         );";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo para guardar los videos de la orden
    */
    public function front_purchase_order_video($data)
    {

        $query = "CALL front_purchase_order_video( 
                                        $data[order_id],
                                        $data[id_video],
                                        '$data[price]'
                                                );";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo para guardar los videos de la orden
    */
    public function front_purchases_clear_purchases_no_completed($data)
    {

        $query = "CALL front_purchases_clear_purchases_no_completed( 
                                        $data[user_id],
                                        '$data[order_number]'
                                        );";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo para guardar los videos de la orden
    */
    public function front_purchases_update_order_status($data)
    {

        if (isset($data['coupon_id']) && !is_null($data['coupon_id']) && !empty($data['coupon_id'])) {

            $query = "CALL front_purchases_update_order_status( 
                                        $data[user_id],
                                        '$data[order_number]',
                                        '$data[status]',
                                        '$data[total_to_paid]',
                                        $data[coupon_id]
                                        );";

        } else {
            $query = "CALL front_purchases_update_order_status( 
                                        $data[user_id],
                                        '$data[order_number]',
                                        '$data[status]',
                                        '$data[total_to_paid]',
                                       NULL
                                        );";
        }
        $coupon_id = NULL;


        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo para guardar los videos de la orden
    */
    public function front_purchases_validate_coupon_exist($coupon)
    {

        $query = "CALL front_purchases_validate_coupon_exist( 
                                        '$coupon'
                                        );";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo para guardar los videos de la orden
    */
    public function front_purchases_validate_coupon_used($coupon)
    {

        $query = "CALL front_purchases_validate_coupon_used( 
                                        '$coupon'
                                        );";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo para guardar los videos de la orden
    */
    public function front_purchases_get_coupon_by_id($coupon)
    {

        $query = "CALL front_purchases_get_coupon_by_id( 
                                        $coupon
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