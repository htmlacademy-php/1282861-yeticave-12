-- Добавляем новых пользователей в таблицу user
INSERT INTO user (date_of_registration, email, name, password, contacts) VALUES (NOW(), 'julia@mail.ru', 'Julia', 'supersecret', '+79991234567');
INSERT INTO user (date_of_registration, email, name, password, contacts) VALUES (NOW(), 'danya@mail.ru', 'Danya', 'secretsuper', '+79997654321');

-- Добавляем существующий список категорий в таблицу category
INSERT INTO category (symbol_code, name) VALUES ('boards', 'Доски и лыжи');
INSERT INTO category (symbol_code, name) VALUES ('attachment', 'Крепления');
INSERT INTO category (symbol_code, name) VALUES ('boots', 'Ботинки');
INSERT INTO category (symbol_code, name) VALUES ('clothing', 'Одежда');
INSERT INTO category (symbol_code, name) VALUES ('tools', 'Инструменты');
INSERT INTO category (symbol_code, name) VALUES ('other', 'Разное');

-- Добавляем существующий список объявлений в таблицу lot
INSERT INTO lot (category_id, user_id, date, title, description, image, start_price, expiration_date, bet_step) VALUES ('1','1', '2021-02-03 15:13:02', '2014 Rossignol District Snowboard', 'описание 1', 'img/lot-1.jpg', '10999', '2021-06-03 15:13:02', '100');
INSERT INTO lot (category_id, user_id, date, title, description, image, start_price, expiration_date, bet_step) VALUES ('1','2', '2021-02-03 15:13:02', 'DC Ply Mens 2016/2017 Snowboard', 'описание 2', 'img/lot-2.jpg', '15999', '2021-06-03 15:13:02', '150');
INSERT INTO lot (category_id, user_id, date, title, description, image, start_price, expiration_date, bet_step) VALUES ('2','2', '2021-02-03 15:13:02', 'Крепления Union Contact Pro 2015 года размер L/XL', 'описание 3', 'img/lot-3.jpg', '8000', '2021-06-03 15:13:02', '200');
INSERT INTO lot (category_id, user_id, date, title, description, image, start_price, expiration_date, bet_step) VALUES ('3','1', '2021-02-03 15:13:02', 'Ботинки для сноуборда DC Mutiny Charocal', 'описание 4', 'img/lot-4.jpg', '10999', '2021-06-03 15:13:02', '100');
INSERT INTO lot (category_id, user_id, date, title, description, image, start_price, expiration_date, bet_step) VALUES ('4','1', '2021-02-03 15:13:02', 'Куртка для сноуборда DC Mutiny Charocal', 'описание 5', 'img/lot-5.jpg', '7500', '2021-06-03 15:13:02', '150');
INSERT INTO lot (category_id, user_id, date, title, description, image, start_price, expiration_date, bet_step) VALUES ('6','2', '2021-02-03 15:13:02', 'Маска Oakley Canopy', 'описание 6', 'img/lot-6.jpg', '5400', '2021-06-03 15:13:02', '200');

-- Добавляем пару ставок для любого объявления
INSERT INTO bet (user_id, date, price, lot_id) VALUES (1, NOW(), 11099, 1);
INSERT INTO bet (user_id, date, price, lot_id) VALUES (2, NOW(), 8200, 3);
INSERT INTO bet (user_id, date, price, lot_id) VALUES (1, NOW(), 7650, 5);

-- Получаем все категории
SELECT name, symbol_code
FROM category;


-- Получаем самые новые, открытые лоты. Каждый лот включает название, стартовую цену, ссылку на изображение, текущую цену, название категории;
SELECT l.id, l.title, l.start_price, l.image, c.name, IFNULL(MAX(b.price), l.start_price) AS price
FROM lot AS l
         JOIN category AS c ON c.id = l.category_id
         LEFT JOIN bet AS b ON b.lot_id = l.id
WHERE l.expiration_date > NOW()
GROUP BY l.id;

-- Показываем лот по его id. Получаем название категории, к которой принадлежит лот
SELECT l.*,c.name AS category
FROM lot AS l
    JOIN category AS c ON c.id = l.category_id
WHERE l.id = 2;

-- Обновляем название лота по его идентификатору
UPDATE lot
SET title ='DC Ply Mens 2016/2019 Snowboard'
WHERE id = 2;

-- Получаем список ставок для лота по его идентификатору с сортировкой по дате
SELECT *
FROM bet
WHERE lot_id = 3
ORDER BY date;
