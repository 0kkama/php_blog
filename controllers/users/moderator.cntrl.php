<?php
    // контроллер дающий пользователю права доступа модератора
    makesVisitLog();

    if(false === checkYourPrivileges($user, ADMIN_LVL)) {
        // header('Location: ' . ROOT_URL . 'error/403'); exit();
        $_SESSION['attentio'] = true;
        header('Location: ' . ROOT_URL . 'login');
        exit();
    }
    else {
        $userObj['user_id'] = URL_PARAMS['user_id'];
        makeModer($userObj['user_id']);
        header('Location: ' . ROOT_URL . 'users');
        exit();
    }
