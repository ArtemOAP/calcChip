<?php
require_once 'vendor/autoload.php';

use CalcChip\App;
use CalcChip\Alg1;
use CalcChip\Alg2;
use CalcChip\Console;
use CalcChip\FileSys;


function convert($size)
{
    $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');

    return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
}

$time_start   = microtime(true);
$memory_start = memory_get_usage();

if (count($argv) < 2) {
    exit("require 2 params \n");
}
//$target = Alg2::class;
$target = Alg1::class;
$write = new FileSys('test_'.str_replace('\\','_',$target).'_' . $argv[1] . '_' . $argv[2] . '.txt');

try {
    App::init((int)$argv[1], (int)$argv[2],$target,$write);
} catch (Exception $e) {
    $write->Print($e->getMessage());
}

$time_end = microtime(true);
$write->Print('time :' . round($time_end - $time_start, 3) . " ms");
$write->Print('memory :' . convert((memory_get_usage() - $memory_start)));