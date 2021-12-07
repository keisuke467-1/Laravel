<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\sample;

class SampleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add()
    {
        $sample = new Sample;
        $sum = $sample->add(5, 3);
        $this->assertEquals(8, $sum);
    }

    /**
     * @test
     */
    public function 引き算()
    {
        $sample = new Sample;
        $sum = $sample->sub(5, 3);
        // あえて失敗させてみる
        $this->assertEquals(1, $sum);
    }
}
