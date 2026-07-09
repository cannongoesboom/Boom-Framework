<?php

declare(strict_types=1);

namespace Boom\Configuration\Contracts;

interface ConfigurationInterface
{
    /**
     * Determine if a configuration key exists.
     */
    public function has(string $key): bool;

    /**
     * Get a configuration value.
     */
    public function get(
        string $key,
        mixed $default = null
    ): mixed;

    /**
     * Get a string configuration value.
     */
    public function string(string $key): string;

    /**
     * Get an integer configuration value.
     */
    public function int(string $key): int;

    /**
     * Get a boolean configuration value.
     */
    public function bool(string $key): bool;

    /**
     * Get a float configuration value.
     */
    public function float(string $key): float;

    /**
     * Get an array configuration value.
     */
    public function array(string $key): array;
}