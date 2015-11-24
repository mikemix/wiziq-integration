<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Entity\Classroom;

class Create implements RequestInterface
{
    /** @var Classroom */
    private $classroom;

    public function __construct(Classroom $classroom)
    {
        $this->classroom = $classroom;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'create';
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return array_filter($this->classroom->toArray());
    }
}
