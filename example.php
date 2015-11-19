<?php

require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$sdk     = new Wiziq\API\WiziqSdk($gateway);

### ADD THE TEACHER

try {
    $teacher = new Wiziq\Entity\Teacher('Mike Test', 'mike@test.com', 'his_password');
    $teacherId = $sdk->addTeacher($teacher);

    sprintf('Teacher %s added!', $teacher);
} catch (Wiziq\Common\API\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}

### EDIT THE TEACHER

try {
    $teacher = new Wiziq\Entity\Teacher('Mike Test', 'mikexxx@test.com', 'his_new_password');
    $sdk->editTeacher($teacherId, $teacher);

    sprintf('Teacher %s edited!', $teacher);
} catch (Wiziq\Common\API\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
