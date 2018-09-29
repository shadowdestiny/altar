<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*********************************************************
 Constante de la url principal del proyecto
*********************************************************/
defined('ROOT_URL')			    OR define('ROOT_URL', 'http://104.197.71.141/altar/');
defined('ROOT_URL_BACK')			    OR define('ROOT_URL_BACK', 'http://35.232.34.5/altar/backoffice/');
defined('SITE_NAME')              OR define('SITE_NAME', 'CreativeAltar');
defined('TIME_SESSION')            OR define('TIME_SESSION', 20);
defined('TIME_ZONE')            OR define('TIME_ZONE', 'America/Mexico_City');

/*PAYPAL*/
/**
 *  $this->paypalUrl = "https://www.sandbox.paypal.com/cgi-bin/webscr";
$this->paypalAcount = "efryend.paypal@pro.com";
 *  $this->paypalItemName = "Morlacos";
 *  $this->paypalUrlReturnWon = ROOT_URL . "auction/package/completeObjectPayPal";
 */

defined('API_PAYPAL_FORM_ACTION')   OR define('API_PAYPAL_FORM_ACTION', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
defined('API_PAYPAL_BUSINESS')      OR define('API_PAYPAL_BUSINESS', 'efryend.paypal@pro.com');
defined('API_PAYPAL_ITEM')          OR define('API_PAYPAL_ITEM', 'Morlacos');
defined('API_PAYPAL_CURRENCY')      OR define('API_PAYPAL_CURRENCY', 'MXN');
defined('API_PAYPAL_URL_RETURN')    OR define('API_PAYPAL_URL_RETURN', ROOT_URL . "altar/Ctr_purchases/payment_completed");
defined('API_PAYPAL_URL_CANCEL')    OR define('API_PAYPAL_URL_CANCEL', ROOT_URL . "altar/Ctr_purchases/payment_canceled");

/*********************************************************
 * EMAIL CONFIGURE
 ***********************************************************/
defined('USER_MAIL')                     OR define('USER_MAIL', 'futuresoftware17@gmail.com');
defined('PASS_MAIL')                     OR define('PASS_MAIL', '***890Ayanami909rei***');

/*********************************************************
Constante de lenguajes
 *********************************************************/
defined('LANG_ES')			    OR define('LANG_ES', 'es');
defined('LANG_EN')			    OR define('LANG_EN', 'en');

/*********************************************************
Constante que contiene la ruta de la landing page
 *********************************************************/
defined('URL_ASSETS')			OR define('URL_ASSETS', ROOT_URL.'assets/');
defined('URL_IMAGES')			OR define('URL_IMAGES', URL_ASSETS.'images/');
defined('VIEW_BACK')			OR define('VIEW_BACK', ROOT_URL.'application/modules/backoffice/views/');
defined('VIEW_FRONT')			OR define('VIEW_FRONT', ROOT_URL.'application/modules/altar/views/');
defined('URL_TEMPLATEBACK')		OR define('URL_TEMPLATEBACK', ROOT_URL.'application/modules/backoffice/views/include/template/');
defined('URL_TEMPLATEBACKJS')		OR define('URL_TEMPLATEBACKJS', ROOT_URL.'application/modules/backoffice/views/include/js/');
defined('URL_TEMPLATEBACKNEW')		OR define('URL_TEMPLATEBACKNEW', ROOT_URL.'application/modules/backoffice/views/include/newTemplate/');
defined('URL_TEMPLATEFRONT')		OR define('URL_TEMPLATEFRONT', ROOT_URL.'application/modules/altar/views/include/template/');
defined('URL_TEMPLATEFRONTNEW')		OR define('URL_TEMPLATEFRONTNEW', ROOT_URL.'application/modules/altar/views/include/newTemplate2/');

/* CONSTANTS API MAILCHIP*/
defined('API_MAILCHIP_CLIENT_ID')			OR define('API_MAILCHIP_CLIENT_ID', '539359354134');
defined('API_MAILCHIP_CLIENT_SECRET')		OR define('API_MAILCHIP_CLIENT_SECRET', '99566931ba4ebb6aade746d4ce34dc217792891902baa0f710');

/*API RECAPCHA*/
defined('RECAPCHA_GOOGLE_KEY_SITE')			OR define('RECAPCHA_GOOGLE_SITE', '6LdI2SgUAAAAACLaxI5dL8DMj0YAkx6u6odeC5WR');
defined('RECAPCHA_GOOGLE_KEY_SECRET')		OR define('RECAPCHA_GOOGLE_KEY_SECRET', '6LdI2SgUAAAAAFOH5-eMvkjxQDLOMD18rFQs_43U');

/*********************************************************
Constante que contiene las rutas de la pagína principal
 *********************************************************/
defined('URL_TEMPLATEALTAR')		OR define('URL_TEMPLATEALTAR', ROOT_URL.'application/modules/altar/views/include/include_altarcreative/');

//Version CSS y JS
defined('URL_TEMPLATEALTARVERSIONCSSJS')		OR define('URL_TEMPLATEALTARVERSIONCSSJS', '?v=1.00004');


//Constante que contiene las ruta del video en 'vw_creativealtar/index.php'
defined('URL_TEMPLATEALTARVIDEO1')		OR define('URL_TEMPLATEALTARVIDEO1', ROOT_URL.'application/modules/altar/views/include/include_altarcreative/images/videos/explore.jpg');
defined('URL_TEMPLATEALTARVIDEO2')		OR define('URL_TEMPLATEALTARVIDEO2', ROOT_URL.'application/modules/altar/views/include/include_altarcreative/images/videos/explore.mp4');
defined('URL_TEMPLATEALTARVIDEO3')		OR define('URL_TEMPLATEALTARVIDEO3', ROOT_URL.'application/modules/altar/views/include/include_altarcreative/images/videos/explore.webm');


/*******************************************
Constante Correo
 *****************************************/

define('CORREO_CONTACTO', 'rdcarrada@gmail.com');


/******************************************
 *CONSTANTES PARA REDES SOCIELES
 ******************************************/
defined('API_FACEBOOK')		OR define('API_FACEBOOK', '707536219444771');
defined('TWITTER_DOMAIN')		OR define('TWITTER_DOMAIN', '@Dannyasd1');
defined('URL_FACEBOOK')		OR define('URL_FACEBOOK', 'https://www.facebook.com/abcdigital.agencia/');
defined('URL_TWITTER')		OR define('URL_TWITTER', 'https://twitter.com/AltarCreative?lang=es');
defined('URL_INSTAGRAM')		OR define('URL_INSTAGRAM', 'https://www.instagram.com/altar_creative/');
defined('URL_GOOGLEPLUS')		OR define('URL_GOOGLEPLUS', 'https://plus.google.com/+AbcdigitalMx');
defined('URL_INSTAGRAM')		OR define('URL_INSTAGRAM', 'https://plus.google.com/+AbcdigitalMx');
defined('URL_PAYPAL')		    OR define('URL_PAYPAL', 'https://www.paypal.com/mx/home');
defined('SOCIAL_TITLE_DEFAULT')		OR define('SOCIAL_TITLE_DEFAULT', 'CREATIVE ALTAR');
defined('SOCIAL_DESCRIPT_DEFAULT')		OR define('SOCIAL_DESCRIPT_DEFAULT', 'Creative Altar es una empresa muy importante ...');




/*********************************************************
Constantes menu usuario principal
 *********************************************************/
defined('URL_USUARIO_INDEX')		OR define('URL_USUARIO_INDEX', ROOT_URL.'altar/Ctr_account/');
defined('URL_USUARIO_HISTORY')		OR define('URL_USUARIO_HISTORY', ROOT_URL.'altar/Ctr_account/orders_history');
defined('URL_USUARIO_FAVORITE')		OR define('URL_USUARIO_FAVORITE', ROOT_URL.'altar/Ctr_account_favorite/');
defined('URL_USUARIO_CANCEL')		OR define('URL_USUARIO_CANCEL', ROOT_URL.'altar/Ctr_account/cancel_account');

