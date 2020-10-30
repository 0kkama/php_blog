<?php

    makesVisitLog();
    // $articles = getArticlesList();

    $title = 'Main page';
    $content = template('index.view.php', ['articles' => getArticlesList()]);
