<?php

namespace CalcChip;


class Alg2 implements Alg
{
    protected $fieldsCount;
    protected static $instance = null;
    protected $chipCount;
    protected $store = [];
    protected $out;

    public static function getInstance(int $fieldsCount, int $chipCount, Output $out): self
    {
        if (self::$instance == null) {
            self::$instance = new self($fieldsCount, $chipCount, $out);
        }

        return self::$instance;
    }


    public function __construct(int $fieldsCount, int $chipCount, Output $out)
    {
        $this->chipCount   = $chipCount;
        $this->fieldsCount = $fieldsCount;
        $this->out         = $out;
        $this->out->Print(self::class);
    }

    public function run(): int
    {
       return $this->LongSearch($this->fieldsCount, $this->chipCount);
    }


    protected function LongSearch($fc, $cc): int
    {
        $this->out->Print($fc . " X " . $cc);
        $shift = $fc - $cc;
        $min   = 1;
        for ($st = $cc; $st > 1; $st--) {
            $min = ($min << 1) + 1;
        }
        $max    = $min << $shift;
        $maxDec = sprintf('%d', $max);
        $minDec = sprintf('%d', $min);

        $count = 0;
        for ($i = $maxDec; $i >= $minDec; $i--) {
            $el = sprintf('%0' . $fc . 'b', $i);
            if (substr_count($el, '1') == $cc) {
                $count++;
                $this->out->Print(sprintf('%0' . $fc . 'b', $i));
            }
        }
        return $count;
    }


}