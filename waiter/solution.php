<?php

class IsPrime
{
    function check($num)
    {
        for ($i = 2; $i < $num; $i++)
        {
            if ($num % $i === 0)
            {
                return false;
            }
        }
        return true;
    }
}


function waiter($numbers, $iterationCount) {
    $isPrime = new IsPrime();
    $stacks = [];
    $stack = new SplStack();

    foreach ($numbers as $n) {
        $stack->push($n);
    }
    $stack->rewind();

    $stacks['a'][] = $stack;

    $i = 1;
    $counter = 0;
    while(true) {
        $i++;
        if (!$isPrime->check($i)) {
            continue;
        }
        if ($counter == $iterationCount) {
            break;
        }
        
        $stack = $stacks['a'][$counter];
        $counter++;
        
        $stacks['a'][$counter] = new SplStack();
        $stacks['b'][$counter] = new SplStack();
        while (!$stack->isEmpty()) {
            $n = $stack->pop();
            $r = $n % $i;
            if ($r) {
                $stacks['a'][$counter]->push($n);
            } else {
                $stacks['b'][$counter]->push($n);
            }
        }
    }
    
    $res = [];
    foreach (['b', 'a'] as $l) {
        for ($k = 0; $k <= $counter; $k++) {
            if (isset($stacks[$l][$k])) {
                $stacks[$l][$k]->rewind();
                while (!$stacks[$l][$k]->isEmpty()) {
                    $res[] = $stacks[$l][$k]->pop();
                }
            }
        }
    }
    return $res;
}

//47 21
$q = 21;
$n1 = '80 37 86 79 8 39 43 41 15 33 30 15 45 55 61 74 49 49 20 66 77 19 85 44 81 82 27 5 36 83 91 45 39 44 19 44 71 49 8 66 81 40 29 60 35 31 44';
$n1 = array_map('intval', explode(' ', $n1));
echo(implode(PHP_EOL, waiter($n1, $q)));
echo(PHP_EOL . '--------' . PHP_EOL);


$n1 = [3, 3, 4, 4, 9];
$q = 2;
waiter($n1, $q);
echo(implode(PHP_EOL, waiter($n1, $q)));
echo(PHP_EOL . '--------' . PHP_EOL);

$n1 = [3, 4, 7, 6, 5];
$q = 1;
waiter($n1, $q);
echo(implode(PHP_EOL, waiter($n1, $q)));
echo(PHP_EOL . '--------' . PHP_EOL);