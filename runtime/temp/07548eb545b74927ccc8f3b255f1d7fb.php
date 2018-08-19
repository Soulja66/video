<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\WWW\video\public/../application/admins\view\slide\add_first.html";i:1534684876;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
    <script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
</head>
<body style="padding: 10px">
<form class="layui-form">
	<input type="hidden" value="0" name="type">
	<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
	<div class="layui-form-item">
		<label class="layui-form-label">标题</label>
		<div class="layui-input-block">
			<input type="text" class="layui-input" name="title" value="<?php echo $data['title']; ?>">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">排序</label>
		<div class="layui-input-block">
			<input type="text" class="layui-input" name="ord" value="<?php echo $data['ord']; ?>">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">URL</label>
		<div class="layui-input-block">
		<input type="text" class="layui-input" name="url" value="<?php echo $data['url']; ?>">
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">图片上传</label>
		<div class="layui-input-block">
			<button class="layui-btn layui-btn-sm" id="upload_img" onclick="return false">上传</button>
			<img id="preview_img" style="height: 30px" <?php if($data['img']){
				echo 'src="'.$data['img'].'"';}?> />
			<input type="hidden" name="img" value="<?php echo $data['img']; ?>">
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
	layui.use(['layer','upload'],function () {
		layer = layui.layer;
		upload = layui.upload;
		$ = layui.jquery;

        var upload = layui.upload;

        //执行实例
        var uploadInst = upload.render({
            elem: '#upload_img' //绑定元素
            ,url: '/admins.php/admins/video/upload_img' //上传接口
            ,accept:'images'
            ,done: function(res){
                //上传完毕回调
                $('#preview_img').attr('src',res.msg);
                $('input[name="img"]').val(res.msg);
            }
            ,error: function(){
                //请求异常回调
            }
        });
    });

    function save(){
        var title = $.trim($('input[name="title"]').val());
        var url = $.trim($('input[name="url"]').val());
        var img = $.trim($('input[name="img"]').val());
        if(title==''){
            layer.msg('请输入标题',{'icon':2,'anim':6});
            return;
        }
        if(url = ''){
            layer.msg('请输入URL',{'icon':2,'anim':6});
            return;
        }
        if(img = ''){
            layer.msg('请上传图片',{'icon':2,'anim':6});
            return;
        }

        $.post('/admins.php/admins/slide/save',$('form').serialize(),function(res){
            if(res.code>0){
                layer.msg(res.msg,{'icon':2,'anim':6});
            }else{
                layer.msg(res.msg,{'icon':1});
                setTimeout(function(){parent.window.location.reload();},1000);
            }
        },'json');
    }
</script>