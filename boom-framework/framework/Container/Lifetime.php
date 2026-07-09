<?php

declare(strict_types=1);

namespace Boom\Container;

/**
 * Supported container lifetimes.
 */
final class Lifetime
{
    public const TRANSIENT = 'transient';

    public const SINGLETON = 'singleton';
}