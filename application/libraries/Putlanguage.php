<?php
defined("BASEPATH") or die("El acceso al script no está permitido");

/**
 * Class Sendmessage
 *
 * Esta clase se encarda de enviar correos, solo necesita mandar los siguintes parametros
 *
 * [
 * 'view' => 'vista que va a cargar' Es obligatorio
 * 'email' => 'aquien lo va a enviar' Es obligatorio
 * 'fullname' => 'en caso de que exista' Es opcional al igual que otros parametros
 * ]
 *
 * @autor Ricardo Daniel Carrada <rdcarrada@gmail.com>
 *
 */
class Putlanguage
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library("session");
        $this->CI->load->helper("language");
        $this->CI->load->model("Mdl_all");

    }

    /**
     * Funcion para el manejo del lenguaje
     * @param array $params
     * @return bool
     */
    public function setLanguage($language, $fileLanguage)
    {

        $result = $this->CI->Mdl_all->get_category_lang($language);

        $categoryHeader = $this->format_category_header($result);
        $categoryFooter = $categoryHeader;
        $categoryFilter = $this->format_category_filter($result);

        $data = array(
            'categoryHeader' => $categoryHeader,
            'categoryFooter' => $categoryFooter,
            'categoryFilter' => $categoryFilter
        );

        if ($language == LANG_ES) {
            $this->CI->lang->load('header', 'spanish');
            $this->CI->lang->load('footer', 'spanish');
            $this->CI->lang->load('error', 'spanish');
            $this->CI->lang->load($fileLanguage, 'spanish');
        } else if ($language == LANG_EN) {
            $this->CI->lang->load('header', 'english');
            $this->CI->lang->load('footer', 'english');
            $this->CI->lang->load('error', 'english');
            $this->CI->lang->load($fileLanguage, 'english');
        }

        return $data;
    }


    /**
     * Funcion formato categorias header
     * @param array $params
     */
    private function format_category_header($result)
    {

        $data = "";

        foreach ($result as $key => $value) {

            $data .= "<li>
                        <a href='" . ROOT_URL . "altar/Ctr_filtervideo/view/$value[id_category]'>
                            <div>$value[text]</div>
                        </a>
                    </li>";

        }

        return $data;

    }

    /**
     * Funcion formato categorias filtro
     * @param array $params
     */
    private function format_category_filter($result)
    {

        $data = "";

        foreach ($result as $key => $value) {

            $data .= "<option value='$value[id_category]'>$value[text]</option>";

        }

        return $data;

    }

}