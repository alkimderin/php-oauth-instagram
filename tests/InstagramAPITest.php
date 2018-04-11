<?php
/**
 * Class InstagramTest
 *
 * @filesource   InstagramTest.php
 * @created      10.07.2017
 * @package      chillerlan\InstagramTest
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\InstagramTest;

use chillerlan\Instagram\Instagram;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property  \chillerlan\Instagram\Instagram $provider
 */
class InstagramAPITest extends OAuth2APITestAbstract{

	protected $CFGDIR = __DIR__.'/../config';
	protected $FQCN   = Instagram::class;
	protected $envvar = 'INSTAGRAM';

	protected $test_name;
	protected $test_id;

	protected function setUp(){
		$this->markTestSkipped('not on CI');

		parent::setUp();

		$tokenParams = $this->storage->getAccessToken($this->provider->serviceName)->extraParams;

		$this->test_name = $tokenParams['user']['username'];
		$this->test_id   = $tokenParams['user']['id'];
	}

	public function testProfile(){
		$this->response = $this->provider->profile('self');

		$this->assertSame($this->test_name, $this->response->json->data->username);
	}

}
