<?php

function rotate($array, $num) {
    
    $q = new SplQueue();
    
    foreach ($array as $item) {
        $q->push($item);
    }
    
    for ($i=0; $i<$num; $i++) {
        $first = $q->dequeue();
        $q->enqueue($first);
    }
    
    $res = [];
    
    while (!$q->isEmpty()) {
        $res[] = $q->dequeue();
    }
    
    echo(implode(' ', $res));
}



$array = [1, 2, 3, 4, 5];
$num = 4;

rotate($array, $num);