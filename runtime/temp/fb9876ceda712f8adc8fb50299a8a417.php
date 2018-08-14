<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\WWW\video\public/../application/admins\view\roles\index.html";i:1534253971;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>角色管理</title>
    <title></title>
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
<body style="padding: 10px">
<div class="header">
    <span>角色列表</span>
    <button class="layui-btn layui-btn-xs" style="float: right" onclick="add()">添加</button>
    <div></div>
</div>
<table class="layui-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>角色名称</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($data['roles']) || $data['roles'] instanceof \think\Collection || $data['roles'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['roles'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo $vo['gid']; ?></td>
        <td><?php echo $vo['title']; ?></td>
        <td>
            <button class="layui-btn layui-btn-warm layui-btn-xs" onclick="add(<?php echo $vo['gid']; ?>)">编辑</button>
            <button class="layui-btn layui-btn-danger layui-btn-xs" onclick="del(<?php echo $vo['gid']; ?>)">删除</button>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
</body>
</html>
<script type="text/javascript">
    layui.use(['layer'],function () {
        $ = layui.jquery;
        layer = layui.layer;
    });

    //添加
    function add(gid) {
        layer.open({
            type: 2,
            title: gid>0?'编辑角色':'添加角色',
            shade: 0.3,
            area: ['480px', '420px'],
            content: '/admins.php/admins/Roles/add?gid='+gid,
        });
    }

    // 删除
    function del(gid){
        layer.confirm('确定要删除吗？', {
            icon:3,
            btn: ['确定','取消']
        }, function(){
            $.post('/admins.php/admins/Roles/deletes',{'gid':gid},function(res){
                if(res.code>0){
                    layer.alert(res.msg,{icon:2});
                }else{
                    layer.msg(res.msg);
                    setTimeout(function(){window.location.reload();},1000);
                }
            },'json');
        });
    }
</script>