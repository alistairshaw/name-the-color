<?php namespace AlistairShaw\NameTheColor\Lib;

use AlistairShaw\NameTheColor\Exceptions\InvalidHexException;

class HexValidator {

    /**
     * @param $hex
     * @return mixed
     * @throws InvalidHexException
     */
    public static function validateHex($hex)
    {
        $hex = trim($hex, '#');

        if (strlen($hex) == 3) $hex = substr($hex, 0, 1) . substr($hex, 0, 1) . substr($hex, 1, 1) . substr($hex, 1, 1) . substr($hex, 2, 1) . substr($hex, 2, 1);

        if (preg_match('/^[a-f0-9]{6}$/i', $hex)) return $hex;

        throw new InvalidHexException($hex);
    }

}