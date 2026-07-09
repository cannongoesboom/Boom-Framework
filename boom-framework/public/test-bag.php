<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Boom\Http\Bags\Bag;

$bag = new Bag([
    'name' => 'Will',
    'company' => 'CannonGoesBoom',
    'language' => 'PHP',
]);

echo '<pre>';

echo "Original:\n";
print_r($bag->all());

echo "\nCount: " . count($bag) . PHP_EOL;
echo "First: " . $bag->first() . PHP_EOL;
echo "Last: " . $bag->last() . PHP_EOL;

$newBag = $bag->set('language', 'PHP 8.2');

echo "\nOriginal Language: " . $bag->get('language') . PHP_EOL;
echo "New Language: " . $newBag->get('language') . PHP_EOL;

echo "\nOnly:\n";
print_r($bag->only(['name', 'company'])->all());

echo "\nExcept:\n";
print_r($bag->except(['language'])->all());

echo "\nForeach:\n";

foreach ($bag as $key => $value) {
    echo "{$key} => {$value}\n";
}