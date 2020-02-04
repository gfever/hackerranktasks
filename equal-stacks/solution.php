<?php

declare(strict_types=1);

//https://www.hackerrank.com/challenges/equal-stacks/problem?

function getStacks($h1, $h2, $h3)
{
    $stacks = [];

    foreach ([$h1, $h2, $h3] as $k => $s) {
        $stacks[$k] = new SplStack();
        $s = array_reverse($s);
        foreach ($s as $n) {
            $stacks[$k]->push($n);
        }
    }

    return $stacks;
}



/*
 * Complete the equalStacks function below.
 */
function equalStacks($h1, $h2, $h3)
{
    [$s1, $s2, $s3] = getStacks($h1, $h2, $h3);

    $sums = [];
    
    foreach (['1', '2', '3'] as $s) {
        $sums['s'.$s] = array_sum(${'h'.$s});
    }
    
    while (true) {
        if ($sums['s1'] === $sums['s2'] && $sums['s3'] === $sums['s2']) {
            return $sums['s1'];
        }
        
        arsort($sums);
        $first = array_key_first($sums);
        $cs = ${$first};
        if (!$cs->isEmpty()) {
            $fsum = ${$first}->pop();
            $sums[$first] -= $fsum;
        }
    }
    
    return 0;
}


$h1 = [
    3,
    2,
    1,
    1,
    1
];

$h2 = [
    4,
    3,
    2
];

$h3 = [
    1,
    1,
    4,
    1
];


echo(equalStacks($h1, $h2, $h3));

//
$h1 = [
    1,
    1,
    1,
    1,
    1
];

$h2 = [
    3,
    2
];

$h3 = [
    1,
    3,
    1
];


echo(equalStacks($h1, $h2, $h3));

$h1 = [
    1,
    1,
    1,
    1,
    2
];

$h2 = [
    3,
    7
];

$h3 = [
    1,
    3,
    1
];

echo(equalStacks($h1, $h2, $h3));