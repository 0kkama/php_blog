<?php
    // контроллер архивирующий статью
    makesVisitLog();

    if (false === checkYourPrivileges($user, MODER_LVL) ) {
        header('Location: ' . ROOT_URL . 'error/403'); exit();
    }

    $queryParam = $_SESSION['listType'] ?? '';
    if (!empty($queryParam)) {
        $queryParam = '?q=' . $queryParam;
    }

    $article['art_id'] = (int) val( URL_PARAMS['art_id'] ?? 0 );
    if (archiveArticle($article)) {
        header('Location: ' . ROOT_URL . 'article/moderation' . $queryParam);
        exit();
    }
    else {
        header('Location: ' . ROOT_URL . 'error/423');
        exit();
    }


