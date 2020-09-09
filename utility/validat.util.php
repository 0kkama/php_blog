<?php
    include_once ('utility/config.util.php');

function val (string $inputStr, int $key = 1) : string {
    switch ($key) {
        case 1: $inputStr = trim(strip_tags($inputStr)); break;
        case 2: $inputStr = trim(htmlspecialchars($inputStr)); break;
        // case 2: $inputStr = trim($inputStr); break;
    }
    return $inputStr;
}
// проверка заполненности всех полей при создании новой статьи
function checkParams(array $params) : string {
    $errMsg = '';
    foreach ($params as $key => $value) {
        if (!$value) {
            $errMsg .= 'Fill in all the fields on the form! Missed:' . " $key" .' <br>';
            }
    }
        return $errMsg;
}

function checkID(string $ID) : bool {
    return (bool) preg_match('/^[1-9]+\d*$/', $ID);
}

function ifErr404() : void {
    header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
    echo template('errors/error404.view.php');
    exit();
}
