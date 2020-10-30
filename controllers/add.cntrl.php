<?php

    makesVisitLog();
	$sendStatus = false;
    $categories = getCategoriesList();
    $authors = getAuthorsList();
    $title = 'Add new article';
    $article = [];
    $errMsg = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'):
        $article = extractFields(['user_id','cat_id','title','content'], $_POST);
        var_dump($article);
        $article['author'] = getUserLogin($_POST['user_id']);
        $errMsg = checkParams($article);
        // если все поля заполнены (сообщение ошибок - пустая строка), то добавляем статью
        if ('' === $errMsg) {
           $sendStatus = addArticle($article);
        }
    endif;

    $content = template('add.view.php', [
        'categories' => $categories,
        'authors' => $authors,
        'article' => $article,
        'errMsg' => $errMsg,
        'sendStatus' => $sendStatus,
        ]);

    // echo 'POST:'; var_dump_pre($_POST); echo 'article:'; var_dump_pre($article ?? []);

