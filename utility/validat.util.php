<?php
//    ФУНКЦИИ ВАЛИДАЦИИ ДАННЫХ
// короткоименная фуя для простой обработки данных, вводимых пользователем.
function val(string $inputStr, int $key = 1) : string {
    switch ($key) {
        case 1: $inputStr = trim(strip_tags($inputStr)); break;
        case 2: $inputStr = trim(htmlspecialchars($inputStr)); break;
    }
    return $inputStr;
}
// проверяет заполненность форм, если хотя бы одно из полей пустое - вернёт true
function checkEmptyForms (array $fields) : bool {
    foreach ($fields as $key => $value) {
        if ($value === '') {
            return true;
        }
    }
        return false;
}
// проверка заполненности всех полей при создании/редактировании статьи
function checkArticleParams(array $params = [], array $categories) : string {
    $errMsg = 'Неверно указана категория!';

    if ( checkEmptyForms($params) ) {
        $errMsg = 'Заполните все поля формы!';
        return $errMsg;
    }
    if (empty($categories)) {
        $errMsg = 'Проблемы с категорией';
        return $errMsg;
    }
    foreach ($categories as $category) {
        if ($category['cat_id'] === $params['cat_id']) {
            $errMsg = '';
            break;
        }
    }
    return $errMsg;
}
// проверяет верность переданного ID по шаблону
function checkID(string $ID) : bool {
    return (bool) preg_match('/^[1-9]+\d*$/', $ID);
}
// проверяет верность переданного url по шаблону
function checkURL (string $url) : bool {
    return (bool) preg_match('/^[a-z]{3,}$/i', $url);
}
// проверить логин
function checkLogin (string $login) : bool {
    return (bool) preg_match('/^[a-z0-9]{3,}$/i', $login);
}
// проверить емаил
function checkEmail(string $email) : bool {
    // return (bool) preg_match('/^[a-z0-9_-]@[a-z]+\.[a-z]+$/', $email);
    return (bool) preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $email);
}
// проверка значений константы URL_PARAMS на корректность
function checkURLparams (array $params) : bool {
    foreach ($params as $value) {
        if (!preg_match('/[a-zA-Z0-9]*/', $value)) {
            return false;
        }
    }
    return true;
}
// проверяет URI на соответствие паттерну
function checkRequestURI (string $requestUrl) : bool {
    if (preg_match('~(\/\/)|[^\s\/\?\=a-zA-Z0-9_-]+~', $requestUrl)) {
        return true;
    }
    return false;
}
// возвращает false, если в строке присутствует что-то, кроме кириллических символов
function checkRUword (string $name) : bool {
    if (preg_match('/[^а-яё]+/ui', $name)) {
        return false;
    }
    return true;
}
// проверяет название новой категории на совпадение с одним из зарезервированных слов (возвращает false при совпадении)
function checkForbiddenWords(string $str) : bool {
    $forbidWords =
    [
        'add', 'edit', 'delete', 'category', 'categories', 'revision', 'article', 'articles',
        'info', 'logs', 'index', 'error', 'errors', 'admin', 'admins', 'archivation',
        'users', 'user', 'login', 'logout', 'registration', 'registr', 'moderation',
        'publication', 'expel',

    ];
    foreach ($forbidWords as $word) {
            if ($str === $word) {
                return false;
            }
    }
    return true;
}



