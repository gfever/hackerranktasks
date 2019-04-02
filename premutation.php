<?php
/**
 * @author d.ivaschenko
 */

class Premutation {

    private $baseArr;
    private $baseArrCount;
    private $result = [];

    private $resCount = 1;
    private $swapCount = 0;

    public function do(array $arr)
    {
        $this->baseArr = $arr;
        $this->baseArrCount = count($this->baseArr);

        foreach ($this->baseArr as $i => $item) {
            $this->resCount *= ($i+1);
        }

        $this->rec($this->baseArrCount-1);
        return $this->result;
    }


    private function rec($index)
    {
        $this->swap($index, $index-1);

        if ($this->swapCount < $this->resCount) {
            if ($index === 1) {
                $index = $this->baseArrCount - 1;
            } else {
                $index--;
            }

            $this->rec($index);
        }
    }

    private function swap($i1, $i2)
    {
        $tmp = $this->baseArr[$i1];
        $this->baseArr[$i1] = $this->baseArr[$i2];
        $this->baseArr[$i2] = $tmp;
        $this->result[] = $this->baseArr;
        $this->swapCount++;
    }
}

print_r((new Premutation)->do([1, 2, 3, 4]));
