<?php
namespace mikemix\Wiziq\API;

class Response
{
    /** @var \SimpleXMLElement */
    protected $xml;

    public function __construct(\SimpleXMLElement $xml)
    {
        $this->xml = $xml;
    }

    /**
     * Was this API call successful
     *
     * @return bool
     */
    public function isSuccess()
    {
        return (string)$this->xml['status'] !== 'fail';
    }

    /**
     * If not return error code
     */
    public function getErrorCode()
    {
        if ($this->isSuccess()) {
            throw new \BadMethodCallException('Response is correct, no error code available');
        }

        return (int)$this->xml->error[0]['code'];
    }

    /**
     * If not return error message
     */
    public function getErrorMessage()
    {
        if ($this->isSuccess()) {
            throw new \BadMethodCallException('Response is correct, no error message available');
        }

        return (string)$this->xml->error[0]['msg'];
    }

    /**
     * Return XML response from Wiziq
     *
     * @return \SimpleXMLElement
     */
    public function getResponse()
    {
        return $this->xml;
    }
}
