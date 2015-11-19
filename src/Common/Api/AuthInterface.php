<?php
namespace mikemix\Wiziq\Common\Api;

interface AuthInterface
{
    /**
     * Prepare the request.
     *
     * Initialize $data with the HMAC signature.
     *
     * @param string $methodName
     * @param array  $data
     * @return array
     */
    public function prepareRequest($methodName, array $data);
}
