<?php

/*
 * https://www.hackerrank.com/challenges/jesse-and-cookies/problem
 * 
 * Complete the cookies function below.
 */
function cookies($k, $a) {
    $heap = new SplMinHeap();
    
    foreach ($a as $item) {
        $heap->insert($item);
    }
    
    $counter = 0;
    
    // Then we iterate through each node for displaying the result
    while ($heap->top() < $k) {
        
        $ex1 = $heap->extract();
        
        if ($heap->isEmpty()) {
            return -1;
        }
        
        $ex2 = $heap->extract() * 2;
        $heap->insert($ex1 + $ex2);
        $counter++;
    }
    
    return $counter;
    
//    while ($heap->valid()) {
//        echo $heap->current();
//        $heap->next();
//    }
//    
//    echo(PHP_EOL . $counter);
}


//6 7
//1 2 3 9 10 12


//$n = 7;
//$a = [1, 2, 3, 9, 10, 12];

//$n = 10;
//$a = [1, 1, 1];


$input = file(__DIR__ . '/input2');
$n = explode(' ', $input[0])[1];
$n = (int)$n;
$a = explode(' ', $input[1]);
$a = array_map('intval', $a);

echo(cookies($n, $a));
//
//
//$fptr = fopen(getenv("OUTPUT_PATH"), "w");
//
//$stdin = fopen("php://stdin", "r");
//
//fscanf($stdin, "%[^\n]", $nk_temp);
//$nk = explode(' ', $nk_temp);
//
//$n = intval($nk[0]);
//
//$k = intval($nk[1]);
//
//fscanf($stdin, "%[^\n]", $A_temp);
//
//$A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));
//
//$result = cookies($k, $A);
//
//fwrite($fptr, $result . "\n");
//
//fclose($stdin);
//fclose($fptr);
