<?php
// $path = "controllers/$control.cntrl.php";
return
(function()
    {
        $normID = '[1-9]+\d*';
        $normUrl = '[0-9a-zA-Z_-]+';

        return
        [
            // роутер главной страницы
            [
                'test' => "/^\/?$/",
                'controller' => "index"
            ],
            [
                'test' =>'/^\/?info\/?$/',
                'controller' => 'info',
            ],
            // роутеры для работы со статьями
            [
                'test' => "/^\/?article\/add\/?$/",
                'controller' => "articles/add"
            ],
            [
                'test' => "/^\/?article\/($normID)\/?$/",
                'controller' => "articles/article",
                'params' => ['art_id' => 1]
            ],
            [
                'test' => "/^\/?article\/edit\/($normID)\/?$/",
                'controller' => "articles/edit",
                'params' => ['art_id' => 1]
            ],
            [
                'test' => "/^\/?article\/delete\/($normID)\/?$/",
                'controller' => "articles/delete",
                'params' => ['art_id' => 1]
            ],
            // роутеры для работы с категориями
            [
                'test' => "/^\/?category\/($normUrl)\/?$/",
                'controller' => "categories/category",
                'params' => ['url' => 1]
            ],
            [
                'test' => "/^\/?categories\/revision\/?$/",
                'controller' => "categories/revision",
            ],
            [
                'test' => "/^\/?categories\/add\/($normUrl)\/?$/",
                'controller' => "categories/add",
                'params' => ['url' => 1]
            ],
            [
                'test' => "/^\/?categories\/delete\/($normUrl)\/?$/",
                'controller' => "categories/delete",
                'params' => ['url' => 1]
            ],
            [
                'test' => "/^\/?categories\/edit\/($normUrl)\/?$/",
                'controller' => "categories/edit",
                'params' => ['url' => 1]
            ],
            // роуты для работы с пользователями
            [
                'test' => "/^\/?registr\/?$/",
                'controller' => "users/registr",
            ],
            [
                'test' => "/^\/?login\/?$/",
                'controller' => "users/login",
            ],
            [
                'test' => "/^\/?logout\/?$/",
                'controller' => "users/logout",
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
