<?php namespace AlistairShaw\NameTheColor\Exceptions;

class NameTheColorException extends \Exception {

    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }

}