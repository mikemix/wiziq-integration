<?php
namespace mikemix\Wiziq\Common\Http;

use mikemix\Wiziq\API\Response;

interface ClientInterface
{
    /**
     * @param string $url  URL to contact
     * @param array  $data POST data to send
     * @return Response Wiziq's response
     *
     * @throws Exception\InvalidResponseException When no data was returned
     */
    public function getResponse($url, array $data);
}
