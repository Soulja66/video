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
    public function index(){
        $data['lists'] = $this->db->table('admins')->lists();
        $this->assign('data',$data);
        return $this->fetch();
    }

    //管理员添加
    public function add(){
        $data['groups'] = $this->db->table('admin_groups')->lists();
        $this->assign('data',$data);
        return $this->fetch();
    }

    //保存管理员
    public function save(){
        $data['username'] = trim(input('post.username'));
        $data['gid'] = (int)input('post.gid');
        $data['truename'] = trim(input('post.truename'));
        $password = trim(input('post.pwd'));
        $data['status'] = (int)input('post.status');
        $data['add_time'] = time();
        if (!$data['username']){
            exit(json_encode(array('code'=>1,'msg'=>'用户名不能为空')));
        }
        if (!$data['gid']){
            exit(json_encode(array('code'=>1,'msg'=>'请选择角色')));
        }
        if (!$data['truename']){
            exit(json_encode(array('code'=>1,'msg'=>'请输入真实姓名')));
        }
        if (!$password){
            exit(json_encode(array('code'=>1,'msg'=>'密码不能为空')));
        }
        //密码处理
//        $data['password'] = md5($data('username').$password);
        //检查用户名是否已经存在
        $item = $this->db->table('admins')->where(array('username'=>$data['username']))->item();
        if ($item){
            exit(json_encode(array('code'=>1,'msg'=>'改用户已存在')));
        }

        $res = $this->db->table('admins')->insert($data);
        if (!$res){
            exit(json_encode(array('code'=>1,'msg'=>'保存失败')));
        }
        exit(json_encode(array('code'=>0,'msg'=>'保存成功')));

    }
}