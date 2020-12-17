<?php
//      контроллер личного кабинета пользователя
    makesVisitLog();

    if(empty($user)) {
        header('Location ' . ROOT_URL . 'errors/403'); exit();
    }

    $articles = getArticleByUserID($user['user_id']);
    $userData = $user;

    $title = 'Мой кабинет';
    $content = template('users/account.view.php',
        [
            'userData' => $user,
            'articles' => $articles,
        ]
    );



// получение данных пользователя, с возможностью из изменения
//. получения списка своих статей - опубиликованных и модерированных
//. функции:
//. получения списка статей по ИД пользователя (кроме статей со статусом 2)
//.
