<?php

    include_once ('utility/config.util.php');
    include_once('hub.php');
    // по работе ЧПУ - см. location в lavr.conf
    $requestURI = $_SERVER['REQUEST_URI'];
    // var_dump($requestURI);
    $title = 'Base';
    $content = 'Base';
    if (checkRequestURI($requestURI)):
        ifErr404();
    else:
        $routes = include('routes.php');
        $variable = parseURL($requestURI, $routes);
        // var_dump($variable);
        define('URL_PARAMS', $variable['params']);
        $control = $variable['controller'];
        $path = "controllers/$control.cntrl.php";
    if (!file_exists($path)) {
        ifErr404();
    } else {
        include_once($path);
    }
    endif;

    // var_dump(checkCatRepeats(['cat_name' => 'Политика', 'url' => 'grdrr']));
    var_dump_pre(checkCategory(['url' => 'kyziaka', 'cat_name' => 'Кузяка']));
    // var_dump_pre(getOneCategory(['url' => 'minecraft']));
    // var_dump_pre(isCategoryEmpty(['url' => 'minecraft']));
    // проверка существования контроллера
    // подключение контроллера, формирующего переменные и контентную часть
    // подключение лэйаута
    // echo $_SERVER['HTTP_REFERER'];
    echo template('layout.view.php',
        [
            'title' => $title,
            'content' => $content,
            'categories' =>  getCategoriesList(),
        ]);










// фиолет #6868B1
    // фиалки #CCCCFF
// темнофиолет #4F5B93
    // чутьменеетемнофиолет #7570C7
// темнозелень #677F87
    // желтый для ссылок #e1cc5a
// Sdfsf4
//  dsfsadferoi9034

