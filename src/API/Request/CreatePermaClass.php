<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;
use mikemix\Wiziq\Entity\PermaClassroom;

class CreatePermaClass implements RequestInterface
{
    /** @var PermaClassroom */
    private $classroom;

    public function __construct(PermaClassroom $classroom)
    {
        $this->classroom = $classroom;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'create_perma_class';
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return array_filter($this->classroom->toArray());
    }
}
