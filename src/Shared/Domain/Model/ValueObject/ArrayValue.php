<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\Model\ValueObject;

use CleanArchi\Shared\Domain\Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

abstract class ArrayValue
{
    private(set) Collection $items;

    protected function __construct(array $elements, private readonly string $className)
    {
        $this->ensureHasValidElementClass($className);
        $this->ensureElementsAreValidType($elements);

        $this->items = new ArrayCollection($elements);
    }

    public static function fromArray(array $elements, string $className): static
    {
        return new static($elements, $className);
    }

    public function toArray(): array
    {
        return $this->items->toArray();
    }

    public function count(): int
    {
        return $this->items->count();
    }

    public function isEmpty(): bool
    {
        return $this->items->isEmpty();
    }

    public function add(mixed $element): void
    {
        $this->ensureElementAreValidType($element);

        $this->items->add($element);
    }

    public function remove(mixed $element): void
    {
        $this->ensureElementAreValidType($element);

        $this->items->removeElement($element);
    }

    private function ensureHasValidElementClass(string $elementClass): void
    {
        Assert::classExists($elementClass);
    }

    private function ensureElementsAreValidType(iterable $elements): void
    {
        Assert::allIsInstanceOf($elements, $this->className);
    }

    private function ensureElementAreValidType(mixed $element): void
    {
        Assert::isInstanceOf($element, $this->className);
    }

}
