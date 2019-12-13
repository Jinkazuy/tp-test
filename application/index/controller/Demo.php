<?php

namespace app\index\controller;

use think\Controller;

// 这个是自动生成的，
// 并且继承了 thinkphp\library\think\Controller.php 的 Controller 类，
// 因为继承，所以能够使用 thinkphp\library\think\Controller.php 的 Controller 类，
// 这个 Controller.php 下的 Controller 类中就有很多我们需要的类，thinkPhp已经帮我们封装好；
class Demo extends Controller
{
    // 假如这个aaa方法就是新增用户的操作；
    public function aaa()
    {
        // redirect方法是继承 thinkphp\library\think\Controller.php 的 Controller 类的
        // redirect方法参数和url()方法一样；

        $result = 1;

        if ($result===1) {

            // 指向某个控制器下的某个方法
            // 参数1： mvc层名/控制器名/方法名
            $this->redirect('demo/demo/aa');

        } else if($result===2) {

            // 当然也可以指向一个固定的IP地址
            $this->redirect('http://thinkphp.cn/blog/2');

        } else if($result===3) {

            // 参数2：传参，数组的形式，但是注意的是，route.php 中也要设置相应的参数
            $this->redirect('demo/demo/aa', ['id' => 2]);
            // 上边传了参，那么route.php中定义路由也必须定义 Route::get('/demoaa/:id', 'demo/demo/aa');

        } else if($result===4) {

            // 参数3：使用状态码，比如302（临时重定向）
            $this->redirect('demo/demo/aa', [], 302);
            // 上边传了参，那么route.php中定义路由也必须定义 Route::get('/demoaa/:id', 'demo/demo/aa');

        } else if($result===5) {

            // 参数4：可以在重定向的时候通过session闪存数据传值，
            // 也就是说，参数4可以在重定向跳转的同时，向Session中存储数据；
            $this->redirect('demo/demo/aa', [], 302, ['data' => 'hello']);
            // 上边传了参，那么route.php中定义路由也必须定义 Route::get('/demoaa/:id', 'demo/demo/aa');

        } else if($result===6) {

            // 使用redirect助手函数还可以实现更多的功能，例如可以记住当前的URL后跳转
            // 注意之类没有$this
            redirect('demo/demo/aa')->remember();

            // 然后需要跳转到上次记住的URL的时候使用：
            redirect()->restore();

        }
    }
}
