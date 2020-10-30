<?php
// фуя шаблонизатор
function template (string $path, array $variables = []) : string {
    $supaDupaFullPathToTemplate = "views/$path";
    extract($variables);
    ob_start();
    include($supaDupaFullPathToTemplate);
    return ob_get_clean();
}

    // фуя разбивает url строку по '/', удаляет пустые значения и возвращает массив с параметрами
function parseURL (string $querysystemurl) : array {
    $urichunks = explode('/', $querysystemurl);
    foreach ($urichunks as $key => $value) {
        if('' === $value) {
            unset($urichunks[$key]);
        }
    }
    return $urichunks;
}
