<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/../vendor/autoload.php';

use Boom\Configuration\ConfigurationLoader;

$loader = new ConfigurationLoader(
    dirname(__DIR__) . '/config'
);

echo "<pre>";

print_r($loader->load());

echo "</pre>";