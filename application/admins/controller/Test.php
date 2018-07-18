<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/17
 * Time: 10:39
 */

namespace app\admins\controller;
use think\Controller;
use Util\data\Sysdb;

class Test extends Controller
{
    public function index(){
        $this->db = new Sysdb;
        $res = $this->db->table('admins')->where(array('id'=>1))->item();
        dump($res);
    }
}