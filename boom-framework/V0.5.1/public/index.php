<?php

declare(strict_types=1);

use Boom\Foundation\Kernel;

$application = require __DIR__ . '/../bootstrap/app.php';

$kernel = new Kernel($application);

$kernel->handle();