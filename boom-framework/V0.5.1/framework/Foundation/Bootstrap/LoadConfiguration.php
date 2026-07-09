<?php

declare(strict_types=1);

namespace Boom\Foundation\Bootstrap;

use Boom\Foundation\Application;

/**
 * Loads framework configuration
 */

final class LoadConfiguration implements BootstrapperInterface
{
    public function bootstrap(Application $application): void
    {
        echo '<p>✓ Configuration Loaded</p>';
    }
}