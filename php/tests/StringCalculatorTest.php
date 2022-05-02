<?php

namespace Tests;

use StringCalculator;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    private StringCalculator $stringCalculator;

    protected function setUp(): void
    {
        $this->stringCalculator = new StringCalculator();
    }

    public function testNoArgument()
    {
        Assert::assertEquals(0, $this->stringCalculator->calculate());
    }

    public function testNumbersInString()
    {
        Assert::assertEquals(0, $this->stringCalculator->calculate('0'));
        Assert::assertEquals(1, $this->stringCalculator->calculate('1'));
    }

    public function testBareNumber()
    {
        Assert::assertEquals(123, $this->stringCalculator->calculate('1foo2bar3'));
        Assert::assertEquals(0, $this->stringCalculator->calculate('foobar'));
    }

    public function testSumOfSpaceSeparatedStrings()
    {
        Assert::assertEquals(127, $this->stringCalculator->calculate('1foo2bar3 foo4', ' '));
        Assert::assertEquals(627, $this->stringCalculator->calculate('1foo2bar3 foo4 50bar0', ' '));
        Assert::assertEquals(0, $this->stringCalculator->calculate('foobar', ' '));
        Assert::assertEquals(3215, $this->stringCalculator->calculate('321foo5bar', ' '));
    }

    public function testSumOfWhiteSpaceSeparatedStrings()
    {
        Assert::assertEquals(24, $this->stringCalculator->calculate('foo1   bar2 3 foobar', '  '));
        Assert::assertEquals(35, $this->stringCalculator->calculate('3foo0    bar,   0bar5', '  '));
    }

    public function testSumOfAnySeparatedStrings()
    {
        Assert::assertEquals(26, $this->stringCalculator->calculate('foo1+2bar2+3+foobar', '+'));
        Assert::assertEquals(284, $this->stringCalculator->calculate('foo1/ /2bar2+ 3+foo/6bar0', '/'));
    }
}
