<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/5/29
 * Time: 9:20
 */

namespace app\admin\controller;



class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    public function test(){
        return $this->fetch();
    }

    public function welcome(){
        return "welcome zzj";
    }
}