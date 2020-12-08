<?php
    include_once('hub.php');

    // /var/lib/php/sessions
    session_start();
    // проверка авторизации пользователя
    $user = getUserAuthByToken(); // var_dump($user);
    // по работе ЧПУ - см. location в lavr.conf
    $requestURI = $_SERVER['REQUEST_URI'];
    $title = 'Something going wrong';
    $content = 'Something going wrong';

    if (checkRequestURI($requestURI)):
        ifErr404();
    else:
        $routes = include('routes.php');
        $variable = parseURL($requestURI, $routes);
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

    if (isset($_SESSION['articleAdded'])) {
        $articleAdded = true;
        unset($_SESSION['articleAdded']);
    }
    else {
        $articleAdded = false;
    }

    $categories = getCategoriesList();
    // подключение лэйаута
    echo template('layout.view.php',
        [
            'title' => $title,
            'content' => $content,
            'categories' =>  $categories,
            'articleAdded' => $articleAdded,
            'user' => $user,
        ]);


