<?php

function twoStacks($x, $a, $b) {

    $a = array_reverse($a);
    $b = array_reverse($b);
    if ($x === 0) {
        return 0;
    }
    $sa = new SplStack();
    foreach ($a as $n) {
        $sa->push($n);
    }


    $sb = new SplStack();
    foreach ($b as $n) {
        $sb->push($n);
    }

    $sumsa = new SplStack();
    $sumsb = new SplStack();
    $max = 0;

    $takeFrom = 'sa';
    $sumsasum = 0;
    $sumsbsum = 0;

    $sumsacount = 0;
    $sumsbcount = 0;

    while (true) {
        if ($sa->isEmpty() && $sb->isEmpty()) {
            break;
        } elseif ($sb->isEmpty()) {
            $shifted = $sa->pop();
            $sumsa->push($shifted);
            $sumsasum += $shifted;
            $sumsacount++;
        } elseif ($sa->isEmpty()) {
            $shifted = $sb->pop();
            $sumsb->push($shifted);
            $sumsbsum += $shifted;
            $sumsbcount++;
        } else {
            $shifted = ${$takeFrom}->pop();
            ${'sum' . $takeFrom}->push($shifted);
            ${'sum' . $takeFrom . 'sum'} += $shifted;
            ${'sum' . $takeFrom . 'count'}++;
        }
        $sum = $sumsasum + $sumsbsum;
        if ($sum > $x && $takeFrom === 'sa') {
            $max = $sumsacount - 1;
            $takeFrom = 'sb';
            $popped = $sumsa->pop();
            $sa->push($popped);
            $sumsasum -= $popped;
            $sumsacount--;
            continue;
        }

        if ($sum > $x && ($sa->isEmpty() || $sb->isEmpty())) {
            $maxc = ($sumsacount + $sumsbcount) - 1;
            if ($maxc > $max) {
                $max = $maxc;
            }
            return $max;
        }

        if ($sum > $x && $takeFrom === 'sb' && !$sumsa->isEmpty()) {
            $maxc = ($sumsacount + $sumsbcount) - 1;
            if ($maxc > $max) {
                $max = $maxc;
            }
            $popped = $sumsa->pop();
            $sa->push($popped);
            $sumsasum -= $popped;
            $sumsacount--;
            continue;
        }

        if ($sum > $x && $takeFrom === 'sb' && $sumsa->isEmpty()) {
            $maxc = ($sumsacount + $sumsbcount) - 1;
            if ($maxc > $max) {
                $max = $maxc;
            }
            return $max;
        }
    }

    return $sumsacount + $sumsbcount;
}


$a = '4 2 4 6 1';
//17
$b = '2 1 8 5';
//16

$a = explode(' ', $a);
$b = explode(' ', $b);

//echo twoStacks(10, $a, $b) . PHP_EOL;
////
//exit();

//$a = '4 2 4 6 1';
//$b = '2 1 8 5';
//
//$a = array_reverse(explode(' ', $a));
//$b = array_reverse(explode(' ', $b));
//
//echo twoStacks(10, $a, $b);


$input = file(__DIR__ . '/input', FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
$expected = file(__DIR__ . '/expected', FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
$f = array_shift($input);

$chunks = array_chunk($input, 3);

//24 2 46
//16 1 17 2 15 15 18 19 11 19 19 14 10 15 3 12 18 9 15 14 9 3 6 10
//11 1

$a = '16 1 17 2 15 15 18 19 11 19 19 14 10 15 3 12 18 9 15 14 9 3 6 10';
$b = '11 1';
$a = explode(' ', $a);
$b = explode(' ', $b);
$x = 46;


$a = '17 5 0';
$b = '10 8 2 1 13 1 14 18 9 18 16 19 5';
$a = explode(' ', $a);
$b = explode(' ', $b);
$x = 60;
//echo(twoStacks($x, $a, $b) . PHP_EOL);
//9
//exit();



//["31 5 31","19 19 1 19 4 14 7 19 13 0 12 6 3 2 11 10 15 8 7 10 13 2 13 0 17 9 0 16 1 15 7","0 6 8 0 2"]


$a = '19 19 1 19 4 14 7 19 13 0 12 6 3 2 11 10 15 8 7 10 13 2 13 0 17 9 0 16 1 15 7';
$b = '0 6 8 0 2';
$a = explode(' ', $a);
$b = explode(' ', $b);
$x = 31;
echo(twoStacks($x, $a, $b) . PHP_EOL);
//5
exit();

foreach ($chunks as $k => $chunk) {
    echo json_encode($chunk) . PHP_EOL;
    $fl = explode(' ', array_shift($chunk));
    $x = (int)array_pop($fl);
    $a = array_map('intval', explode(' ', array_shift($chunk)));
    $b = array_map('intval', explode(' ', array_shift($chunk)));
    $result = twoStacks($x, $a, $b);
    if ($result != $expected[$k]) {
        echo('WRONG, MUST BE ' .$expected[$k] . PHP_EOL);
    }
    echo($result . PHP_EOL);
}
echo 'FINISH';