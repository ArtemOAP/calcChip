<?php

namespace CalcChip;


class Lib
{

    protected function fact($val)
    {
        $res = 1;
        do{
            $res*= $val;
        }while (--$val);

        return $res;
    }

    /**
     * @param int $fieldsCount
     * @param int $chipCount
     * @return int
     * @throws \ErrorException
     */
    public function calcCombinationsFormula(int $fieldsCount,int $chipCount) : string
    {

        if($fieldsCount == $chipCount){
            return 1;
        }elseif ($chipCount > $fieldsCount){
            throw new \ErrorException('chipCount > fieldsCount');
        }


        return $this->fact($fieldsCount)/($this->fact($fieldsCount - $chipCount)*$this->fact($chipCount));
    }


}