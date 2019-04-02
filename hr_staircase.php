<?php
/**
 * @author d.ivaschenko
 */


// Complete the staircase function below.
function staircase($n) {
    $result = [];
    for ($i=$n-1; $i >= 0; $i--) {

        $line = '';
        for ($k=0;$k<$n;$k++) {
            if ($k<$i) {
                $line .= ' ';
            } else {
                $line .= '#';
            }
        }
        $result[] = $line;
    }

    echo(implode(PHP_EOL, $result));
}


staircase(20);