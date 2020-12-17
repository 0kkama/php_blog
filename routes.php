<?php

return
(function()
    {
        $normID = '[1-9]+\d*';
        $normUrl = '[0-9a-zA-Z_-]+';
        $normDate = '\d{4}-\d{2}-\d{2}';
        $mdrQry = '\?q\=(\w{3})';
        return
        [
            //<editor-fold desc="РОУТ ГЛАВНОЙ СТРАНИЦЫ">
            [
                'test' => "/^\/?$/",
                'controller' => 'index'
            ],
            //</editor-fold>
            //<editor-fold desc="РОУТ ПОЛУЧЕНИЯ ОТЛАДОЧНОЙ ИНФОРМАЦИИ">
            [
                'test' =>'/^\/?info\/?$/',
                'controller' => 'info',
            ],
            // роут получения списка логов
            [
                'test' => "/^\/?test\/?$/",
                'controller' => 'logs/auth',
            ],
            // роут получения конкретного лога по дате
            [
                'test' => "/^\/?test\/($normDate)\/?$/",
                'controller' => 'logs/auth',
                'params' => ['date' => 1],
            ],
            //</editor-fold>
            //<editor-fold desc="РОУТЫ ДЛЯ РАБОТЫ СО СТАТЬЯМИ">
            // добавление статьи
            [
                'test' => "/^\/?article\/add\/?$/",
                'controller' => 'articles/add'
            ],
            // просмотр статьи
            [
                'test' => "/^\/?article\/watch\/($normID)\/?$/",
                'controller' => 'articles/article',
                'params' => ['art_id' => 1]
            ],
            // редактирование статьи
            [
                'test' => "/^\/?article\/edit\/($normID)\/?$/",
                'controller' => 'articles/edit',
                'params' => ['art_id' => 1],
            ],
            // страница управления модератора
            [
                'test' => "/^\/?article\/moderation\/?($mdrQry)?/",
                'controller' => 'articles/moderation',
//               'params' => ['mdr' => 1],
            ],
            // удаление статьи (для пользователей)
            [
                'test' => "/^\/?article\/delete\/($normID)\/?$/",
                'controller' => 'articles/delete',
                'params' => ['art_id' => 1]
            ],
            // архивация статьи (для модератора)
            [
                'test' => "/^\/?article\/archivation\/($normID)\/?$/",
                'controller' => 'articles/archivation',
                'params' => ['art_id' => 1]
            ],
            // удаление статьи из БД
            [
                'test' => "/^\/?article\/remove\/($normID)\/?$/",
                'controller' => 'articles/remove',
                'params' => ['art_id' => 1]
            ],
            // возврат статьи на модерацию
            [
                'test' => "/^\/?article\/examination\/($normID)?$/",
                'controller' => 'articles/examination',
                'params' => ['art_id' => 1]
            ],
            // публикация статьи
            [
                'test' => "/^\/?article\/publication\/($normID)\/?$/",
                'controller' => 'articles/publication',
                'params' => ['art_id' => 1]
            ],
            //</editor-fold>
            //<editor-fold desc="РОУТЫ ДЛЯ РАБОТЫ С КАТЕГОРИЯМИ">
            // роут списка статей по конкретной категории
            [
                'test' => "/^\/?category\/($normUrl)\/?$/",
                'controller' => 'categories/category',
                'params' => ['url' => 1]
            ],
            // роут страницы управления категориями
            [
                'test' => "/^\/?categories\/revision\/?$/",
                'controller' => 'categories/revision',
            ],
            // роут добавления новой категории
            [
                'test' => "/^\/?categories\/add\/($normUrl)\/?$/",
                'controller' => 'categories/add',
                'params' => ['url' => 1]
            ],
            // роут удаления категории
            [
                'test' => "/^\/?categories\/delete\/($normUrl)\/?$/",
                'controller' => 'categories/delete',
                'params' => ['url' => 1]
            ],
            // роут редактирования категории
            [
                'test' => "/^\/?categories\/edit\/($normUrl)\/?$/",
                'controller' => 'categories/edit',
                'params' => ['url' => 1]
            ],
            //</editor-fold>
            //<editor-fold desc="РОУТЫ АУТЕНТИФИКАЦИИ">
            // роуты для регистрации пользовалей
            [
                'test' => "/^\/?registr\/?$/",
                'controller' => 'users/registr',
            ],
            // роут входа на сайт
            [
                'test' => "/^\/?login\/?$/",
                'controller' => 'users/login',
            ],
            // роут выхода с сайта
            [
                'test' => "/^\/?logout\/?$/",
                'controller' => 'users/logout',
            ],
            //</editor-fold>
            //<editor-fold desc="РОУТЫ ДЛЯ УПРАВЛЕНИЯ ПОЛЬЗОВАТЕЛЯМИ">
            // личный кабинет пользователя
            [
                'test' => "/^\/?users\/account\/?$/",
                'controller' => 'users/account',
            ],
            // роут для страницы управления пользователями
            [
                'test' => "/^\/?users\/?$/",
                'controller' => 'users/administration',
            ],
            // роут назначения прав доступа уровня "юзер"
            [
                'test' => "/^\/?users\/regain\/($normID)\/?$/",
                'controller' => 'users/regain',
                'params' => ['user_id' => 1]
            ],
            // роут назначения прав доступа уровня "модератор"
            [
                'test' => "/^\/?users\/moderator\/($normID)\/?$/",
                'controller' => 'users/moderator',
                'params' => ['user_id' => 1]
            ],
            // роут для бана пользователя
            [
                'test' => "/^\/?users\/expel\/($normID)\/?$/",
                'controller' => 'users/expel',
                'params' => ['user_id' => 1]
            ],
            //</editor-fold>
            //<editor-fold desc="РОУТЫ ОШИБОК">
            // 403 forbidden
            [
                'test' => "/^\/?error\/403\/?$/",
                'controller' => 'errors/403',
            ],
            // 404 Page not found
            [
                'test' => "/^\/?error\/404\/?$/",
                'controller' => 'errors/404',
            ],
            // 418 I'm a teapot
            [
                'test' => "/^\/?error\/418\/?$/",
                'controller' => 'errors/418',
            ],
            // 423 Locked
            [
                'test' => "/^\/?error\/423\/?$/",
                'controller' => 'errors/423',
            ],
            //</editor-fold>
        ];
    }
)();
