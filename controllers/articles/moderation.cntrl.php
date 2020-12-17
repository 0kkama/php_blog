<?php
    // контроллер модерации статей
    makesVisitLog();

    if (false === checkYourPrivileges($user, MODER_LVL) ) {
        header('Location: ' . ROOT_URL . 'error/403'); exit();
    }

    $query = $_GET['q'] ?? '';

    switch ($query) {
        case '': $articlesList = getAllArticles(); break;
        case 'mod': $articlesList = getArticlesByStat('0'); break;
        case 'pub': $articlesList = getArticlesByStat('1'); break;
        case 'arh': $articlesList = getArticlesByStat('2'); break;
        default: header('Location: ' . ROOT_URL . 'error/404'); exit();
    }

    $_SESSION['listType'] = $query;
    $title = 'Модерация';
    $content = template('articles/moderation.view.php', [
        'articles' => $articlesList,
        ]);
