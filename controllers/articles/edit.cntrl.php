<?php

    makesVisitLog();

    if(empty($user)) {
        $_SESSION['attentio'] = true;
        header('Location: ' . ROOT_URL . 'login');
        exit();
    }
    else {

        $editStatus = false;
        $switcher = true; // переключатель, определяющий вызов 404 ошибки или отрисовку шаблона страницы
        $errMsg = '';
        $categories = getCategoriesList();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $article['art_id'] = (int) val( URL_PARAMS['art_id'] ?? 0 );
            $article = getOneArticle($article);
            // при попытке отредактировать несуществующую статью
            if([] === $article) {
                $switcher = false;
            } // если пользователь не админ или это не его статья, то редакт запрещён
            if($user['user_id'] !== $article['user_id'] and $user['status'] !== 'admin') {
                $switcher = false;
                // ПОДУМОТЬ!!!
                ifErr403();
            }
        }
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $article = extractFields(['title', 'content', 'cat_id'], $_POST);
                $article['art_id'] = (int) val( $_POST['id']);
                $errMsg = checkParams($article);
                // var_dump_pre($_POST); var_dump_pre($article ?? []); echo '------------ 13';
            if ('' === $errMsg) {
                $editStatus = editArticle($article);
                header('Location: ' . ROOT_URL . 'article/' . $article['art_id']);
            }
        }
        else {
           $switcher = false;
        }

        if ($switcher) {
            $title = 'Edit: ' . $article['title'];
            $content = template('articles/edit.view.php',[
                'article' => $article,
                'categories' => $categories,
                'editStatus' => $editStatus,
                'errMsg' => $errMsg,
                ]);
        }
        else {
            ifErr404();
        }
    }
