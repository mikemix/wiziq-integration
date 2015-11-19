<?php
namespace mikemix\Wiziq\Common\Api;

interface RequestInterface
{
    /**
     * Calling method name.
     *
     * @return string
     */
    public function getMethod();

    /**
     * Calling method params.
     *
     * @return array
     */
    public function getParams();
}
