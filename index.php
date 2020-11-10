<?php

    include_once ('utility/config.util.php');
    include_once('hub.php');
    // по работе ЧПУ - см. location в lavr.conf
    $requestURI = $_SERVER['REQUEST_URI'];
    // var_dump($requestURI);
    $title = 'Fatal Error';
    $content = 'Fatal Error';
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
    }
    else {
        include_once($path);
    }
    endif;

    // подключение лэйаута
    echo template('layout.view.php',
        [
            'title' => $title,
            'content' => $content,
            'categories' =>  getCategoriesList(),
        ]);
