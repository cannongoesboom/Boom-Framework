<?php

declare(strict_types=1);

namespace Boom\Container;

use ReflectionClass;
use ReflectionNamedType;
use RuntimeException;

final class Container
{
    public function get(string $class): object
    {
        if (!class_exists($class)) {
            throw new RuntimeException(
                "Class '{$class}' does not exist."
            );
        }

        return $this->resolve($class);
    }

    private function resolve(string $class): object
    {
        $reflection = new ReflectionClass($class);

        if (!$reflection->isInstantiable()) {
            throw new RuntimeException(
                "{$class} is not instantiable."
            );
        }

        $constructor = $reflection->getConstructor();

        if ($constructor === null) {
            return new $class();
        }

        $dependencies = [];

        foreach ($constructor->getParameters() as $parameter) {

            $type = $parameter->getType();

            if (!$type instanceof ReflectionNamedType) {
                throw new RuntimeException(
                    "Unable to resolve {$parameter->getName()}."
                );
            }

            $dependencies[] = $this->get(
                $type->getName()
            );
        }

        return $reflection->newInstanceArgs(
            $dependencies
        );
    }
}