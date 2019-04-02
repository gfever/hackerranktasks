<?php
/**
 * @author d.ivaschenko
 */

function timeConversion($s) {
    $time = substr($s, 0, -2);
    $pmam = substr($s, -2, 2);
    $timeExploded = explode(':', $time);
    if ($pmam === 'PM') {
        if ($timeExploded[0] != 12) {
            $timeExploded[0] += 12;
        }
    } elseif($timeExploded[0] == 12) {
        $timeExploded[0] = '00';
    }

    return implode(':', $timeExploded);
}


echo(timeConversion('01:05:45PM'));