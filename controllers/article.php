<?php
    // declare(strict_types=1);
    // include_once ('utility/config.util.php');
    // include_once('hub.php');

    makesVisitLog();
    if (!checkID($_GET['id'])): // проверка верности передаваемого ID
        header('HTTP/1.1 404 Not Found');
        include('view/errors/error404.view.php');
        exit();
    else:
        $params['art_id'] = (int) val(($_GET['id'] ?? ''));
        $article = getOneArticle($params) ?? [];

            if((bool) $article) {
        include('view/article.view.php');
        }   else { // если статья не найдена
        header('HTTP/1.1 404 Not Found');
        include('view/errors/error404.view.php');
        exit();
    }
    endif;
