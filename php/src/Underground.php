<?php

class Underground
{
    private $stations;
    private $connections;

    public function __construct(Stations $stations, Connections $connections)
    {
        foreach ($stations as $station) {
            $this->stations[$station->name()] = $station;
            $this->stationsById[$station->id()] = $station;
            $this->connections[$station->id()] = [];
        }

        foreach ($connections as $connection) {
            $this->connections[$connection->station1Id()][] = $connection->station2Id();
            $this->connections[$connection->station2Id()][] = $connection->station1Id();
        }
    }

    public function connections(): array
    {
        return $this->connections;
    }

    public function stations(): array
    {
        return $this->stations;
    }

    public function route(string $start, string $destination, $target = null): Stations
    {
        $start = $this->stations[$start];
        $destination = $this->stations[$destination];

        $route = $this->connect($start->id(), $destination->id(), []);

        return new Stations(array_map(function (int $stationId) {
            return $this->stationsById[$stationId];
        }, $route ?? []));
    }

    private function connect($startId, $endId, array $stations = []): ?array
    {
        if ($startId === $endId) {
            $stations[] = $endId;
            return $stations;
        }

        $stations[] = $startId;

        foreach ($this->connections[$startId] as $destId) {

            if (in_array($destId, $stations)) {
                continue;
            }

            if (null !== $stations = $this->connect($destId, $endId, $stations)) {
                return $stations;
            }
        }

        return null;
    }
}
