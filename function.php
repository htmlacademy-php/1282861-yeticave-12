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

function get_categories($con) {
    $sql_categories = "SELECT id, name, symbol_code FROM category";
    $result_categories = mysqli_query($con,$sql_categories);
    $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);

//    $result = [];
//    foreach ($categories as $category) {
//        $key = $category["symbol_code"];
//        $result[$key] = $category["name"];
//    }
    return $categories;
}

function get_products($con) {
    $sql_products = "SELECT l.id, l.title, l.start_price, l.image, c.name, IFNULL(MAX(b.price), l.start_price) AS price
FROM lot AS l
         JOIN category AS c ON c.id = l.category_id
         LEFT JOIN bet AS b ON b.lot_id = l.id
WHERE l.expiration_date > NOW()
GROUP BY l.id";
    $result_products = mysqli_query($con, $sql_products);
    $products = mysqli_fetch_all($result_products, MYSQLI_ASSOC);

    return $products;
}
