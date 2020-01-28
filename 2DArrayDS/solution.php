<?php

declare(strict_types=1);

class HourGlass
{
    private function getByStartPosition($arr, $x, $y)
    {
       return [
            [$arr[$y][$x], $arr[$y][$x+1], $arr[$y][$x+2]],  
            [$arr[$y+1][$x+1]],
            [$arr[$y+2][$x], $arr[$y+2][$x+1], $arr[$y+2][$x+2]],
       ];
    }
    
    private function getSum($part) 
    {
        $sum = 0;
        foreach ($part as $line) {
            $sum += array_sum($line);    
        }
        
        return $sum;
    }
    
    public function calc($arr)
    {
        $xCount = count($arr[0]);
        $yCount = count($arr);
        $maxSum = null;
        for ($x = 0; $x+2 <= $xCount-1; $x++) {
            for ($y = 0; $y+2 <=$yCount-1; $y++) {
                $sum = $this->getSum($this->getByStartPosition($arr, $x, $y));
                
                if ($maxSum === null || $sum > $maxSum) {
                    $maxSum = $sum;
                }
            }
        }
        
        return $maxSum;
    }
}

$scheme = [
    [0, 1, 2],
    [1],
    [0,1,2]
];

function moveRight($scheme) {
    $moved = [];
    foreach ($scheme as $line) {
        $moved[] = array_map(static function ($v) {
           return $v+1; 
        }, $line);  
    }
    
    return $moved;
}

// Complete the hourglassSum function below.
function hourglassSum($arr) {
   return (new HourGlass())->calc($arr);
}

$array = [
    ['1', '1', '1', '0', '0', '0',],
    ['0', '1', '0', '0', '0', '0',],
    ['1', '1', '1', '0', '0', '0',],
    ['0', '0', '2', '4', '4', '0',],
    ['0', '0', '0', '2', '0', '0',],
    ['0', '0', '1', '2', '4', '0',],
];

echo (hourglassSum($array));