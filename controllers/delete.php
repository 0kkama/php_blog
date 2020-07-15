<?php
    // include_once ('utility/config.util.php');
    // include_once('hub.php');

    makesVisitLog ();

    $params['art_id'] = (int) val($_GET['id'] ?? 0);
    $isArticle = checkArticleExist($params);

if ($isArticle['exist']):
    removeArticle($params);
    include('view/delete.view.php');
else:
    header('HTTP/1.1 404 Not Found');
    include('view/errors/error404.view.php');
endif;
?>
