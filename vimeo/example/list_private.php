<?php

use Vimeo\Vimeo;

/**
 *   Copyright 2014 Vimeo
 *
 *   Licensed under the Apache License, Version 2.0 (the "License");
 *   you may not use this file except in compliance with the License.
 *   You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 *   Unless required by applicable law or agreed to in writing, software
 *   distributed under the License is distributed on an "AS IS" BASIS,
 *   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *   See the License for the specific language governing permissions and
 *   limitations under the License.
 */
/**
 * Search example using the Official PHP library for the Vimeo API
 */
$config = require(__DIR__ . '/init.php');
if (empty($config['access_token'])) {
    throw new Exception('You can not search without an access token. You can find this token on your app page, or generate one using auth.php');
}
$id = '226157977';
$lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);
//Show first page of results, Set the number of items to show on each page to 50, Sort by relevance, Show results in descending order, and Filter only Creative Commons License videos
$me = $lib->request("/me/videos/$id");
//iframe vídeo
$embed = $me["body"];

//edit video size
/*$default_size = 'width="' . $me["body"]["width"] . '" height="' . $me["body"]["height"] . '"';
$new_size = 'width="420" height="220"';

$embed = str_replace($default_size, $new_size, $embed);

//autoplay
$embed = str_replace('player_id=0', 'player_id=0&autoplay=1', $embed);
*/
var_dump($embed);
?>

<a href="https://player.vimeo.com/play/794387409?s=226157977_1500483264_003836f82efb8b848058ee12059a9789&loc=external&context=Vimeo%5CController%5CClipController.main&download=1
"> download</a>



