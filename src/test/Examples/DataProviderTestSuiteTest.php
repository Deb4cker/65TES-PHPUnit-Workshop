<?php

namespace test\Examples;

use PHPUnit\Framework\TestCase;

class DataProviderTestSuiteTest extends TestCase
{

    /**
     * @before
     */
    public function beforeEach() :void
    {
            $this->assertTrue(1 + 1 == 2);
    }

    /**
     * @after
     */
    public function afterEach() :void
    {
        $this->assertTrue(1 + 1 == 2);
    }

    /**
     * @dataProvider additionProvider
     */
    public function testAdd(int $result){

        $this->assertSame($result, 1);
    }

    public function additionProvider(): array
    {
        return [[1], [1], [0]];
    }

    /**
     * @dataProvider matrixAdditionProvider
     * @dataProvider matrixAdditionProviderWithNames
     */
    public function testAddInMatrix(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }

    public function matrixAdditionProvider(): array
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 3]
        ];
    }

    public function matrixAdditionProviderWithNames(): array
    {
        return [
            'zero + zero'    => [0, 0, 0], //deve ser igual a 0
            'zero + um'      => [0, 1, 1], //deve ser igual a 1
            'dois + três'    => [2, 3, 5], //deve ser igual a 5
            'um mais seis'   => [1, 6, 8]  //deve ser igual a 7
        ];
    }
}
