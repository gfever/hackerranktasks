<?php

/*
 * Complete the runningMedian function below.
 */
function runningMedian($a)
{
    /*
     * Write your code here.
     */
    $minHeap = new SplMinHeap();
    $maxHeap = new SplMaxHeap();
    $odd = false;
    $result = [];
    $m = null;
    foreach ($a as $item) {
        $odd = $odd == false;
        
        if ($maxHeap->isEmpty()) {
            $maxHeap->insert($item);
        } elseif ($minHeap->isEmpty() || $item < $minHeap->top()) {
            $maxHeap->insert($item);
            while ($maxHeap->count() > ($minHeap->count()+1)) {
                $minHeap->insert($maxHeap->extract());
            }
        } else {
            $minHeap->insert($item);
            while ($minHeap->count() > $maxHeap->count()) {
                $maxHeap->insert($minHeap->extract());
            }
        }
        
        if (!$odd) {
            if ($minHeap->isEmpty()) {
                $max = $maxHeap->extract();
                $min = $maxHeap->top();
                $maxHeap->insert($max);
            } else {
                $max = $minHeap->top();
                $min = $maxHeap->top();
            }
            $m = ($max + $min)/2;
            
        } else {
            $max = $maxHeap->top();
            $m = $max;
        }

        $result[] = $m;
    }
    
    return $result;
}

//3 4 5 7 8 12
//12 - 12
//4 12 - 8
//4 5 12 - 5
//3 4 5 12 - 4.5
//3 4 5 8 12 - 5
//3 4 5 7 8 12 - 6
//$input = [
//    12,
//    4,
//    5,
//    3,
//    8,
//    7
//];

//12.0
//8.0
//5.0
//4.5
//5.0
//6.0



//$input = [
//1,
//2,
//3,
//4,
//5,
//6,
//7,
//8,
//9,
//10
//];

$input = file(__DIR__ . '/input');
$input = array_map('intval', $input);
$result = runningMedian($input);

$expected = file(__DIR__ . '/expected');


foreach ($result as $k => $item) {
    if ($expected[$k] != $item) {
        echo('Wrong: ' . $k . ' --- ' . $item . '!=' . $expected[$k] . PHP_EOL);
    }
}

var_dump(json_encode($result));


/*
 * 
 *
 *  1.0
1.5
2.0
2.5
3.0
3.5
4.0
4.5
5.0
5.5
 * */