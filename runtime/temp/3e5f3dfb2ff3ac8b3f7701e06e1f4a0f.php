<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\WWW\video\public/../application/admins\view\video\add.html";i:1534057345;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加影片</title>
    <link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
    <script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
</head>
<body style="padding: 10px">
<form class="layui-form">
    <input type="hidden" name="id" value="<?php echo $data['item']['id']; ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">影片名称</label>
        <div class="layui-input-block">
            <input type="text" class="layui-input" name="title" value="<?php echo $data['item']['title']; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">频道</label>
        <div class="layui-input-inline">
            <select name="channel_id">
                <option value="0">请选择</option>
                <?php if(is_array($data['channel']) || $data['channel'] instanceof \think\Collection || $data['channel'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['channel'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_channel): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo_channel['id']; ?>" <?php
                 if($data['item']['channel_id']==$vo_channel['id']){
                 echo 'selected';}?>><?php echo $vo_channel['title']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>

        <label class="layui-form-label">资费</label>
        <div class="layui-input-inline">
            <select name="charge_id">
                <option value="0">请选择</option>
                <?php if(is_array($data['charge']) || $data['charge'] instanceof \think\Collection || $data['charge'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['charge'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_charge): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo_charge['id']; ?>" <?php
                 if($data['item']['charge_id']==$vo_charge['id']){
                 echo 'selected';}?>><?php echo $vo_charge['title']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">地区</label>
        <div class="layui-input-inline">
            <select name="area_id">
                <option value="0">请选择</option>
                <?php if(is_array($data['areas']) || $data['areas'] instanceof \think\Collection || $data['areas'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['areas'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_area): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo_area['id']; ?>" <?php
                 if($data['item']['area_id']==$vo_area['id']){
                 echo 'selected';}?>><?php echo $vo_area['title']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <label class="layui-form-label"></label>
        <div class="layui-input-inline">
        <button class="layui-btn layui-btn-sm" onclick="return false;" id="upload_img">
            <i class="layui-icon">&#xe67c;</i>图片上传</button>
            <img  id="pre_img" style="height: 30px" <?php
            if($data['item']['img']){echo 'src="'.$data['item']['img'].'"';}?>/>
            <input type="hidden" name="img" value="<?php echo $data['item']['img']; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">影片地址</label>
        <div class="layui-input-block">
            <input class="layui-input" type="text" name="url" value="<?php echo $data['item']['url']; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">关键字</label>
        <div class="layui-input-block">
            <input type="text" class="layui-input" name="keywords" value="<?php echo $data['item']['keywords']; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">描述</label>
        <div class="layui-input-block">
            <input class="layui-input" name="desc" type="text" value="<?php echo $data['item']['desc']; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-inline">
            <input type="checkbox" layui-skin="primary" name="status" title="发布" value="1" <?php
            if($data['item']['status']){echo 'checked';}?>>
        </div>
    </div>
</form>
<div class="layui-form-item">
    <div class="layui-input-block">
        <button class="layui-btn" onclick="save()">保存</button>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    layui.use(['form','layer','upload'],function () {
        $ = layui.jquery;
        var form = layui.form;
        layer = layui.layer;

        var upload = layui.upload;

        //执行实例
        var uploadInst = upload.render({
            elem: '#upload_img' //绑定元素
            ,url: '/admins.php/admins/video/upload_img' //上传接口
            ,accept:'images'
            ,done: function(res){
                //上传完毕回调
                $('#pre_img').attr('src',res.msg);
                $('input[name="img"]').val(res.msg);
            }
            ,error: function(){
                //请求异常回调
            }
    });
    });

    // 保存
    function save(){
        var title = $.trim($('input[name="title"]').val());
        var url = $.trim($('input[name="url"]').val());
        if(title == ''){
            layer.msg('请输入影片名称',{'icon':2,'anim':6});
            return;
        }
        if(url == ''){
            layer.msg('请输入影片地址',{'icon':2,'anim':6});
            return;
        }
        $.post('/admins.php/admins/video/save',$('form').serialize(),function(res){
            if(res.code>0){
                layer.msg(res.msg,{'icon':2,'anim':2});
            }else{
                layer.msg(res.msg,{'icon':1});
                setTimeout(function(){parent.window.location.reload();},1000);
            }
        },'json');
    }
</script>