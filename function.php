<?php
/** Функция для форматирования суммы и добавления к ней знака рубля
 * @param integer $num цена товара
 * @return string отформатированная сумма вместе со знаком рубля
 */
function format_price(int $num) {
    $round_num = ceil($num);
    return number_format($round_num, 0, 0, " ") . " ₽";
}


/** Функция для подсчета оставшегося времени
 * @param $date дата в формате ГГГГ-ММ-ДД
 */
function end_time_lot($date) {
    $ts_now = strtotime($date);
    $secs_to_end = $ts_now - time();

    $hours = floor($secs_to_end / 3600);
    $minutes = floor(($secs_to_end % 3600) / 60);

    return $secs_to_end;
}
