<?php

class Connection
{
    /**
     * @var int
     */
    private $station1Id;
    /**
     * @var int
     */
    private $station2Id;

    public function __construct(int $station1Id, int $station2Id)
    {
        $this->station1Id = $station1Id;
        $this->station2Id = $station2Id;
    }

    public function station2Id(): int
    {
        return $this->station2Id;
    }

    public function station1Id(): int
    {
        return $this->station1Id;
    }
}
