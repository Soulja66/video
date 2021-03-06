<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\WWW\video\public/../application/admins\view\video\index.html";i:1534728056;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
    <script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
    <style type="text/css">
        .header span{
            background: #009688;margin-left: 30px;padding: 10px;color: #ffffff;
        }
        .header div{
            border-bottom: solid 2px #009688;margin-top: 10px;
        }
        .header button{
            float: right;margin-top: -5px;
        }
    </style>
</head>
<body style="padding: 10px">
<div class="header">
    <span>影片列表</span>
    <button class="layui-btn layui-btn-sm" onclick="add()">添加</button>
    <div></div>
</div>
<div class="layui-form-item" style="margin-top: 10px">
    <div class="layui-input-inline">
        <input type="text" class="layui-input" id="wd" value="<?php echo $data['wd']; ?>" placeholder="请输入影片标题搜索">
    </div>
    <button class="layui-btn layui-btn-primary" onclick="searchs()"><i class="layui-icon">&#xe615;</i>搜索</button>
</div>

<table class="layui-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>频道</th>
        <th>资费</th>
        <th>地区</th>
        <th>名称</th>
        <th>PV</th>
        <th>评分</th>
        <th>状态</th>
        <th>添加时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($data['data']['lists']) || $data['data']['lists'] instanceof \think\Collection || $data['data']['lists'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['data']['lists'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo $vo['id']; ?></td>
        <td><?php echo isset($data['labels'][$vo['channel_id']])?$data['labels'][$vo['channel_id']]['title']:''; ?></td>
        <td><?php echo isset($data['labels'][$vo['charge_id']])?$data['labels'][$vo['charge_id']]['title']:''; ?></td>
        <td><?php echo isset($data['labels'][$vo['area_id']])?$data['labels'][$vo['area_id']]['title']:''; ?></td>
        <td><?php echo $vo['title']; ?></td>
        <td><?php echo $vo['pv']; ?></td>
        <td><?php echo $vo['score']; ?></td>
        <td><?php echo $vo['status']==0?'<span style="color: red">下线</span>':'正常'; ?></td>
        <td><?php echo date("Y-m-d H:m:s",$vo['add_time']); ?></td>
        <td>
            <button class="layui-btn layui-btn-xs" onclick="add(<?php echo $vo['id']; ?>)">编辑</button>
            <button class="layui-btn layui-btn-danger layui-btn-xs" onclick="del(<?php echo $vo['id']; ?>)">删除</button>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
<div id="pages"></div>
<script type="text/javascript">
    layui.use(["layer","laypage"],function () {
        layer = layui.layer;
        $ = layui.jquery;
        laypage = layui.laypage;

        laypage.render({
                elem: 'pages'
                ,count: <?php echo $data['data']['total']; ?>
            ,limit: <?php echo $data['pageSize']; ?>
            ,curr: <?php echo $data['page']; ?>
            ,jump: function(obj, first){
            //首次不执行
            if(!first){
                searchs(obj.curr);
            }
        }
    });
    });
    //管理员添加方法
    function add(id) {
        layer.open({
            type: 2,
            title: id>0 ? '编辑影片':'添加影片',
            shade: 0.3,
            area: ['800px', '500px'],
            content: '/admins.php/admins/video/add?id='+id //iframe的url
        });
    }

    function del(id) {
        layer.confirm('确定要删除吗？', {
            icon:3,
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post('/admins.php/admins/video/delete',{'id':id},function (res) {
                if(res.code>0){
                    layer.alert(res.msg,{icon:2});
                }else{
                    layer.msg(res.msg);
                    setTimeout(function () {
                        window.location.reload();
                    },1000);
                }
            },'json');
        });
    }

    //搜索
    function searchs(curpage){
        var wd = $.trim($('#wd').val());
        // layer.alert(wd);
        var url = "/admins.php/admins/video/index?page="+curpage;
        if (wd) {
            url+='&wd='+wd;
        }
        window.location.href = url;
    }
</script>
</body>
</html>