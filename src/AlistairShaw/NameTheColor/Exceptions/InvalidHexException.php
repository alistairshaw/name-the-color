<?php namespace AlistairShaw\NameTheColor\Exceptions;

class InvalidHexException extends NameTheColorException {

    public function __construct($hex)
    {
        parent::__construct("Invalid Hex Code #" . $hex);
    }

}