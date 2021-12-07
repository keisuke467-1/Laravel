<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\calculatePoint;

class CalculateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCaluculatePoint()
    {
        $calc = new CalculatePoint;
        $point = $calc->CalculatePoint(10000);
        $this->assertEquals(200,$point);
    }
}
