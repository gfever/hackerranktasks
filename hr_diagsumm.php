<?php
/**
 * @author d.ivaschenko
 */

function diagonalDifference($arr) {

    $leftSum = 0;
    $rightSum = 0;
    foreach ($arr as $k => $item) {
        $leftSum += $item[$k];
        $rightSum += $item[count($item) - 1 - $k];
    }

    return abs($leftSum - $rightSum);
}


$arr = [
    [11, 2, 4],
    [4, 5, 6],
    [10, 8, 12]
];

echo(diagonalDifference($arr));