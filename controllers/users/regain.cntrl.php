<?php
    makesVisitLog();

    if(false === checkYourPrivilegie($user, ADMIN_LVL)) {
        // ifErr403();
        $_SESSION['attentio'] = true;
        header('Location: ' . ROOT_URL . 'login');
        exit();
    }
    else {
        $userObj['user_id'] = URL_PARAMS['user_id'];
        regainUser($userObj['user_id']);
        header('Location: ' . ROOT_URL . 'users');
        exit();
    }
