<?php

if (!defined('BASEPATH'))
    exit('Acceso Denegado');

class Mdl_aboutus extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function about_get_info()
    {
        $query = "CALL about_get_info();";

        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result;
        else
            return false;
    }

    /**
     * Funcion para actualizar la informacion de acerca de nosotros
     * @return bool
     */
    public function backoffice_aboutus_update($data)
    {

        $image = $data[0]['image'];
        $image_thumb = $data[0]['image_thumb'];

        $i = 0;
        foreach ($data as $columna) {

            $id = $data[$i]['infoid'];
            $tle_esp = $data[$i]['tle_esp'];
            $tle_eng = $data[$i]['tle_eng'];
            $cnt_esp = $data[$i]['cnt_esp'];
            $cnt_eng = $data[$i]['cnt_eng'];



            $query = "CALL backoffice_aboutus_update(
                                        $id,
                                        '$tle_esp',
                                        '$tle_eng',
                                        '$cnt_esp',
                                        '$cnt_eng',
                                        '$image',
                                        '$image_thumb'
                                        );";

            $result = $this->db->query($query);
            mysqli_next_result($this->db->conn_id);
            $i++;
        }
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return false;
        }
    }


}

?>