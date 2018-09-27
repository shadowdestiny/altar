<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;


class Ctr_video extends CI_Controller
{

    private $image_path = 'assets/images/videos/';
    private $image_path_thumb = 'assets/images/videos/thumbs/';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_video');
        $this->load->model('Mdl_autor');
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->helper('url');
    }

    /**
     * Funcion para mostrar el index y nuestra un listado de los usuario
     */
    public function index()
    {
        if (!$this->session->userdata('loginFlag')) {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');
        } else {

            $result = $this->Mdl_video->backoffice_video_list();
            $data['table'] = "";
            if ($result) {
                $result_category = $this->Mdl_video->backoffice_video_listcategory_byvideo($result->result()[0]->id);

                $data['table'] = $this->format_video($result, $result_category);
            }


            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_video/vw_index', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_video/include/video_indexjs');
        }

    }

    /**
     * Funcion para mostrar el index y nuestra un listado de los usuario
     */
    public function add()
    {
        if ($this->session->userdata('loginFlag')) {

            $result = $this->Mdl_video->backoffice_video_category_list();
            $data['category'] = $this->format_category_select($result);
            $data['autors'] = $this->list_autors($result);

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_video/vw_add', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_video/include/video_addjs');
        } else {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');

        }

    }

    /**
     * Funcion para listar los autores
     * @return string
     */
    private function list_autors($autor_id = NULL)
    {

        $result = $this->Mdl_autor->backoffice_autor_list();

        $autors = "";
        if (!empty($result)) {

            foreach ($result AS $key => $value) {
                $autors .= "<option value='" . $value['id'] . "' ";

                if (!is_null($autor_id)) {
                    if ($autor_id == (int)$value['id']) {
                        $autors .= " selected";
                    }
                }


                $autors .= ">" . $value['name'] . "</option>";
            }

        }
        return $autors;
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
            //$embed['embed']['html']
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
        $config = require('./vimeo/example/init.php');
        if (empty($config['access_token'])) {
            throw new Exception('You can not upload a file without an access token. You can find this token on your app page, or generate one using auth.php');
        }
        $lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);
        return $lib;
    }

    /**
     * Funcion para editar la informacion del video
     */
    public function edit($id)
    {
        if ($this->session->userdata('loginFlag')) {

            $result = $this->Mdl_video->backoffice_video_byid($id);
            $result_category = $this->Mdl_video->backoffice_video_category_list_edit();

            $data = [];
            if (!empty($result)) {

                $data['id'] = $result[0]['id'];
                $data['sku'] = $result[0]['sku'];
                $data['vimeo_id'] = $this->show_video($result[0]['vimeo_id']);
                $data['vimeoPreview_id'] = $this->show_video($result[0]['vimeoPreview_id']);
                $data['previewPath'] = $result[0]['previewPath'];
                $data['previewThumPath'] = $result[0]['previewThumPath'];
                $data['price'] = $result[0]['price'];
                $data['offerPrice'] = $result[0]['offerPrice'];
                $data['format'] = $result[0]['format'];
                $data['isfree'] = $result[0]['isfree'];
                $data['category'] = $this->format_category_select($result_category, $result[0]['category']);
                $data['title_es'] = $result[0]['title_es'];
                $data['title_en'] = $result[0]['title_en'];
                $data['intro_es'] = $result[0]['intro_es'];
                $data['intro_en'] = $result[0]['intro_en'];
                $data['descrip_es'] = $result[0]['descrip_es'];
                $data['descrip_en'] = $result[0]['descrip_en'];
                $data['autors'] = $this->list_autors($result[0]['id_autor']);

            }

            $this->load->view('include/back/head');
            $this->load->view('include/back/top_nav');
            $this->load->view('include/back/left_nav');
            $this->load->view('vw_video/vw_edit', $data);
            $this->load->view('include/back/script_footer');
            $this->load->view('vw_video/include/video_editjs');
        } else {
            $uri = ROOT_URL_BACK . 'Ctr_index';
            redirect($uri, 'refresh');

        }

    }


    /**
     * Funcion para dar formato al select de categorias
     * @param array $result
     * @return string
     */
    protected function format_category_select($result = array(), $result_second = array())
    {

        $category = "";
        if (!empty($result)) {

            $category .= "<select class='form-group selectpicker' name='data_category[]' id='data_category' multiple data-selected-text-format='count > 3'>";

            foreach ($result AS $key => $value) {

                $category .= "<option value='" . $value['id'] . "' ";

                if (isset($result_second) && !empty($result_second)) {

                    foreach ($result_second AS $key_second => $value_second) {

                        if ($value_second['id'] == $value['id']) {
                            $category .= " selected";
                        }
                    }
                }
                $category .= ">" . $value['name_es'] . "</option>";

            }

            $category .= "</select>";
        }

        return $category;
    }

    /**
     * Funcion para guardar el video
     * Se implemento el API de VIMEO
     */
    public function save_video()
    {
        ini_set('MAX_EXECUTION_TIME', -1);
        /*
           post_max_size = 750M
           upload_max_filesize = 750M
           max_execution_time = 5000
           max_input_time = 5000
           memory_limit = 1000M
       */

        $video = [];
        $video_p = [];
        $video_full = $_FILES['video_full'];
        $video_preview = $_FILES['video_preview'];
        $data_conditions = [];
        $data_save = [];
        $response = FALSE;
        $message = "";

        /**
         * Data POST
         */
        $date = date('Y-m-d');

        $data_save['sku'] = $date . '-' . $this->generateCode(6);

        $data_save['category'] = $this->input->post('category');
        $data_save['is_free'] = $this->input->post('is_free');

        $data_save['title_es'] = $this->cleanString($this->input->post('title_es'));
        $data_save['intro_es'] = $this->cleanString($this->input->post('intro_es'));
        $data_save['description_es'] = $this->cleanString($this->input->post('description_es'));

        $data_save['title_en'] = $this->cleanString($this->input->post('title_en'));
        $data_save['intro_en'] = $this->cleanString($this->input->post('intro_en'));
        $data_save['description_en'] = $this->cleanString($this->input->post('description_en'));

        $data_save['price'] = $this->input->post('price');
        $data_save['price_offer'] = $this->input->post('price_offer');
        $data_save['image_name'] = $this->input->post('image_name');
        $data_save['image_name_preview'] = $this->input->post('image_name_preview');
        $data_save['format_video'] = $this->input->post('format_video');
        $data_save['autor_video'] = (int)$this->input->post('autor_video');

        if (!empty($video_full)) {
            $video['video'] = $video_full;
            $data_save['download'] = TRUE;

            if ($data_save['is_free'] == 1) {
                $data_save['download'] = TRUE;
            }

            $data_conditions['vimeo_id'] = $this->upload_vimeo($video, $data_save);

            if (!empty($video_preview)) {
                $video_p['video'] = $video_preview;
                $data_save['download'] = TRUE;
                $data_conditions['vimeo_preview_id'] = $this->upload_vimeo($video_p, $data_save);
            }

            if (!empty($data_conditions['vimeo_id']) && !empty($data_conditions['vimeo_preview_id'])) {

                $data_save['vimeo_id'] = $data_conditions['vimeo_id'];
                $data_save['vimeo_preview_id'] = $data_conditions['vimeo_preview_id'];

                $result = $this->Mdl_video->backoffice_video_save($data_save);

                if ($result->result()[0]->flag_save) {

                    $video_id = $result->result()[0]->video_id;

                    $category_array = explode(',', $data_save['category']);

                    foreach ($category_array AS $key_category => $value_category) {

                        $data_save_category = ['video_id' => $video_id, 'category_id' => $value_category];
                        $result_category = $this->Mdl_video->backoffice_video_save_category($data_save_category);

                        if ($result_category->result()[0]->save_video_category) {
                            $response = TRUE;
                            $message = "El video se registro con exito";
                        } else {
                            $message = "Error al guardar las categorias del video";
                        }
                    }
                } else {
                    $message = "Error al guardar el video.";
                }

            } else {
                $message = "Error al subir los videos.";
            }
        } else {
            $message = "Es necesario seleccionar el video preview y el video FULL HD.";
        }

        echo json_encode(['response' => $response, 'message' => $message]);
    }

    /**
     * Funcion para actualizar video
     * Se implemento el API de VIMEO
     */
    public function update_video()
    {
        $video = [];
        $video_p = [];
        $data_conditions = [];
        $data_save = [];
        $response = FALSE;
        $message = "";

        /**
         * Data POST
         */
        $data_save['modified'] = date('Y-m-d');

        $data_save['video_id'] = $this->input->post('video_id');

        $data_save['category'] = $this->input->post('category');
        $data_save['is_free'] = $this->input->post('is_free');

        $data_save['title_es'] = $this->cleanString($this->input->post('title_es'));
        $data_save['intro_es'] = $this->cleanString($this->input->post('intro_es'));
        $data_save['description_es'] = $this->cleanString($this->input->post('description_es'));

        $data_save['title_en'] = $this->cleanString($this->input->post('title_en'));
        $data_save['intro_en'] = $this->cleanString($this->input->post('intro_en'));
        $data_save['description_en'] = $this->cleanString($this->input->post('description_en'));

        $data_save['price'] = $this->input->post('price');
        $data_save['price_offer'] = $this->input->post('price_offer');
        $data_save['image_name'] = $this->input->post('image_name');
        $data_save['image_name_preview'] = $this->input->post('image_name_preview');
        $data_save['format_video'] = $this->input->post('format_video');
        $data_save['autor_video'] = (int)$this->input->post('autor_video');


        if (!empty($data_save)) {

            $this->Mdl_video->backoffice_video_delete_text($data_save['video_id']);
            $this->Mdl_video->backoffice_video_delete_category($data_save['video_id']);

            $result = $this->Mdl_video->backoffice_video_update($data_save);

            if ($result->result()[0]->flag_update) {

                $video_id = $data_save['video_id'];

                $category_array = explode(',', $data_save['category']);

                foreach ($category_array AS $key_category => $value_category) {

                    $data_save_category = ['video_id' => $video_id, 'category_id' => $value_category];
                    $result_category = $this->Mdl_video->backoffice_video_save_category($data_save_category);

                    if ($result_category->result()[0]->save_video_category) {
                        $response = TRUE;
                        $message = "El video se registro con éxito";
                    } else {
                        $message = "Error al guardar las categorias del video";
                    }
                }
            } else {
                $message = "Error al guardar el video.";
            }

        } else {
            $message = "Faltan parametros.";
        }


        echo json_encode(['response' => $response, 'message' => $message]);
    }

    /**
     * Funcion para generar codigo de activacion
     * @param $size
     * @return string
     */
    private function generateCode($size)
    {
        $key = '';
        $pattern = '1234567890ABCDFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $size; $i++)
            $key .= $pattern{mt_rand(0, $max)};
        return $key;
    }


    /**
     * Funcion para subir video
     */
    public function upload_vimeo($video_upload, $params = array())
    {
        $lib = $this->config_vimeo();
        $uri = "";
        if ($lib) {

            $files = $video_upload['video'];
            array_shift($files);
            $uploaded = array();

            foreach ($files as $file_name) {
                try {
                    $uri = $lib->upload($file_name);
                    $video_data = $lib->request($uri);
                    $lib->request($uri, array('name' => $params['title_en']), 'PATCH');
                    $lib->request($uri, array('description' => $params['description_en']), 'PATCH');
                    $lib->request($uri, array(
                        'privacy' => array(
                            'comments' => 'anybody',
                            'view' => 'nobody'
                        )
                    ), 'PATCH');

                    $lib->request($uri, array(
                        'privacy' => array(
                            'download' => $params['download']
                        )
                    ), 'PATCH');

                    $lib->request($uri, array(
                        'privacy' => array(
                            'embed' => 'whitelist'
                        )
                    ), 'PATCH');


                    $lib->request($uri, array(
                        'privacy' => array(
                            'domains' => 'localhost'
                        )
                    ), 'PATCH');

                    $link = '';
                    if ($video_data['status'] == 200) {
                        $link = $video_data['body']['link'];
                        $uri = $video_data['body']['uri'];
                    }
                    $uploaded[] = array('file' => $file_name, 'api_video_uri' => $uri, 'link' => $link);

                } catch (VimeoUploadException $e) {
                    //print 'Error uploading ' . $file_name . "\n";
                    //print 'Server reported: ' . $e->getMessage() . "\n";
                }

            }

        }

        return $uri;

    }

    /**
     * Funcion para dar formato a la informacion de todos los videos
     * @param array $result
     * @return string
     */
    private function format_video($result = array(), $result_category = array())
    {

        $videos = "";
        if (!empty($result)) {

            $videos .= "<table class='dataTable table table-striped table-hover table-bordered' id='table_user'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>SKU</th>
                                <th>Categoria</th>
                                <th>Image</th>
                                <th>Precio</th>
                                <th>Precio Oferta</th>
                                <th>Titulo</th>
                                <th>Introducción</th>
                                <th>Vistas</th>
                                <th>Compras</th>
                                <th>Gratis</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>";
            $category = "";
            $count_category = 1;
            foreach ($result_category->result() AS $key_category => $value_category) {

                if ($count_category == 1) {
                    $category .= $value_category->name_es;
                } else {
                    $category .= ", " . $value_category->name_es;
                }

                $count_category++;
            }

            $count = 1;

            foreach ($result->result() AS $key => $value) {
                $videos .= "<tr>
                            <td>" . $count . "</td>
                            <td>" . $value->sku . "</td>
                            <td>" . $category . "</td>
                            <td><img src='" . URL_IMAGES . "videos/thumbs/" . $value->imageThumb . "' style='width: 40%;'></td>
                            <td>" . $value->price . "</td>
                            <td>" . $value->offerPrice . "</td>";

                if (strlen($value->title_es) > 10) {
                    $value->title_es = substr($value->title_es, 0, 25) . '...';
                }
                if (strlen($value->intro_es) > 10) {
                    $value->intro_es = substr($value->intro_es, 0, 25) . '...';
                }

                if ($value->isfree) {
                    $isfree = "<i class='icon-cloud-download icon-2x' style='color: #00AA88'></i>";
                } else {
                    $isfree = "<i class='icon-lock icon-2x'></i>";
                }

                $videos .= "<td>" . $value->title_es . "</td>
                            <td>" . $value->intro_es . "</td>
                            <td>" . $value->views . "</td>
                            <td>" . $value->purchases . "</td>
                            <td>" . $isfree . "</td>
                            <td>
                                <a href='" . ROOT_URL_BACK . "Ctr_video/edit/" . $value->id . "'><button class='btn btn-warning'> Editar</button></a>
                                <button class='btn btn-danger' onclick='return DialogDeleteVideo($value->id);'> Eliminar</button>                            
                            </td>
                        </tr>";

                $count++;
            }

            $videos .= "</tbody>
                        </table>
                    </div>";

        }

        return $videos;
    }

    /**
     * Funcion para eliminar el video de la lista
     */
    public function delete_video()
    {
        $video_id = $this->input->post('video_id');
        $response = FALSE;
        $message = "";

        if (!empty($video_id)) {
            $result = $this->Mdl_video->backoffice_video_delete($video_id);

            if ($result->result()[0]->delete_video) {
                $response = TRUE;
                $message = "El video se eliminó con éxito.";
            } else {
                $message = "Error al intentar eliminar el video";
            }

        } else {
            $message = "Faltan parametros";
        }

        echo json_encode(['response' => $response, 'message' => $message]);
    }

    /**
     * Funcion para verificar que no existen mas videos gratis
     */
    public function backoffice_validate_exit_free()
    {
        $response = FALSE;
        $message = "";


        $result = $this->Mdl_video->backoffice_validate_exit_free();

        if ($result) {

            if ($result->result()[0]->video_exist) {

                $response = TRUE;
                $message = "No existe";

            } else {
                $message = "No puede agregar otro video gratis. ";
            }

        }
        echo json_encode(['response' => $response, 'message' => $message]);
    }


    /**
     * Funcion para verificar que no existen mas videos gratis
     */
    public function backoffice_validate_exit_free_edit()
    {
        $response = FALSE;
        $message = "";
        $video_id = $this->input->post('video_id');

        $result = $this->Mdl_video->backoffice_validate_exit_free_edit($video_id);


        if ($result) {

            if (!$result->result()[0]->video_exist) {

                $response = TRUE;

            }
        }
        echo json_encode(['response' => $response, 'message' => $message]);
    }

    function cleanString($text)
    {
        $html = '';

        if ($text != NULL) {
            $html = str_replace("'", "\´", $text);
        }

        return $html;
    }
}
