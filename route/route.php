<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 这个文件中设置路由没有代码提示，那么加上use think\facade\Route; 即可
// 引入route门面
// 这样就有代码提示了
use think\facade\Route;

// 这个return 的话，那么访问 www.xx.com/think 这个地址，就会返回 'hello,ThinkPHP5!' 字符内容；
Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

// 这里的index/index其实指的是 根/application/下的index下的controller下的index.php文件中的index类的hello方法；
Route::get('hello/:name', 'index/hello');

// 因为修改了app.php的配置为强制匹配路由，所以首页也要设置路由规则；
// 那么，这里的index/index其实指的是 根/application/下的index下的controller下的index.php文件中的index类的index方法；
Route::get('/', 'index/index');

Route::get('/a', 'index/demo/aaa');
Route::get('/b', 'index/demo/bbb')->name('abc');

Route::get('/demoaa', 'demo/demo/aa');


// =================================

//Route::group('blog', function () {
////    Route::get(':id', 'blog/read');
////    Route::post(':id', 'blog/update');
////    Route::delete(':id', 'blog/delete');
////})->ext('html')->pattern(['id' => '\d+']);

// 这里没有给最外层分组给定一个路由，而是在路由名称的地方使用 ['method'=>'get'] 也就是限定这个路由分组的请求方式是get
// 外层路由请求的方式如果是get或者post的话，那么内层路由也必须是get或者post，需要保持一致，这个别忘了；
// 当然这个中括号里可以设置很多参数，看 https://www.kancloud.cn/manual/thinkphp5_1/353965
// 那么访问的时候依然使用 www.xx.com/admin/xxx
// 路由嵌套的作用，很多时候用于写中间件，
Route::group(['method'=>'get'], function () {

    Route::group('admin', function () {
        Route::get('login', function(){
            return '用户登录';
        });
        Route::get('logout', function(){
            return '退出';
        });
        Route::get('arg/:id', function($id){
            return '参数测试'.$id;
        });
    });

})->pattern(['id' => '\d+', 'dd']);
// 这个pattern可以设置参数，以数组的形式，
// 如果设置强制类型，用 => 即可，使用正则匹配的规则，比如上边的\d就是限制的id参数为整型；



return [

];