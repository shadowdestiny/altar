<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_video extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function time()
    {
        $query = "CALL time();";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }


    /**
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_video_list()
    {
        $query = "CALL backoffice_video_list();";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result; else return false;
    }

    /**
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_video_byid($id)
    {
        $data_video = [];
        $query = "CALL backoffice_video_byid($id);";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0) {
            $data_video = $result->result_array();
            $video_id = $data_video[0]['id'];

            $query_category = "CALL backoffice_video_listcategory_byvideo($video_id);";

            $result_category = $this->db->query($query_category);
            mysqli_next_result($this->db->conn_id);
            if ($result_category->num_rows() > 0) {
                $data_video[0]['category'] = $result_category->result_array();
            }

            return $data_video;
        } else {
            return false;
        }
    }

    /**
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_video_listcategory_byvideo($video_id)
    {
        $query = "CALL backoffice_video_listcategory_byvideo($video_id);";
        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result; else return false;
    }

    /**
     * MOdelo para guardar el video del metodo ADD
     * @param $data
     * @return bool
     */
    public function backoffice_video_category_list()
    {
        $query = "CALL backoffice_video_category_list();";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array(); else return false;
    }

    /**
     * MOdelo para guardar el video del metodo ADD
     * @param $data
     * @return bool
     */
    public function backoffice_video_category_list_edit()
    {
        $query = "CALL backoffice_video_category_list();";

        $result = $this->db->query($query);
        mysqli_next_result($this->db->conn_id);
        if ($result->num_rows() > 0)
            return $result->result_array(); else return false;
    }

    /**
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_video_save($data)
    {
        $query = "CALL backoffice_video_save(
                                    '$data[sku]',
                                    '$data[vimeo_id]', 
                                    '$data[vimeo_preview_id]',
                                    '$data[image_name]', 
                                    '$data[image_name_preview]', 
                                    '$data[price]', 
                                    '$data[price_offer]', 
                                    '$data[title_es]', 
                                    '$data[intro_es]', 
                                    '$data[description_es]', 
                                    '$data[title_en]', 
                                    '$data[intro_en]', 
                                    '$data[description_en]', 
                                    '$data[format_video]',
                                    $data[is_free],
                                    $data[autor_video]
                                    );";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result; else return false;
    }

    /**
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_video_delete_text($video_id)
    {
        $query = "CALL backoffice_video_delete_text(
                                    $video_id
                                    );";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result; else return false;
    }

    /**
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_video_delete_category($video_id)
    {
        $query = "CALL backoffice_video_delete_category(
                                    $video_id                                    
                                    );";
        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result; else return false;
    }

    /**
     * MOdelo para guardar el video
     * @param $data
     * @return bool
     */
    public function backoffice_video_update($data)
    {
        $query = "CALL backoffice_video_update(
                                    '$data[video_id]',
                                    '$data[image_name]', 
                                    '$data[image_name_preview]', 
                                    '$data[price]', 
                                    '$data[price_offer]', 
                                    '$data[title_es]', 
                                    '$data[intro_es]', 
                                    '$data[description_es]', 
                                    '$data[title_en]', 
                                    '$data[intro_en]', 
                                    '$data[description_en]', 
                                    '$data[format_video]',
                                    '$data[modified]',
                                    $data[is_free],
                                    $data[autor_video]
                                    );";
        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result; else return false;
    }

    /**
     * MOdelo para guardar las categorias por video
     * @param $data
     * @return bool
     */
    public function backoffice_video_save_category($data)
    {
        $query = "CALL backoffice_video_save_category(
                                    $data[video_id], 
                                    $data[category_id]
                                    );";
        mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result; else return false;
    }

    /**
     * MOdelo para guardar las categorias por video
     * @param $data
     * @return bool
     */
    public function backoffice_video_delete($video_id)
    {
        $query = "CALL backoffice_video_delete(
                                    $video_id                                  
                                     );";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result; else return false;
    }

    /**
     * MOdelo para guardar las categorias por video
     * @param $data
     * @return bool
     */
    public function backoffice_validate_exit_free()
    {
        $query = "CALL backoffice_validate_exit_free();";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result; else return false;
    }

    /**
     * MOdelo para guardar las categorias por video
     * @param $data
     * @return bool
     */
    public function backoffice_validate_exit_free_edit($video_id)
    {
        $query = "CALL backoffice_validate_exit_free_edit($video_id);";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result; else return false;
    }


}

?>