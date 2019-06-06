<?php

class Connections implements IteratorAggregate
{
    /**
     * @var array
     */
    private $connections;

    public function __construct(array $connections)
    {
        $this->connections = $connections;
    }

    public static function load(string $filename)
    {
        return new self(array_map(function (array $data) {
            return new Connection($data['station1'], $data['station2']);
        }, json_decode(file_get_contents($filename), true)));
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->connections);
    }
}
