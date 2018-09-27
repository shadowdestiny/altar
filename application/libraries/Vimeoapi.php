<?php
defined("BASEPATH") or die("El acceso al script no está permitido");

use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;

/**
 * Class Video
 *
 * Esta clase esta encargada de inicializar la configuracion
 *
 * @autor Ricardo Daniel Carrada <rdcarrada@gmail.com>
 *
 */
class Vimeoapi
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

    }

    /**
     * Funcion para la configuracion de VIMEO API
     * @return Vimeo
     * @throws Exception
     */
    public function config_vimeo()
    {
        $config = require(FCPATH .'/vimeo/example/init.php');
        if (empty($config['access_token'])) {
            throw new Exception('You can not upload a file without an access token. You can find this token on your app page, or generate one using auth.php');
        }
        $lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);
        return $lib;
    }

    /**
     * Funcion para mostrar video
     * @param $id
     * @throws Exception
     * @return video
     */
    public function show_video($id)
    {
        $lib = $this->config_vimeo();
        $me = $lib->request("/me$id");
        $embed = $me["body"];

        if (isset($embed['error'])) {
            $embed['embed']['html'] = $embed['error'];
        }

        return $embed['embed']['html'];
    }

    /**
     * Funcion para descargar videos Validos
     * @param $id
     * @return mixed
     */
    public function download_video($vimeo_id = NULL)
    {
        $params_return = [];

        if (!is_null($vimeo_id)) {
            $lib = $this->config_vimeo();
            $me = $lib->request("/me$vimeo_id");
            $download = $me["body"];


            if (!isset($embed['error'])) {

                if (isset($download['privacy']['download'])) {

                    $count_video_resolution = count($download['download']);

                    if ($count_video_resolution > 0) {

                        $count_video_resolution = $count_video_resolution - 1;

                        $download_video = $download['download'][$count_video_resolution];
                        $params_return['expires'] = $download_video['expires'];
                        $params_return['resolution_width'] = $download_video['width'];
                        $params_return['resolution_height'] = $download_video['height'];
                        $params_return['resolution_link'] = $download_video['link'];
                        $params_return['resolution_size'] = $download_video['size'];

                    } else {
                        $params_return['error'] = "No existe video";
                    }

                } else {
                    $params_return['error'] = "No puede descargar el video";
                }

            } else {
                $params_return['error'] = $download['error'];

            }

        }

        return $params_return;
    }


}