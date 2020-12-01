<?php

    header("{$_SERVER['SERVER_PROTOCOL']} 403 Forbidden");
    $GLOBALS['title'] = 'Error 403';
    $GLOBALS['content'] = template('errors/403.view.php');
