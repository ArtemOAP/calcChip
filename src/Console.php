<?php
namespace CalcChip;

class Console implements Output
{

    public function __construct($name = 'TEST')
    {
        echo $name .PHP_EOL;
    }

    public function Print( string  $str): void
    {
        echo $str .PHP_EOL;
    }
}