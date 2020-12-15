<?php
    // контроллер редактирования статьи
    makesVisitLog();

    if (false === checkYourPrivileges($user, USER_LVL)) {
        $_SESSION['attentio'] = true;
        header('Location: ' . ROOT_URL . 'login');
        exit();
    }
    else {

        $editStatus = false;
        $switcher = true; // переключатель, определяющий вызов 404 ошибки или отрисовку шаблона страницы
        $errMsg = '';
        $categories = getCategoriesList();
        $isModer = checkYourPrivileges($user, MODER_LVL);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $article['art_id'] = (int) val( URL_PARAMS['art_id'] ?? 0 );
            $article = getAnyArticle($article);
            if([] === $article) {
                header('Location: ' . ROOT_URL . 'error/404'); exit();
            }

            $isAuthor = ($user['user_id'] === $article['user_id']);
            // при попытке отредактировать несуществующую статью
            if([] === $article) {
                $switcher = false;
            } // если пользователь не админ/модер или это не его статья, то редакт запрещён
            else if(!$isAuthor and !$isModer) {
                $switcher = false;
                header('Location: ' . ROOT_URL . 'error/418');
                exit();
            } // если статья не на модерации и пользователь не модер, то редакт запрещён
            else if ($article['moderation'] !== '0' and !$isModer) {
                $switcher = false;
                header('Location: ' . ROOT_URL . 'error/423');
                exit();
            }
        }
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $article = extractFields(['title', 'content', 'cat_id'], $_POST);
                $article['art_id'] = (int) val( $_POST['id']);
                $errMsg = checkArticleParams($article, $categories);
                // var_dump_pre($_POST); var_dump_pre($article ?? []); echo '------------ 13';
            if ('' === $errMsg) {
                $editStatus = editArticle($article);
                header('Location: ' . ROOT_URL . 'article/watch/' . $article['art_id']);
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
            header('Location: ' . ROOT_URL . 'error/404'); exit();
        }
    }
