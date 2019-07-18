<?php
namespace CalcChip;

interface Output
{


    public function __construct($name);

    public function Print( string $str):void;
}