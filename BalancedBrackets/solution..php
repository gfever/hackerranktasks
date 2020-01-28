<?php
//(, ), {, }, [, or ]
// Complete the isBalanced function below.
function isBalanced($s) {

    $brackets = ['(' => ')', '{' => '}', '[' => ']'];
    $exploded = str_split($s);
    $stack = new SplStack();
    foreach ($exploded as $k => $item) {
        if ($stack->isEmpty() && in_array($item, $brackets)) {
            return 'NO';
        }
        
        if (isset($brackets[$item])) {
            $stack->push($item);
        } else {
            $last = $stack->pop();
            if ($item !== $brackets[$last]) {
                return 'NO';
            }
        }
    }
    
    if ($stack->isEmpty()) {
        return 'YES';
    }
    
    return 'NO';
}


echo isBalanced('(({[]})))');