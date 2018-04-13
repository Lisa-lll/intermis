<?php /*a:2:{s:66:"/Users/liuyang/intermis/tp5/application/student/view/st/apply.html";i:1523585153;s:67:"/Users/liuyang/intermis/tp5/application/student/view/st/header.html";i:1523522535;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/static/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/bootstrap.min.js"></script>
    <!-- bootstrap-select，表单下拉控件 -->
    <link rel="stylesheet" href="/static/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/static/css/jquery.dataTables.min.css">
    <script src="/static/js/jquery.dataTables.min.js"></script>
    <script src="/static/js/bootstrap-select.min.js"></script>
    <script src="/static/js/i18n/defaults-zh_CN.min.js"></script>
</head>
<body>

<div class="container" style="background-color: white;">
    <div class="row bg-primary" >
    <p class="text-right">欢迎您：<?php echo htmlentities((isset($user) && ($user !== '')?$user:'123')); ?>     <a href="<?php echo url('logout'); ?>">退出</a>    </p>
    <div class="col-md-12 text-center"><h2 style="">国际学生在线入学申请</h2>

    </div>

</div>
<div class="row bg-info" style="height: 55px">
    <nav class="navbar  " style="padding-left: 20px;">
        <a class="navbar-brand" href="<?php echo url('apply'); ?>">报名申请</a> <a class="navbar-brand" href="#">报名结果查询</a>
    </nav>
</div>
    <div class="col-md-12 table-bordered" ><h4>查询选项</h4></div>
   <form id="cxpro">
    <table class="table table-bordered">

    <tr>
        <td class="text-right">院系</td>
        <td>
            <select  class="selectpicker show-menu-arrow" name="depart" data-width="100%" data-live-search="true"  >
                <option value="" selected>请选择院系</option>
            <?php if(is_array($depart) || $depart instanceof \think\Collection || $depart instanceof \think\Paginator): $i = 0; $__LIST__ = $depart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo htmlentities($list['name']); ?>"><?php echo htmlentities($list['name']); ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
             </select>
        </td>
        <td class="text-right">专业</td>
        <td>
            <select  class="selectpicker show-menu-arrow" name="speci" data-width="100%" data-live-search="true"  >
                <option value="" selected>请选择专业</option>
                <?php if(is_array($speci) || $speci instanceof \think\Collection || $speci instanceof \think\Paginator): $i = 0; $__LIST__ = $speci;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo htmlentities($list['name']); ?>"><?php echo htmlentities($list['name']); ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="text-right">研究方向</td>
        <td class="col-xs-4">
            <input type="text" name="area" class="form-control" placeholder="">
        </td>
        <td class="text-right">授课语言</td>
        <td>
            <select data-width="100%" name="lang">
                <option value="汉语">汉语</option>
                <option value="英语">英语</option>

            </select>
        </td>
    </tr>
    <tr>
        <td colspan="4" class="text-center">
            <button type="button" id="chaxun" class="btn btn-primary">查询</button>
            <button type="button" class="btn btn-default">返回</button>
        </td>

    </tr>
</table>
   </form>
    <div  id="xmmc" class="col-md-12 table-bordered" ><h4>项目名称</h4></div>
   <div id="xmm">
    <table id="nr" class="table table-bordered table-hover table-striped">
<thead>
        <tr >
            <th class="text-center">项目名称</th>
            <th class="text-center">院系</th>
            <th class="text-center">学习专业</th>
            <th class="text-center">研究方向</th>
            <th class="text-center">学习期限</th>
            <th class="text-center">学制</th>
            <th class="text-center">授课语言</th>
            <th class="text-center">报名截止</th>
            <th class="text-center">备注</th>
            <th class="text-center">操作</th>
        </tr>
</thead>

<tbody>
<?php if(is_array($projec) || $projec instanceof \think\Collection || $projec instanceof \think\Paginator): $i = 0; $__LIST__ = $projec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list1): $mod = ($i % 2 );++$i;?>
        <tr >
            <td class="text-center"><?php echo htmlentities($list1['name']); ?></td>
            <td class="text-center"><?php echo htmlentities($list1['depart']); ?></td>
            <td class="text-center"><?php echo htmlentities($list1['speci']); ?></td>
            <td class="text-center"><?php echo htmlentities($list1['area']); ?></td>
            <td class="text-center"><?php echo htmlentities($list1['limit']); ?></td>
            <td class="text-center"><?php echo htmlentities($list1['system']); ?></td>
            <td class="text-center"><?php echo htmlentities($list1['lang']); ?></td>
            <td class="text-center"><?php echo htmlentities($list1['deadline']); ?></td>
            <td class="text-center"><?php echo htmlentities($list1['remark']); ?></td>
            <td class="text-center"><a href="">申请</a> </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>

</tbody>

    </table>

    <div id="dh" class="col-md-12 text-center" ><?php echo $projec; ?></div>

   </div>



</div>
<script type="text/javascript">

    $(function () {
        $("#chaxun").on('click',function () {

            $.ajax({
                type: 'post',
                url: "<?php echo url('student/st/cxpro'); ?>",
                data: $('#cxpro').serialize(),
                datatype: 'json',
                success: function (data) {

                    if (data.status == 1) {

                      $("#nr").remove();
                        $("#dh").remove();
                        var str="";

                        for(var m=0;m<data.coun;m++)
                        {

                            str+="<tbody><tr><td>"+data.projec[m].name+"</td><td>"+data.projec[m].depart+"</td><td>"+data.projec[m].speci+"</td><td>"+data.projec[m].area+"</td><td>"+data.projec[m].limit+"</td><td>"+data.projec[m].system+"</td><td>"+data.projec[m].lang+"</td><td>"+data.projec[m].deadline+"</td><td>"+data.projec[m].remark+"</td><td><a href=>申请</a></td></tr></tbody>";
                        }


                        $("#xmm").html("<table id='shuchu' class=\"table table-bordered table-hover table-striped\"><thead><tr >\n" +
                            "            <th class=\"text-center\">项目名称</th>\n" +
                            "            <th class=\"text-center\">院系</th>\n" +
                            "            <th class=\"text-center\">学习专业</th>\n" +
                            "            <th class=\"text-center\">研究方向</th>\n" +
                            "            <th class=\"text-center\">学习期限</th>\n" +
                            "            <th class=\"text-center\">学制</th>\n" +
                            "            <th class=\"text-center\">授课语言</th>\n" +
                            "            <th class=\"text-center\">报名截止</th>\n" +
                            "            <th class=\"text-center\">备注</th>\n" +
                            "            <th class=\"text-center\">操作</th>\n" +
                            "        </tr></thead></table>");


                        $('#shuchu').DataTable({
                            data:data.projec,
                            "columns": [
                                { "data": "name" },
                                { "data": "depart" },
                                { "data": "speci" },
                                { "data": "area" },
                                { "data": "limit" },
                                { "data": "system" },
                                { "data": "system" },
                                { "data": "system" },
                                { "data": "system" },
                                { "data": "system" }
                            ]
                        });
                    }
                }



            })

        })

    });



</script>
</body>
</html>