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
function parseURL (string $url, array $routes) : array {
    $resources = ['controller' => 'errors/404', 'params' => []];

        foreach($routes as $route){
            $matches = []; // массив для сохранения параметров
            // поиск подходящего контроллера через вхождение регулярки test в $url
            if(preg_match($route['test'], $url, $matches)){
                $resources['controller'] = $route['controller'];
                // если в массиве есть параметры, то помещаем их в $matches
                if(isset($route['params'])){
                    foreach($route['params'] as $name => $num){
                        $resources['params'][$name] = $matches[$num];
                    }
                }
                break;
            }
        }
        return $resources;
}

// function parseURL (string $querysystemurl) : array {
    // $urichunks = explode('/', $querysystemurl);
    // foreach ($urichunks as $key => $value) {
    //     if('' === $value) {
    //         unset($urichunks[$key]);
    //     }
    // }
    // return $urichunks;
    // }
