<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/17
 * Time: 10:39
 */

namespace app\admins\controller;
use think\Controller;

class Account extends Controller
{
    public function login(){

        return $this->fetch();
    }
}