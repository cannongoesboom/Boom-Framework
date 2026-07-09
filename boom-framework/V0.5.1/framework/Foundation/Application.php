<?php

declare(strict_types=1);

namespace Boom\Foundation;

use Boom\Container\Container;

/**
 * Class Application
 *
 * Represents a Boom Framework application instance.
 *
 * Responsibilities:
 * - Own the service container.
 * - Store the application base path.
 * - Create the framework kernel.
 *
 * The Application does not process HTTP requests.
 * That responsibility belongs to the Kernel.
 */
final class Application
{
    private Container $container;

    public function __construct(
        private readonly string $basePath
    ) {
        $this->container = new Container();
    }

    public function basePath(): string
    {
        return $this->basePath;
    }

    public function container(): Container
    {
        return $this->container;
    }
}