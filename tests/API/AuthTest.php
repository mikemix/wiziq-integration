<?php
namespace mikemix\Wiziq\Tests\API;

use mikemix\Wiziq\API\Auth;

class AuthTest extends \PHPUnit_Framework_TestCase
{
    public function testPrepareRequestCreateValidRequest()
    {
        $service = new Auth('HU1HDyP3QRB4eM6fIdPr5g==', 'G18pttjJhBM=', 1447856244);
        $signature = $service->prepareRequest('add_attendees', ['class_id' => 11595]);

        $this->assertEquals([
            'access_key' => 'G18pttjJhBM=',
            'timestamp'  => 1447856244,
            'method'     => 'add_attendees',
            'signature'  => '4Yz932bslqYTYCPNDonTGMDoP8E=',
            'class_id'   => 11595,
        ], $signature);
    }
}
