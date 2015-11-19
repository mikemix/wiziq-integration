<?php
namespace mikemix\Wiziq\Common\Api;

/**
 * Response object
 */
interface ResponseInterface
{
    /**
     * Create response from the XML response
     *
     * @param \SimpleXMLElement $xml
     * @return self
     */
    public static function createFrom(\SimpleXMLElement $xml);

    /**
     * Was request successful?
     *
     * @return bool
     */
    public function isSuccess();

    /**
     * Get error code if not.
     *
     * @return int
     */
    public function getErrorCode();

    /**
     * Get error message if not.
     *
     * @return string
     */
    public function getErrorMessage();
}
