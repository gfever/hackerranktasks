<?php

declare(strict_types=1);

function mergeSort($array)
{
    if(count($array) == 1) {
        return $array;
    }

    $mid = (int)ceil(count($array) / 2);
    $left = array_slice($array, 0, $mid);
    $right = array_slice($array, $mid);
    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}


function merge($left, $right)
{
    $res = array();

    while (count($left) > 0 && count($right) > 0)
    {
        if($left[0] > $right[0])
        {
            $res[] = $right[0];
            $right = array_slice($right , 1);
        }
        else
        {
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }
    }

    while (count($left) > 0)
    {
        $res[] = array_shift($left);
    }

    while (count($right) > 0)
    {
        $res[] = array_shift($right);
    }

    return $res;
}


var_dump(mergeSort([2100, 23, 40, 24, 2, 1]));