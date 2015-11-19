<?php
namespace mikemix\Wiziq\Http;

use mikemix\Wiziq\Common\Http\ClientInterface;
use mikemix\Wiziq\Common\Http\Exception;

class CurlClient implements ClientInterface
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
            throw Exception\InvalidResponseException::with($url, $error);
        }

        return $response;
    }
}
