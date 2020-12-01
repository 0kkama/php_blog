<?php
    // контроллер добавления статьи
    makesVisitLog();

    if(empty($user)) {
        $_SESSION['attentio'] = true;
        header('Location: ' . ROOT_URL . 'login');
        exit();
    }
    // var_dump($user);
	$sendStatus = false;
    $categories = getCategoriesList();
    // $authors = getAuthorsList();
    $title = 'Add new article';
    $article = [];
    $errMsg = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'):
        // $article = extractFields(['user_id','cat_id','title','content'], $_POST);
        $article = extractFields(['cat_id','title','content'], $_POST);
        // $article['author'] = getUserLogin($_POST['user_id']);
        $article['author'] = $user['login'];
        $article['user_id'] = $user['user_id'];
        $errMsg = checkParams($article);
        // если все поля заполнены (сообщение ошибок - пустая строка), то добавляем статью
        if ('' === $errMsg) {
            $sendStatus = addArticle($article);
            $_SESSION['articleAdded'] = true;
            header('Location: ' . ROOT_URL);
            exit();
        }
    endif;

    $content = template('articles/add.view.php', [
        'categories' => $categories,
        // 'authors' => $authors,
        'article' => $article,
        'errMsg' => $errMsg,
        'sendStatus' => $sendStatus,
        ]);


