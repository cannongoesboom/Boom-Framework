<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Boom\Http\Bags\HeaderBag;
use Boom\Http\Bags\InputBag;
use Boom\Http\Bags\ServerBag;

echo "<pre>";

echo "=== InputBag ===\n";

$input = new InputBag([
    'page' => 5,
    'sort' => 'name',
    'search' => 'boom',
]);

print_r($input->all());

echo "\nOnly:\n";

print_r(
    $input->only([
        'page',
        'sort',
    ])->all()
);

echo "\n=== HeaderBag ===\n";

$headers = new HeaderBag([
    'Content-Type' => 'application/json',
    'Accept' => 'application/json',
]);

echo $headers->get('content-type') . PHP_EOL;
echo $headers->get('CONTENT-TYPE') . PHP_EOL;
echo $headers->get('Content-Type') . PHP_EOL;

echo "\n=== ServerBag ===\n";

$server = new ServerBag($_SERVER);

echo "Method : " . $server->method() . PHP_EOL;
echo "Host   : " . $server->host() . PHP_EOL;
echo "Scheme : " . $server->scheme() . PHP_EOL;
echo "Port   : " . $server->port() . PHP_EOL;
echo "Secure : " . ($server->isSecure() ? 'Yes' : 'No') . PHP_EOL;
echo "IP     : " . $server->ip() . PHP_EOL;