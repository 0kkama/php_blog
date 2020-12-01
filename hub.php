<?php
// base SETTINGS
    declare(strict_types=1);
    setlocale(LC_ALL, "ru_RU.UTF-8");
    date_default_timezone_set('Europe/Moscow');
    error_reporting(E_ALL);

// base CONSTANTS
    const ROOT_URL = '/';
    const DB_HOST = 'localhost';
    const DB_NAME = 'lavr_hw';
    const DB_USER = 'admin';
    const DB_PASS = '14133788';
    const DB_CHAR = 'utf8';

// include DEBUGGER
    include_once ('utility/debug.util.php');
    set_error_handler('err_catcher');

// include CORE UTILITES
    include_once ('utility/db.util.php');
    include_once ('utility/validat.util.php');
    include_once ('utility/arr.util.php');
    include_once ('utility/system.util.php');
    include_once ('utility/logs.util.php');
    include_once ('utility/str.util.php');
    include_once ('utility/time.util.php');
    include_once ('utility/auth.util.php');
    include_once ('utility/err.util.php');


// include MODEL
    include_once ('model/art.mod.php');
    include_once ('model/users.mod.php');
    include_once ('model/category.mod.php');

