<?php

namespace Tests;

use ArgumentParser;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ArgumentParserTest extends TestCase
{
    private ArgumentParser $argumentParser;

    protected function setUp(): void
    {
        $this->argumentParser = new \ArgumentParser();
    }

    public function testConvertShortOptionsToBoolean()
    {
        Assert::assertEquals(['-a' => TRUE], $this->argumentParser->convert('-a'));
    }

    public function testConvertManyOptionsToBooleans()
    {
        Assert::assertEquals(['-a' => TRUE, '-b' => TRUE], $this->argumentParser->convert('-a -b'));
    }

    public function testConvertManyShortOptionsTogetherBooleans()
    {
        Assert::assertEquals(['-a' => TRUE, '-b' => TRUE, '-c' => TRUE], $this->argumentParser->convert('-abc'));
    }

    public function testConvertsLongOptionsIntoBooleans()
    {
      Assert::assertEquals(['-f' => 'Is Mandatory', '-o' => 'Is Mandatory'], $this->argumentParser->convert('--foo'));
      Assert::assertEquals(['-b' => TRUE, '-a' => TRUE, '-r' => TRUE], $this->argumentParser->convert('--bar'));
    }

    public function testAdsTheValueToEqualSignedSeparatedLongOptions()
    {
      Assert::assertEquals(['-f' => 'bar', '-o' => 'bar'], $this->argumentParser->convert('--foo=bar'));
      Assert::assertEquals(['-a' => 'bar'], $this->argumentParser->convert('-a=bar'));
    }

    public function testValidOptions()
    {
      Assert::assertEquals([], $this->argumentParser->convert('+a'));
      Assert::assertEquals([], $this->argumentParser->convert('-a +b'));
      Assert::assertEquals([], $this->argumentParser->convert('foo'));
      Assert::assertEquals([], $this->argumentParser->convert('foo=bar'));
      Assert::assertEquals([], $this->argumentParser->convert('--foo\bar'));
    }

    public function testSetShortOptionsThatTakeNoValue()
    {
      Assert::assertEquals(['-f' => 'bar', '-o' => 'bar'], $this->argumentParser->convert('-c -foo=bar'));
      Assert::assertEquals(['-f' => 'Is Mandatory', '-b' => TRUE], $this->argumentParser->convert('-f -b -de'));
    }

    public function testCratesAliases()
    {
      Assert::assertEquals(['-foobaralias' => TRUE], $this->argumentParser->convert('-foobaralias'));
      Assert::assertEquals(['-foobaralias' => 'foobarvalues'], $this->argumentParser->convert('--foobaralias=foobarvalues'));
      Assert::assertEquals(['-foobaralias' => 'foobarvalues', '-b' => TRUE], $this->argumentParser->convert('--foobaralias=foobarvalues -b'));
    }

    public function testSetOptionsWithMandatoryFields()
    {
      Assert::assertEquals([
        '-f' => 'foobarvalue',
        '-o' => 'foobarvalue',
        '-b' => 'foobarvalue',
        '-a' => 'foobarvalue',
        '-r' => 'foobarvalue',
      ], $this->argumentParser->convert('--foobar=foobarvalue'));
      Assert::assertEquals([
        '-b' => TRUE,
        '-a' => TRUE,
        '-r' => TRUE,
        '-f' => 'Is Mandatory',
        '-o' => 'Is Mandatory',
      ], $this->argumentParser->convert('--barfoo'));

    }
}
