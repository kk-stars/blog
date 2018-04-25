<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    '__alias__'   => [
        'home'  => 'index/index/index',//简写URL ： home别名    => index模块     / index控制器    / index方法
        'imgs'  => 'index/img/img',
        'mood'  => 'index/mood/mood',
        'message'  => 'index/message/message',
        'notice'  => 'index/notice/notice',
        'blogger'  => 'index/blogger/blogger',
        'search'  => 'index/index/search',
        'article'  => 'index/article/article',
        'log'  => 'index/log/log',
        're'  => 'index/re/re',
        'forget'  => 'index/log/forget',
        'artlist'  => 'index/article/artlist',
    ],

];
