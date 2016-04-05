<?php namespace AlistairShaw\NameTheColor\Test;

use AlistairShaw\NameTheColor\Lib\HexValidator;

class HexValidatorTest extends \PHPUnit_Framework_TestCase {

    public function testValidateHex()
    {
        $valid = HexValidator::validateHex('#FF0000');
        $this->assertEquals($valid, 'FF0000');
    }

    public function testValidateInvalidHex()
    {
        $this->expectException('\AlistairShaw\NameTheColor\Exceptions\InvalidHexException');
        HexValidator::validateHex('#asfasfasf');
    }

}