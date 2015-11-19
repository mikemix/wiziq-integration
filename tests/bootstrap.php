<?php

$autoloader = require __DIR__ . '/../vendor/autoload.php';
if (!$autoloader) {
    throw new RuntimeException('You did run composer install did you?');
}

