<?php
    // контроллер просмотра конкретной статьи
    makesVisitLog();

    $params['art_id'] = (int) val(URL_PARAMS['art_id'] ?? '');
    $article = getAnyArticle($params);

    // если такой статьи не найдено, то перенаправляем на ошибку
    if ([] === $article) {
        header('Location: ' . ROOT_URL . 'error/418');
        exit();
    }
    // если статья найдена, то создаём переменные, регулирующие права доступа
    $isUser = !empty($user);
    $articleStatus = $article['moderation'];

    $article['baseRights'] = false;
    $article['moderRights'] = false;
    $isModer = false;
    $isAuthor = false;
    $showThisArt = false;

// если пользователь авторизован, проверяем его права доступа
    if ($isUser === true) {
        $isModer = checkYourPrivileges($user, MODER_LVL);
        $isAuthor = ($user['user_id'] === $article['user_id']);
    }
    // если статья находится на модерации
    if ($articleStatus === '0') {
        if ($isAuthor) {
            $article['baseRights'] = true;
            $showThisArt = true;
        }
        if ($isModer) {
            $article['baseRights'] = true;
            $article['moderRights'] = true;
            $showThisArt = true;
        }
    }
    elseif ($articleStatus === '2' and $isModer) {
        // если статья архивирована и запрашивается модератором
        $article['baseRights'] = true;
        $article['moderRights'] = true;
        $showThisArt = true;
    }
    elseif($articleStatus === '1') {
        // если статья опубликована
        if ($isModer) {
            $article['baseRights'] = true;
            $article['moderRights'] = true;
            $showThisArt = true;
        }
        else {
            // остальные могут только просматривать
            $showThisArt = true;
        }
    }

    // выводим статью, либо перенаправаляем на ошибку
    if ($showThisArt) {
        $title = $article['title'];
        $content = template('articles/article.view.php', $article);
    }
    else {
        header('Location: ' . ROOT_URL . 'error/423');
        exit();
    }

