<?php
// фуи для работы со статьями
// список свежих публикаций для главной страницы
function getArticlesList() : array {
    // $sql = "SELECT * FROM `articles` WHERE `moderation` = '1' ORDER BY `date` DESC LIMIT 20";
    $sql = "SELECT articles.art_id, articles.user_id, articles.cat_id,
            articles.title, articles.content, articles.author, articles.date,
            articles.moderation, category.cat_name
            FROM articles, category
            WHERE `moderation` = '1' AND articles.cat_id = category.cat_id ORDER BY `date` DESC LIMIT 20";
    return getQuery($sql);
}
// получение списка всех статей
function getAllArticles() : array {
    $sql = "SELECT * FROM articles, category WHERE articles.cat_id = category.cat_id ORDER BY `date` DESC";
    return getQuery($sql);
}
// получение всех непромодерированных статей
function getNotModerArticles() : array {
    $sql = "SELECT * FROM articles, category WHERE `moderation` = '0' articles.cat_id = category.cat_id ORDER BY `date` DESC";
    return getQuery($sql);
}
// получение всех заархивированных статей
function getArchivedArticles() : array {
    $sql = "SELECT * FROM articles, category WHERE `moderation` = '2' articles.cat_id = category.cat_id ORDER BY `date` DESC";
    return getQuery($sql);
}
// получение конкретной статьи по ID
function getOneArticle (array $params = []) : array {
    $sql = "SELECT articles.art_id, articles.user_id, articles.cat_id,
            articles.title, articles.content, articles.author, articles.date,
            articles.moderation, category.cat_name
            FROM articles, category WHERE art_id = :art_id AND `moderation` = '1' AND articles.cat_id = category.cat_id";
    return getQuery($sql, $params, 'one');
}
// добавление новой статьи в базу
function addArticle(array $params = []) : bool {
    $sql = "INSERT INTO articles (user_id, cat_id, author, title, content) VALUES (:user_id, :cat_id, :author, :title, :content)";
    makeQueryToDB($sql, $params);
    return true;
}
// редактирование содержания статьи по ID
function editArticle(array $params = []) : bool {
    $sql = "UPDATE articles SET title = :title, content = :content, cat_id = :cat_id WHERE art_id = :art_id";
    makeQueryToDB($sql, $params);
    return true;
}
// архивация статьи по ID
function archivArticle(array $params = []) : bool {
    // $sql = "DELETE FROM articles WHERE art_id = :art_id";
    $sql = "UPDATE articles SET `moderation`= '2' WHERE art_id = :art_id";
    makeQueryToDB($sql, $params);
    return true;
}
// реальное удаление статьи из БД
function removeArtcle (array $params = []) : bool {
    $sql = "DELETE FROM articles WHERE art_id = :art_id";
    makeQueryToDB($sql, $params);
    return true;
}
// проверка существования статьи по ID со статусом модерации '1'
function checkArticleExist(array $params = []) : array {
    $sql = "SELECT EXISTS(SELECT `art_id` FROM articles WHERE art_id = :art_id AND moderation = '1') as 'exist',
            (SELECT user_id FROM articles WHERE art_id = :art_id AND moderation = '1') as 'user_id'";
    return getQuery($sql, $params, 'one');
}
