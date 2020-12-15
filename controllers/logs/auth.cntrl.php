<?php

    if(false === checkYourPrivileges($user, ADMIN_LVL)) {
        header('Location: ' . ROOT_URL . 'error/403'); exit();
    }
    else {
        $params['date'] = val(URL_PARAMS['date'] ?? '');
        $title = 'Логи';
        if(empty($params['date'])) {
            $content = showLogsList();
        }
        else {
            $content = showLogContent($params['date']);
        }
    }
