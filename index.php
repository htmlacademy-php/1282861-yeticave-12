<?php
require_once("function.php");
require_once("data.php");
require_once("helpers.php");

date_default_timezone_set("Europe/Moscow");

$con = mysqli_connect("localhost", "root", "", "yeticave");
mysqli_set_charset($con, "utf8");
$sql_products = "SELECT l.id, l.title, l.start_price, l.image, c.name, IFNULL(MAX(b.price), l.start_price) AS price
FROM lot AS l
         JOIN category AS c ON c.id = l.category_id
         LEFT JOIN bet AS b ON b.lot_id = l.id
WHERE l.expiration_date > NOW()
GROUP BY l.id";
$result_products = mysqli_query($con, $sql_products);
$products = mysqli_fetch_all($result_products, MYSQLI_ASSOC);

$sql_categories = "SELECT name, symbol_code FROM category";
$result_categories = mysqli_query($con,$sql_categories);
$categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);

$page_content = include_template('main.php', ['categories' => $categories, 'products' => $products]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Главная страница',
    'user_name' => $user_name,
    'is_auth' => $is_auth

]);

print($layout_content);

