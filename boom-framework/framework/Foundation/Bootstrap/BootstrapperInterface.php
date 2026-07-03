<?php

declare(strict_types=1);

namespace Boom\Foundation\Bootstrap;

use Boom\Foundation\Application;

/**
 * Contract for foundation bootstrappers.
 * 
 * A bootstrapper performs one step of the framework startup process.
 */

interface BootstrapperInterface
{
    public function bootstrap(Application $application): void;
}