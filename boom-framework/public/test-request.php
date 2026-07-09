<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__.'/../vendor/autoload.php';

use Boom\Http\Request;

$request = Request::capture();

echo "<pre>";

echo "Method: " . $request->method() . PHP_EOL;
echo "URI: " . $request->uri() . PHP_EOL;
echo "Path: " . $request->path() . PHP_EOL;

print_r($request->query()->all());
print_r($request->post()->all());