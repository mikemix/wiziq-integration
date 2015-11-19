<?php
namespace mikemix\Wiziq\Provider;

use mikemix\Wiziq\Common\Provider\Exception\InvalidResponseException;
use mikemix\Wiziq\Common\Provider\ProviderInterface;

class CurlProvider implements ProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getResponse($url, array $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $error    = curl_error($ch);
        curl_close($ch);

        if (!$response) {
            throw InvalidResponseException::with($url, $error);
        }

        return $response;
    }
}
