<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__.'/../vendor/autoload.php';

use Boom\Configuration\Configuration;
use Boom\Configuration\ConfigurationLoader;

$loader = new ConfigurationLoader(
    dirname(__DIR__).'/config'
);

$config = new Configuration(
    $loader->load()
);

echo "<h2>Configuration Demo</h2>";

echo "Framework: ".$config->string('app.name')."<br>";

echo "Version: ".$config->string('app.version')."<br>";

echo "Environment: ".$config->string('app.environment')."<br>";

echo "Debug: ";

echo $config->bool('app.debug')
        ? 'true'
        : 'false';

echo "<br>";

echo "Database Host: ".$config->string('database.host')."<br>";

echo "Database Port: ".$config->int('database.port')."<br>";