<?php

class KataOrganizer
{
    private array $roomNames;

    private array $hosts;

    private array $previous = [];

    public function __construct(array $roomNames, array $hosts = [])
    {
        $this->roomNames = $roomNames;
        $this->hosts = $hosts;
    }

    public function renderReport(array $people): string
    {
        $rooms = $this->organize($people);
        $report = [];
        foreach ($rooms as $room) {
            assert($room instanceof Room);
            $report[] = sprintf('- *%s*: %s', $room->occupantsAsString(), $room->name()) . PHP_EOL;
        }

        return implode("\n", $report);
    }

    public function organize(array $people): array
    {
        if ($this->previous) {
            return $this->changePlaces($this->previous);
        }
        return $this->previous = $this->groupIntoRooms($people);
    }

    private function groupIntoRooms(array $people)
    {
        $rooms = array_map(function (string $name) {
            return new Room($name);
        }, $this->roomNames);
        
        $room = array_shift($rooms);
        assert($room instanceof Room);
        $hosts = $this->hosts;
        $freeHost = reset($hosts);
        
        $occupiedRooms = [];
        
        foreach ($people as $person) {
            if (!$room->hasCapacity()) {
                $room = array_shift($rooms);
                assert($room instanceof Room);
        
                if (!$room) {
                    throw new RuntimeException(sprintf(
                        'No more room for %s! all %s rooms are full and there is no more space',
                        $person,
                        count($this->roomNames)
                    ));
                }
            }
        
            $room->assign($person);
        
            if ($room->isFull()) {
                $occupiedRooms[] = $room;
            }
        }
        
        if (!$room->isFull()) {
            $occupiedRooms[] = $room;
        }
        
        if ($room->occupantCount() === 1) {
            if ($freeHost) {
                $room->assign($freeHost);
            } else {
                throw new RuntimeException(sprintf(
                    '%s is lonely!', $room->occupantsAsString()
                ));
            }
        }
        
        return $occupiedRooms;
    }

    /**
     * @param array<Room> $rooms
     */
    private function changePlaces(array $rooms): array
    {
        $changers = array_map(function (Room $room) {
            return $room->secondOccupant();
        }, $rooms);

        $newRooms = $rooms;
        $lastRoom = array_pop($newRooms);
        $firstRoom = array_shift($newRooms);
        $newRooms = array_filter(array_merge(
            [ $lastRoom ],
            $newRooms,
            [ $firstRoom ]
        ), function (?Room $room) {
            return $room !== null;
        });

        foreach ($newRooms as $room) {
            assert($room instanceof Room);
            $room->replace($room->secondOccupant(), array_shift($changers));
        }

        return $rooms;
    }
}
