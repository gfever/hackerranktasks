<?php

function twoStacks($x, $a, $b) {
    $sumsa = [];
    $sumsb = [];
    $max = 0;
    
    $takeFrom = 'a';
    $sumsasum = 0;
    $sumsbsum = 0;
    while (true) {
        if (empty($a) && empty($b)) {
            break;
        } elseif (empty($b)) {
            $sumsa[] = array_shift($a);
            $sumsasum = array_sum($sumsa);
        } elseif (empty($a)) {
            $sumsb[] = array_shift($b);
            $sumsbsum = array_sum($sumsb);
        } else {
            ${'sums' . $takeFrom}[]  = array_shift($$takeFrom);
            ${'sums' . $takeFrom . 'sum'} = array_sum(${'sums' . $takeFrom});
        }
        $sum = $sumsasum + $sumsbsum;
        if ($sum > $x && $takeFrom === 'a') {
            $max = count($sumsa) - 1;
            $takeFrom = 'b';
            array_unshift($a, array_pop($sumsa));
            $sumsasum = array_sum($sumsa);
            continue;
        }

        if ($sum > $x && (empty($a) || empty($b))) {
            $maxc = (count($sumsa) + count($sumsb)) - 1;
            if ($maxc > $max) {
                $max = $maxc;
            }
            return $max;
        }
        
        if ($sum > $x && $takeFrom === 'b' && !empty($sumsa)) {
            $maxc = (count($sumsa) + count($sumsb)) - 1;
            if ($maxc > $max) {
                $max = $maxc;
            }
            array_unshift($a, array_pop($sumsa));
            $sumsasum = array_sum($sumsa);
            continue;
        }
        
        if ($sum > $x && $takeFrom === 'b' && empty($sumsa)) {
            $maxc = (count($sumsa) + count($sumsb)) - 1;
            if ($maxc > $max) {
                $max = $maxc;
            }
            return $max;
        }
    }
    
    return count($sumsb) + count($sumsa);
}

///*
// * Complete the twoStacks function below.
// */
//function twoStacks($x, $a, $b) {
//    $a = array_reverse($a);
//    $b = array_reverse($b);
//    if ($x === 0) {
//        return 0;
//    }
//    $s1 = new SplStack();
//    foreach ($a as $n) {
//        $s1->push($n);
//    }
//
//    
//    $s2 = new SplStack();
//    foreach ($b as $n) {
//        $s2->push($n);
//    }
//    
//    $sum = 0;
//    $counter = 0;
//    while (true) {
//        $s1->rewind();
//        $s2->rewind();
//
//        $cs2 = $s2->current();
//        $cs1 = $s1->current();
//        if ($s2->isEmpty() && $s1->isEmpty()) {
//            break;
//        } elseif ($s2->isEmpty()) {
//            $sum += $s1->pop();
//        } elseif ($s1->isEmpty()) {
//            $sum += $s2->pop();
//        } elseif ($s1->current() <= $s2->current()) {
//            $sum += $s1->pop();
//        } else {
//            $sum += $s2->pop();
//        }
//
//        if ($sum > $x) {
//            break;
//        }
//        
//        $counter++;
//    }
//
//    c
//}


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