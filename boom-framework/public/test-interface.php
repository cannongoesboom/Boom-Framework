<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

echo '<pre>';

var_dump(
    interface_exists(\Boom\Configuration\ConfigurationInterface::class)
);

echo '</pre>';