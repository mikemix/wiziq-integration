<?php
namespace mikemix\Wiziq\Tests\API;

use mikemix\Wiziq\API\Auth;

class AuthTest extends \PHPUnit_Framework_TestCase
{
    /** @var Auth */
    private $service;

    public function setUp()
    {
        $this->service = new Auth('HU1HDyP3QRB4eM6fIdPr5g==', 'G18pttjJhBM=', 1447856244);
    }

    public function testPrepareRequestCreateValidRequest()
    {
        $signature = $this->service->preparePayload('add_attendees', ['class_id' => 11595]);

        $this->assertEquals([
            'access_key' => 'G18pttjJhBM=',
            'timestamp'  => 1447856244,
            'method'     => 'add_attendees',
            'signature'  => '4Yz932bslqYTYCPNDonTGMDoP8E=',
            'class_id'   => 11595,
        ], $signature);
    }

    public function testPreparePayloadPrepareBooleanValues()
    {
        $payload = $this->service->preparePayload('method', ['boolean' => true]);

        $this->assertSame(1, $payload['boolean'], 'Boolean value did not convert');
    }

    public function testPreparePayloadPrepareNullValues()
    {
        $payload = $this->service->preparePayload('method', ['nullable' => null]);

        $this->assertSame('', $payload['nullable'], 'Null value did not convert');
    }
}
