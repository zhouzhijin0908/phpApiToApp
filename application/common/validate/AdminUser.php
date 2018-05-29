<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/5/29
 * Time: 16:15
 */

namespace app\common\validate;

use think\Validate;

class AdminUser extends Validate{
    protected $rule = [
      'username' => 'require|max:10',
      'password' => 'require|max:12'
    ];
}