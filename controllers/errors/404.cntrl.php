<?php
    header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
    // $title = 'Error 404';
    // $content = template('errors/404.view.php');
    $GLOBALS['title'] = 'Error 404';
    $GLOBALS['content'] = template('errors/404.view.php');


