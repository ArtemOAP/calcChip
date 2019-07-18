<?php

namespace CalcChip;


class Alg1 implements Alg
{

    protected $fieldsCount;
    protected static $instance = null;

    protected $chipCount;
    protected $store = [];
    protected $out;
    protected $count;

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
        $this->ShiftChips(0, 0);

        return $this->count;

    }

    /**
     * @param int $pos
     * @param int $sh
     */
    protected function ShiftChips(int $pos, int $sh)
    {
        if ($pos == $this->chipCount) {
            $this->out->Print($this->build());
            $this->count++;
        } else {

            for ($i = $sh; $i < $this->fieldsCount; ++$i) {
                $this->store[$pos] = $i;
                $this->ShiftChips($pos + 1, $i + 1);
            }
        }


    }

    protected function build(): string
    {
        $count = $this->fieldsCount;
        $res   = '';
        do {
            $res .= '|';
        } while (--$count);

        foreach ($this->store as $index) {
            $res[$index] = '*';
        }

        return $res;
    }

}