<?php

    makesVisitLog();
    // var_dump($_GET); var_dump($urichunks);
    var_dump(URL_PARAMS);

    if (!checkID(URL_PARAMS[2] ?? '')): // проверка верности передаваемого ID
        ifErr404();
    else:
        $params['art_id'] = (int) val(URL_PARAMS[2] ?? '');
        $article = getOneArticle($params);
            if((bool) $article) {
                $title = $article['title'];
                $content = template('article.view.php', $article);
            }
            else { // если статья не найдена
             ifErr404();
            }
    endif;
