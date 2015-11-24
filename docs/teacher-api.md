### Add the teacher

```php
require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$api     = new Wiziq\API\TeacherApi($gateway);

try {
    $teacher = Wiziq\Entity\Teacher::build('Mike Test', 'mike@test.com', 'his_password')
        ->withAbout('I am the best teacher there is!')
        ->withTimeZone('Europe/Warsaw')
        ->withImage('http://some.cdn.net/my-avatar.png');

    $teacherId = $api->addTeacher($teacher);

    sprintf('Teacher %s added!', $teacher);
} catch (Wiziq\Common\Api\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
```

### Edit the teacher

```php
require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$api     = new Wiziq\API\TeacherApi($gateway);

try {
    $teacher = Wiziq\Entity\Teacher::build('Mike Test', 'mikexxx@test.com', 'his_new_password');
    $api->editTeacher($teacherId, $teacher);

    sprintf('Teacher %s edited!', $teacher);
} catch (Wiziq\Common\Api\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
```

### Get teacher details

```php
require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$api     = new Wiziq\API\TeacherApi($gateway);

try {
    $details = $api->getTeacherDetails($teacherId);

    sprintf('Teacher details: %s', var_export($details, true));
} catch (Wiziq\Common\Api\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
```
