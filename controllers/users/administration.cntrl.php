<?php
    // контроллер управления правами доступа пользователей
    makesVisitLog();
    // если юзер не админ, то доступ запрещён
    if(false === checkYourPrivileges($user, ADMIN_LVL)) {
        header('Location: ' . ROOT_URL . 'error/403'); exit();
    }
    else {
        $errMsg = '';
        $usersList = getUsersList();

        foreach ($usersList as &$objectUser) {
            // $var
            $objectUser['date'] = substr($objectUser['date'], 0, 10);
        }

        $title = 'Пользователи';
        $content = template('users/admin.view.php', [
            'users' => $usersList,
            'errMsg' => $errMsg,
        ]);
    }
