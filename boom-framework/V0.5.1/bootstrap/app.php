<?php

declare(strict_types=1);

use Boom\Foundation\Application;

require_once __DIR__ . '/../vendor/autoload.php';

return new Application(
    dirname(__DIR__)
);