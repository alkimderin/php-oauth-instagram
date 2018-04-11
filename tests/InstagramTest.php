<?php
/**
 * Class InstagramTest
 *
 * @filesource   InstagramTest.php
 * @created      01.01.2018
 * @package      chillerlan\InstagramTest
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\InstagramTest;

use chillerlan\Instagram\Instagram;
use chillerlan\OAuthTest\Providers\OAuth2Test;

/**
 * @property \chillerlan\Instagram\Instagram $provider
 */
class InstagramTest extends OAuth2Test{

	protected $FQCN = Instagram::class;

}
