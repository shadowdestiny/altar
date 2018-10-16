<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para el controlador del modulo de Contacto
 */
class Ctr_blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->model('Mdl_blog');
        $this->load->model('Mdl_filtervideo');
        $this->load->library('Ajax_pagination');
        $this->load->library('Ctr_functions');
        $this->perPage = 10;

        $this->load->library('Putlanguage');
        if ($this->session->userdata('Setlanguage') == null) {
            $this->session->set_userdata('Setlanguage', 'es');
        }
    }

    /**
     * FUncion para configurar la paginacion
     * @param type $total_rows
     * @param type $cur_page
     * @param type $url
     * @return string
     */
    public function paginateConf($total_rows = NULL, $cur_page = NULL, $url = NULL)
    {
        $config['target'] = '#postList';
        $config['base_url'] = $url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->perPage;
        $config['cur_page'] = $cur_page;
        $config['link_func'] = 'getData';
        $this->ajax_pagination->initialize($config);

        $paginate = "<div class='col-md-12 responsivepadding post-list'>
                            " . $this->ajax_pagination->create_links() . "
                       </div>";
        return $paginate;
    }

    /**
     * Funcion para inicializar el Blog
     */
    public function index()
    {
        $this->fileLanguage = 'blog';
        $this->redirect($this->fileLanguage);
    }


    public function redirect($fileLanguage)
    {

        $lang = $this->session->userdata('Setlanguage');
        $request = $this->putlanguage->setLanguage($lang, $fileLanguage);
        $this->index_u($request);

    }

    /**
     * Funcion contacto pagína contacto
     */
    public function index_u($category)
    {
        $data['lang'] = $this->session->userdata('Setlanguage');
        $data['limit'] = $this->perPage;

        $result = $this->Mdl_blog->front_blog_list($data);

        if (!empty($result)) {

            $url = ROOT_URL . 'altar/Ctr_blog/index_paginate';
            $link_func = "getData";
            $paginate = $this->paginateConf($result[0]['totalRow'], 0, $url, $link_func);

            $data['blogs'] = $this->format_blog($result, $paginate);
        } else {
            $data['blogs'] = $this->lang->line('blog_no_record');
        }
        $result_views = $this->Mdl_blog->front_blog_more_views($data);
        $result_recent = $this->Mdl_blog->front_blog_recent($data);

        $data['category'] = $category['categoryHeader'];
        $data['blog_views'] = $this->format_more_view($result_views);
        $data['blog_recent'] = $this->format_recents($result_recent);

        $this->load->view('include/include_altarcreative/includes/header', $category);
        $this->load->view('vw_blog/vw_index', $data);
        $this->load->view('include/include_altarcreative/includes/footer.php', $category);
        $this->load->view('include/include_altarcreative/includes/closeBody.php');

    }

    /**
     * Funcion para listar los Blogs para la paginacion
     */
    public function index_paginate()
    {

        $lang = $this->session->userdata('Setlanguage');
        $this->putlanguage->setLanguage($lang, 'blog');

        $data = [];
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

        $data['_start'] = $offset;
        $data['_limit'] = $this->perPage;
        $data['lang'] = $lang;

        $result = $this->Mdl_blog->front_blog_list_paginate($data);

        if (!empty($result)) {
            /* pagination configuration*/
            $url = ROOT_URL . 'altar/Ctr_blog/index_paginate';
            $link_func = "getData";
            $paginate = $this->paginateConf($result[0]['totalRow'], $data['_start'], $url, $link_func);

            echo $this->format_blog($result, $paginate);
        } else {
            echo "<center><h1>" . $this->lang->line('blog_no_record') . "</h1></center>";
        }


    }


    /**
     * Funcion para dar formato a la BLOG
     * @param null $result
     * @param null $paginate
     * @return string
     */
    private function format_blog($result = NULL, $paginate = NULL)
    {

        $blog = "";

        $blog .= "<div class='post-grid grid-container grid-4 clearfix' data-layout='fitRows'>";

        if (!is_null($result)) {


            foreach ($result AS $key => $value) {

                if (strlen($value['title']) > 25) {
                    $value['title'] = substr($value['title'], 0, 25) . '...';
                }else{
                    $value['title'] = $value['title'];
                }

                if (strlen($value['content']) > 60) {
                    $value['content'] = trim(substr($value['content'], 0, 60)) . '...';
                }else{
                    $value['content'] = $value['content'];
                }

                $date_comment = $this->ctr_functions->get_format_date($value['created'],$this->session->userdata('Setlanguage'));

                $blog .= " <div class='entry width clearfix'>
                        <div class='entry-image'>
                            <a href='" . ROOT_URL . "altar/Ctr_blog/view/" . $value['id'] . "'>
                                <img class='image_fade' src='" . URL_IMAGES . "blogs/thumbs/" . $value['image_thumb'] . "'
                                     alt='Standard Post with Image'></a>
                        </div>
                        <div class='entry-title left'>
                            <h4><a href='" . ROOT_URL . "altar/Ctr_blog/view/" . $value['id'] . "'>" . $value['title'] . "</a></h4>
                        </div>
                        <ul class='entry-meta clearfix calendar'>
                            <li>
                            <!--<i class='icon-calendar3'></i>--> 
                            " . $date_comment . " </li>
                        </ul>
                        <div class='entry-content left'>
                            <!--<p>" . $value['content'] . "</p>-->
                            <a href='" . ROOT_URL . "altar/Ctr_blog/view/" . $value['id'] . "' class='more-link'>" . $this->lang->line('blog_keep_reading') . "</a>
                        </div>
                    </div>";
            }

        }

        $blog .= "</div>" . $paginate;
        return $blog;
    }

    /**
     * Funcion para dar formato a los blog con mas vistas
     * @param null $result
     * @return string
     */
    private function format_more_view($result = NULL)
    {
        $blog = "";

        if (!is_null($result)) {

            foreach ($result AS $key => $value) {

                if (strlen($value['title']) > 10) {
                    $value['title'] = substr($value['title'], 0, 25) . '...';
                }
                if (strlen($value['content']) > 10) {
                    $value['content'] = substr($value['content'], 0, 25) . '...';
                }

                $date_comment = date("j F Y", strtotime($value['created']));

                $blog .= " <div class='spost clearfix'>
                                <div class='entry-image'>
                                    <a href='" . ROOT_URL . "altar/Ctr_blog/view/" . $value['id'] . "' class='nobg'>
                                        <img class='img-circle' src='" . URL_IMAGES . "blogs/thumbs/" . $value['image_thumb'] . "' alt=''>
                                    </a>
                                </div>
                                <div class='entry-c'>
                                    <div class='entry-title'>
                                        <h4><a href='" . ROOT_URL . "altar/Ctr_blog/view/" . $value['id'] . "'>" . $value['title'] . "</a></h4>
                                    </div>                                    
                                </div>
                            </div>";
            }

        }

        return $blog;

    }

    /**
     * Funcion para mostrar los blogs mas recientes
     * @param null $result
     * @return string
     */
    private function format_recents($result = NULL)
    {
        $blog = "";

        if (!is_null($result)) {

            foreach ($result AS $key => $value) {

                if (strlen($value['title']) > 10) {
                    $value['title'] = substr($value['title'], 0, 25) . '...';
                }
                if (strlen($value['content']) > 10) {
                    $value['content'] = substr($value['content'], 0, 25) . '...';
                }

                $date_comment = date("j F Y", strtotime($value['created']));

                $blog .= "<div class='spost clearfix'>
                                <div class='entry-image'>
                                    <a href='" . ROOT_URL . "altar/Ctr_blog/view/" . $value['id'] . "' class='nobg'>
                                    <img class='img-circle' src='" . URL_IMAGES . "blogs/thumbs/" . $value['image_thumb'] . "' alt=''></a>
                                </div>
                                <div class='entry-c'>
                                    <div class='entry-title'>
                                        <h4><a href='" . ROOT_URL . "altar/Ctr_blog/view/" . $value['id'] . "'>" . $value['title'] . "</a></h4>
                                    </div>
                                    <ul class='entry-meta'>
                                        <li>" . $date_comment . "</li>
                                    </ul>
                                </div>
                            </div>";
            }

        }

        return $blog;
    }

    /**
     * Funcion para ver la vista del blog
     * @param null $blog_id
     */
    public function view($blog_id = NULL)
    {
        $data_conditions['lang'] = $this->session->userdata('Setlanguage');
        $language = $this->putlanguage->setLanguage($data_conditions['lang'], 'blog');

        $data['categoryHeader'] = $language['categoryHeader'];
        $data['categoryFooter'] = $language['categoryFooter'];
        $data['categoryFilter'] = $language['categoryFilter'];

        if (!is_null($blog_id)) {

            $data_conditions['blog_id'] = $blog_id;
            $result = $this->Mdl_blog->front_blog_by_id($data_conditions);

            /*INFO BLOG*/
            $data['blog_id'] = $result[0]['id'];
            $data['blog_title'] = $result[0]['title'];
            $data['blog_content'] = $result[0]['content'];
            $data['blog_image'] = URL_IMAGES . "blogs/" . $result[0]['image'];
            $data['blog_views_byid'] = $result[0]['views'];
            $data['blog_user_post'] = $result[0]['user_post'];
            $data['blog_created'] = date("j F Y", strtotime($result[0]['created']));

            /*REDES SOCIALES*/
            $data['social_video_title'] = $result[0]['title'];
            $data['social_video_descript'] = $result[0]['content'];
            $data['social_video_image'] = URL_IMAGES . "blogs/" . $result[0]['image'];
            $params = $_SERVER['QUERY_STRING'];
            $data['social_video_current_url'] = current_url();
            $data['current_url'] = current_url();

        } else {
            $data['blog_title'] = "";
            $data['blog_content'] = "Este Blog ya no existe.";
            $data['blog_image'] = "";
            $data['blog_views_byid'] = 0;
            $data['blog_user_post'] = "Admin";

            $data['blog_created'] = "";

            /*REDES SOCIALES*/
            $data['social_video_title'] = "";
            $data['social_video_descript'] = "";
            $data['social_video_image'] = "";
            $data['social_video_current_url'] = "";
            $data['current_url'] = "";
        }

        $result_views = $this->Mdl_blog->front_blog_more_views($data_conditions);
        $result_recent = $this->Mdl_blog->front_blog_recent($data_conditions);
        $result_related = $this->Mdl_blog->front_blog_related($data_conditions);

        $data['category'] = $language['categoryHeader'];
        $data['blog_views'] = $this->format_more_view($result_views);
        $data['blog_recent'] = $this->format_recents($result_recent);
        $data['blog_related'] = $this->format_related($result_related);

        /*VIEWS*/
        $this->load->view('include/include_altarcreative/includes/header', $data);
        $this->load->view('vw_blog/vw_view', $data);
        $this->load->view('vw_blog/include/modal_shared_blog', $data);
        $this->load->view('include/include_altarcreative/includes/footer.php', $data);
        $this->load->view('include/include_altarcreative/includes/closeBody.php');
        $this->load->view('vw_blog/include/indexjs');

    }


    private function format_related($result = NULL)
    {
        $blog = "";

        if (!is_null($result)) {

            $count = 0;
            foreach ($result AS $key => $value) {

                if (strlen($value['title']) > 10) {
                    $value['title'] = substr($value['title'], 0, 25) . '...';
                }
                if (strlen($value['content']) > 10) {
                    $value['content'] = substr($value['content'], 0, 25) . '...';
                }

                $date_comment = date("j F Y", strtotime($value['created']));

                if ($count % 2 == 0) {

                    if ($count == 2) {
                        $blog .= "<div class='col_half nobottommargin col_last' row='" . $count . "'>";
                    } else {
                        $blog .= "<div class='col_half nobottommargin' row='" . $count . "'>";
                    }

                }

                $blog .= "<div class='mpost clearfix'>
                                <div class='entry-image'>
                                    <a href='" . ROOT_URL . "altar/Ctr_blog/view/" . $value['id'] . "'><img src='" . URL_IMAGES . "blogs/thumbs/" . $value['image_thumb'] . "' alt='Blog'></a>
                                </div>
                                <div class='entry-c'>
                                    <div class='entry-title'>
                                        <h4><a href='" . ROOT_URL . "altar/Ctr_blog/view/" . $value['id'] . "'>" . $value['title'] . "</a></h4>
                                    </div>
                                    <ul class='entry-meta clearfix'>
                                        <li><i class='icon-calendar3'></i> " . $date_comment . "</li>
                                    </ul>
                                    <div class='entry-content'>
                                    " . $value['content'] . "
                                    </div>
                                </div>
                            </div>";

                if ($count % 2) {

                    $blog .= "</div>";

                }

                $count++;
            }

        }

        return $blog;
    }

}

