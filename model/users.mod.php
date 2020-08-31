<?php
    include_once ('utility/config.util.php');
// фуи для работы с пользователями(авторами)
// declare(strict_types=1);
// cписок авторов
function getAuthorsList() : array {
    $sql = "SELECT * FROM users";
        return getQuery($sql);
    }
// получение логина автора по его ID
function getUserLogin($user_id) : string {
    $sql = "SELECT login FROM users WHERE user_id = :user_id";
    $param['user_id'] = $user_id; // user_id is string, but for func querytoDB we need array
    // $query = makeQueryToDB($sql, $param);
    return getQuery($sql, $param, 2)['login'];
        // return $query->fetch()['login'];
}
// function getUserID() {
//     $sql = "SELECT user_id FROM users WHERE login = :author ";
//     $query = makeQueryToDB($sql);
//           return $query->fetchAll();
//     }
