<?php
    // контроллер "удаления" (по факту архивация) статей, делающий статью недоступной для всех, кто ниже уровня модератора
    makesVisitLog();

    if (false === checkYourPrivileges($user, USER_LVL)) {
        header('Location: ' . ROOT_URL . 'error/403'); exit();
    }
    else {
        $params['art_id'] = (int) val(URL_PARAMS['art_id'] ?? 0);
        $isArticle = checkArticleExist($params);

        if($isArticle['user_id'] === $user['user_id'] or checkYourPrivileges($user, MODER_LVL)) {
            if ($isArticle['exist'] === '1') {
                archiveArticle($params);
                $title = "Article deleted!";
                $content = template('articles/delete.view.php');
            }
            else {
                header('Location: ' . ROOT_URL . 'error/404'); exit();
            }
        }
        else {
            header('Location: ' . ROOT_URL . 'error/403'); exit();
        }
    }


    // makesVisitLog();

    // $isModer = checkYourPrivilegie($user, MODER_LVL);
    // $isUser = checkYourPrivilegie($user, USER_LVL);

    // if($isUser) {

    // } else {

    // }

    // if (false === checkYourPrivilegie($user, MODER_LVL) ) {
    //     header('Location: ' . ROOT_URL . 'error/403'); exit();
    // }
    // else {
    //     $article['art_id'] = (int) val( URL_PARAMS['art_id'] ?? 0 );
    //     if (publishArticle($article)) {
    //         header('Location: ' . ROOT_URL . 'article/moderation');
    //     }
    //     else {
    //         header('Location: ' . ROOT_URL . 'error/423');

    //     }
    // }
