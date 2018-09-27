<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// To use reCAPTCHA, you need to sign up for an API key pair for your site.
// link: http://www.google.com/recaptcha/admin
$config['recaptcha_site_key'] = RECAPCHA_GOOGLE_SITE;
$config['recaptcha_secret_key'] = RECAPCHA_GOOGLE_KEY_SECRET;

// reCAPTCHA supported 40+ languages listed here:
// https://developers.google.com/recaptcha/docs/language
$config['recaptcha_lang'] = 'es-419';

/* End of file recaptcha.php */
/* Location: ./application/config/recaptcha.php */
