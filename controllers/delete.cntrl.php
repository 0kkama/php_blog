<?php
    makesVisitLog ();
    $params['art_id'] = (int) val(URL_PARAMS[2] ?? 0);
    $isArticle = checkArticleExist($params);
    $title = "Article Deleted";

if ($isArticle['exist']):
    removeArticle($params);
    $content = template('delete.view.php');
    // include('views/delete.view.php');
else:
    ifErr404();
endif;
