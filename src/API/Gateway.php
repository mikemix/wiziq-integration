<?php
namespace mikemix\Wiziq\API;

use mikemix\Wiziq\Common\Api\Exception\CallException;
use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Common\Http\ClientInterface;
use mikemix\Wiziq\Http\CurlClient;

/**
 * Wiziq's API gateway
 */
class Gateway
{
    const URL = 'https://class.api.wiziq.com';

    /** @var Auth */
    private $auth;

    /** @var ClientInterface */
    private $client;

    /** @var string */
    private $endpointUrl;

    public function __construct(Auth $auth, ClientInterface $client = null, $endpointUrl = self::URL)
    {
        $this->auth        = $auth;
        $this->client      = $client ?: new CurlClient();
        $this->endpointUrl = $endpointUrl;
    }

    /**
     * @param RequestInterface $wiziqRequest
     *
     * @return \SimpleXMLElement
     *
     * @throws CallException If Wiziq declined the request
     */
    public function sendRequest(RequestInterface $wiziqRequest)
    {
        $url = sprintf('%s?method=%s', $this->endpointUrl, $wiziqRequest->getMethod());
        $params = $this->auth->preparePayload($wiziqRequest->getMethod(), $wiziqRequest->getParams());

        $rawResponse = $this->client->getResponse($url, $params);
        $xmlObject   = simplexml_load_string($rawResponse);
        $response    = new Response($xmlObject);

        if (!$response->isSuccess()) {
            throw CallException::from($response);
        }

        return $response->getResponse();
    }
}
