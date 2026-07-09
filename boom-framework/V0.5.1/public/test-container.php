<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Boom\Container\Container;
use Boom\Support\Version;

$container = new Container();

$version = $container->get(Version::class);

echo "<h1>Boom Framework v: " . $version->number() . '</h1>'; 

echo "<p>{$version->logger()}</p>";