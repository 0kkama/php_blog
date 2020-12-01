<?php

    header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
    $GLOBALS['title'] = 'Error 404';
    $GLOBALS['content'] = template('errors/404.view.php');


