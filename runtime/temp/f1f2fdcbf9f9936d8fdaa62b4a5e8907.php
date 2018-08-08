<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\WWW\video\public/../application/admins\view\roles\add.html";i:1533465551;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>角色添加</title>
    <link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
    <script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
</head>
<body style="padding:10px">
<form class="layui-form">
    <input type="hidden" name="gid" value="<?php echo $role['gid']; ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">角色名称</label>
        <div class="layui-input-block">
            <input class="layui-input" type="text" name="title" value="<?php echo $role['title']; ?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">权限菜单</label>
        <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="layui-input-block">
            <input  type="checkbox" name="menu[<?php echo $vo['mid']; ?>]" title="<?php echo $vo['title']; ?>" lay-skin="primary"
                    <?php echo isset($role['rights']) && $role['rights']
                    && in_array($vo['mid'],$role['rights'])?'checked':''; ?>>
            <hr>
            <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?>
            <input type="checkbox" name="menu[<?php echo $cvo['mid']; ?>]" title="<?php echo $cvo['title']; ?>" lay-skin="primary"
                    <?php echo isset($role['rights']) && $role['rights']
                    && in_array($cvo['mid'],$role['rights'])?'checked':''; ?>>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

</form>
<div class="layui-form-item>">
<div class="layui-input-block">
<button class="layui-btn" onclick="save()">保存</button>
</div>
</div>
</body>
</html>

<script type="text/javascript">
    layui.use(['layer','form'],function () {
        var form = layui.form;
        layer = layui.layer;
        $ = layui.jquery;
    });

    function save() {
        var title = $.trim($('input[name="title"]').val());
        if (title==""){
            layer.msg("请填写角色名称",{'icon':2});
            return;
        }
        $.post('/admins.php/admins/roles/save',$('form').serialize(),function (res) {
            if (res.code>0){
                layer.msg(res.msg,{'icon':2});
            }else {
                layer.msg(res.msg,{'icon':1});
                setTimeout(function () {
                    parent.window.location.reload();
                },1000);
            }
        },'json');
    }
</script>