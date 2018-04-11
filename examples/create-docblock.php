<?php
/**
 * @filesource   create-docblock.php
 * @created      09.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\InstagramExamples;

use chillerlan\HTTP\HTTPResponseInterface;
use chillerlan\MagicAPI\EndpointDocblockTrait;
use chillerlan\Instagram\InstagramEndpoints;

/** @var \chillerlan\Instagram\Instagram $instagram */
$instagram = null;

require_once __DIR__.'/instagram-common.php';

$new_doc = (new class extends InstagramEndpoints{
	use EndpointDocblockTrait;
})->createDocblock(HTTPResponseInterface::class);

$reflection = new \ReflectionClass($instagram);
$classfile  = $reflection->getFileName();

file_put_contents($classfile, str_replace($reflection->getDocComment().PHP_EOL, $new_doc, file_get_contents($classfile)));

print_r($new_doc);

exit;
