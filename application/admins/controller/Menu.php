<?php

namespace app\admins\controller;

use think\Controller;
use Util\data\Sysdb;

/**
 * 管理员管理
 */
class Menu extends BaseAdmin
{
    //菜单列表
    public function index(){
        $pid = (int)input('get.pid');
        $data['lists'] = $this->db->table('admin_menus')->where(array('pid'=>$pid))->lists();
        //返回上级菜单
        $backid = 0;
        if($pid>0){
            $parent = $this->db->table('admin_menus')->where(array('mid'=>$pid))->item();
            $backid = $parent['pid'];
        }
        $this->assign('pid',$pid);
        $this->assign('backid',$backid);
        $this->assign('data',$data);
        return $this->fetch();
    }

}