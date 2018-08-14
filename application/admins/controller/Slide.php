<?php

namespace app\admins\controller;

use think\Controller;
use Util\data\Sysdb;

/**
 * 幻灯片管理
 */
class Slide extends BaseAdmin
{
    //首页首屏
    public function index(){
        $data = $this->db->table('slide')->where(array('type'=>0))->lists();
        $this->assign('data',$data);


        return $this->fetch();
    }
    //添加首屏
    public function add_first(){


        return $this->fetch();

    }
}
