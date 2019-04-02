<?php
/**
 * @author d.ivaschenko
 */

// Complete the plusMinus function below.
function plusMinus($arr) {

    $p = 0;
    $m = 0;
    $z = 0;

    foreach ($arr as $num) {
        if ($num > 0) {
            $p++;
        } elseif ($num < 0) {
            $m++;
        } elseif ($num === 0) {
            $z++;
        }
    }

    $count = count($arr);
    $result = formatFloat($p/$count) . PHP_EOL;
    $result .= formatFloat($m/$count) . PHP_EOL;
    $result .= formatFloat($z/$count);
    return $result;
}

function formatFloat($float) {
    return (float)number_format($float, 5, '.', '');
}

$arr = [-4, 3, -9, 0, 4, 1];

echo(plusMinus($arr));