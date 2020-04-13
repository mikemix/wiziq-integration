<?php
namespace mikemix\Wiziq\API\Request;

use mikemix\Wiziq\Common\Api\RequestInterface;

class Download implements RequestInterface
{
    /** @var int */
    private $classroomId;

    private $recordingFormat;

    public function __construct($classroomId, $recordingFormat)
    {
        $this->classroomId = $classroomId;

        $this->recordingFormat = $recordingFormat;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod()
    {
        return 'download_recording';
    }

    /**
     * {@inheritdoc}
     */
    public function getParams()
    {
        return [
            'class_id'  => $this->classroomId,
            'recording_format'  => $this->recordingFormat
        ];
    }
}
