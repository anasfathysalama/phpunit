<?php

namespace App\Services;

use ArrayIterator;
use Exception;
use IteratorAggregate;
use Traversable;

class Collection implements IteratorAggregate
{

    protected array $items = [];

    /**
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->items;
    }


    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @param array $items
     */
    public function add(array $items): void
    {
        $this->items = array_merge($this->items, $items);
    }


    /**
     * @param Collection $collection
     */
    public function merge(Collection $collection)
    {
        return $this->add($collection->get());
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}