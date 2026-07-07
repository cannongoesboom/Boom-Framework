<?php

declare(strict_types=1);

namespace Boom\Container\Exceptions;

/**
 * Thrown when circular dependencies are detected.
 */
final class CircularDependencyException extends ContainerException
{
}