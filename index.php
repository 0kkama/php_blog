<?php
    include_once ('utility/config.util.php');
    include_once('hub.php');

    $control = $_GET['point'] ?? 'index';
    $path = "controllers/$control.cntrl.php";

    if ( file_exists($path) && preg_match('/[a-z]{3,20}/', $control) ):
        // подключение контроллера, формирующего переменные и создающего контентную часть
        include_once($path);
    else:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        echo template('errors/error404.view.php');
        // include('view/errors/error404.view.php');
    endif;

    $categories = getCategoriesList();
    // подключение лэйаута
    echo template('layout.view.php', ['title' => $title, 'content' => $content, 'categories' =>  $categories]);
