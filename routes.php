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
            // роутеры для работы со статьями
            [
                'test' => "/^\/?add\/?$/",
                'controller' => "articles/add"
            ],
            [
                'test' => "/^\/?article\/($normID)\/?$/",
                'controller' => "articles/article",
                'params' => ['art_id' => 1]
            ],
            [
                'test' => "/^\/?edit\/($normID)\/?$/",
                'controller' => "articles/edit",
                'params' => ['art_id' => 1]
            ],
            [
                'test' => "/^\/?delete\/($normID)\/?$/",
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
                'test' => "/^\/?revision\/?$/",
                'controller' => "categories/revision",
                // 'params' => ['url' => 1]

            ],
            [
                'test' => "/^\/?addcat\/($normUrl)\/?$/",
                'controller' => "categories/add",
                'params' => ['url' => 1]
            ],
            [
                'test' => "/^\/?deletecat\/($normUrl)\/?$/",
                'controller' => "categories/delete",
                'params' => ['url' => 1]
            ],
            [
                'test' => "/^\/?editcat\/($normUrl)\/?$/",
                'controller' => "categories/edit",
                'params' => ['url' => 1]
            ],
        ];
    }
)();
