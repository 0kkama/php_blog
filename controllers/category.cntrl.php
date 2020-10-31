 <?php
    makesVisitLog();
    // var_dump(URL_PARAMS);
// проверка верности передаваемого ID
    if (false === checkURL(URL_PARAMS[2])) {
        ifErr404();
    }

    $category['url'] = (string) val(URL_PARAMS[2]);
    $isExist = getOneCategory($category);
    // var_dump($isExist);
// проверка существования указанной категории
    if (!$isExist) {
        ifErr404();
    }

    $articles = getArticlesInCategory($category);
    // var_dump($articles);
// если в категории нет статей
    if (!$articles) {
            $title = $isExist['cat_name'];
            $content = "Категория пуста";
            // и только если всё в порядке, то создаём страницу
    }   else {
            $title = $articles[0]['cat_name'];
            $content = template('category.view.php', ['articles' => $articles]);
        }
