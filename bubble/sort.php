<?php

declare(strict_types=1);


function countSwaps(array $ints) {
    $length = count($ints);
    $swaps = 0;
    for($i=0;$i<$length;$i++) {
        for($j=0;$j<$length-1;$j++) {
            if ($ints[$j] > $ints[$j+1]) {
                $k = $ints[$j];
                $ints[$j] = $ints[$j+1];
                $ints[$j+1] = $k;
                $swaps++;
            }
        }
    }
    echo("Array is sorted in $swaps swaps." . PHP_EOL);
    echo("First Element: {$ints[0]}" . PHP_EOL);
    $last = array_pop($ints);
    echo("Last Element: {$last}");
}


countSwaps([3,2,1]);