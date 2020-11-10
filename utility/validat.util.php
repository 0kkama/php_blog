<?php
    include_once ('utility/config.util.php');

// короткоименная фуя для простой обработки данных, вводимых пользователем.
function val(string $inputStr, int $key = 1) : string {
    switch ($key) {
        case 1: $inputStr = trim(strip_tags($inputStr)); break;
        case 2: $inputStr = trim(htmlspecialchars($inputStr)); break;
        // case 2: $inputStr = trim($inputStr); break;
    }
    return $inputStr;
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

// проверка значений константы URL_PARAMS на корректность
function checkURLparams (array $params) : bool {
    foreach ($params as $value) {
        if (!preg_match('/[a-zA-Z0-9]*/', $value)) {
            return false;
        }
    }
    return true;
}

//
function checkRequestURI (string $requestUrl) : bool {
   $reg = '@(\/\/)|[^\s\/a-zA-Z0-9_-]+@';
   // $reg = '@(\/\/)|[^\s\/a-zA-Z0-9]*@';
   // $reg = '/[^\s\/a-zA-Z0-9]*/';
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

// вызывает ошибку 404
function ifErr404() : void {
    // фигурные скобки нужны для экранирования переменной в строке.
    include_once('controllers/errors/404.cntrl.php');
}

// проверяет название новой категории на совпадение с одним из зарезервированных слов
function checkForbiddenWords(string $str) : bool {
    $forbidWords = ['add', 'edit', 'delete', 'category', 'revision', 'article',
                    'info', 'logs', 'index', 'users', 'user', 'error', 'errors',];
    foreach ($forbidWords as $word) {
            if ($str === $word) {
                return false;
            }
        return true;
    }
}

