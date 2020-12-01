<?php
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
function checkParams(array $params) : string {
    // допилить эту хрень или оставить как есть?
    $errMsg = '';
    $errors = [];
    foreach ($params as $key => $value) {
        if ($value === '') {

            switch($key):
                case 'art_id': $errors[] = 'номер '; break;
                case 'user_id': $errors[] = 'автор '; break;
                case 'content': $errors[] = 'контент '; break;
                case 'title': $errors[] = 'заголовок '; break;
                case 'cat_id': $errors[] = 'категория '; break;
            endswitch;
        }
    }
    // if ($errors !== [])
    $length = count($errors);
    if($length !== 0):
        foreach($errors as $key => $value) {
            $errMsg .= $value;
        }
        $errMsg = 'Заполните все поля формы! Пропущено: ' . $errMsg;
    endif;

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
   $reg = '@(\/\/)|[^\s\/a-zA-Z0-9_-]+@';
   if (preg_match($reg, $requestUrl)) {
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
        'add', 'edit', 'delete', 'category', 'revision', 'article', 'info', 'logs', 'index',
        'users', 'user', 'error', 'errors', 'login','registration','articles','categories',

    ];
    foreach ($forbidWords as $word) {
            if ($str === $word) {
                return false;
            }
        return true;
    }
}



