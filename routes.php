<?php
// $path = "controllers/$control.cntrl.php";
return
(function()
    {
        $normID = '[1-9]+\d*';
        $normUrl = '[0-9a-zA-Z_-]+';
        $normDate = '\d{4}-\d{2}-\d{2}';
        return
        [
            // роутер главной страницы
            [
                'test' => "/^\/?$/",
                'controller' => 'index'
            ],
            // роут для отладочной информации
            [
                'test' =>'/^\/?info\/?$/',
                'controller' => 'info',
            ],
            // роуты для работы с логами
            [
                // 'test' => "/^\/?logs\/?$/",
                'test' => "/^\/?test\/?$/",
                'controller' => 'logs/auth',
            ],
            [
                // 'test' => "/^\/?logs\/($normDate)\/?$/",
                'test' => "/^\/?test\/($normDate)\/?$/",
                'controller' => 'logs/auth',
                'params' => ['date' => 1],
            ],
            // роутеры для работы со статьями
            [
                'test' => "/^\/?article\/add\/?$/",
                'controller' => 'articles/add'
            ],
            [
                'test' => "/^\/?article\/($normID)\/?$/",
                'controller' => 'articles/article',
                'params' => ['art_id' => 1]
            ],
            [
                'test' => "/^\/?article\/edit\/($normID)\/?$/",
                'controller' => 'articles/edit',
                'params' => ['art_id' => 1]
            ],
            [
                'test' => "/^\/?article\/delete\/($normID)\/?$/",
                'controller' => 'articles/delete',
                'params' => ['art_id' => 1]
            ],
            // роутеры для работы с категориями
            [
                'test' => "/^\/?category\/($normUrl)\/?$/",
                'controller' => 'categories/category',
                'params' => ['url' => 1]
            ],
            [
                'test' => "/^\/?categories\/revision\/?$/",
                'controller' => 'categories/revision',
            ],
            [
                'test' => "/^\/?categories\/add\/($normUrl)\/?$/",
                'controller' => 'categories/add',
                'params' => ['url' => 1]
            ],
            [
                'test' => "/^\/?categories\/delete\/($normUrl)\/?$/",
                'controller' => 'categories/delete',
                'params' => ['url' => 1]
            ],
            [
                'test' => "/^\/?categories\/edit\/($normUrl)\/?$/",
                'controller' => 'categories/edit',
                'params' => ['url' => 1]
            ],
            // роуты для работы с пользователями
            [
                'test' => "/^\/?registr\/?$/",
                'controller' => 'users/registr',
            ],
            [
                'test' => "/^\/?login\/?$/",
                'controller' => 'users/login',
            ],
            [
                'test' => "/^\/?logout\/?$/",
                'controller' => 'users/logout',
            ],
                // администрирование пользователей
            [
                'test' => "/^\/?users\/?$/",
                'controller' => 'users/admin',
            ],
            [
                'test' => "/^\/?users\/regain\/($normID)\/?$/",
                'controller' => 'users/regain',
                'params' => ['user_id' => 1]
            ],
            [
                'test' => "/^\/?users\/moder\/($normID)\/?$/",
                'controller' => 'users/moder',
                'params' => ['user_id' => 1]
            ],
            [
                'test' => "/^\/?users\/expel\/($normID)\/?$/",
                'controller' => 'users/expel',
                'params' => ['user_id' => 1]
            ],

            // роуты ошибок
            // [
            //     'test' => "/^\/?error($normID)\/?$/",
            //     'controller' => "errors/($normID)",
            //     'params' => ['err' => 1]
            // ],
        ];
    }
)();
