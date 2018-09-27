<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para el controlador del modulo de Contacto
 */
class Ctr_sitemap extends CI_Controller
{
    function __construct()
    {
        //construcor donde se cargan librerias, helpers y models
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->model('Mdl_sitemap');

        $this->load->library('Putlanguage');

        if ($this->session->userdata('Setlanguage') == null) {
            $this->session->set_userdata('Setlanguage', 'es');
        }
    }

    public function index()
    {
        $this->fileLanguage = 'sitemap';
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

        //se guarda en result la informacion que es traida del metodo get_category_name en el Mdl_sidemap
        $result = $this->Mdl_sitemap->get_category_name();
        //$result se pasa para el metodo view_info_index lo que regrese se guardara en la variable $data['info']
        $data['info'] = $this->view_info_index($result);     
        //en esta linea se agrega el header ya creado
        $this->load->view('include/include_altarcreative/includes/header', $category);
        //aqui se tiene que agregar la informacion de la pagina
        $this->load->view('vw_sitemap/vw_index',$data);
        //en esta linea se crea el footer
        $this->load->view('include/include_altarcreative/includes/footer.php', $category);
        //$this->load->view('include/include_altarcreative/includes/closeBody.php');

    }

    //metodo que va a mostrar la informacion de las categorias
    public function view_info_index($result = NULL){
        //se inicializa la variable que hara return con la informacion
        $page_info = "";  

        //Se valida que el idioma sea español                       
        if($this->session->userdata('Setlanguage') == 'es'){
        
        //se crea un foreach para traer los datos de las categorias en español
        foreach ($result as $key => $value) {
        
        //se maqueta la la informacion de las categorias y se pasa el valor a la variable $page_info     
        $page_info .= "<li><i class='icon-file-alt'></i><a href='".ROOT_URL."altar/Ctr_filtervideo/view/".$value['id']."'><div>".$value['text_spanish']."            </div></a></li>";

        
            }//fin for
        
        }else{
        //se crea un foreach para traer los datos de las categorias en ingles
        foreach ($result as $key => $value) {
        //se maqueta la la informacion de las categorias y se pasa el valor a la variable $page_info     
        $page_info .= "<li><i class='icon-file-alt'></i><a href='".ROOT_URL."altar/Ctr_filtervideo/view/".$value['id']."'><div>".$value['text_english']."            </div></a></li>";
        
            }//fin for

        }//fin else

      
        //informacion que regresa la funcion
        return $page_info; 

    }//fin de funcion view_info_index


}

