<?php

require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('HU1HDyP3QRB4eM6fIdPj5g==', 'G18ptfjJhBM=');
$gateway = new Wiziq\API\Gateway($auth);
$sdk     = new Wiziq\API\WiziqSdk($gateway);

// 204858 mike@test.com

try {
    $teacher = new Wiziq\Entity\Teacher('Mike Test', 'mike@test.com', 'his_password');
    $teacherId = $sdk->addTeacher($teacher);

    sprintf('Teacher %s added with ID %d', $teacher, $teacherId);
    echo $teacherId;
} catch (Wiziq\Common\Api\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
