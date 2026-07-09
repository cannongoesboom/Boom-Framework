<?php

declare(strict_types=1);

namespace Boom\Http\Contracts;

use Boom\Http\InputBag;
use Boom\Http\HeaderBag;
use Boom\Http\ServerBag;

interface RequestInterface
{
    public static function capture(): static;

    public function method(): string;

    public function uri(): string;

    public function path(): string;

    public function query(): InputBag;

    public function post(): InputBag;

    public function headers(): HeaderBag;

    public function server(): ServerBag;
}