<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para el controlador del modulo de Contacto
 */
class Ctr_purchases extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->model('Mdl_purchases');
        $this->load->library('session');
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->library('Sendmessage');
        $this->load->library('Putlanguage');
        $this->load->library('Ctr_functions');

        if ($this->session->userdata('Setlanguage') == null) {
            $this->session->set_userdata('Setlanguage', 'es');
        }

    }

    /**
     * Funcion index pagína principal para el funcionamiento del manejo de idioma
     */
    public function index()
    {
        $this->fileLanguage = 'index';
        $this->redirect($this->fileLanguage);
    }


    public function redirect($fileLanguage)
    {

        $lang = $this->session->userdata('Setlanguage');
        $request = $this->putlanguage->setLanguage($lang, $fileLanguage);
        $this->index_u($request);

    }

    /**
     * Funcion para generar el descuento del Subtotal
     * @param null $coupon_id
     * @param int $SubTotal
     * @return array
     */
    private function get_coupon_discount($coupon_id = NULL, $SubTotal = 0)
    {

        $data = [];
        $descuento_type = "";
        $descuento_quantity = "";

        if (!is_null($coupon_id)) {
            $validate_if_used = $this->Mdl_purchases->front_purchases_get_coupon_by_id($coupon_id);

            if (!empty($validate_if_used)) {

                $data['coupon_id'] = $validate_if_used[0]['id'];
                $data['coupon_code'] = $validate_if_used[0]['code_coupon'];
                $coupon_type = $validate_if_used[0]['type'];
                $coupon_quantity = $validate_if_used[0]['quantity'];

                if ($coupon_type == "price") {

                    if ($coupon_quantity > $SubTotal) {
                        $total = 0;
                    } elseif ($coupon_quantity < $SubTotal) {
                        $total = (float)$SubTotal - $coupon_quantity;

                    }

                    $descuento_type = "$";
                    $descuento_quantity = " - " . $coupon_quantity;

                } elseif ($coupon_type == "percentage") {

                    if ($coupon_quantity == 100) {
                        $total = 0;
                    } else {
                        /*Optiene el porcentaje*/
                        $result_porcent = ($coupon_quantity / 100) * $SubTotal;
                        /*Resta el valor inicial - el porcentaje*/
                        $total = $SubTotal - $result_porcent;
                    }

                    $descuento_type = "%";
                    $descuento_quantity = " - " . $coupon_quantity;

                }

            }

        }

        return [$total, $descuento_type, $descuento_quantity];
    }

    /**
     * Funcion index pagína principal
     */
    public function index_u($category)
    {
        if ($this->session->userdata('user_id')) {

            $data['lang'] = $this->session->userdata('Setlanguage');
            $user_id = $this->session->userdata('user_id');
            $video_id = $this->session->userdata('allElementsPurchaseId');
            $coupon_id = $this->session->userdata('coupon_id');

            $this->Mdl_purchases->time();

            $data_to_form = [];
            $dataElement = "";
            $total = 0;
            $SubTotal = 0;
            $descuento_type = "";
            $descuento_quantity = "";

            if (!is_null($video_id) && !empty($video_id)) {

                $countElements = 0;

                if ($this->session->userdata('order_code')) {
                    $order_code = $this->session->userdata('order_code');
                    /*ES necesario actualizar la relacion entre la orden y los videos*/
                    $data_conditions = [
                        'user_id' => (int)$user_id,
                        'order_number' => $order_code
                    ];
                    $save_order = $this->Mdl_purchases->front_purchases_save_order_update($data_conditions);

                    if ($save_order[0]['save_order']) {

                        $order_id = $save_order[0]['order_id'];
                    }

                } else {
                    $order_code = $this->ctr_functions->generate_order(12);

                    /*
                     * Guardar la orden
                     * devolver el ID de la orden
                     * */
                    $data_conditions = [
                        'user_id' => (int)$user_id,
                        'order_number' => $order_code,
                        'order_status' => "Uncleared"
                    ];
                    $save_order = $this->Mdl_purchases->front_purchases_save_order($data_conditions);

                    if ($save_order[0]['save_order']) {

                        $order_id = $save_order[0]['order_id'];
                        $this->session->set_userdata('order_code', $order_code);
                    }

                }

                /*Itera la N cantidad de videos comprados*/
                foreach ($video_id as $key => $value) {

                    $data['id_video'] = $value;
                    $result = $this->Mdl_purchases->get_videodetailpurchase($data);

                    $data['order_id'] = $order_id;
                    $data['price'] = $result[0]['realPrice'];

                    /*Funcion para*/
                    $this->Mdl_purchases->front_purchase_order_video($data);


                    $dataElement .= "
                    <tr class='cart_item'>
                        <td class='cart-product-remove'>
                            <a class='removeElementPurchase' video-id=" . $result[0]['id'] . " video-count=" . $countElements . " video-value='" . $result[0]['realPrice'] . "' title='Remove this item'><i class='icon-trash2'></i></a>
                        </td>

                        <td class='cart-product-thumbnail'>
                            <a href='" . ROOT_URL . "altar/Ctr_product/view/" . $result[0]['id'] . "'><img width='64' height='64' src='" . URL_IMAGES . "videos/thumbs/" . $result[0]['previewThumPath'] . "' alt='Pink Printed Dress'></a>
                        </td>

                        <td class='cart-product-name'>
                            <a href='" . ROOT_URL . "altar/Ctr_product/view/" . $result[0]['id'] . "'>" . $result[0]['title'] . "</a>
                        </td>

                        <td class='cart-product-subtotal'>
                            <span class='amount'><span class='signopesos'>$</span>" . $result[0]['realPrice'] . "</span>
                        </td>
                    </tr>
                    ";

                    $SubTotal = $SubTotal + (float)$result[0]['realPrice'];

                    $countElements++;

                }

                /**
                 * SI existe el cupon_id, descuenta el porcentaje o el precio al total de la compra
                 */
                if (isset($coupon_id) && !is_null($coupon_id) && !empty($coupon_id)) {

                    list($total, $descuento_type, $descuento_quantity) = $this->get_coupon_discount($coupon_id, $SubTotal);
                    $this->session->set_userdata('total_to_paid', (float)$total);

                } else {

                    $total = $SubTotal;
                    $this->session->set_userdata('total_to_paid', (float)$total);
                }


                $data_to_form['item_name'] = "VIDEOS CREATIVE ALTAR";
                $data_to_form['item_number'] = $order_code;
                $data_to_form['quantity'] = $countElements;
                $data_to_form['amount'] = (float)$total;

            } else {
                /* si entra en esta condicion quiere decir que no existen ithems, por el contrario tampoco dede de exisit
                Orden de compra en caso de que la orden de compara exista, debe de borrar la relacion que pudiera haber la
                orden de compra y los videos ya que no termino el flujo
                */
                if ($this->session->userdata('order_code')) {
                    $order_code = $this->session->userdata('order_code');
                    $data_conditions = [
                        'user_id' => (int)$user_id,
                        'order_number' => $order_code
                    ];

                    $this->Mdl_purchases->front_purchases_clear_purchases_no_completed($data_conditions);
                    $this->session->unset_userdata('order_code');
                    $this->session->unset_userdata('total_to_paid');
                }

            }

            $data_pay['form_to_pay'] = $this->generate_form_topay($data_to_form);
            $category['elementsPurchase'] = $dataElement;
            $category['subTotalPriceElements'] = $SubTotal;
            $category['totalPriceElements'] = $total;
            $category['totalTypeElementsDescount'] = $descuento_type;
            $category['totalQuantityElementsDescount'] = $descuento_quantity;


            $this->load->view('include/include_altarcreative/includes/header', $category);
            $this->load->view('vw_purchases/vw_index', $data_pay);
            $this->load->view('include/include_altarcreative/includes/footer.php', $category);
            $this->load->view('vw_register/include/registerjs');
            $this->load->view('include/include_altarcreative/includes/closeBody.php');
        } else {
            $uri = ROOT_URL . 'altar/Ctr_account/';
            redirect($uri, 'refresh');
        }

    }

    /**
     * Funcion para generar el formulario de PAGO
     * @param array $params
     * @return string
     */
    private function generate_form_topay($params = array())
    {

        $form = "";

        if (!empty($params)) {

            $form = "<form action='" . API_PAYPAL_FORM_ACTION . "' method='POST'>
                        <input type='hidden' name='cmd' value='_xclick'>
                        <input type='hidden' name='business' value='" . API_PAYPAL_BUSINESS . "'>
                        <input type='hidden' name='item_name' value='" . $params['item_number'] . "'>
                        <input type='hidden' name='item_number' value='" . $params['item_number'] . "'>
                        <input type='hidden' name='amount' id='paypal_amount' value='" . $params['amount'] . "'>
                        <input type='hidden' name='currency_code' value='" . API_PAYPAL_CURRENCY . "'>
                        <input type='hidden' name='return' value='" . API_PAYPAL_URL_RETURN . "'>
                        <input type='hidden' name='cancel_return' value='" . API_PAYPAL_URL_CANCEL . "'>
                        <button type='submit' class='button button-3d notopmargin fright'>Pagar
                            PayPal
                        </button>
                    </form>";

        } else {

            $form = "<form onsubmit='return purchases();'>
                        <button type='submit' class='button button-3d notopmargin fright'>Pagar
                            PayPal
                        </button>
                    </form>";

        }

        return $form;

    }

    /**
     * Función para guardar los elementos del carrito
     */
    public function sesionElements()
    {

        $flag = false;
        $video_id = $this->input->post('video_id');
        $element = $this->input->post('newelement');
        $price = $this->input->post('totalPrice');

        $this->session->set_userdata('allElementsPurchasePrice', $price);

        if ($this->session->userdata('allElementsPurchase') == null) {

            $temelem = array($video_id => $element);
            $temid = array($video_id => $video_id);
            $this->session->set_userdata('allElementsPurchase', $temelem);
            $this->session->set_userdata('allElementsPurchaseId', $temid);


            $flag = true;

        } else {

            $temelem = $this->session->userdata('allElementsPurchase');
            $temid = $this->session->userdata('allElementsPurchaseId');
            $temelem[$video_id] = $element;
            $temid[$video_id] = $video_id;
            $this->session->set_userdata('allElementsPurchase', $temelem);
            $this->session->set_userdata('allElementsPurchaseId', $temid);
            $flag = true;

        }

        $numberElements = count($temelem);
        $this->session->set_userdata('allNumberElementsPurchase', $numberElements);

        $data['response'] = $flag;

        echo json_encode($data);

    }

    /**
     * Función para remover los elementos del carrito
     */
    public function sesionElementsRemove()
    {

        $flag = false;
        $video_id = $this->input->post('video_id');
        $video_count = $this->input->post('video_count');
        $price = $this->input->post('totalPrice');

        $this->session->set_userdata('allElementsPurchasePrice', $price);

        $temelem = $this->session->userdata('allElementsPurchase');
        $temid = $this->session->userdata('allElementsPurchaseId');
        unset($temelem[$video_id]);
        unset($temid[$video_id]);
        $this->session->set_userdata('allElementsPurchase', $temelem);
        $this->session->set_userdata('allElementsPurchaseId', $temid);

        $numberElements = count($temelem);
        $this->session->set_userdata('allNumberElementsPurchase', $numberElements);

        $flag = true;

        $data['response'] = $flag;

        echo json_encode($data);

    }

    /**
     * Funcion para pago completo
     */
    public function payment_completed()
    {

        if ($this->session->userdata('user_id') && $this->session->userdata('order_code')) {

            $data_conditions['user_id'] = $this->session->userdata('user_id');
            $data_conditions['order_number'] = $this->session->userdata('order_code');
            $data_conditions['total_to_paid'] = $this->session->userdata('total_to_paid');
            $data_conditions['coupon_id'] = $this->session->userdata('coupon_id');
            $data_conditions['status'] = "Completed";
            $data_validate['view'] = 'vw_sendemail/email_purchases';

            $update_status = $this->Mdl_purchases->front_purchases_update_order_status($data_conditions);

            if ($update_status[0]['update_status_order']) {


                $data_validate['order_list'] = $this->generate_purchases_list_email($update_status);
                $data_validate['email'] = $this->session->userdata('email');
                $data_validate['subject'] = "ALTAR PURCHASE ORDER";


                if ($this->sendmessage->sendEmail($data_validate)) {

                    $this->session->unset_userdata('allElementsPurchasePrice');
                    $this->session->unset_userdata('allElementsPurchase');
                    $this->session->unset_userdata('allElementsPurchaseId');
                    $this->session->unset_userdata('allNumberElementsPurchase');
                    $this->session->unset_userdata('order_code');
                    $this->session->unset_userdata('total_to_paid');
                    $this->session->unset_userdata('coupon_id');

                    $uri = ROOT_URL . 'altar/Ctr_purchases/';
                    redirect($uri, 'refresh');
                } else {
                    $uri = ROOT_URL . 'altar/Ctr_purchases/';
                    redirect($uri, 'refresh');
                }


            } else {
                $uri = ROOT_URL . 'altar/Ctr_purchases/';
                redirect($uri, 'refresh');
            }

        } else {

            $uri = ROOT_URL . 'altar/Ctr_purchases/';
            redirect($uri, 'refresh');

        }

    }

    /**
     * Funcion
     * @param array $result
     * @return string
     */
    private function generate_purchases_list_email($result = array())
    {
        $list = "";

        if (!empty($result)) {

            $total = 0;
            foreach ($result AS $key => $value) {

                if (isset($value['offerPrice']) && !is_null($value['offerPrice'])) {
                    $value['price'] = $value['offerPrice'];
                }

                $total = $value['total_to_paid'];

                if (is_null($value['code_coupon'])) {
                    $value['code_coupon'] = "";
                    $value['quantity_coupo'] = "";
                    $value['type_coupon'] = "";
                } else {

                    if ($value['type_coupon'] == "price") {
                        $value['quantity_coupo'] = " - $ " . $value['quantity_coupo'];
                    } elseif ($value['type_coupon'] == "percentage") {
                        $value['quantity_coupo'] = " - % " . $value['quantity_coupo'];
                    }
                }


                $list .= "<div style='background-color:transparent;'>
                    <div style='Margin: 0 auto;min-width: 320px;max-width: 620px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;'
                         class='block-grid mixed-two-up'>
                        <div style='border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;'>
                            <!--[if (mso)|(IE)]>
                            <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                <tr>
                                    <td style='background-color:transparent;' align='center'>
                                        <table cellpadding='0' cellspacing='0' border='0' style='width: 620px;'>
                                            <tr class='layout-full-width' style='background-color:#FFFFFF;'><![endif]-->
    
                            <!--[if (mso)|(IE)]>
                            <td align='center' width='413'
                                style=' width:413px; padding-right: 0px; padding-left: 0px; padding-top:15px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;'
                                valign='top'><![endif]-->
                            <div class='col num8'
                                 style='display: table-cell;vertical-align: top;min-width: 320px;max-width: 408px;'>
                                <div style='background-color: transparent; width: 100% !important;'>
                                    <!--[if (!mso)&(!IE)]><!-->
                                    <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:15px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                                        <!--<![endif]-->
    
    
                                        <!--[if mso]>
                                        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                            <tr>
                                                <td style='padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px;'>
                                        <![endif]-->
                                        <div style='font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;line-height:120%;color:#000000; padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px;'>
                                            <div style='font-size:12px;line-height:14px;color:#000000;font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;text-align:left;'>
                                                <div class='txtTinyMce-wrapper' style='font-size:12px; line-height:14px;'>
                                                    <div class='txtTinyMce-wrapper'
                                                         style='font-size: 12px; line-height: 14px;'>
                                                        <div class='txtTinyMce-wrapper'
                                                             style='font-size: 12px; line-height: 14px;'><p
                                                                style='margin: 0;font-size: 14px;line-height: 16px'><span
                                                                style='color: rgb(0, 0, 0); font-size: 14px; line-height: 16px;'><a
                                                                style='color:#71777D;text-decoration: none; color: rgb(0, 0, 0);'
                                                                href='" . ROOT_URL . "altar/Ctr_product/view/" . $value['id'] . "' target='_blank'> <img style='width: 30%' src='" . URL_IMAGES . "videos/thumbs/" . $value['image_thumb'] . "' ></a></span>
                                                        </p></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--[if mso]></td></tr></table><![endif]-->
    
    
                                        <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                </div>
                            </div>
                            <!--[if (mso)|(IE)]></td>
                        <td align='center' width='207'
                            style=' width:207px; padding-right: 0px; padding-left: 0px; padding-top:15px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;'
                            valign='top'><![endif]-->
                            <div class='col num4'
                                 style='display: table-cell;vertical-align: top;max-width: 320px;min-width: 204px;'>
                                <div style='background-color: transparent; width: 100% !important;'>
                                    <!--[if (!mso)&(!IE)]><!-->
                                    <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:15px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                                        <!--<![endif]-->
    
    
                                        <!--[if mso]>
                                        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                            <tr>
                                                <td style='padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px;'>
                                        <![endif]-->
                                        <div style='font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;line-height:120%;color:#000000; padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px;'>
                                            <div style='font-size:12px;line-height:14px;color:#000000;font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;text-align:left;'>
                                                <div class='txtTinyMce-wrapper' style='font-size:12px; line-height:14px;'>
                                                    <div class='txtTinyMce-wrapper'
                                                         style='font-size: 12px; line-height: 14px;'>
                                                        <div class='txtTinyMce-wrapper'
                                                             style='font-size: 12px; line-height: 14px;'><p
                                                                style='margin: 0;font-size: 14px;line-height: 16px'>$" . $value['price'] . "</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--[if mso]></td></tr></table><![endif]-->
    
    
                                        <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                </div>
                            </div>
                            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                        </div>
                    </div>
                </div>";


            }

            $list .= "<div style='background-color:transparent;'>
                            <div style='Margin: 0 auto;min-width: 320px;max-width: 620px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'
                                 class='block-grid '>
                                <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                                    <!--[if (mso)|(IE)]>
                                    <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                        <tr>
                                            <td style='background-color:transparent;' align='center'>
                                                <table cellpadding='0' cellspacing='0' border='0' style='width: 620px;'>
                                                    <tr class='layout-full-width' style='background-color:transparent;'><![endif]-->
                        
                                    <!--[if (mso)|(IE)]>
                                    <td align='center' width='620'
                                        style=' width:620px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;'
                                        valign='top'><![endif]-->
                                    <div class='col num12'
                                         style='min-width: 320px;max-width: 620px;display: table-cell;vertical-align: top;'>
                                        <div style='background-color: transparent; width: 100% !important;'>
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                                                <!--<![endif]-->
                        
                        
                                                <div style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;'>
                                                    <!--[if (mso)]>
                                                    <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                        <tr>
                                                            <td style='padding-right: 10px;padding-left: 10px; padding-top: 10px; padding-bottom: 10px;'>
                                                                <table width='100%' align='center' cellpadding='0' cellspacing='0'
                                                                       border='0'>
                                                                    <tr>
                                                                        <td><![endif]-->
                                                    <div align='center'>
                                                        <div style='border-top: 1px dotted #CCCCCC; width:100%; line-height:1px; height:1px; font-size:1px;'>
                                                            &#160;
                                                        </div>
                                                    </div>
                                                    <!--[if (mso)]></td></tr></table></td></tr></table><![endif]-->
                                                </div>
                        
                        
                                                <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>";


            $list .= "<div style='background-color:transparent;'>
                                    <div style='Margin: 0 auto;min-width: 320px;max-width: 620px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;'
                                         class='block-grid mixed-two-up'>
                                        <div style='border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;'>
                                            <!--[if (mso)|(IE)]>
                                            <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                <tr>
                                                    <td style='background-color:transparent;' align='center'>
                                                        <table cellpadding='0' cellspacing='0' border='0' style='width: 620px;'>
                                                            <tr class='layout-full-width' style='background-color:#FFFFFF;'><![endif]-->
                                
                                            <!--[if (mso)|(IE)]>
                                            <td align='center' width='413'
                                                style=' width:413px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;'
                                                valign='top'><![endif]-->
                                            <div class='col num8'
                                                 style='display: table-cell;vertical-align: top;min-width: 320px;max-width: 408px;'>
                                                <div style='background-color: transparent; width: 100% !important;'>
                                                    <!--[if (!mso)&(!IE)]><!-->
                                                    <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                                                        <!--<![endif]-->
                                
                                
                                                        <!--[if mso]>
                                                        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                            <tr>
                                                                <td style='padding-right: 20px; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;'>
                                                        <![endif]-->
                                                        <div style='font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;line-height:120%;color:#000000; padding-right: 20px; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;'>
                                                            <div style='font-size:12px;line-height:14px;color:#000000;font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;text-align:left;'>
                                                                <div class='txtTinyMce-wrapper' style='font-size:12px; line-height:14px;'>
                                                                    <div class='txtTinyMce-wrapper'
                                                                         style='font-size: 12px; line-height: 14px;'>
                                                                        <div class='txtTinyMce-wrapper'
                                                                             style='font-size: 12px; line-height: 14px;'><p
                                                                                style='margin: 0;font-size: 14px;line-height: 16px'><strong>DISCOUNT </strong> (" . $value['code_coupon'] . ") <br>
                                                                        </p></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                
                                
                                                        <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                                </div>
                                            </div>
                                            <!--[if (mso)|(IE)]></td>
                                        <td align='center' width='207'
                                            style=' width:207px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;'
                                            valign='top'><![endif]-->
                                            <div class='col num4'
                                                 style='display: table-cell;vertical-align: top;max-width: 320px;min-width: 204px;'>
                                                <div style='background-color: transparent; width: 100% !important;'>
                                                    <!--[if (!mso)&(!IE)]><!-->
                                                    <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                                                        <!--<![endif]-->
                                
                                
                                                        <!--[if mso]>
                                                        <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                            <tr>
                                                                <td style='padding-right: 20px; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;'>
                                                        <![endif]-->
                                                        <div style='font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;line-height:120%;color:#000000; padding-right: 20px; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;'>
                                                            <div style='font-size:12px;line-height:14px;color:#000000;font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;text-align:left;'>
                                                                <div class='txtTinyMce-wrapper' style='font-size:12px; line-height:14px;'>
                                                                    <div class='txtTinyMce-wrapper'
                                                                         style='font-size: 12px; line-height: 14px;'>
                                                                        <div class='txtTinyMce-wrapper'
                                                                             style='font-size: 12px; line-height: 14px;'>
                                                                            <div class='txtTinyMce-wrapper'
                                                                                 style='font-size: 12px; line-height: 14px;'><p
                                                                                    style='margin: 0;font-size: 14px;line-height: 16px'>
                                                                                <strong>" . $value['quantity_coupo'] . "</strong></p></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                
                                
                                                        <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                                </div>
                                            </div>
                                            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                        </div>
                                    </div>
                                </div>";

            $list .= "<div style='background-color:transparent;'>
                            <div style='Margin: 0 auto;min-width: 320px;max-width: 620px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;'
                                 class='block-grid mixed-two-up'>
                                <div style='border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;'>
                                    <!--[if (mso)|(IE)]>
                                    <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                        <tr>
                                            <td style='background-color:transparent;' align='center'>
                                                <table cellpadding='0' cellspacing='0' border='0' style='width: 620px;'>
                                                    <tr class='layout-full-width' style='background-color:#FFFFFF;'><![endif]-->
                        
                                    <!--[if (mso)|(IE)]>
                                    <td align='center' width='413'
                                        style=' width:413px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;'
                                        valign='top'><![endif]-->
                                    <div class='col num8'
                                         style='display: table-cell;vertical-align: top;min-width: 320px;max-width: 408px;'>
                                        <div style='background-color: transparent; width: 100% !important;'>
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                                                <!--<![endif]-->
                        
                        
                                                <!--[if mso]>
                                                <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                    <tr>
                                                        <td style='padding-right: 20px; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;'>
                                                <![endif]-->
                                                <div style='font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;line-height:120%;color:#000000; padding-right: 20px; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;'>
                                                    <div style='font-size:12px;line-height:14px;color:#000000;font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;text-align:left;'>
                                                        <div class='txtTinyMce-wrapper' style='font-size:12px; line-height:14px;'>
                                                            <div class='txtTinyMce-wrapper'
                                                                 style='font-size: 12px; line-height: 14px;'>
                                                                <div class='txtTinyMce-wrapper'
                                                                     style='font-size: 12px; line-height: 14px;'><p
                                                                        style='margin: 0;font-size: 14px;line-height: 16px'><strong>TOTAL</strong><br>
                                                                </p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                        
                        
                                                <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td>
                                <td align='center' width='207'
                                    style=' width:207px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;'
                                    valign='top'><![endif]-->
                                    <div class='col num4'
                                         style='display: table-cell;vertical-align: top;max-width: 320px;min-width: 204px;'>
                                        <div style='background-color: transparent; width: 100% !important;'>
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'>
                                                <!--<![endif]-->
                        
                        
                                                <!--[if mso]>
                                                <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                    <tr>
                                                        <td style='padding-right: 20px; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;'>
                                                <![endif]-->
                                                <div style='font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;line-height:120%;color:#000000; padding-right: 20px; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;'>
                                                    <div style='font-size:12px;line-height:14px;color:#000000;font-family:'Lato', Tahoma, Verdana, Segoe, sans-serif;text-align:left;'>
                                                        <div class='txtTinyMce-wrapper' style='font-size:12px; line-height:14px;'>
                                                            <div class='txtTinyMce-wrapper'
                                                                 style='font-size: 12px; line-height: 14px;'>
                                                                <div class='txtTinyMce-wrapper'
                                                                     style='font-size: 12px; line-height: 14px;'>
                                                                    <div class='txtTinyMce-wrapper'
                                                                         style='font-size: 12px; line-height: 14px;'><p
                                                                            style='margin: 0;font-size: 14px;line-height: 16px'>
                                                                        <strong>$" . $total . "</strong></p></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                        
                        
                                                <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
                        <div style='background-color:transparent;'>
                            <div style='Margin: 0 auto;min-width: 320px;max-width: 620px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;'
                                 class='block-grid '>
                                <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                                    <!--[if (mso)|(IE)]>
                                    <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                        <tr>
                                            <td style='background-color:transparent;' align='center'>
                                                <table cellpadding='0' cellspacing='0' border='0' style='width: 620px;'>
                                                    <tr class='layout-full-width' style='background-color:transparent;'><![endif]-->
                        
                                    <!--[if (mso)|(IE)]>
                                    <td align='center' width='620'
                                        style=' width:620px; padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;'
                                        valign='top'><![endif]-->
                                    <div class='col num12'
                                         style='min-width: 320px;max-width: 620px;display: table-cell;vertical-align: top;'>
                                        <div style='background-color: transparent; width: 100% !important;'>
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                                                <!--<![endif]-->
                        
                        
                                                <div style='padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 15px;'>
                                                    <!--[if (mso)]>
                                                    <table width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                        <tr>
                                                            <td style='padding-right: 10px;padding-left: 10px; padding-top: 15px; padding-bottom: 15px;'>
                                                                <table width='100%' align='center' cellpadding='0' cellspacing='0'
                                                                       border='0'>
                                                                    <tr>
                                                                        <td><![endif]-->
                                                    <div align='center'>
                                                        <div style='border-top: 1px dotted #CCCCCC; width:100%; line-height:1px; height:1px; font-size:1px;'>
                                                            &#160;
                                                        </div>
                                                    </div>
                                                    <!--[if (mso)]></td></tr></table></td></tr></table><![endif]-->
                                                </div>
                        
                        
                                                <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>";

        }


        return $list;

    }

    /**
     * Funcion para pago cancelado
     */
    public function payment_canceled()
    {

        if ($this->session->userdata('user_id') && $this->session->userdata('order_code')) {

            $data_conditions['user_id'] = $this->session->userdata('user_id');
            $data_conditions['order_number'] = $this->session->userdata('order_code');
            $data_conditions['total_to_paid'] = $this->session->userdata('total_to_paid');
            $data_conditions['status'] = "Canceled";
            $data_conditions['coupon_id'] = NULL;


            $update_status = $this->Mdl_purchases->front_purchases_update_order_status($data_conditions);

            if ($update_status[0]['update_status_order']) {

                $uri = ROOT_URL . 'altar/Ctr_purchases/';
                redirect($uri, 'refresh');

            }

        } else {

            $uri = ROOT_URL . 'altar/Ctr_purchases/';
            redirect($uri, 'refresh');

        }

    }

    /**
     * Funcion para validar si el cupon :
     * 1.- Existe
     * 2.- Si ha sido usado
     */
    public function validate_coupon_applied()
    {
        $coupon = $this->input->post('coupon_input');

        $message = "";
        $response = FALSE;
        $coupon_id = "";
        $coupon_code = "";
        $coupon_type = "";
        $coupon_quantity = "";

        if (isset($coupon) && !is_null($coupon) && !empty($coupon)) {

            $validate_exist = $this->Mdl_purchases->front_purchases_validate_coupon_exist($coupon);

            if ($validate_exist[0]['coupon_exist']) {

                $validate_if_used = $this->Mdl_purchases->front_purchases_validate_coupon_used($coupon);

                if ($validate_if_used[0]['coupon_used']) {

                    $response = TRUE;
                    $message = "El cupón se aplicó a tu compra.";
                    $coupon_id = $validate_if_used[0]['id'];
                    $coupon_code = $validate_if_used[0]['code_coupon'];
                    $coupon_type = $validate_if_used[0]['type'];
                    $coupon_quantity = $validate_if_used[0]['quantity'];

                    $this->session->set_userdata('coupon_id', $coupon_id);


                } else {

                    $message = "El cupón ya fue usado, ingrese un cupón nuevo.";
                }

            } else {
                $message = "El cupón no existe en nuestros registros.";
            }


        } else {
            $message = "Falta el cupón";
        }


        echo json_encode(['response' => $response,
            'message' => $message,
            'coupon_id' => $coupon_id,
            'coupon_code' => $coupon_code,
            'coupon_type' => $coupon_type,
            'coupon_quantity' => $coupon_quantity]);
    }


}

