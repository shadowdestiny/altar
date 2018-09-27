<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_filtervideo extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /*
    * Metodo para realizar busqueda de los filtros
    */
    public function index_filter($data)
    {

        $where = '';

        if ($data['videoTitle'] != '' || $data['videoCategory'] != '') {
            $where .= " WHERE ";
        }

        if ($data['videoTitle'] != '') {

            if ($data['lang'] == 'es')
                $where .= "tl.text_spanish like '%$data[videoTitle]%'";

            if ($data['lang'] == 'en')
                $where .= "tl.text_english like '%$data[videoTitle]%'";

        }
        $left_category = "";
        if ($data['videoCategory'] != '') {

            if ($data['videoTitle'] != '')
                $where .= ' AND ';

            $where .= "chv.category_id = $data[videoCategory]";
            $left_category .= "LEFT JOIN category_has_video AS chv ON v.id = chv.video_id";
        }

        if (empty($where)) {
            $where .= " WHERE status = 1
                        AND isfree = 0";
        } else {
            $where .= " AND status = 1
                        AND isfree = 0";
        }

        $query = "
            SELECT 
                allt.*,
                (
                    SELECT count(*) 
                    FROM (video AS v 
                        LEFT JOIN text_language AS tl ON v.language_title_id = tl.id)  
                    $left_category         
                    $where
                ) AS totalRow 
            FROM(
            SELECT
                v.id,
                v.previewThumPath,
                tl.text_spanish,
                tl.text_english,
                IFNULL(v.offerPrice, v.price) AS price
                FROM (
                        video AS v 
                        LEFT JOIN text_language AS tl ON v.language_title_id = tl.id
                    )
                    LEFT JOIN category_has_video AS chv ON v.id = chv.video_id
                $where
            GROUP BY
                v.id, v.previewThumPath, tl.text_spanish, tl.text_english, v.price, v.offerPrice 
                LIMIT $data[limit]
            ) AS allt
                ;";

        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /**
     * Funcion para consultar en la base de datos los videos
     * @param $data
     * @return array
     */
    public function index_filter_paginate($data)
    {

        $where = '';

        if (trim($data['videoTitle']) != '' || trim($data['videoCategory']) != '') {
            $where .= " WHERE ";
        }

        if (trim($data['videoTitle']) != '') {

            if (trim($data['lang']) == 'es')
                $where .= "tl.text_spanish like '%$data[videoTitle]%'";

            if (trim($data['lang']) == 'en')
                $where .= "tl.text_english like '%$data[videoTitle]%'";

        }
        $left_category = "";
        if (trim($data['videoCategory']) != '') {

            if (trim($data['videoTitle']) != '')
                $where .= ' AND ';

            $where .= "chv.category_id = $data[videoCategory]";
            $left_category .= "LEFT JOIN category_has_video AS chv ON v.id = chv.video_id";
        }
        if (empty($where)) {
            $where .= " WHERE status = 1
                        AND isfree = 0";
        } else {
            $where .= " AND status = 1
                        AND isfree = 0";
        }

        $query = "
            SELECT 
                allt.*,
                (
                    SELECT count(*) 
                    FROM (video AS v 
                        LEFT JOIN text_language AS tl ON v.language_title_id = tl.id)  
                       $left_category  
                    $where
                ) AS totalRow 
            FROM(
            SELECT
                v.id,
                v.previewThumPath,
                tl.text_spanish,
                tl.text_english,
                v.price,
                v.offerPrice
                FROM (
                        video AS v 
                        LEFT JOIN text_language AS tl ON v.language_title_id = tl.id
                    )
                    LEFT JOIN category_has_video AS chv ON v.id = chv.video_id
                $where
            GROUP BY
                v.id, v.previewThumPath, tl.text_spanish, tl.text_english, v.price, v.offerPrice 
                LIMIT $data[_start], $data[_limit]
            ) AS allt
                ;";
        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }


    /**
     * Funcion para mostrar la informacion por ID
     * @param $data
     * @return array
     */
    public function front_filtervideo_quickview($data)
    {

        $query = "CALL front_filtervideo_quickview($data[id], '$data[lang]');";

        $result = $this->db->query($query);
        //echo $this->db->last_query();
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();

    }

    /*
    * Metodo para mostrar los video mas vendidos
    */
    public function view_more_sold($data)
    {

        $query = "CALL view_more_sold( '$data[lang]' );";
        //mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
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
        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);

        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    //metodo que va a cargar la informacion de las vistas
     public function categorys_video( $data ) {

        $query = "CALL categorys_video( '$data[lang]', $data[video_id] );";

        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }
    //metodo que va a cargar la informacion de las vistas
     public function categorys_video_search( $data ) {

         $query = "CALL categorys_video_search( '$data[lang]' );";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }


}

?>