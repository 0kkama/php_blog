<?php
    include_once ('utility/config.util.php');
    include_once('hub.php');

    // работа с ЧПУ - см. location в lavr.conf
    $querysystemurl = $_GET['querysystemurl'] ?? 'index';
    define('URL_PARAMS', parseURL($querysystemurl));
    // $urichunks = parseURL($querysystemurl);

    $control = URL_PARAMS[1] ?? 'index';
    $path = "controllers/$control.cntrl.php";

    // проверка существования контроллера и корректности его имени
    if ( file_exists($path) && preg_match('/[a-z]{3,20}/', $control) ):
        // подключение контроллера, формирующего переменные и создающего контентную часть или вызов ошибки
        include_once($path);
    else:
         ifErr404();
    endif;

    $categories = getCategoriesList();
    // подключение лэйаута
    echo template('layout.view.php', ['title' => $title, 'content' => $content, 'categories' =>  $categories]);

    // var_dump_pre($_GET);

// фиолет #6868B1
    // фиалки #CCCCFF
// темнофиолет #4F5B93
// чутьменеетемнофиолет #7570C7
// темнозелень #677F87
    // желтый для ссылок #e1cc5a
