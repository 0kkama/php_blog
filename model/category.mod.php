<?php
// фуи для работы с категориями
// список категорий статей в порядке убывания по количеству публикаций в данной категории
function getCategoriesList() : array {
    $sql = "SELECT * FROM `category` ORDER BY (SELECT COUNT(articles.cat_id) as 'Count'
        FROM articles WHERE  articles.cat_id = category.cat_id AND `moderation` = '1'
        GROUP BY cat_name) DESC";
        return getQuery($sql);
}
// получение конкретной категории по ID
function getOneCategory(array $params) : array {
    $sql = "SELECT * FROM category WHERE cat_id = :id";
    return getQuery($sql, $params);
}
// получение всех статей в данной категории
function getArticlesInCategory(array $params) : array {
    $sql = "SELECT articles.art_id, articles.title, articles.content, articles.author, category.cat_name, category.cat_id, category.url
    FROM articles, category
    WHERE articles.cat_id = category.cat_id AND category.cat_id = :id
    ORDER BY articles.date DESC";
    return getQuery($sql, $params);
}
// получение числа категорий
function getCategoriesQuantity() : int {
    $sql = "SELECT COUNT(cat_id) AS cat FROM category";
    $result = getQuery($sql,[] ,'one')['cat'];
    return $result;
}
// возвращает число существующих категорий, а так же имя текущей
function getCategoriesQuantName(array $params) : array {
    $sql = "SELECT
    (SELECT COUNT(cat_name) FROM category) AS quant,
    (SELECT cat_name FROM category WHERE cat_id = :id) AS name";
    // $result = getQuery($sql, $params ,'one');
    return getQuery($sql, $params, 'one');
    // return $result;
}
// function getCatergoryID() {
//     $sql = "SELECT cat_id FROM categories WHERE login = :author ";
//     $query = makeQueryToDB($sql);
//           return $query->fetchAll();
//     }
