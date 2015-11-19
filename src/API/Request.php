<?php
namespace mikemix\Wiziq\API;

use mikemix\Wiziq\Common\Api\AuthInterface;
use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Common\Provider\ProviderInterface;
use mikemix\Wiziq\Provider\CurlProvider;

/**
 * Wiziq's API requester
 */
final class Request implements RequestInterface
{
    const URL = 'http://class.api.wiziq.com';

    /** @var AuthInterface */
    protected $auth;

    /** @var ProviderInterface */
    protected $provider;

    /** @var string */
    protected $endpointUrl;

    public function __construct(AuthInterface $auth, ProviderInterface $provider = null, $endpointUrl = self::URL)
    {
        $this->auth        = $auth;
        $this->provider    = $provider ?: new CurlProvider();
        $this->endpointUrl = $endpointUrl;
    }

    /**
     * @param string $method
     * @param array $data
     * @return Response
     */
    public function doRequest($method, array $data)
    {
        $data     = $this->auth->prepareRequest($method, $data);
        $response = $this->provider->getResponse($this->endpointUrl . '?method=' . $method, $data);

        return Response::createFrom(simplexml_load_string($response));
    }
}
