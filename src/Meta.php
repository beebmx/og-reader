<?php

namespace Beebmx\OgReader;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

class Meta implements Countable, IteratorAggregate
{
    protected array $tags;

    public function __construct(array $tags)
    {
        $this->tags = $tags;
    }

    public function og(): self
    {
        return new static(
            array_filter($this->tags, function (Tag $tag) {
                return preg_match('/^(og:)/i', $tag->property);
            })
        );
    }

    public function hasOg(): bool
    {
        return !!$this->og()->count();
    }

    public function notHasOg(): bool
    {
        return !$this->hasOg();
    }

    public function count(): int
    {
        return count($this->tags);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->tags);
    }
}
