<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\WWW\video\public/../application/admins\view\labels\channel.html";i:1534728056;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>频道</title>
    <link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
    <script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
    <style type="text/css">
        .header span {
            background: #009688;
            margin-left: 30px;
            padding: 10px;
            color: #ffffff;
        }

        .header div {
            border-bottom: solid 2px #009688;
            margin-top: 10px;
        }
    </style>
</head>
<body style="padding: 10px;">
<div class="header">
    <span>频道标签</span>
    <div></div>
</div>
<form class="layui-form">
    <input type="hidden" value="channel" name="flag">
    <table class="layui-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>排序</th>
            <th>标签名称</th>
            <th>是否禁用</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo['id']; ?></td>
            <td><input type="text" class="layui-input" name="ords[<?php echo $vo['id']; ?>]" value="<?php echo $vo['ord']; ?>"></td>
            <td><input type="text" name="titles[<?php echo $vo['id']; ?>]" class="layui-input" value="<?php echo $vo['title']; ?>"></td>
            <td><input type="checkbox" lay-skin="primary" name="status[<?php echo $vo['id']; ?>]" title="禁用" <?php echo !empty($vo['status'])?'checked':''; ?> value=1></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <tr>
            <td></td>
            <td><input type="text" class="layui-input" name="ords[0]"></td>
            <td><input type="text" name="titles[0]" class="layui-input"></td>
            <td><input type="checkbox" lay-skin="primary" name="status[0]" title="禁用" value="1"></td>
        </tr>
        </tbody>
    </table>
</form>
<button class="layui-btn" onclick="save()">保存</button>
<script type="text/javascript">
    layui.use(['layer', 'form'], function () {
        layer = layui.layer;
        form = layui.form;
        $ = layui.jquery;
    });

    //保存菜单
    function save() {
        $.post('/admins.php/admins/labels/save',$('form').serialize(),function (res) {
            if(res.code>0){
                layer.alert(res.msg,{icon:2});
            }else{
                layer.alert(res.msg,{icon:1});
                setTimeout(window.location.reload(),1000);
            }

        },'json');
    }
</script>
</body>
</html>