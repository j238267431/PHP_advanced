<?php

namespace App\tests;

use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
    /**
     * @param $a
     * @param $b
     * @param $expected
     *
     * @dataProvider getData
     */
    public function testFirst($a, $b, $expected)
    {
        $c = $a + $b;
        $this->assertEquals($expected, $c);
    }

    public function getData()
    {
        return [
            [2, 2, 4],
            [2, 3, 5],
            [3, 3, 6],
        ];
    }
}
