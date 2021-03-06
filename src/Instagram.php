<?php
/**
 * Class Instagram
 *
 * @link https://www.instagram.com/developer/endpoints/
 * @link https://www.instagram.com/developer/authentication/
 *
 * @filesource   Instagram.php
 * @created      10.04.2018
 * @package      chillerlan\OAuth\Providers\Instagram
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Instagram;

use chillerlan\MagicAPI\{
	ApiClientInterface, ApiClientTrait
};
use chillerlan\OAuth\Core\{
	CSRFToken, CSRFTokenTrait, OAuth2Provider
};

/**
 * @method \chillerlan\HTTP\HTTPResponseInterface profile(string $user_id)
 * @method \chillerlan\HTTP\HTTPResponseInterface recentMedia(string $user_id, array $params = ['max_id', 'min_id', 'count'])
 * @method \chillerlan\HTTP\HTTPResponseInterface relationship(string $user_id)
 * @method \chillerlan\HTTP\HTTPResponseInterface relationshipUpdate(string $user_id, array $params = ['action'])
 * @method \chillerlan\HTTP\HTTPResponseInterface searchUser(array $params = ['q', 'count'])
 * @method \chillerlan\HTTP\HTTPResponseInterface selfFollows()
 * @method \chillerlan\HTTP\HTTPResponseInterface selfFollowedBy()
 * @method \chillerlan\HTTP\HTTPResponseInterface selfRequestedBy()
 * @method \chillerlan\HTTP\HTTPResponseInterface selfMediaLiked(array $params = ['max_like_id', 'count'])
 * @method \chillerlan\HTTP\HTTPResponseInterface media(string $media_id)
 * @method \chillerlan\HTTP\HTTPResponseInterface mediaComments(string $media_id)
 * @method \chillerlan\HTTP\HTTPResponseInterface mediaAddComment(string $media_id, array $params = ['text'])
 * @method \chillerlan\HTTP\HTTPResponseInterface mediaRemoveComment(string $media_id, string $comment_id)
 * @method \chillerlan\HTTP\HTTPResponseInterface mediaLikes(string $media_id)
 * @method \chillerlan\HTTP\HTTPResponseInterface mediaLike(string $media_id)
 * @method \chillerlan\HTTP\HTTPResponseInterface mediaUnlike(string $media_id)
 * @method \chillerlan\HTTP\HTTPResponseInterface mediaShortcode(string $shortcode)
 * @method \chillerlan\HTTP\HTTPResponseInterface searchMedia(array $params = ['lat', 'lng', 'distance'])
 * @method \chillerlan\HTTP\HTTPResponseInterface tags(string $tagname)
 * @method \chillerlan\HTTP\HTTPResponseInterface tagsRecentMedia(string $tagname, array $params = ['max_tag_id', 'min_tag_id', 'count'])
 * @method \chillerlan\HTTP\HTTPResponseInterface searchTags(array $params = ['q'])
 * @method \chillerlan\HTTP\HTTPResponseInterface locations(string $location_id)
 * @method \chillerlan\HTTP\HTTPResponseInterface locationRecentMedia(string $location_id, array $params = ['max_id', 'min_id', 'count'])
 * @method \chillerlan\HTTP\HTTPResponseInterface searchLocations(array $params = ['lat', 'lng', 'distance', 'facebook_places_id'])
 */
class Instagram extends OAuth2Provider implements CSRFToken, ApiClientInterface{
	use CSRFTokenTrait, ApiClientTrait;

	public const SCOPE_BASIC          = 'basic';
	public const SCOPE_COMMENTS       = 'comments';
	public const SCOPE_RELATIONSHIPS  = 'relationships';
	public const SCOPE_LIKES          = 'likes';
	public const SCOPE_PUBLIC_CONTENT = 'public_content';
	public const SCOPE_FOLLOWER_LIST  = 'follower_list';

	protected $apiURL         = 'https://api.instagram.com/v1';
	protected $authURL        = 'https://api.instagram.com/oauth/authorize';
	protected $accessTokenURL = 'https://api.instagram.com/oauth/access_token';
	protected $userRevokeURL  = 'https://www.instagram.com/accounts/manage_access/';
	protected $authMethod     = self::QUERY_ACCESS_TOKEN;
	protected $endpointMap    = InstagramEndpoints::class;

}
