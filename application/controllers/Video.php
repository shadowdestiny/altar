<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Funcion para mostrar video
     * @param $id
     * @throws Exception
     * @return video
     */
    private function show_video($id)
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
     * Funcion para la configuracion de VIMEO API
     * @return Vimeo
     * @throws Exception
     */
    private function config_vimeo()
    {
        $config = require('../vimeo/example/init.php');
        if (empty($config['access_token'])) {
            throw new Exception('You can not upload a file without an access token. You can find this token on your app page, or generate one using auth.php');
        }
        $lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);
        return $lib;
    }


}
