<?php
    makesVisitLog();

    if (false === checkYourPrivilegie($user, USER_LVL)) {
        // $_SESSION['attentio'] = true;
        ifErr403();
        // header('Location: ' . ROOT_URL);
        // exit();
    }
    else {

        $params['art_id'] = (int) val(URL_PARAMS['art_id'] ?? 0);
        $isArticle = checkArticleExist($params);
        // var_dump($params);
        // var_dump($isArticle);

        if($isArticle['user_id'] === $user['user_id'] or checkYourPrivilegie($user, ADMIN_LVL)) {
            if ($isArticle['exist'] === '1') {
                removeArticle($params);

                $title = "Article deleted!";
                $content = template('articles/delete.view.php');
                // header('Location: /');
                // exit();
            }
            else {
                ifErr404();
            }
        }
        else {
            ifErr403();
        }
    }
