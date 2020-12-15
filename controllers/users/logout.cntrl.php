<?php
    // контроллер выхода с сайта, прерывающий сессию пользователя
    makesVisitLog();

        unset($_SESSION['token']);
        setcookie('token', '', time() - 86400, ROOT_URL);
        session_destroy();
        header('Location: ' . ROOT_URL);
        exit();



//  добавить фую удаления сессий пользователя из БД
