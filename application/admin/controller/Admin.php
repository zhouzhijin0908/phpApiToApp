<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/5/29
 * Time: 15:57
 */
namespace app\admin\controller;

use think\Controller;
use app\common\lib\IAuth;

class Admin extends Controller{
    public function add(){
        if (request()->isPost()){
            $data = input('post.');
            $validate = validate('AdminUser');
            if (!$validate->check($data)){
                $this->error($validate->getError());
            }

            $data['password'] = IAuth::setpassword($data['password']);
            $data['status'] = 1;

            try {
                $id = model("AdminUser")->add($data);
            }catch (\Exception $e){
                echo $e->getMessage();
            }

            if ($id){
                $this->success('id = '.$id.'的用户添加成功');
            }else{
                $this->error('error');
            }
        }else{
            return $this->fetch();
        }

    }
}