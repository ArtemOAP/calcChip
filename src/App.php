<?php

namespace CalcChip;


class App
{
    const ER_TEXT = 'менее 10 вариантов';

    public static function init(int $fieldsCount, int $chipCount, string $alg, Output $output)
    {
        $alg   = $alg::getInstance($fieldsCount, $chipCount, $output);
        $lib   = new Lib();
        $count = $lib->calcCombinationsFormula($fieldsCount, $chipCount);
        if ($count <= 10) {
           throw new \ErrorException(self::ER_TEXT);
        }
        $output->Print($count);
        $countTest = $alg->run();
        $output->Print($count .' = '.$countTest);

    }

}