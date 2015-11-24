### Create the class

```php
require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$api     = new Wiziq\API\ClassroomApi($gateway);

try {
    $classroom = Wiziq\Entity\Classroom::build('Class title', 'teacher@email.com', new \DateTime('now'));
    $response  = $api->create($classroom);

    printf('Class %s created: %s', $classroom, var_export($response, true));
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
    $classroom = Wiziq\Entity\PermaClassroom::build('Class title', 'teacher@email.com');
    $response  = $api->createPermaClass($classroom);

    printf('Perma class %s created: %s', $classroom, var_export($response, true));
} catch (Wiziq\Common\Api\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
```
