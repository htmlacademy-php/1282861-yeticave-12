<?php
require_once("function.php");
require_once("data.php");
require_once("helpers.php");

date_default_timezone_set("Europe/Moscow");

$con = mysqli_connect("localhost", "root", "root", "yeticave");
mysqli_set_charset($con, "utf8");

$products = get_products($con);
$categories = get_categories($con);

$page_content = include_template('main.php', ['categories' => $categories, 'products' => $products]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Главная страница',
    'user_name' => $user_name,
    'is_auth' => $is_auth

]);

print($layout_content);

