<?php namespace AlistairShaw\NameTheColor\Test;

use AlistairShaw\NameTheColor\Lib\ColorList;

class ColorListTest extends \PHPUnit_Framework_TestCase {

    public function testGetNameFromHex()
    {
        $this->assertEquals('Red', ColorList::getNameFromHex('#FF0000'));
    }

    public function testGetHexFromName()
    {
        $this->assertEquals('FF0000', ColorList::getHexFromName('Red'));
    }

    // started with 1564 colours, so should have at least that many
    public function testGetAll()
    {
        $all = ColorList::getAll();
        $this->assertGreaterThan(1564, count($all));
    }
}