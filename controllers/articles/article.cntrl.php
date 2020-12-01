<?php

    makesVisitLog();

        $params['art_id'] = (int) val(URL_PARAMS['art_id'] ?? '');
        $article = getOneArticle($params);
        // var_dump($article);

            if([] !== $article) {
                $article['manipulation'] = false; // переменная для меню удаления и редактирования статьи
                if (!empty($user)) {
                    if ($article['user_id'] === $user['user_id'] or $user['status'] === 'admin') {
                        $article['manipulation'] = true;
                    }
                }
                $title = $article['title'];
                $content = template('articles/article.view.php', $article);
            }
            else { // если статья не найдена
             ifErr404();
            }

