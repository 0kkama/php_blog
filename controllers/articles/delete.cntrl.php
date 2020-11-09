<?php
    makesVisitLog ();
    $params['art_id'] = (int) val(URL_PARAMS['art_id'] ?? 0);
    $isArticle = checkArticleExist($params);
    $title = "Article Deleted";

    // var_dump($isArticle);

if ($isArticle['exist'] === '1'):
    removeArticle($params);
    $content = template('articles/delete.view.php');
    // header('Location: /');
        // exit();
    // include('views/delete.view.php');
else:
    ifErr404();
endif;
