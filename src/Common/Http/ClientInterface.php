<?php
namespace mikemix\Wiziq\Common\Http;

interface ClientInterface
{
    /**
     * @param string $url  URL to contact
     * @param array  $data POST data to send
     * @return string RAW wiziq response
     *
     * @throws Exception\InvalidResponseException When no data was returned
     */
    public function getResponse($url, array $data);
}
