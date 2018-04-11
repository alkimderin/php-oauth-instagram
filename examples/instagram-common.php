<?php
/**
 * @filesource   instagram-common.php
 * @created      04.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\InstagramExamples;

use chillerlan\OAuth\Token;
use chillerlan\Instagram\Instagram;

require_once __DIR__.'/../vendor/autoload.php';

$CFGDIR = __DIR__.'/../config';
$ENVVAR = 'INSTAGRAM';

/** @var \chillerlan\Traits\ContainerInterface $options */
$options = null;

/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

/** @var \chillerlan\HTTP\HTTPClientInterface $http */
$http = null;

/** @var \chillerlan\Database\Database $db */
$db = null;

/** @var \chillerlan\OAuth\Storage\TokenStorageInterface $storage */
$storage = null;

require_once __DIR__.'/../vendor/chillerlan/php-oauth-core/examples/oauth-example-common.php';

$scopes = [
	Instagram::SCOPE_BASIC,
	Instagram::SCOPE_COMMENTS,
	Instagram::SCOPE_RELATIONSHIPS,
	Instagram::SCOPE_LIKES,
	Instagram::SCOPE_PUBLIC_CONTENT,
	Instagram::SCOPE_FOLLOWER_LIST,
];

$instagram = new Instagram($http, $storage, $options, null, $scopes);
$servicename = $instagram->serviceName;
#$instagram->setLogger($logger);

// import a token to the storage if needed
$storage->storeAccessToken(
	$servicename,
	(new Token)->__fromJSON(file_get_contents($CFGDIR.'/'.$servicename.'.token.json'))
);
