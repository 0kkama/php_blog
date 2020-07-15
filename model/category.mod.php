<?php
include_once ('utility/config.util.php');
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
    $sql = "SELECT * FROM category WHERE cat_id = :cat_id";
    return getQuery($sql);
}
// function getCatergoryID() {
//     $sql = "SELECT cat_id FROM categories WHERE login = :author ";
//     $query = makeQueryToDB($sql);
//           return $query->fetchAll();
//     }
