<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\WWW\video\public/../application/admins\view\admin\add.html";i:1534253971;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
    <script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
</head>
<body style="padding: 10px">
<form class="layui-form">
    <input type="hidden" value="<?php echo $data['item']['id']; ?>" name="id">
<div class="layui-form-item">
    <label class="layui-form-label">用户名</label>
    <div class="layui-input-inline">
        <input type="text" class="layui-input" name="username" value="<?php echo $data['item']['username']; ?>" <?php echo $data['item']['id']>0?'readonly':''; ?>>
    </div>

</div>

    <div class="layui-form-item">
        <label class="layui-form-label">角&nbsp;&nbsp;色</label>
        <div class="layui-input-inline">
            <select name="gid">
                <option value=0></option>
                <?php if(is_array($data['groups']) || $data['groups'] instanceof \think\Collection || $data['groups'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['groups'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo['gid']; ?>" <?php echo $vo['gid']==$data['item']['gid']?'selected' : ''; ?>><?php echo $vo['title']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>

    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">密&nbsp;&nbsp;码</label>
        <div class="layui-input-inline">
            <input type="password" class="layui-input" name="pwd">
        </div>

    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">姓&nbsp;&nbsp;名</label>
        <div class="layui-input-inline">
            <input class="layui-input" name="truename" value="<?php echo $data['item']['truename']; ?>">
        </div>

    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-inline">
            <input type="checkbox" name="status" lay-skin="primary" title="禁用" value="1" <?php echo !empty($data['item']['status'])?"checked":""; ?>>

        </div>

    </div>

</form>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button class="layui-btn" onclick="save()">保存</button>
    </div>
</div>


<script type="text/javascript">
    layui.use(['layer','form'],function () {
        form = layui.form;
        layer = layui.layer;
        $ = layui.jquery;
    });

    //保存管理员
    function save() {
        var id = parseInt($('input[name="id"]').val());
        var username = $.trim($('input[name="username"]').val());
        var pwd = $.trim($('input[name="pwd"]').val());
        var gid = $('select[name="gid"]').val();
        var truename = $.trim($('input[name="truename"]').val());

        if (username==""){
            layer.alert('请输入用户名',{icon:2});
            return;
        }
        if (isNaN(id) && pwd==""){
            layer.alert('请输密码',{icon:2});
            return;
        }

        if (gid==0){
            layer.alert('请选择角色',{icon:2});
            return;
        }
        if (truename==""){
            layer.alert('请输入姓名',{icon:2});
            return;
        }

        $.post('/admins.php/admins/Admin/save',$('form').serialize(),function(res) {
            if (res.code>0) {
                layer.alert(res.msg,{icon:2});
            }else{
                layer.alert(res.msg);
                setTimeout(function () {
                    parent.window.location.reload();
                },1000)
            }

        },'json');

    }
</script>
</body>
</html>