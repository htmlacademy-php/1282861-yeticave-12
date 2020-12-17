<?php
$is_auth = rand(0, 1);

$user_name = 'Sergey';

$categories = [
    "boards" => "Доски и лыжи",
    "attachment" => "Крепления",
    "boots" => "Ботинки",
    "clothing" => "Одежда",
    "tools" => "Инструменты",
    "other" => "Разное"
];
$products = [
    [
        "title" => "2014 Rossignol District Snowboard",
        "categories" => $categories["boards"],
        "price" => 10999,
        "image" => "img/lot-1.jpg",
        "date" => "2020-12-11"
    ], [
        "title" => "DC Ply Mens 2016/2017 Snowboard",
        "categories" => $categories["boards"],
        "price" => 15999,
        "image" => "img/lot-2.jpg",
        "date" => "2020-12-11"

    ], [
        "title" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "categories" => $categories["attachment"],
        "price" => 8000,
        "image" => "img/lot-3.jpg",
        "date" => "2020-12-11"

    ], [
        "title" => "Ботинки для сноуборда DC Mutiny Charocal",
        "categories" => $categories["boots"],
        "price" => 10999,
        "image" => "img/lot-4.jpg",
        "date" => "2020-12-11"

    ], [
        "title" => "Куртка для сноуборда DC Mutiny Charocal",
        "categories" => $categories["clothing"],
        "price" => 7500,
        "image" => "img/lot-5.jpg",
        "date" => "2020-12-11"

    ], [
        "title" => "Маска Oakley Canopy",
        "categories" => $categories["other"],
        "price" => 5400,
        "image" => "img/lot-6.jpg",
        "date" => "2020-12-11"

    ]
];

