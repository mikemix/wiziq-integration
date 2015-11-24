### Create the class

```php
require 'vendor/autoload.php';

use mikemix\Wiziq;

$auth    = new Wiziq\API\Auth('your-secret-access-key', 'public-access-key');
$gateway = new Wiziq\API\Gateway($auth);
$api     = new Wiziq\API\ClassroomApi($gateway);

try {
    $classroom = Wiziq\Entity\Classroom::build('Class title', new \DateTime('now'), 'teacher@email.com');
    $api->create($classroom);

    sprintf('Class %s created!', $classroom);
} catch (Wiziq\Common\Api\Exception\CallException $e) {
    die($e->getMessage());
} catch (Wiziq\Common\Http\Exception\InvalidResponseException $e) {
    die($e->getMessage());
}
```
