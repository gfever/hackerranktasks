<?php


// Complete the reverseArray function below.
function reverseArray($a) {
    $stack = new SplStack();
    
    foreach ($a as $item) {
        $stack->push($item);
    }

    $res = [];
    
    while (!$stack->isEmpty()) {
        $res[] = $stack->pop();
    }
    
    echo (implode(' ', $res));
}


reverseArray([1, 2, 3, 4, 5]);