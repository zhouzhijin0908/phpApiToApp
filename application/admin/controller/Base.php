<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/5/31
 * Time: 18:17
 */

namespace app\admin\controller;


use think\Controller;

class Base extends Controller
{

    public function _initialize()
    {
        if (!$this->isLogin()){
            return $this->redirect('login/index');
        }
    }

    public function isLogin(){
        $user = session(config('admin.session_user'), '', config('admin.session_user_scope'));
        if ($user && $user->id){
            return true;
        }

        return false;
    }
}