<?php

require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$sdk     = new Wiziq\API\WiziqSdk($gateway);

try {
    $teacher = new Wiziq\Entity\Teacher('Mike Test', 'mike@test.com', 'his_password');
    $sdk->addTeacher($teacher);

    sprintf('Teacher %s added!', $teacher);
} catch (Wiziq\Common\API\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
