<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/5/30
 * Time: 18:34
 */

namespace app\common\lib;
class IAuth {
    public static function setPassword($data){
        return md5($data.config('app.password_pre_halt'));
    }

}