<?php namespace AlistairShaw\NameTheColor;

class Color {

    /**
     * @var string
     */
    private $originalHex;

    /**
     * @var string
     */
    private $colourName;

    /**
     * @var string
     */
    private $hex;

    /**
     * Color constructor.
     * @param $originalHex
     * @param $colourName
     * @param $hex
     */
    public function __construct($originalHex, $colourName, $hex)
    {
        $this->originalHex = HexValidator::validateHex($originalHex);
        $this->colourName = $colourName;
        $this->hex = HexValidator::validateHex($hex);
    }

    public function getName()
    {
        return $this->colourName;
    }

    public function getHex()
    {
        return $this->hex;
    }

    public function getOriginalHex()
    {
        return $this->originalHex;
    }
}