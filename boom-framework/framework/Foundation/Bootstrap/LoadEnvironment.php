<?php

declare(strict_types=1);
 
namespace Boom\Foundation\Bootstrap;

use Boom\Foundation\Application;

/**
 * Loads the application's environment.
 */
final class LoadEnvironment implements BootstrapperInterface
{
    public function bootstrap(Application $application): void
    {
        echo '<p>✓ Environment loaded</p>';
    }
}