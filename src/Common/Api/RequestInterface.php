<?php
namespace mikemix\Wiziq\Common\Api;

interface RequestInterface
{
    /**
     * Send request to Wiziq API.
     *
     * @param string $method Which method to call?
     * @param array  $data   Payload to send
     * @return ResponseInterface The response
     */
    public function doRequest($method, array $data);
}
