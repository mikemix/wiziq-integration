<?php
namespace mikemix\Wiziq\Common\Provider;

interface ProviderInterface
{
    /**
     * @param string $url  URL to contact
     * @param array  $data POST data to send
     * @return string
     *
     * @throws Exception\InvalidResponseException When no data was returned
     */
    public function getResponse($url, array $data);
}
