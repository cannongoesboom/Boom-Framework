<?php

declare(strict_types=1);

namespace Boom\Container;

/**
 * Represents a container binding.
 */
final class Binding
{
    public function __construct(
        public readonly string $abstract,
        public readonly string $concrete,
        public readonly string $lifetime
    ) {
    }

}