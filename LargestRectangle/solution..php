<?php

function storeCountOfHeight(&$heights, $height, $count)
{
    if (isset($heights[$height])) {
        $count += $heights[$height];
    }
    
    $heights[$height] = $count;
}

// Complete the largestRectangle function below.
function largestRectangle($heights)
{
    if (empty($heights)) {
        return 0;
    }

    $heights = array_map('intval', $heights);

    $max = 0;
    $heightsCounts = [];
    $stack = new SplStack();
    $stack->push($heights[0]);
    storeCountOfHeight($heightsCounts, $heights[0], 1);
    
    foreach ($heights as $k => $height) {
        if ($k === 0) {
            continue;
        }
        $current = $stack->top();
        if ($current > $height) {
            $count = 0;
            while (!$stack->isEmpty() && $current > $height) {
                $stack->pop();
                $count = $heightsCounts[$current];
                
                $localMax = $current * $count;
                if ($localMax > $max) {
                    $max = $localMax;
                }
                
                $heightsCounts[$current] = 0;
                $current = $stack->isEmpty() ? 0 : $stack->top();
            }
            
            if ($current < $height) {
                $stack->push($height);
                storeCountOfHeight($heightsCounts, $height, $count);
            }
        } elseif ($current < $height) {
            $stack->push($height);
        }

        $stack->rewind();
        while ($stack->valid()) {
            storeCountOfHeight($heightsCounts, $stack->current(), 1);
            $stack->next();
        }
        $stack->rewind();
    }
    
    foreach ($heightsCounts as $key => $heightsCount) {
        $localMax = $key * $heightsCount;
        if ($localMax > $max) {
            $max = $localMax;
        }
    }
    return $max;
}


echo largestRectangle([11, 11, 10, 10, 10]) . PHP_EOL;
echo largestRectangle([1, 2, 1]) . PHP_EOL;
echo largestRectangle([1, 2, 3]) . PHP_EOL;
echo largestRectangle([3, 2, 3]) . PHP_EOL;
echo largestRectangle([1, 2, 3, 4, 5]) . PHP_EOL;
echo largestRectangle([1, 2, 3, 4, 5, 6, 7, 8, 9]) . PHP_EOL;

$t = '301592 122259 43536 187632 302978 601534 315225 656623 473457 308788 843018 149306 547399 340519 841862 983185 83036 630755 129437 795665 934158 396001 371840 515009 970786 841866 930768 347730 283864 498753 293663 585455 621010';


$test = file_get_contents(__DIR__ . '/test');
//12984467


//$c = '8979 4570 6436 5083 7780 3269 5400 7579 2324 2116';
//26152


echo largestRectangle(explode(' ', $test));


//largestRectangle([1, 2, 3, 4, 5]);

//$fptr = fopen(getenv("OUTPUT_PATH"), "w");
//
//$stdin = fopen("php://stdin", "r");
//
//fscanf($stdin, "%d\n", $n);
//
//fscanf($stdin, "%[^\n]", $h_temp);
//
//$h = array_map('intval', preg_split('/ /', $h_temp, -1, PREG_SPLIT_NO_EMPTY));
//
//$result = largestRectangle($h);
//
//fwrite($fptr, $result . "\n");
//
//fclose($stdin);
//fclose($fptr);
