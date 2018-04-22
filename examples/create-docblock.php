<?php
/**
 * @filesource   create-docblock.php
 * @created      09.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Instagram;

use chillerlan\HTTP\HTTPResponseInterface;

/** @var \chillerlan\OAuth\Providers\Instagram\Instagram $instagram */
$instagram = null;
/** @var \chillerlan\MagicAPI\EndpointMapInterface $endpointmap */
$endpointmap = null;
$servicename = null;

require_once __DIR__.'/instagram-common.php';

$new_doc    = $endpointmap->createDocblock(HTTPResponseInterface::class);
$reflection = new \ReflectionClass($instagram);
$classfile  = $reflection->getFileName();

file_put_contents($classfile, str_replace($reflection->getDocComment().PHP_EOL, $new_doc, file_get_contents($classfile)));
file_put_contents(__DIR__.'/'.$servicename.'-API.json', $endpointmap->__toJSON(true));

print_r($new_doc);

exit;
