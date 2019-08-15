<?php

namespace Tests;

use ChainGenerator;
use Example;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @dataProvider provideGenerateChain
     */
    public function testGenerateChain(string $start, string $end)
    {
        $generator = new ChainGenerator();
        $chain = $generator->generate($start, $end);
        var_dump($chain);
        $generatedEnd = array_pop($chain);
        $this->assertEquals($end, $generatedEnd);
    }

    public function provideGenerateChain()
    {
        yield [
            'cat',
            'dog',
        ];

        yield [
            'lead',
            'gold',
        ];
    }
}
