<?php
    makesVisitLog();

    $editStatus = false;
    $errMsg = '';

    // $category['url'] = URL_PARAMS['url'];
    // $categoryData = getOneCategory(URL_PARAMS);

        $category = getOneCategory(URL_PARAMS);

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // выводим данные в формах



    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // проверки проверки проверки
        // если всё норм, то
            // editCategory($newCategoryParams);
            // header('Location: /revision');

    }
    else {
        ifErr404();
    }

    $title = 'Изменить: ' . $category['cat_name'];
    $content = template('categories/edit.view.php' , [
            'title' => $title,
            'contetn' => $content,
            'category' => $category,
            'errMsg' => $errMsg,

        ]);
// при заходе на странице должна отрисовываться форма
// содержащая название и урл категории

// при отправке новых данных делаем все необходимые проверки
// как сделать проверку, что бы при изменении только УРЛА или названия
// не возникало конфликта имён

    // нужно получить ИД категории, которое является уникальным
    // и по нему отсечь ту категорию, которую мы в данный момент редактируем
