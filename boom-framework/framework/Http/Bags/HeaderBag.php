<?php

declare(strict_types=1);

namespace Boom\Http\Bags;

final class HeaderBag extends Bag
{
    public function __construct(array $headers = [])
    {
        $normalized = [];

        foreach ($headers as $key => $value) {
            $normalized[strtolower((string) $key)] = $value;
        }

        parent::__construct($normalized);
    }

    public function get(
        string|int $key,
        mixed $default = null
    ): mixed {
        return parent::get(
            strtolower((string) $key),
            $default
        );
    }

    public function has(
        string|int $key
    ): bool {
        return parent::has(
            strtolower((string) $key)
        );
    }

    public function set(
        string|int $key,
        mixed $value
    ): static {
        return parent::set(
            strtolower((string) $key),
            $value
        );
    }
}