<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_product extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
    * Metodo para obtener detalle de video
    */
    public function index_product( $data ) {

        $query = "CALL detail_video( '$data[lang]', $data[id_user], $data[id_video] );";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo para obtener detalle de video
    */
    public function index_product_without_session( $data ) {

        $query = "CALL index_product_without_session( '$data[lang]', $data[id_video] );";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo mostrar las categorias del video
    */
    public function categorys_video( $data ) {

        $query = "CALL categorys_video( '$data[lang]', $data[id_video] );";

        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo mostrar las recomendaciones
    */
    public function recommendations_video( $data ) {

        $query = "CALL recommendations_video( '$data[lang]', $data[id_video] );";

        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo mostrar las recomendaciones
    */
    public function autor_video( $data ) {

        $query = "CALL autor_video( '$data[lang]', $data[id_video], $data[id_autor] );";

        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo mostrar las recomendaciones
    */
    public function front_product_comment_list( $data ) {

        $query = "CALL front_product_comment_list($data[id_video] );";

        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }

    /*
    * Metodo mostrar las recomendaciones
    */
    public function front_product_add_comment( $data ) {

        $query = "CALL front_product_add_comment( 
                                        $data[rating],
                                        '$data[comment]',
                                        $data[video_id],
                                        $data[user_id]
                                                );";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result_array();
        else
            return array();
    }


}

?>