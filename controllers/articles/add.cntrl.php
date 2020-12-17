<?php
    // контроллер добавления статьи
    makesVisitLog();

    if (false === checkYourPrivileges($user, USER_LVL)) {
        $_SESSION['attentio'] = true;
        header('Location: ' . ROOT_URL . 'login'); exit();
    }

	$sendStatus = false;
    $categories = getCategoriesList();
    $title = 'Add new article';
    $article = [];
    $errMsg = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'):
        $article = extractFields(['cat_id','title','content'], $_POST);
        $article['author'] = $user['login'];
        $article['user_id'] = $user['user_id'];
        $errMsg = checkArticleParams($article, $categories);
        // если все поля заполнены (сообщение ошибок - пустая строка), то добавляем статью
        if ('' === $errMsg) {
            $sendStatus = addArticle($article);
            $_SESSION['articleAdded'] = true;
            header('Location: ' . ROOT_URL); exit();
        }
    endif;

    $content = template('articles/add.view.php', [
        'categories' => $categories,
        'article' => $article,
        'errMsg' => $errMsg,
        'sendStatus' => $sendStatus,
        ]);

