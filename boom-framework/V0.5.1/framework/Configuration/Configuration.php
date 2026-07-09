<?php

declare(strict_types=1);

namespace Boom\Configuration;

use Boom\Configuration\Contracts\ConfigurationInterface;
use Boom\Configuration\Exceptions\InvalidConfigurationTypeException;
use Boom\Configuration\Exceptions\MissingConfigurationException;

final class Configuration implements ConfigurationInterface
{
    public function __construct(
        private readonly array $config
    ) {
    }

    /**
     * Determine whether a configuration key exists.
     */
    public function has(string $key): bool
    {
        try {
            $this->resolve($key);
            return true;
        } catch (MissingConfigurationException) {
            return false;
        }
    }

    /**
     * Get a configuration value.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        if (!$this->has($key)) {
            return $default;
        }

        return $this->resolve($key);
    }

    /**
     * Get a string configuration value.
     */
    public function string(string $key): string
    {
        $value = $this->resolve($key);

        if (!is_string($value)) {
            throw new InvalidConfigurationTypeException(
                "Configuration key '{$key}' must be a string."
            );
        }

        return $value;
    }

    /**
     * Get an integer configuration value.
     */
    public function int(string $key): int
    {
        $value = $this->resolve($key);

        if (!is_int($value)) {
            throw new InvalidConfigurationTypeException(
                "Configuration key '{$key}' must be an integer."
            );
        }

        return $value;
    }

    /**
     * Get a boolean configuration value.
     */
    public function bool(string $key): bool
    {
        $value = $this->resolve($key);

        if (!is_bool($value)) {
            throw new InvalidConfigurationTypeException(
                "Configuration key '{$key}' must be a boolean."
            );
        }

        return $value;
    }

    /**
     * Get a float configuration value.
     */
    public function float(string $key): float
    {
        $value = $this->resolve($key);

        if (!is_float($value)) {
            throw new InvalidConfigurationTypeException(
                "Configuration key '{$key}' must be a float."
            );
        }

        return $value;
    }

    /**
     * Get an array configuration value.
     */
    public function array(string $key): array
    {
        $value = $this->resolve($key);

        if (!is_array($value)) {
            throw new InvalidConfigurationTypeException(
                "Configuration key '{$key}' must be an array."
            );
        }

        return $value;
    }

    /**
     * Resolve a dot-notated configuration key.
     */
    private function resolve(string $key): mixed
    {
        $segments = explode('.', $key);

        $value = $this->config;

        foreach ($segments as $segment) {

            if (!is_array($value) || !array_key_exists($segment, $value)) {
                throw new MissingConfigurationException(
                    "Configuration key '{$key}' does not exist."
                );
            }

            $value = $value[$segment];
        }

        return $value;
    }
}