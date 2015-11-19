# wiziq-integration

[![Build Status](https://travis-ci.org/mikemix/wiziq-integration.svg?branch=master)](https://travis-ci.org/mikemix/wiziq-integration) [![Build Status](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/build-status/master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/?branch=master)

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

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$sdk     = new Wiziq\API\WiziqSdk($gateway);

try {
    $teacher = new Wiziq\Entity\Teacher('Mike Test', 'mike@test.com', 'his_password');
    $sdk->addTeacher($teacher);

    sprintf('Teacher %s added!', $teacher);
} catch (Wiziq\API\Exception\TeacherNotAddedException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
```
