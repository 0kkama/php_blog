<?php
    // контроллер удаления категории
    makesVisitLog();

    if(false === checkYourPrivileges($user, ADMIN_LVL)) {
        header('Location: ' . ROOT_URL);
        exit();
    }

    $errors = '';
    $category['url'] = URL_PARAMS['url'];
    $existence = getOneCategory($category);
    $quantity = isCategoryEmpty($category);


// если категория не существует
    if([] === $existence) {
        header('Location: ' . ROOT_URL . 'error/404'); exit();
    }   // если категория не пуста
    else if ('0' !== $quantity) {
        $title = 'Ошибка!';
        $content = 'Нельзя удалить категорию, если в ней есть статьи!';
        // header('Location: /revision');
    } // если категорию можно удалить
    else {
        removeCategory($category);
        header('Location: ' . ROOT_URL . 'categories/revision');
        exit();
    }


