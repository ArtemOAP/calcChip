<?php

namespace CalcChip;


class FileSys implements Output
{

    const DIR = '/../data/';
    public $res = null;

    public function __construct($name)
    {
       $this->res = fopen(__DIR__.self::DIR.$name,'a');
    }

    public function Print(string $str): void
    {
            fwrite($this->res,$str .PHP_EOL);
    }

    public function __destruct()
    {
      fclose($this->res);
    }


}