<?php
/**
 * @filesource   endpointmap-json.php
 * @created      09.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\InstagramExamples;

use chillerlan\Instagram\InstagramEndpoints;

$servicename = null;

require_once __DIR__.'/instagram-common.php';

file_put_contents(__DIR__.'/'.$servicename.'-API.json', (new InstagramEndpoints)->__toJSON(true));
