<?php
    // контроллер банящий пользователя и удаляющий его сессии из БД
    makesVisitLog();

    if(false === checkYourPrivileges($user, ADMIN_LVL)) {
        // header('Location: ' . ROOT_URL . 'error/403'); exit();
        $_SESSION['attentio'] = true;
        header('Location: ' . ROOT_URL . 'login');
        exit();
    }
    else {
        $userObj['user_id'] = URL_PARAMS['user_id'];
        expelUser($userObj['user_id']);
        header('Location: ' . ROOT_URL . 'users');
        exit();
    }



