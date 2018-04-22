<?php
/**
 * Class InstagramTest
 *
 * @filesource   InstagramTest.php
 * @created      01.01.2018
 * @package      chillerlan\OAuthTest\Providers\Instagram
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Instagram;

use chillerlan\OAuth\Providers\Instagram\Instagram;
use chillerlan\OAuthTest\Core\OAuth2Test;

/**
 * @property \chillerlan\OAuth\Providers\Instagram\Instagram $provider
 */
class InstagramTest extends OAuth2Test{

	protected $FQCN = Instagram::class;

}
