<?php

declare(strict_types=1);

class LoginHeap extends SplHeap
{
    /**
     * We modify the abstract method compare so we can sort our
     * rankings using the values of a given array
     */
    public function compare($array1, $array2)
    {
        $values1 = array_values($array1);
        $values2 = array_values($array2);
        if ($values1[1] === $values2[1]) return 0;
        return $values1[1] < $values2[1] ? -1 : 1;
    }
}

function cmp($a, $b)
{
    if ($a[1] == $b[1]) {
        return 0;
    }
    return ($a[1] < $b[1]) ? -1 : 1;
}

function get_pairs(array $list1, array $list2) : array {

    usort($list1, "cmp");
    usort($list2, "cmp");
    
    $result = [];
    
    foreach ($list1 as $item) {
        $r = checkList2($item, $list2);
        if ($r) {
            $result[] = $r;
        }
    }
    
    return $result;
}


function checkList2($item, &$list2) {
    while (!empty($list2) && $item[1] >= array_values($list2)[0][1]) {
        $i = array_shift($list2);
        if ($item[1] == $i[1]) {
            return [$item[0], $i[0]];
        }
    }
    return null;
}

$a = [[1, 'a'], [2, 'b']];
$b = [[0, 'z'], [3, 'b']];

print_r(get_pairs($a, $b));



function find_celebrity(array $users) : int {
    // $a = $users[0];
    // $b = $users[1];
    // $a_knows_b = knows($a, $b);
   $nss = [];
    foreach ($users as $usera) {
        $ns = false;
        if (in_array($usera, $nss)) {
            continue;
        }
        foreach ($users as $userb) {
            if ($usera == $userb) {
                continue;
            }
            if (knows($userb, $usera)) {
                $nss[] = $userb;
            }
            if (knows($usera, $userb)) {
                $ns = true;
                break;
            }
        }
        if (!$ns) {
            return $usera;
        }
    }
}


$users = [1,2,3];

find_celebrity($users);