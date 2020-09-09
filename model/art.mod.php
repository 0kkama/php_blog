<?php
// фуи для работы со статьями
// список свежих публикаций для главной страницы
function getArticlesList() : array {
    $sql = "SELECT * FROM `articles` WHERE `moderation` = '1' ORDER BY `date` DESC LIMIT 10";
        return getQuery($sql);
}
// получение конкретной статьи
function getOneArticle (array $params = []) : array {
    $sql = "SELECT * FROM articles WHERE art_id = :art_id AND `moderation` = '1'";
        return getQuery($sql, $params, 'one');
        }
// добавление новой статьи в базу
function addArticle(array $params = []) : bool {
    $sql = "INSERT INTO articles (user_id, cat_id, author, title, content) VALUES (:user_id, :cat_id, :author, :title, :content)";
    $query = makeQueryToDB($sql, $params);
        return true;
        }
// редактирование содержания статьи по ID
function editArticle(array $params = []) : bool {
    $sql = "UPDATE articles SET title = :title, content = :content, cat_id = :cat_id WHERE art_id = :art_id";
    $query = makeQueryToDB($sql, $params);
        return true;
}
// удаление статьи по ID
function removeArticle(array $params = []) : bool {
    $sql = "DELETE FROM articles WHERE art_id = :art_id";
    $query = makeQueryToDB($sql, $params);
        return true;
}
// проверка существования статьи по ID
function checkArticleExist(array $params = []) : array {
    $sql = "SELECT EXISTS(SELECT `art_id` FROM articles WHERE art_id = :art_id) as 'exist'";
        // $query = makeQueryToDB($sql, $params);
        // return $query->fetch();
        return getQuery($sql, $params, 'one');
    }
