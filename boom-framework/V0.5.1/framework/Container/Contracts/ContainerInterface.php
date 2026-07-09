<?php

declare(strict_types=1);

namespace Boom\Configuration\Contracts;

interface ConfigurationInterface
{
    public function has(string $key): bool;

    public function get(string $key, mixed $default = null): mixed;

    public function string(string $key): string;

    public function int(string $key): int;

    public function bool(string $key): bool;

    public function float(string $key): float;

    public function array(string $key): array;
}