<?php

    // вызывает ошибку отсутствия документа
    function ifErr404() : void {
        include_once('controllers/errors/404.cntrl.php');
    // header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
    // $GLOBALS['title'] = 'Error 404';
    // $GLOBALS['content'] = template('errors/404.view.php');
    }

    // вызывает ошибку запрета доступа
    function ifErr403() : void {
        include_once('controllers/errors/403.cntrl.php');
    }
