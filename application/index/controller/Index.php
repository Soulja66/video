<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use Util\data\Sysdb;

class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->db = new Sysdb;
    }

    public function index()
    {
        // 幻灯片
        $slide_list = $this->db->table('slide')->where(array('type'=>0))->lists();
        //导航标签
        $channel_list = $this->db->table('video_label')->where(array('flag'=>'channel'))->pages(8);
        //今日焦点
        $today_hot_list = $this->db->table('video')->where(array('channel_id'=>3,'status'=>1))->pages(4);

        $this->assign('today_hot_list',$today_hot_list['lists']);
        $this->assign('channel_list',$channel_list['lists']);
        $this->assign('data',$slide_list);
        return $this->fetch();
    }

    public function cate(){
        //导航标签
        $channel_list = $this->db->table('video_label')->where(array('flag'=>'channel'))->lists();
        $charge_list = $this->db->table('video_label')->where(array('flag'=>'charge'))->lists();
        $area_list = $this->db->table('video_label')->where(array('flag'=>'area'))->lists();

        $this->assign('channel_list',$channel_list);
        $this->assign('charge_list',$charge_list);
        $this->assign('area_list',$area_list);

        return $this->fetch();
    }
}
