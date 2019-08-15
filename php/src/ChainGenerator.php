<?php

class ChainGenerator
{
    public function generate(string $start, string $end): array
    {
        $words = $this->readDictionary();
    }

    private function readDictionary()
    {
        return array_map(
            'strtolower',
            array_map(
                'trim',
                explode(
                    "\n",
                    file_get_contents(
                        __DIR__.'/../../data/american-english'
                    )
                )
            )
        );
    }
}
