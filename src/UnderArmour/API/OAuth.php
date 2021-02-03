<?php
namespace UnderArmour\API;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Token\AccessToken as AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait as BearerAuthorizationTrait;
use League\OAuth2\Client\Provider\AbstractProvider as AbstractProvider;
use Psr\Http\Message\ResponseInterface;

/**
 * Under Armour OAuth
 * The Under Armour implementation of the OAuth client
 *
 * @see: https://github.com/thephpleague/oauth2-client
 * @author James Van Hinsbergh
 * @author David Purser
 */
class OAuth extends AbstractProvider
{
    use BearerAuthorizationTrait;

    /**
     * Returns the base URL for authorizing a client.
     *
     * @return string
     */
    public function getBaseAuthorizationUrl()
    {
        return 'https://www.mapmyfitness.com/v7.1/oauth2/authorize/';
    }

    /**
     * Returns the base URL for requesting an access token.
     *
     * @param  array $params
     * @return string
     */
    public function getBaseAccessTokenUrl(array $params)
    {
        return 'https://api.ua.com/v7.1/oauth2/access_token/';
    }

    /**
     * Returns the URL for requesting the resource owner's details.
     *
     * @param  AccessToken $token
     * @return string
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return 'https://api.ua.com/v7.1/user/self/';
    }

    /**
     * Returns the default scopes used by this provider.
     *
     * This should only be the scopes that are required to request the details
     * of the resource owner, rather than all the available scopes.
     *
     * @return array
     */
    protected function getDefaultScopes()
    {
        // TODO: Implement getDefaultScopes() method.
        return null;
    }

    /**
     * Checks a provider response for errors.
     *
     * @throws IdentityProviderException
     * @param  ResponseInterface $response
     * @param  array|string      $data     Parsed response data
     * @return void
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {
        $statusCode = $response->getStatusCode();
        if ($statusCode < 200 || $statusCode > 202) {
            throw new IdentityProviderException(
                'authorize failed',
                $response->getStatusCode(),
                $response
            );
        }
    }

    /**
     * Generates a resource owner object from a successful resource owner
     * details request.
     *
     * @param  array       $response
     * @param  AccessToken $token
     * @return ResourceOwnerInterface
     */
    protected function createResourceOwner(array $response, AccessToken $token)
    {
        // TODO: Implement createResourceOwner() method.
    }
}