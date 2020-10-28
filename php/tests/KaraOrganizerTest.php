<?php

namespace Tests;

use Example;
use KataOrganizer;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Room;
use RuntimeException;

class KaraOrganizerTest extends TestCase
{
    public function testEqualDistribution(): void
    {
        $organizer = new KataOrganizer([
            'room1',
            'room2',
        ]);

        $results = $organizer->organize([
            'daniel',
            'beth',
            'kevin',
            'lara',
        ]);

        self::assertEquals([
            new Room('room1', 2, [
                'daniel',
                'beth',
            ]),
            new Room('room2', 2, [
                'kevin',
                'lara',
            ])
        ], $results);
    }

    public function testRoomOverflow(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('No more room for stallman!');
        $organizer = new KataOrganizer([
            'room1',
            'room2',
        ]);

        $results = $organizer->organize([
            'daniel',
            'beth',
            'kevin',
            'lara',
            'stallman',
        ]);
    }

    public function testLoneliness(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('stallman is lonely!');

        $organizer = new KataOrganizer([
            'room1',
            'room2',
            'room3',
        ]);

        $organizer->organize([
            'daniel',
            'beth',
            'kevin',
            'lara',
            'stallman',
        ]);
    }

    public function testHostsCanHelp(): void
    {
        $organizer = new KataOrganizer([
            'room1',
            'room2',
            'room3',
        ], [
            'andrey'
        ]);

        $results = $organizer->organize([
            'daniel',
            'beth',
            'kevin',
            'lara',
            'stallman',
        ]);

        self::assertEquals([
            new Room('room1', 2, [
                'daniel',
                'beth',
            ]),
            new Room('room2', 2, [
                'kevin',
                'lara',
            ]),
            new Room('room3', 2, [
                'stallman',
                'andrey',
            ])
        ], $results);
    }

    public function testChangePlaces(): void
    {
        $organizer = new KataOrganizer([
            'room1',
            'room2',
        ]);

        $results = $organizer->organize([
            'daniel',
            'beth',
            'kevin',
            'lara',
        ]);

        self::assertEquals([
            new Room('room1', 2, [
                'daniel',
                'beth',
            ]),
            new Room('room2', 2, [
                'kevin',
                'lara',
            ])
        ], $results);

        $results = $organizer->organize([
            'daniel',
            'beth',
            'kevin',
            'lara',
        ]);

        self::assertEquals([
            new Room('room1', 2, [
                'daniel',
                'lara',
            ]),
            new Room('room2', 2, [
                'kevin',
                'beth',
            ])
        ], $results);
    }
}
