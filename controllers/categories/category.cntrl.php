 <?php
    makesVisitLog();
    // var_dump(URL_PARAMS);
    // проверка верности передаваемого ID
    if (false === checkURL(URL_PARAMS['url'])) {
        ifErr404();
    }

    $category['url'] = (string) val(URL_PARAMS['url']);
    $isExist = getOneCategory($category);
    // var_dump($isExist);
    // проверка существования указанной категории
    if ([] === $isExist) {
        // include_once('controllers/errors/404.cntrl.php');
        ifErr404();
    }
    else {

        $articles = getArticlesInCategory($category);
        // var_dump($articles);
        // если в категории нет статей
        if ([] === $articles and [] !== $isExist) {
                $title = $isExist['cat_name'];
                $content = "Категория пуста";
                // и только если всё в порядке, то создаём страницу
        }
        else {
                // $title = $articles[0]['cat_name'];
                $title = $isExist['cat_name'];
                $content = template('category.view.php', ['articles' => $articles]);
        }
    }
