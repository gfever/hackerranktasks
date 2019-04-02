<?php
/**
 * @author d.ivaschenko
 */

function miniMaxSum($arr) {

    $minsort = $arr;
    $maxsort = $arr;
    sort($minsort);
    rsort($maxsort);
    array_pop($minsort);
    array_pop($maxsort);

    $min = array_sum($minsort);
    $max = array_sum($maxsort);

    echo $min . ' ' . $max;
}


$arr = [1, 2, 3, 4, 5];

miniMaxSum($arr);