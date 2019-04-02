<?php
/**
 * @author d.ivaschenko
 */

// Complete the unboundedKnapsack function below.
function unboundedKnapsack($targetSumm, $arr) {
    rsort($arr);
    $results = [];
    $ac = count($arr);
    for($i=0;$i<$ac;$i++) {
        $results[] = rec($targetSumm, $arr);
        array_shift($arr);
    }

    rsort($results);
    return $results[0];
}

function rec($targetSumm, $arr)  {
    $result = 0;
    $rest = $targetSumm;
    foreach ($arr as $k => $num) {
        $sRes = 0;
        if ($num > $targetSumm) {
            continue;
        }

        $check = floor($rest/$num);
        for($i=0;$i<$check;$i++) {
            $sRes += $num;
        }

        $rest -= $sRes;
        $result += $sRes;

        if ($rest == 0) {
            return $result;
        }
    }

    return $result;
}

//echo(unboundedKnapsack(12, [1, 6, 9]));
//echo(unboundedKnapsack(9, [3, 4, 4, 4, 8]));
//echo(unboundedKnapsack(11, [3, 7, 9]));
echo(unboundedKnapsack(22, [4, 7]));