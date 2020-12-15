<?php
    // контроллер модерации статей
    makesVisitLog();

    if (false === checkYourPrivileges($user, MODER_LVL) ) {
        header('Location: ' . ROOT_URL . 'error/403'); exit();
    }
    else {
        $articlesList = getAllArticles();
        $title = 'Пользователи';
        // var_dump($articlesList[0]);
        $content = template('articles/moderation.view.php', [
            'articles' => $articlesList,
            ]);
    }
