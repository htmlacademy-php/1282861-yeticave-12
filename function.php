<?php
/** Функция для форматирования суммы и добавления к ней знака рубля
 * @param integer $num цена товара
 * @return string отформатированная сумма вместе со знаком рубля
 */
function format_price(int $num) {
    $round_num = ceil($num);
    return number_format($round_num, 0, 0, " ") . " ₽";
}
