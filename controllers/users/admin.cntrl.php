<?php
    makesVisitLog();

    // если юзер не админ, то доступ запрещён
    if(false === checkYourPrivilegie($user, ADMIN_LVL)) {
        ifErr403();
    }
    else {
        $errMsg = '';
        $usersList = getUsersList();

        foreach ($usersList as &$objectUser) {
            // $var
            $objectUser['date'] = substr($objectUser['date'], 0, 10);
        }


        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     // $newCategory = extractFields(['cat_name', 'url'], $_POST);
        //     // $errMsg = validationCatParams($newCategory);

        //     if ($errMsg === '') {
        //         addCategory($newCategory);
        //         header('Location: ' . ROOT_URL . 'categories/revision');
        //     }
        // }

        $title = 'Пользователи';
        $content = template('users/admin.view.php', [
            'users' => $usersList,
            'errMsg' => $errMsg,
        ]);
    }
