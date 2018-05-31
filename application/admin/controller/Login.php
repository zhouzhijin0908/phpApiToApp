<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/5/30
 * Time: 17:34
 */

namespace app\admin\controller;


use think\Controller;
use think\exception\DbException;
use app\common\lib\IAuth;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function check(){
        if (!request()->isPost()){
            $this->error("请求不合法");
        }

        $data = input('post.');
        if (!captcha_check($data['code'])){
            $this->error("验证码错误");
        }

        try {
            $user = model("AdminUser")->get(['username' => $data['username']]);
        } catch (DbException $e) {
            $this->error($e->getMessage());
        }

        if (!$user || $user->status != config('code.status_normal')){
            $this->error("该用户不存在");
        }

        if (IAuth::setpassword($data['password']) != $user->password){
            $this->error("密码不正确");
        }

        $udata = [
            'last_login_time' => time(),
            'last_login_ip' => request()->ip()
        ];

        model('AdminUser')->save($udata, ['id' => $user->id ]);

        session(config('admin.session_user'), $user, 'admin.session_user_scope');
        $this->success("登录成功", 'index/index');
    }

}