<?php
/**
 * @filesource   get-token.php
 * @created      10.07.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Instagram;

/** @var \chillerlan\OAuth\Providers\Instagram\Instagram $instagram */
$instagram   = null;
$servicename = null;
$tokenfile   = null;

require_once __DIR__.'/instagram-common.php';

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$instagram->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $instagram->getAccessToken($_GET['code'], $_GET['state']);

	$user = $token->extraParams['user'];

	// save the token & redirect
	file_put_contents($tokenfile, $token->__toJSON());
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r($instagram->profile('self'), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
