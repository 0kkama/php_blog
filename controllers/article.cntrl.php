<?php

    makesVisitLog();
    if (!checkID($_GET['id'])): // проверка верности передаваемого ID
        ifErr404();
    else:
        $params['art_id'] = (int) val(($_GET['id'] ?? ''));
        $article = getOneArticle($params) ?? [];
            if((bool) $article) {
                $title = $article['title'];
            $content = template('article.view.php', $article);
        }   else { // если статья не найдена
        ifErr404();
    }
    endif;
