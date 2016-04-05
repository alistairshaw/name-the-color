<?php namespace AlistairShaw\NameTheColor\Exceptions;

class InvalidColorNameException extends NameTheColorException {

    public function __construct($colorName)
    {
        parent::__construct("Unrecognised Color Name - " . $colorName);
    }

}