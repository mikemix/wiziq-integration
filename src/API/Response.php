<?php
namespace mikemix\Wiziq\API;

use mikemix\Wiziq\Common\Api\ResponseInterface;

class Response implements ResponseInterface
{
    /** @var array */
    protected $response;

    /**
     * {@inheritdoc}
     */
    public static function createFrom(\SimpleXMLElement $xml)
    {
        $response = new self();
        $response->response = json_decode(json_encode($xml), true);

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function isSuccess()
    {
        return $this->response['@attributes']['status'] !== 'fail';
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorCode()
    {
        if ($this->isSuccess()) {
            throw new \BadMethodCallException('Ten response jest prawidlowy i nie posiada numeru bledu');
        }

        return (int)$this->response['error']['@attributes']['code'];
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorMessage()
    {
        if ($this->isSuccess()) {
            throw new \BadMethodCallException('Ten response jest prawidlowy i nie posiada numeru bledu');
        }

        return (string)$this->response['error']['@attributes']['msg'];
    }
}
