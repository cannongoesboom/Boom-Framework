<?php

declare(strict_types=1);

namespace Boom\Foundation;

use Boom\Foundation\Bootstrap\LoadConfiguration;
use Boom\Foundation\Bootstrap\LoadEnvironment;
use Boom\Foundation\Bootstrap\RegisterServices;

/**
 * Coordinates the Boom Framework startup lifecycle.
 */
final class Kernel
{
    /**
     * @var array<class-string>
     */
    private array $bootstrappers = [
        LoadEnvironment::class,
        LoadConfiguration::class,
        RegisterServices::class,
    ];

    public function __construct(
        private readonly Application $application
    ) {
    }

    public function handle(): void
    {
        echo "<h1>Boom Framework v0.3.1</h1>";

        foreach ($this->bootstrappers as $bootstrapper) {
            (new $bootstrapper())->bootstrap($this->application);
        }

        echo "<p><strong>✓ Kernel Ready</strong></p>";
    }
}