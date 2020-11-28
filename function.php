<?php
function formatting_sum($num) {
    $round_num = ceil($num);
    if ($round_num >= 1000) {
        return number_format($round_num, 0, 0, " ") . " ₽";
    }
}
