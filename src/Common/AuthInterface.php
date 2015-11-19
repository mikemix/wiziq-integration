<?php
namespace mikemix\Wiziq\Common;

interface AuthInterface
{
    /**
     * Prepare the request.
     *
     * Initialize $data with the HMAC signature.
     *
     * @param string $methodName
     * @param array  $data
     * @return string
     */
    public function prepareRequest($methodName, array $data);
}
