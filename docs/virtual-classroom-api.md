### Create the class

```php
require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$api     = new Wiziq\API\ClassroomApi($gateway);

try {
    $classroom = Wiziq\Entity\Classroom::build('Class title', new \DateTime('now'))
        ->withPresenter(100, 'Presenter Name');

    $response  = $api->create($classroom);

    printf('Class %s created: %s', $classroom, var_export($response, true));
} catch (Wiziq\Common\Api\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
```

### Modify a class

```php
require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$api     = new Wiziq\API\ClassroomApi($gateway);

try {
    $classroomId = 12345;
    $classroom = Wiziq\Entity\Classroom::build('Class title', new \DateTime('now'))
        ->withPresenter(100, 'Presenter Name');

    $response  = $api->modify($classroomId, $classroom);

    printf('Class %s created: %s', $classroom, var_export($response, true));
} catch (Wiziq\Common\Api\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
```

### Add attendees to the class (not permament one)

```php
require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$api     = new Wiziq\API\ClassroomApi($gateway);

try {
    $classroomId = 12345;
    $attendees   = Wiziq\Entity\Attendees::build()
        ->add(100, 'Mike', 'en-US')
        ->add(101, 'Susan', 'pl-PL');
        // add more if needed

    $response = $api->addAttendeesToClass($classroomId, $attendees);

    printf('Attendees to class %d added: %s', $classroomId, var_export($response, true));
} catch (Wiziq\Common\Api\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
```

### Create the permanent class

```php
require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$api     = new Wiziq\API\ClassroomApi($gateway);

try {
    $classroom = Wiziq\Entity\PermaClassroom::build('Class title')
        ->withPresenter(100, 'Presenter Name');

    $response  = $api->createPermaClass($classroom);

    printf('Perma class %s created: %s', $classroom, var_export($response, true));
} catch (Wiziq\Common\Api\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
```
