<?php

    if(false === checkYourPrivilegie($user, ADMIN_LVL)) {
        ifErr403();
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
