<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\WWW\video\public/../application/admins\view\home\index.html";i:1533737783;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>系统管理</title>
    <link rel="stylesheet" type="text/css" href="/static/plugins/layui/css/layui.css">
    <script type="text/javascript" src="/static/plugins/layui/layui.js"></script>
    <style type="text/css">
        .header {
            width: 100%;
            height: 50px;
            line-height: 50px;
            background: #2e6da4;
            color: #ffffff;
        }

        .title {
            margin-left: 20px;
            font-size: 20px;
        }

        .userinfo {
            float: right;
            margin-right: 20px;
        }

        .userinfo a {
            color: #ffffff;
        }

        .menu {
            width: 200px;
            background: #333744;
            position: absolute;
        }

        .layui-colla-item{
            border: none;
        }

        .layui-collapse{
            border: none;
        }

        .layui-colla-title{
            background: #01AAED;
            color: #ffffff;
        }

        .layui-colla-content{
            border: none;
            padding: 0px;
        }

        .main{
            position: absolute;
            left: 200px;
            right: 0px;
        }

    </style>
</head>
<body>
<!--header-->
<div class="header">
    <span class="title"><span style="font-size: 12px"><?php echo $site['values']; ?></span>-后台管理系统</span>
    <span class="userinfo"><?php echo $admin['username']; ?>【<?php echo $role['title']; ?>】<span><a href="javascript:;" onclick="logout()">退出</a> </span></span>

</div>
<!--menu-->
<div class="menu" id="menu">
    <div class="layui-collapse" lay-accordion>
        <?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="layui-colla-item">
            <h2 class="layui-colla-title"><?php echo $vo['title']; ?></h2>
            <div class="layui-colla-content layui-show">
                <?php if(isset($vo['children']) && $vo['children']){?>
                <ul class="layui-nav layui-nav-tree" lay-filter="test">
                    <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?>
                    <li class="layui-nav-item"><a href="javascript:;" onclick="menuFire(this)"
                                                  src="/admins.php/admins/<?php echo $cvo['controller']; ?>/<?php echo $cvo['method']; ?>"><?php echo $cvo['title']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php }?>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

</div>
<!--主操作頁面-->
<div class="main">
    <iframe src="/admins.php/admins/Home/welcome" onload="resetMainHeight(this)" style="width: 100%;height: 100%;" frameborder="0" scrolling="0"></iframe>
</div>
<script>
    //注意：折叠面板 依赖 element 模块，否则无法进行功能性操作
    layui.use(['element','layer'], function () {
        var element = layui.element;
        $ = layui.jquery;
        layer = layui.layer;
        resetMenuHeight();
        //…
    });
    //重新设置菜单容器高度
    function resetMenuHeight() {
        var height = document.documentElement.clientHeight - 50;
        $('#menu').height(height);
    }
    //重新设置主操作页面高度
    function resetMainHeight(obj) {
        var height = parent.document.documentElement.clientHeight - 53;
        $(obj).parent('div').height(height);
    }
    //菜单点击
    function menuFire(obj) {
        //获取url
        var src = $(obj).attr('src');
        //设置iframe的src
        $('iframe').attr('src',src);
    }
    
    function logout() {
            layer.confirm('确定要删除吗？', {
                icon: 3,
                btn: ['确定', '取消']
            }, function () {
                $.get('/admins.php/admins/account/logout', function (res) {
                    if (res.code > 0) {
                        layer.msg(res.msg, {'icon': 2});
                    } else {
                        layer.msg(res.msg, {'icon': 1});
                        setTimeout(function () {
                            window.location.href = '/admins.php/admins/account/login';
                        }, 1000);
                    }
                }, 'json');

            });
    }

</script>
</body>
</html>