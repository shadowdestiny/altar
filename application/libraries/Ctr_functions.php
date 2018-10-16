<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para utilizar fu
 */
class Ctr_functions extends CI_Controller
{
    private $CI;

    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library("session");
    }

    /**
     * Funcion para generar codigo de activacion
     * @param $size
     * @return string
     */
    public function generateCode($size)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $size; $i++)
            $key .= $pattern{mt_rand(0, $max)};
        return $key;
    }

    public function generate_order($size)
    {
        $key = 'ORDER-';
        $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $size; $i++)
            $key .= $pattern{mt_rand(0, $max)};
        return $key;
    }

    public function generate_coupon($size)
    {
        $key = 'CUPON-';
        $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $size; $i++)
            $key .= $pattern{mt_rand(0, $max)};
        return $key;
    }

    /**
     * Funcion para separar el nombre completo por secciones
     * primer nombre
     * segundo nombre
     * primer apellido
     * segundo apellido
     * @param $nombreCompleto
     * @return array
     */
    public function generateName($fullname = NULL)
    {
        $first_name = "";
        $second_name = "";
        $first_surname = "";
        $second_surname = "";

        if ($fullname != NULL) {
            $fullname = explode(" ", $fullname);

            if (isset($fullname[0]) && $fullname[0] != NULL) {
                $first_name = $fullname[0];
            }
            if (isset($fullname[1]) && $fullname[1] != NULL) {
                $second_name = $fullname[1];
            }
            if (isset($fullname[2]) && $fullname[2] != NULL) {
                $first_surname = $fullname[2];
            }
            if (isset($fullname[3]) && $fullname[3] != NULL) {
                $second_surname = $fullname[3];
            }

        }


        return [$first_name, $second_name, $first_surname, $second_surname];
    }

    public function get_format_date($date_db,$language)
    {

        $date = date("j *** Y", strtotime($date_db));
        $month_number = date("m", strtotime($date_db));

        $language = "es";
        switch ($language){
            case "es":
                switch ($month_number){
                    case "01":
                        $month_string = "Enero";
                        break;
                    case "02":
                        $month_string = "Febrero";
                        break;
                    case "03":
                        $month_string = "Marzo";
                        break;
                    case "04":
                        $month_string = "Abril";
                        break;
                    case "05":
                        $month_string = "Mayo";
                        break;
                    case "06":
                        $month_string = "Junio";
                        break;
                    case "07":
                        $month_string = "Julio";
                        break;
                    case "08":
                        $month_string = "Agosto";
                        break;
                    case "09":
                        $month_string = "Septiembre";
                        break;
                    case "10":
                        $month_string = "Octubre";
                        break;
                    case "11":
                        $month_string = "Noviembre";
                        break;
                    case "12":
                        $month_string = "Diciembre";
                        break;
                }

                $date = str_replace("***",$month_string,$date);

                break;
            default :
                $date = date("j F Y", strtotime($date_db));
                break;
        }

        return $date;
    }

    /**
     * Funcion para generar la sesion
     * @param array $params
     */
    public function generate_session($params = array())
    {


        if (!empty($params)) {
            $this->CI->session->set_userdata($params);
            //redirect($params['redirect'], 'refresh');
        }

        return TRUE;

    }

    /**
     * Funcion para generar la sesion
     * @param array $params
     */
    public function destroy_session($params = array())
    {
        if (!empty($params)) {
            $this->CI->session->unset_userdata($params);
            //redirect($params['redirect'], 'refresh');
        }

    }

    /**
     * Funcion para generar la edad apartir de una fecha
     * @param type $data_bith
     * @return type
     */
    public function generateBirthday($data_bith)
    {

        $fecha = strtotime($data_bith['year'] . '-' . $data_bith['month'] . '-' . $data_bith['day']);
        $formatDay = date('Y-m-d', $fecha);
        $current_day = date('Y-m-d');
        $diff = abs(strtotime($current_day) - strtotime($formatDay));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        return [$formatDay, $years];
    }

    /**
     * Funcion para formar la fecha
     * @param $data_date
     * @return false|string
     */
    public function generateDate($data_date)
    {

        $fecha = strtotime($data_date['year'] . '-' . $data_date['month'] . '-' . $data_date['day']);
        $formatDay = date('Y-m-d H:i:s', $fecha);

        return $formatDay;
    }

    /**
     * Funcion para limpiar String
     * @param $text
     * @return mixed|string
     */
    public function cleanString($text)
    {
        $html = '';

        if ($text != NULL) {

            $text = trim($text);
            $html = str_replace("'", "\´", $text);
        }

        return $html;
    }

    /**
     * Esta funcion minutos_transcurridos() se encarga de verificar la fecha de modificacion con la fecha de hoy y devuelve
     * los minutos transcurridos
     * @param type $fecha_inicial
     * @param type $fecha_final
     * @return type int $minutos
     */
    public function minutos_transcurridos($fecha_inicial, $fecha_final)
    {

        $minutos = (strtotime($fecha_inicial) - strtotime($fecha_final)) / 60;

        if ($minutos >= 0) {

            $minutos = abs($minutos);
            $minutos = floor($minutos);
        } else {
            $minutos = 0;
        }
        return (int)$minutos;
    }


}

