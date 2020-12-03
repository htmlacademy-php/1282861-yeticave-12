<?php
require_once/** @lang файл с функциями */
("function.php");
require_once/** @lang файл с массивами */
("data.php");

/**
 * Подключает шаблон, передает туда данные и возвращает итоговый HTML контент
 * @param string $name Путь к файлу шаблона относительно папки templates
 * @param array $data Ассоциативный массив с данными для шаблона
 * @return string Итоговый HTML
 */
function include_template($name, array $data = []) {
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

/** @var string $page_content получаем содержимое шаблона главной страницы. Передаем в шаблон массив с категориями товара и объявления */
$page_content = include_template('main.php', ['categories' => $categories, 'products' => $products]);
/** @var string $layout_content подключаем лейаут. Передаем туда содержимое шаблона страницы */
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Главная страница'
]);

print($layout_content);
