<?php

namespace app\admins\controller;

use think\Controller;
use Util\data\Sysdb;

/**
 * 管理员管理
 */
class Admin extends BaseAdmin
{
    //管理员列表
    public function index()
    {
        $data['lists'] = $this->db->table('admins')->lists();
        //加载角色
        $data['groups'] = $this->db->table('admin_groups')->cates('gid');
        $this->assign('data', $data);
        return $this->fetch();
    }

    //管理员添加
    public function add()
    {
        //接收id
        $id = (int)input('get.id');
        //加载管理员
        $data['item'] = $this->db->table('admins')->where(array('id' => $id))->item();
        //加载角色
        $data['groups'] = $this->db->table('admin_groups')->cates('gid');
        $this->assign('data', $data);
        return $this->fetch();
    }

    //删除管理员
    public function delete(){
        $id = (int)input('post.id');
        $res = $this->db->table('admins')->where(array('id'=>$id))->delete();
        if(!$res){
            exit(json_encode(array('code'=>'1','msg'=>'删除失败')));
        }
        exit(json_encode(array('code'=>'0','msg'=>'删除成功')));
    }

    //保存管理员
    public function save()
    {
        $id = (int)input('post.id');
        $data['username'] = trim(input('post.username'));
        $data['gid'] = (int)input('post.gid');
        $data['truename'] = trim(input('post.truename'));
        $password = trim(input('post.pwd'));
        $data['status'] = (int)input('post.status');

        if (!$data['username']) {
            exit(json_encode(array('code' => 1, 'msg' => '用户名不能为空')));
        }
        if (!$data['gid']) {
            exit(json_encode(array('code' => 1, 'msg' => '请选择角色')));
        }
        if (!$data['truename']) {
            exit(json_encode(array('code' => 1, 'msg' => '请输入真实姓名')));
        }
        if ($id == 0 && !$password) {
            exit(json_encode(array('code' => 1, 'msg' => '密码不能为空')));
        }
        //密码处理
//        $data['password'] = md5($data('username').$password);
        //检查用户名是否已经存在
        $res = true;
        if ($id == 0) {
            $item = $this->db->table('admins')->where(array('username' => $data['username']))->item();
            if ($item) {
                exit(json_encode(array('code' => 1, 'msg' => '改用户已存在')));
            }
            $data['add_time'] = time();
            //保存用户
            $this->db->table('admins')->insert($data);
        }else{
            $this->db->table('admins')->where(array('id'=>$id))->update($data);
        }

        if (!$res) {
            exit(json_encode(array('code' => 1, 'msg' => '保存失败')));
        }
        exit(json_encode(array('code' => 0, 'msg' => '保存成功')));

    }
}