<?php


namespace Tests\Mock;


use App\Core\Http\ControllerFunction;

class EmptyControllerFunction extends ControllerFunction
{
    public function __construct()
    {
        parent::__construct('test', 'test');
    }
}