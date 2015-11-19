<?php
namespace mikemix\Wiziq\API;

class Response
{
    /** @var array */
    protected $response;

    public function __construct(\SimpleXMLElement $xml)
    {
        $this->response = json_decode(json_encode($xml), true);
    }

    /**
     * Was this API call successful
     *
     * @return bool
     */
    public function isSuccess()
    {
        return $this->response['@attributes']['status'] !== 'fail';
    }

    /**
     * If not return error code
     */
    public function getErrorCode()
    {
        if ($this->isSuccess()) {
            throw new \BadMethodCallException('Ten response jest prawidlowy i nie posiada numeru bledu');
        }

        return (int)$this->response['error']['@attributes']['code'];
    }

    /**
     * If not return error message
     */
    public function getErrorMessage()
    {
        if ($this->isSuccess()) {
            throw new \BadMethodCallException('Ten response jest prawidlowy i nie posiada numeru bledu');
        }

        return (string)$this->response['error']['@attributes']['msg'];
    }
}
