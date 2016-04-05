<?php namespace AlistairShaw\NameTheColor\Test;

use AlistairShaw\NameTheColor\Color;

class ColorTest extends \PHPUnit_Framework_TestCase {

    public function testCreateColorWithParameters()
    {
        $color = new Color('FF0000', 'Red', 'FF0000');
        $this->assertEquals($color->getHex(), 'FF0000');
        $this->assertEquals($color->getName(), 'Red');
        $this->assertEquals($color->getOriginalHex(), 'FF0000');
    }

    public function testCreateColorWithInvalidParameters()
    {
        $this->expectException('\AlistairShaw\NameTheColor\Exceptions\InvalidHexException');
        new Color('Invalid', 'Parameters', 'Here');
    }

}