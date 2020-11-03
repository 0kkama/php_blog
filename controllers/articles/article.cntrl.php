<?php

    makesVisitLog();
    // var_dump($_GET); var_dump($urichunks);
    // var_dump(URL_PARAMS);

    // if (!checkID(URL_PARAMS['art_id'] ?? '')): // проверка верности передаваемого ID
    //     ifErr404();
    // else:
        $params['art_id'] = (int) val(URL_PARAMS['art_id'] ?? '');
        $article = getOneArticle($params);
        // var_dump($article);
            if([] !== $article) {
                $title = $article['title'];
                $content = template('article.view.php', $article);
            }
            else { // если статья не найдена
             // include_once('controllers/errors/404.cntrl.php');
             ifErr404();
            }
    // endif;
