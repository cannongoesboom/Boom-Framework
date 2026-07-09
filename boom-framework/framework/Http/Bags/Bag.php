<?php

declare(strict_types=1);

namespace Boom\Http\Bags;

use Countable;
use IteratorAggregate;
use ArrayIterator;
use Traversable;

/**
 * Immutable key/value collection.
 *
 * The Bag class is the foundation for all Boom Framework
 * collection-like objects.
 *
 * It never mutates its internal state.
 * Methods that modify data always return a new instance.
 */
class Bag implements Countable, IteratorAggregate
{
    /**
     * @param array<string|int,mixed> $items
     */
    public function __construct(
        protected readonly array $items = []
    ) {
    }

    /**
     * Return every item.
     *
     * @return array<string|int,mixed>
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * Determine whether a key exists.
     */
    public function has(string|int $key): bool
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Retrieve a value.
     */
    public function get(
        string|int $key,
        mixed $default = null
    ): mixed {
        return $this->items[$key] ?? $default;
    }

    /**
     * Return a new Bag with one value changed.
     */
    public function set(
        string|int $key,
        mixed $value
    ): static {
        $items = $this->items;
        $items[$key] = $value;

        return new static($items);
    }

    /**
     * Return a new Bag without the specified key.
     */
    public function remove(
        string|int $key
    ): static {
        $items = $this->items;

        unset($items[$key]);

        return new static($items);
    }

    /**
     * Return a new Bag merged with another array.
     *
     * @param array<string|int,mixed> $items
     */
    public function merge(array $items): static
    {
        return new static(
            array_merge($this->items, $items)
        );
    }

    /**
     * Keep only the specified keys.
     *
     * @param array<int,string|int> $keys
     */
    public function only(array $keys): static
    {
        return new static(
            array_intersect_key(
                $this->items,
                array_flip($keys)
            )
        );
    }

    /**
     * Remove the specified keys.
     *
     * @param array<int,string|int> $keys
     */
    public function except(array $keys): static
    {
        return new static(
            array_diff_key(
                $this->items,
                array_flip($keys)
            )
        );
    }

    /**
     * Return all keys.
     *
     * @return array<int|string>
     */
    public function keys(): array
    {
        return array_keys($this->items);
    }

    /**
     * Return all values.
     *
     * @return array<int,mixed>
     */
    public function values(): array
    {
        return array_values($this->items);
    }

    /**
     * Return the first value.
     */
    public function first(
        mixed $default = null
    ): mixed {
        if ($this->isEmpty()) {
            return $default;
        }

        return reset($this->items);
    }

    /**
     * Return the last value.
     */
    public function last(
        mixed $default = null
    ): mixed {
        if ($this->isEmpty()) {
            return $default;
        }

        return end($this->items);
    }

    /**
     * Determine whether the bag is empty.
     */
    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    /**
     * Count items.
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Allow foreach().
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}