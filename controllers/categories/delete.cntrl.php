<?php
    makesVisitLog();

    if(empty($user) || $user['status'] !== 'admin') {
        header('Location: ' . ROOT_URL);
        exit();
    }

    $errors = '';
    $category['url'] = URL_PARAMS['url'];
    $existence = getOneCategory($category);
    $quantity = isCategoryEmpty($category);


// если категория не существует
    if([] === $existence) {
        ifErr404();
    }   // если категория не пуста
    else if ('0' !== $quantity) {
        $title = 'Ошибка!';
        $content = 'Нельзя удалить категорию, если в ней есть статьи!';
        // header('Location: /revision');
    } // если категорию можно удалить
    else {
        removeCategory($category);
        header('Location: ' . ROOT_URL . 'categories/revision');
    }


