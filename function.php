<?php
/** Функция для форматирования суммы и добавления к ней знака рубля
 * @param integer $num цена товара
 * @return string отформатированная сумма вместе со знаком рубля
 */
function format_price(int $num) {
    $round_num = ceil($num);
    return number_format($round_num, 0, 0, " ") . " ₽";
}


/**
 * Функция для подсчета оставшегося времени
 * @param string $date - дата в формате ГГГГ-ММ-ДД
 * @return string - количество часов и минут
 */
function end_time_lot(string $date): string
{
    $ts_now = strtotime($date);
    $secs_to_end = time() - $ts_now;

    $hours = floor($secs_to_end / 3600);
    $minutes = floor(($secs_to_end % 3600) / 60);

    $lost_time = $hours . ":" . $minutes;

    return $lost_time;
}
