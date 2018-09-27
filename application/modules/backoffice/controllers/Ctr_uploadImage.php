<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;


class Ctr_uploadImage extends CI_Controller
{

    private $image_path = 'assets/images/videos/';
    private $image_path_thumb = 'assets/images/videos/thumbs/';
    private $image_blog_path = 'assets/images/blogs/';
    private $image_blog_path_thumb = 'assets/images/blogs/thumbs/';
    private $image_adv_path = 'assets/images/advs/';
    private $image_adv_path_thumb = 'assets/images/advs/thumbs/';
    private $image_content_path = 'assets/images/content/';
    private $image_content_path_thumb = 'assets/images/content/thumbs/';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_video');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->helper('url');
    }

    /**
     * Funcion para asignar la configuracion de la imagen al momento de subir
     * @param $newName
     * @return array
     */
    private function set_upload_options($newName)
    {
        //upload an image options
        $config = [];
        $config['upload_path'] = $this->image_path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '5000';
        $config['file_name'] = $newName;
        $config['overwrite'] = FALSE;

        return $config;
    }

    /**
     * Funcion para asignar la configuracion de la imagen al momento de subir
     * @param $newName
     * @return array
     */
    private function set_upload_blog_options($newName)
    {
        //upload an image options
        $config = [];
        $config['upload_path'] = $this->image_blog_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '5000';
        $config['file_name'] = $newName;
        $config['overwrite'] = FALSE;

        return $config;
    }

    /**
     * Funcion para asignar la configuracion de la imagen al momento de subir
     * @param $newName
     * @return array
     */
    private function set_upload_adv_options($newName)
    {
        //upload an image options
        $config = [];
        $config['upload_path'] = $this->image_adv_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '5000';
        $config['file_name'] = $newName;
        $config['overwrite'] = FALSE;

        return $config;
    }

    /**
     * Funcion para asignar la configuracion de la imagen al momento de subir
     * @param $newName
     * @return array
     */
    private function set_upload_content_options($newName)
    {
        //upload an image options
        $config = [];
        $config['upload_path'] = $this->image_content_path;
        $config['allowed_types'] = 'jpg|jpeg|png|mp4';
        $config['max_size'] = '50000000';
        $config['file_name'] = $newName;
        $config['overwrite'] = FALSE;

        return $config;
    }

    /**
     * Funcion para cargar la imagen
     */
    public function upload_image()
    {
        $file = 'imageTemp';
        $nameFile = $_FILES[$file]["name"];
        $exploded = explode('.', $nameFile);
        $extention = end($exploded);

        $newName = "Image-" . rand(1, 99999);
        $this->load->library('upload', $this->set_upload_options($newName));

        if ($this->upload->do_upload($file)) {
            $this->generate_thumbnail($newName, $extention);
            $nameImage = $newName . "_thumb." . $extention;

            $newImage = "<div class='image view view-first'>
                        <a href='#' class='remove_image'>X</a>
                        <img style='width: 100%; display: block;' src='" . URL_IMAGES . "videos/thumbs/$nameImage' alt='Imagen'/>
                    </div>
                    <input type='hidden' id='image_name' name='image_name' value='" . $newName . "." . $extention . "'>
                    <input type='hidden' id='image_name_preview' name='image_name_preview' value='" . $newName . "_thumb." . $extention . "'>
                    ";
        } else {
            $newImage = $this->upload->display_errors();
        }

        echo json_encode(['response' => TRUE, 'ImagePreview' => $newImage]);
    }

    /**
     * Funcion para cargar la imagen
     */
    public function upload_image_blog()
    {
        $file = 'imageTemp';
        $nameFile = $_FILES[$file]["name"];
        $exploded = explode('.', $nameFile);
        $extention = end($exploded);

        $newName = "Image-" . rand(1, 99999);
        $this->load->library('upload', $this->set_upload_blog_options($newName));

        if ($this->upload->do_upload($file)) {
            $this->generate_thumbnail_blog($newName, $extention);
            $nameImage = $newName . "_thumb." . $extention;

            $newImage = "<div class='image view view-first'>
                        <a href='#' class='remove_image'>X</a>
                        <img style='width: 100%; display: block;' src='" . URL_IMAGES . "blogs/thumbs/$nameImage' alt='Imagen'/>
                    </div>
                    <input type='hidden' id='image_name' name='image_name' value='" . $newName . "." . $extention . "'>
                    <input type='hidden' id='image_name_preview' name='image_name_preview' value='" . $newName . "_thumb." . $extention . "'>
                    ";
        } else {
            $newImage = $this->upload->display_errors();
        }

        echo json_encode(['response' => TRUE, 'ImagePreview' => $newImage]);
    }

    /**
     * Funcion para cargar la imagen
     */
    public function upload_image_adv_es()
    {
        $file = 'imageTemp';
        $nameFile = $_FILES[$file]["name"];
        $exploded = explode('.', $nameFile);
        $extention = end($exploded);

        $newName = "Image-" . rand(1, 99999);
        $this->load->library('upload', $this->set_upload_adv_options($newName));

        if ($this->upload->do_upload($file)) {
            $this->generate_thumbnail_adv($newName, $extention);
            $nameImage = $newName . "_thumb." . $extention;

            $newImage = "<div class='image view view-first'>
                        <a href='#' class='remove_image'>X</a>
                        <img style='width: 100%; display: block;' src='" . URL_IMAGES . "advs/thumbs/$nameImage' alt='Imagen'/>
                    </div>
                    <input type='hidden' id='image_name_es' name='image_name_es' value='" . $newName . "." . $extention . "'>
                    <input type='hidden' id='image_name_preview_es' name='image_name_preview_es' value='" . $newName . "_thumb." . $extention . "'>
                    ";
        } else {
            $newImage = $this->upload->display_errors();
        }

        echo json_encode(['response' => TRUE, 'ImagePreview' => $newImage]);
    }

    /**
     * Funcion para cargar la imagen
     */
    public function upload_image_adv_en()
    {
        $file = 'imageTemp';
        $nameFile = $_FILES[$file]["name"];
        $exploded = explode('.', $nameFile);
        $extention = end($exploded);

        $newName = "Image-" . rand(1, 99999);
        $this->load->library('upload', $this->set_upload_adv_options($newName));

        if ($this->upload->do_upload($file)) {
            $this->generate_thumbnail_adv($newName, $extention);
            $nameImage = $newName . "_thumb." . $extention;

            $newImage = "<div class='image view view-first'>
                        <a href='#' class='remove_image'>X</a>
                        <img style='width: 100%; display: block;' src='" . URL_IMAGES . "advs/thumbs/$nameImage' alt='Imagen'/>
                    </div>
                    <input type='hidden' id='image_name_en' name='image_name_en' value='" . $newName . "." . $extention . "'>
                    <input type='hidden' id='image_name_preview_en' name='image_name_preview_en' value='" . $newName . "_thumb." . $extention . "'>
                    ";
        } else {
            $newImage = $this->upload->display_errors();
        }

        echo json_encode(['response' => TRUE, 'ImagePreview' => $newImage]);
    }

    /**
     * Funcion para cargar la imagen
     */
    public function upload_image_content()
    {
        $file = 'imageTemp';
        $nameFile = $_FILES[$file]["name"];
        $exploded = explode('.', $nameFile);
        $extention = end($exploded);

        $newName = "Image-" . rand(1, 99999);
        $this->load->library('upload', $this->set_upload_content_options($newName));

        if ($this->upload->do_upload($file)) {

            if ($extention != "mp4") {
                $this->generate_thumbnail_content($newName, $extention);
                $nameImage = $newName . "_thumb." . $extention;

                $newImage = "<div class='image view view-first'>
                                <a href='#' class='remove_image'>X</a>
                                <img style='width: 30%; display: block;' src='" . URL_IMAGES . "content/thumbs/$nameImage' alt='Imagen'/>
                            </div>
                    <input type='hidden' id='image_name' name='image_name' value='" . $newName . "." . $extention . "'>
                    <input type='hidden' id='image_name_preview' name='image_name_preview' value='" . $newName . "_thumb." . $extention . "'>
                    ";
            } else {
                $video = $newName . "." . $extention;

                $newImage = "<div class='image view view-first'>
                                <a href='#' class='remove_image'>X</a>
                                <video width='350' controls>
                                  <source src='" . URL_IMAGES . "content/$video' type='video/mp4'>
                                  Your browser does not support HTML5 video.
                                </video>
                            </div>
                    <input type='hidden' id='image_name' name='image_name' value='" . $video . "'>
                    <input type='hidden' id='image_name_preview' name='image_name_preview' value='" . $video . "'>
                    ";
            }

        } else {
            $newImage = $this->upload->display_errors();
        }

        echo json_encode(['response' => TRUE, 'ImagePreview' => $newImage]);
    }


    /**
     * Esta funcion genera el thumbnail de la imagen
     * @param type $imageToResize
     * @param type $extentionImage
     * @return boolean
     */
    public function generate_thumbnail($imageToResize, $extentionImage)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->image_path . $imageToResize . '.' . $extentionImage;
        $config['new_image'] = $this->image_path_thumb . $imageToResize . '.' . $extentionImage;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 300;
        $config['height'] = 300;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    /**
     * Esta funcion genera el thumbnail de la imagen
     * @param type $imageToResize
     * @param type $extentionImage
     * @return boolean
     */
    public function generate_thumbnail_blog($imageToResize, $extentionImage)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->image_blog_path . $imageToResize . '.' . $extentionImage;
        $config['new_image'] = $this->image_blog_path_thumb . $imageToResize . '.' . $extentionImage;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 300;
        $config['height'] = 300;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    /**
     * Esta funcion genera el thumbnail de la imagen
     * @param type $imageToResize
     * @param type $extentionImage
     * @return boolean
     */
    public function generate_thumbnail_adv($imageToResize, $extentionImage)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->image_adv_path . $imageToResize . '.' . $extentionImage;
        $config['new_image'] = $this->image_adv_path_thumb . $imageToResize . '.' . $extentionImage;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 300;
        $config['height'] = 300;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    /**
     * Esta funcion genera el thumbnail de la imagen
     * @param type $imageToResize
     * @param type $extentionImage
     * @return boolean
     */
    public function generate_thumbnail_content($imageToResize, $extentionImage)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->image_content_path . $imageToResize . '.' . $extentionImage;
        $config['new_image'] = $this->image_content_path_thumb . $imageToResize . '.' . $extentionImage;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 300;
        $config['height'] = 300;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

}
