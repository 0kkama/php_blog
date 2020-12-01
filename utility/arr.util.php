<?php
// извлекает значения из массива target в массив result по ключам, указанным в массиве fields
// если ключ не установлен (null), то ему назначается пустая строка для избежания ошибки
function extractFields(array $fields, array $target) : array {
    $result = [];
    foreach ($fields as $field) {
        if (empty($target[$field])) {
            $result[$field] = '';
        }
        else {
            $result[$field] = val($target[$field], 2);
        }
    }
    return $result;
}

// преобразует элементы массив с ошбиками в одну строку с переносами
// function errorArrToString
