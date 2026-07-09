<?php

declare(strict_types=1);

namespace Boom\Configuration;

use Boom\Configuration\Exceptions\ConfigurationException;

final class ConfigurationLoader
{
    public function __construct(
        private readonly string $configPath
    ) {
    }

    public function load(): array
    {
        if (!is_dir($this->configPath)) {
            throw new ConfigurationException(
                "Configuration directory not found: {$this->configPath}"
            );
        }

        $configuration = [];

        $files = glob($this->configPath . '/*.php');

        foreach ($files as $file) {

            $key = basename($file, '.php');

            $data = require $file;

            if (!is_array($data)) {
                throw new ConfigurationException(
                    "{$file} must return an array."
                );
            }

            $configuration[$key] = $data;
        }

        ksort($configuration);

        return $configuration;
    }
}