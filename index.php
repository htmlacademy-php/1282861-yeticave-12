<?php
require_once("function.php");
require_once("data.php");
require_once("helpers.php");

$page_content = include_template('main.php', ['categories' => $categories, 'products' => $products]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Главная страница',
    'user_name' => $user_name
]);

print($layout_content);
