<?php
    // контроллер разрешающий статью к публикации
    makesVisitLog();

    if (false === checkYourPrivileges($user, MODER_LVL) ) {
        header('Location: ' . ROOT_URL . 'error/403'); exit();
    }
    else {
        $article['art_id'] = (int) val( URL_PARAMS['art_id'] ?? 0 );
        if (publishArticle($article)) {
            header('Location: ' . ROOT_URL . 'article/moderation');
            exit();
        } else {
            header('Location: ' . ROOT_URL . 'error/423');
            exit();
        }
    }
