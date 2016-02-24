<?php

namespace Dafiti\Correios\Lib;

class CodVerificadorTest extends \PHPUnit_Framework_TestCase
{
    public function testCalculate()
    {
        $this->assertEquals('156538500',CodVerificador::calculate('15653850'));
        $this->assertEquals('156538513',CodVerificador::calculate('15653851'));
        $this->assertEquals('156538527',CodVerificador::calculate('15653852'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider invalidArgumentProvider
     */
    public function testCalculateWithInvalidArgument($num)
    {
        CodVerificador::calculate($num);
    }

    public function invalidArgumentProvider()
    {
        return [
            [0],
            [""],
            ["123123"],
            ["123123123"],
        ];
    }
}
