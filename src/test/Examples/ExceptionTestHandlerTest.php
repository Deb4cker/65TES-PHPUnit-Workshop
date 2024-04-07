<?php

namespace test\Examples;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

class ExceptionTestHandlerTest extends TestCase
{
    public function testException(): void
    {
        $this->expectException(TypeError::class);
        $this->functionThatWillReceiveAnInvalidArgument("A");
    }

    public function functionThatWillReceiveAnInvalidArgument(int $arg){}
}
