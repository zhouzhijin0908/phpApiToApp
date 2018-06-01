<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/6/1
 * Time: 17:33
 */

namespace app\admin\controller;

use think\Controller;

class News extends Controller{
    public function index(){
        return $this->fetch();
    }

    public function add(){
        return $this->fetch();
    }

    public function test(){
        return $this->fetch();
    }
}