<?php

class Room
{
    private string $name;

    private array $occupants = [];

    private int $capacity;

    public function __construct(string $name, int $capacity = 2, array $occupants = [])
    {
        $this->name = $name;
        $this->capacity = $capacity;
        $this->occupants = $occupants;
    }

    public function assign(string $name): void
    {
        $this->occupants[] = $name;
    }

    public function hasCapacity(): bool
    {
        return count($this->occupants) < $this->capacity;
    }

    public function isFull(): bool
    {
        return count($this->occupants) === $this->capacity;
    }

    public function occupantsAsString(): string
    {
        return implode(', ', $this->occupants);
    }

    public function occupantCount(): int
    {
        return count($this->occupants);
    }

    public function secondOccupant(): string
    {
        if (!isset($this->occupants[1])) {
            throw new RuntimeException(sprintf(
                'Room "%s" has no 2nd occupant!!!', $this->name
            ));
        }

        return $this->occupants[1];
    }

    public function replace(string $string, $argument1): void
    {
        $this->occupants[array_search($string, $this->occupants)] = $argument1;
    }

    public function name(): string
    {
        return $this->name;
    }
}
