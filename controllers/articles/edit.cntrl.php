<?php

    makesVisitLog();
    $editStatus = false;
    $errMsg = '';
    $categories = getCategoriesList();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $article['art_id'] = (int) val( URL_PARAMS['art_id'] ?? 0 );
        $article = getOneArticle($article);
        // при попытке отредактировать несуществующую статью
        if(!(bool) $article) {
            ifErr404();
        }
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article = extractFields(['title', 'content', 'cat_id'], $_POST);
            $article['art_id'] = (int) val( $_POST['id']);
            $errMsg = checkParams($article);
            // var_dump_pre($_POST); var_dump_pre($article ?? []); echo '------------ 13';
        if ('' === $errMsg) {
            $editStatus = editArticle($article);
        }
    }
    else {
        ifErr404();
    }

    $title = 'Edit: ' . $article['title'];
    $content = template('articles/edit.view.php',[
        'article' => $article,
        'categories' => $categories,
        'editStatus' => $editStatus,
        'errMsg' => $errMsg,
        ]);

