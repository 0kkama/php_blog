<?php
    include_once ('utility/config.util.php');
    include_once('hub.php');
    // по работе ЧПУ - см. location в lavr.conf
    if (parseRequestURI($_SERVER['REQUEST_URI'])) {
         ifErr404();
    }


    // $querysystemurl = $_GET['querysystemurl'] ?? '';
    $querysystemurl = $_SERVER['REQUEST_URI'] ?? '';
    define('URL_PARAMS', parseURL($querysystemurl));

    echo 'SERVER: ' . $_SERVER['REQUEST_URI']; echo '<br> GET: '; var_dump($_GET);
    echo '<br> querysystemurl: '; var_dump($querysystemurl); echo '<br> URL_PARAMS: ' ; var_dump(URL_PARAMS);

    $control = URL_PARAMS[1] ?? 'index';

    if (checkURLparams(URL_PARAMS)):
        $path = "controllers/$control.cntrl.php";
    else:
        ifErr404();
    endif;


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

// фиолет #6868B1
    // фиалки #CCCCFF
// темнофиолет #4F5B93
// чутьменеетемнофиолет #7570C7
// темнозелень #677F87
    // желтый для ссылок #e1cc5a

