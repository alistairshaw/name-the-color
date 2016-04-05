<?php namespace AlistairShaw\NameTheColor\Test;

use AlistairShaw\NameTheColor\ColorMaker;

class ColorMakerTest extends \PHPUnit_Framework_TestCase {
    
    public function testFromHex()
    {
        $color = ColorMaker::fromHex('#F00')->getColor();
        $this->assertEquals('Red', $color->getName());
        $this->assertEquals('FF0000', $color->getOriginalHex());
        $this->assertEquals('FF0000', $color->getHex());

        $color = ColorMaker::fromHex('#286ACD')->getColor();
        $this->assertEquals('Mariner', $color->getName());
        $this->assertEquals('286ACD', $color->getOriginalHex());
        $this->assertEquals('286ACD', $color->getHex());

        $color = ColorMaker::fromHex('BD5E2E')->getColor();
        $this->assertEquals('Tuscany', $color->getName());
        $this->assertEquals('BD5E2E', $color->getOriginalHex());
        $this->assertEquals('BD5E2E', $color->getHex());
    }

    public function testFromHexNotInList()
    {
        $color = ColorMaker::fromHex('#2663C9')->getColor();
        $this->assertEquals('Mariner', $color->getName());
        $this->assertEquals('2663C9', $color->getOriginalHex());
        $this->assertEquals('286ACD', $color->getHex());

        $color = ColorMaker::fromHex('#C72DC8')->getColor();
        $this->assertEquals('Amethyst', $color->getName());
        $this->assertEquals('C72DC8', $color->getOriginalHex());
        $this->assertEquals('9966CC', $color->getHex());

        $color = ColorMaker::fromHex('#C86B2D')->getColor();
        $this->assertEquals('Tuscany', $color->getName());
        $this->assertEquals('C86B2D', $color->getOriginalHex());
        $this->assertEquals('BD5E2E', $color->getHex());
    }

    public function testFromString()
    {
        $color = ColorMaker::fromString('Tuscany')->getColor();
        $this->assertEquals('Tuscany', $color->getName());
        $this->assertEquals('BD5E2E', $color->getOriginalHex());
        $this->assertEquals('BD5E2E', $color->getHex());
    }
}