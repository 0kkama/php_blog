<?php
    include_once ('utility/config.util.php');
    include_once('hub.php');

    $querysystemurl = $_GET['querysystemurl'] ?? 'index';
    define('URL_PARAMS', parseURL($querysystemurl));
    // $urichunks = parseURL($querysystemurl);

function parseURL (string $querysystemurl) : array {
    $urichunks = explode('/', $querysystemurl);
    foreach ($urichunks as $key => $value) {
        if('' === $value) {
            unset($urichunks[$key]);
        }
    }
    return $urichunks;
}

    $control = URL_PARAMS[1] ?? 'index';
    $path = "controllers/$control.cntrl.php";

    if ( file_exists($path) && preg_match('/[a-z]{3,20}/', $control) ):
        // подключение контроллера, формирующего переменные и создающего контентную часть
        include_once($path);
    else:
         ifErr404();
    endif;

    $categories = getCategoriesList();
    // подключение лэйаута
    echo template('layout.view.php', ['title' => $title, 'content' => $content, 'categories' =>  $categories]);

    // var_dump_pre($_GET);
