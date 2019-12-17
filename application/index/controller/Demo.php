<?php

namespace app\index\controller;

use think\Controller;


class Demo extends Controller
{

    public function aaa()
    {


        // 实例化 application/common/model/Tablea.php这个类；
        $md = model('Tablea');

        // ========= 软删除,单调and多条 =============

        // delete() （前提是在M层配置好软删除相关配置）
        // 返回值： boolean
        // 使用if，因为如果该条目已经实现软删除的话，那么使用get返回值就是null，所以null->delete()会报错；
        // 所以这里使用if，防止报错；
        $did = [52, 54];

        for($i=0; $i<count($did); $i++) {

            if($md::get($did[$i])!==null) {
                $md::get($did[$i])->delete();
                echo 'id为-'.$did[$i].'实现软删除<br />';

            }else {

                echo 'id为-'.$did[$i].'-该条目已实现软删除<br />';

            }
        }


        // ========= 真删除 =============
        // 如果是真删除的话，那么在M层配置好软删除后，在 delete() 中写true即可；
        // 不推荐这么做，既然使用软删除了，何必真删除呢；


        // ========= 查询包含软删除数据值 =============
        // 默认情况下查询的数据不包含软删除数据，如果需要包含软删除的数据，可以使用下面的方式查询：
        // 那么查询结果就会包含软删除字段下的值；
        $res2 = $md::withTrashed()->find(); // 单条
        dump($res2);
        $res3 = $md::withTrashed()->select();  // 多条
        dump($res3);



        // ========= 仅查询 软删除字段有内容 的条目 =============
        // 得到的就是已经被软删除的条目
        $res4 = $md::onlyTrashed()->find(); // 单条
        dump($res4);
        $res5 = $md::onlyTrashed()->select();  // 多条
        dump($res5);


        // ========= 恢复被软删除的数据 =============
        $res6 = $md::onlyTrashed()->find(52); // 单条，find为主键值，这里的主键是id，所以直接传入即可；
        if($res6!==null) {
            $res6->restore();
            dump($res6); // 返回该条数据所有内容；
        } else {
            dump('改条目不存在 || 已恢复');
        }

    }
}
