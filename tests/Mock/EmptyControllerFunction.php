<?php


namespace Tests\Mock;


use Core\Http\ControllerFunction;

class EmptyControllerFunction extends ControllerFunction
{
    public function __construct()
    {
        parent::__construct('test', 'test');
    }
}