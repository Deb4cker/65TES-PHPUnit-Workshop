<?php

namespace test\Examples;

use Monolog\Test\TestCase;

class DependenceTest extends TestCase
{

    public function testDependeceOne(){

        $this->assertTrue(false);
    }

    /**
     * @depends testDependeceOne
     */
    public function testDependenceTwo()
    {
        $this->assertTrue(true);
    }

    public function testProducerFirst(): string
    {
        $this->assertTrue(true);

        return 'first';
    }

    public function testProducerSecond(): string
    {
        $this->assertTrue(true);

        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer(string $a, string $b): void
    {
        $this->assertSame('first', $a);
        $this->assertSame('second', $b);
    }
}