<?php declare(strict_types=1);

namespace Shared\Domain\Model;

class Collection implements \Countable
{
    protected array $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function items(): array
    {
        return $this->items;
    }

    public function count(): int
    {
        return count($this->items);
    }
}