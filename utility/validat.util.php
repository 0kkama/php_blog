<?php
    include_once ('utility/config.util.php');

// короткоименная фуя для простой обработки данных, вводимых пользователем.
function val (string $inputStr, int $key = 1) : string {
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

// вызывает ошибку 404 , прерывает выполнение кода
function ifErr404() : void {
    // фигурные скобки нужны, для экранирования переменной в строке.
    header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
    echo template('errors/error404.view.php');
    exit();
}
