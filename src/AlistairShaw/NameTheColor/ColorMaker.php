<?php namespace AlistairShaw\NameTheColor;

use AlistairShaw\NameTheColor\Exceptions\InvalidHexException;

class ColorMaker {

    /**
     * @var Color
     */
    private $color;

    /**
     * @param $hex
     * @return ColorMaker
     * @throws InvalidHexException
     */
    public static function fromHex($hex)
    {
        return new static($hex);
    }

    /**
     * ColorMaker constructor.
     * @param $hex
     * @throws InvalidHexException
     */
    public function __construct($hex)
    {
        $hex = HexValidator::validateHex($hex);
        if ($name = ColorList::getNameFromHex($hex))
        {
            $this->color = new Color($hex, $name, $hex);
        }
        else
        {
            $newHex = $this->getClosestHex($hex);
            if ($name = ColorList::getNameFromHex($newHex))
            {
                $this->color = new Color($hex, $name, $newHex);
            }
            else
            {
                throw new InvalidHexException($hex);
            }
        }
    }

    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param $hex
     * @return string
     * @throws InvalidHexException
     */
    private function getClosestHex($hex)
    {
        $RGB = $this->getRGB($hex);
        $HSL = $this->getHSL($hex);

        $df = -1;
        $final = '';

        foreach (ColorList::getAll() as $color)
        {
            $checkRGB = $this->getRGB($color[0]);
            $checkHSL = $this->getHSL($color[0]);

            $rgbDiff = pow($RGB[0] - $checkRGB[0], 2) + pow($RGB[1] - $checkRGB[1], 2) + pow($RGB[2] - $checkRGB[2], 2);
            $hslDiff = pow($HSL[0] - $checkHSL[0], 2) + pow($HSL[1] - $checkHSL[1], 2) + pow($HSL[2] - $checkHSL[2], 2);

            $diff = $rgbDiff + $hslDiff * 2;

            if($df < 0 || $df > $diff)
            {
                $df = $diff;
                $final = $color[0];
            }
        }

        if ($final == '') throw new InvalidHexException($hex);

        return $final;
    }

    private function getRGB($hex)
    {
        return [
            hexdec('0x' . substr($hex, 0, 2)),
            hexdec('0x' . substr($hex, 2, 2)),
            hexdec('0x' . substr($hex, 4, 2))
        ];
    }

    private function getHSL($hex)
    {
        $rgb = $this->getRGB($hex);
        $red = $rgb[0] / 255;
        $green = $rgb[1] / 255;
        $blue = $rgb[2] / 255;

        $min = min([$red, min([$green, $blue])]);
        $max = max([$red, max([$green, $blue])]);
        $delta = $max - $min;
        $lightness = ($min + $max) / 2;

        $saturation = 0;
        if ($lightness > 0 && $lightness < 1)
        {
            $divisor = ($lightness < 0.5) ? ($lightness * 2) : (2 - (2 * $lightness));
            $saturation = $delta / $divisor;
        }

        $hue = 0;
        if ($delta > 0)
        {
            if ($max == $red && $max != $green) $hue += ($green - $blue) / $delta;
            if ($max == $green && $max != $blue) $hue += (2 + ($blue - $red) / $delta);
            if ($max == $blue && $max != $red) $hue += (4 + ($red - $green) / $delta);
            $hue /= 6;
        }

        return [
            (int)($hue * 255),
            (int)($saturation * 255),
            (int)($lightness * 255)
        ];
    }

}