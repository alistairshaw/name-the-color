<?php namespace AlistairShaw\NameTheColor\Exceptions;

class InvalidHexException extends \Exception {

    public function __construct($hex)
    {
        parent::__construct("Invalid Hex Code #" . $hex);
    }

}