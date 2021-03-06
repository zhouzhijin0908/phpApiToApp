<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/5/29
 * Time: 15:43
 */

namespace app\common\model;

use think\Model;

class AdminUser extends Model{

    protected $autoWriteTimestamp = true;

    public function add($data){
        if (!is_array($data)){
            exception('传递数据不合法');
        }
        $this->allowField(true)->save($data);

        return $this->id;
    }
}