<?php
/**
 * @author d.ivaschenko
 */


// Complete the birthdayCakeCandles function below.
function birthdayCakeCandles($ar) {

    rsort($ar);
    $start = $ar[0];
    $c = 0;
    foreach ($ar as $k => $v) {
        if($v === $start) {
           $c++;
        } else {
            break;
        }
    }

    echo($c);
}


birthdayCakeCandles([3, 2, 1, 3]);