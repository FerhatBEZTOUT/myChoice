<?php 

function myCheckDate($date) {
    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
        if (date("Y-m-d", strtotime($date))==$date) {
            return true;
        } else {
            return false;
        }

    } else {
        return false;
    }
}

?>