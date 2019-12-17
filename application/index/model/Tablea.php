<?php

namespace app\index\model;

use think\Model;

// 软删除操作需要引入下边这个类
use think\model\concern\SoftDelete;

class Tablea extends Model
{

    // 配置
    use SoftDelete;
    // 数据表中用于标记软删除的字段
    protected $deleteTime = 'delete_time';
    // 该字段的默认值，不设置的话默认为Null
    // protected $defaultSoftDelete = 0;

}
