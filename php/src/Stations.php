<?php

class Stations implements IteratorAggregate
{
    /**
     * @var array
     */
    private $stations;

    public function __construct(array $stations)
    {
        $this->stations = $stations;
    }

    public static function load(string $filename)
    {
        $data = file_get_contents($filename);
        return new self(array_map(function (array $data) {
            return new Station($data['id'], $data['name']);
        }, json_decode($data, true)));
    }

    public function names()
    {
        return array_map(function (Station $station) {
            return $station->name() . '(' . $station->id() .')';
        }, $this->stations);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->stations);
    }
}
