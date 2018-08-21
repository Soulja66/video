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
        $channel_list = $this->db->table('video_label')->where(array('flag'=>'channel'))->pages(8);

        $this->assign('channel_list',$channel_list['lists']);
        $this->assign('data',$slide_list);
        return $this->fetch();
    }
}
