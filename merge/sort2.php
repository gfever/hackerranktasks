<?php

function mergeSort(array $items)
{
    if (count($items) === 1) {
        return $items;
    }
    
    $size = count($items);
    $mid = (int)ceil($size/2);
    $left = array_slice($items, 0, $mid);
    $right = array_slice($items, $mid);
    $left = mergeSort($left);
    $right = mergeSort($right);
    
    return merge($left, $right);
}

function merge(array $left, array $right)
{
    $res = [];
    while(count($left) > 0 && count($right) > 0) {
        if ($left[0] > $right[0]) {
            $res[] = array_shift($right);
        } else {
            $res[] = array_shift($left);
        }
    }
    
    $res = [...$res, ...$left, ...$right];
    return $res;
}


var_dump(mergeSort([2100, 23, 40, 24, 2, 1]));