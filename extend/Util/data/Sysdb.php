<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/18
 * Time: 11:04
 */
namespace Util\data;
use think\Db;

class Sysdb{
//    指定表格
    public function table($table){
        $this->where = array();
        $this->table = $table;
        $this->field = '*';
        return $this;
    }
//    查询字段
    public function field($field='*'){
        $this->field=$field;
        return $this;
    }
//    指定查询
    public function where($where = array()){
        $this->where = $where;
        return $this;
}
//    返回一条记录
    public function item(){
        $item = Db::name($this->table)->field($this->field)->where($this->where)->find();
        return $item ? $item : false;
    }
    //返回list
    public function lists(){
        $lists = Db::name($this->table)->field($this->field)->where($this->where)->select();
        return $lists ? $lists :false;
    }
    //自定义索引列表
    public function cates($index){
        $lists = Db::name($this->table)->field($this->field)->where($this->where)->select();
        if (!$lists){
            return false;
        }else{
            $results = [];
            foreach ($lists as $key => $value){
                $results[$value[$index]] = $value;
            }
            return $results;
        }
    }
    
    //添加用户
    public function insert($data){
        $res = Db::name($this->table)->insert($data);
        return $res;
    }
    
    //用户更新
    public function update($data){
        $res = Db::name($this->table)->where($this->where)->update($data);
        return $res;
    }

    public function delete(){
        $res = Db::name($this->table)->where($this->where)->delete();
        return $res;
    }
}