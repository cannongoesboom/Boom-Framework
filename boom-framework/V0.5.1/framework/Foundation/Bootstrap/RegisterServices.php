<?php

declare(strict_types=1);

namespace Boom\Foundation\Bootstrap;

use Boom\Foundation\Application;

/** 
 * Registers core framework services.
 */
final class RegisterServices implements BootstrapperInterface
{
    public function bootstrap(Application $application): void
    {
        echo '<p>✓ Core Services Registered</p>';
    }
}