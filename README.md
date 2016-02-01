# wiziq-integration

[![Build Status](https://travis-ci.org/mikemix/wiziq-integration.svg?branch=master)](https://travis-ci.org/mikemix/wiziq-integration) [![Build Status](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/build-status/master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mikemix/wiziq-integration/?branch=master)

Integration library with [Wiziq](http://www.wiziq.com)'s API:

1. [Teacher API examples](docs/teacher-api.md)
2. [Virtual Classroom API examples](docs/virtual-classroom-api.md)

### Installation

Best install with Composer

1. You don't have Composer? Download it `php -r "readfile('https://getcomposer.org/installer');" | php`
2. Download the library `php composer.phar require mikemix/wiziq-integration` (rules of [semantic versioning](http://semver.org) apply)
3. See the [docs](docs) for examples

### Unit tests

phpUnit is required to run the suite.

1. `php -r "readfile('https://getcomposer.org/installer');" | php`
2. `php composer.phar create-project mikemix/wiziq-integration`
3. `phpunit`
