# wiziq-integration
Integration library with Wiziq's Virtual Classroom API

### Installation

Best install with Composer

1. You don't have Composer?
   Download it `php -r "readfile('https://getcomposer.org/installer');" | php`
2. Download the library `composer require mikemix/wiziq-integration:~1.0`
   Rules of [semantic versioning](http://semver.org) apply.

### Example usage, adding a teacher:

```php
<?php

require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-key', 'your-access-key');
$request = new Wiziq\API\Request($auth);
$service = new Wiziq\Service\AddTeacher($request);

$teacher = new Wiziq\ValueObject\Teacher(
    'Name Surname',
    'his@email.com',
    'his_password'
);

$response = $service->addTeacher($teacher);

if ($response->isValid()) {
    printf('Teacher %s added!', $teacher);
} else {
    printf('Something went wrong. %d: %s', $response->getErrorCode(), $response->getErrorMessage());
}
```
