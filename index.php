<?php
    include_once ('utility/config.util.php');
    include_once('hub.php');

    $control = $_GET['point'] ?? 'index';
    $path = "controllers/$control.php";

    if ( file_exists($path) && preg_match('/^controllers\/[a-z]{3,20}\.php$/', $path) ):
        include_once($path);
    else:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        include('view/errors/error404.view.php');
    endif;

