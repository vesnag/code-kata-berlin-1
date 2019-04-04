<?php

namespace Tests;

use Example;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $example = new Example();
        Assert::assertInstanceOf(Example::class, $example);
    }

    /**
     * @dataProvider provideAddsNumbers
     */
    public function testAddsNumbers($a, $b, $expectedResult)
    {
        Assert::assertEquals($expectedResult, $a + $b);
    }

    public function provideAddsNumbers()
    {
        yield '1 + 1' => [
            1, 1, 2
        ];

        yield '1 + 3' => [
            1, 3, 4
        ];
    }
}
