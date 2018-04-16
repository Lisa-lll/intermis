<?php /*a:3:{s:66:"/Users/liuyang/intermis/tp5/application/student/view/st/fill1.html";i:1523888458;s:67:"/Users/liuyang/intermis/tp5/application/student/view/st/header.html";i:1523870820;s:65:"/Users/liuyang/intermis/tp5/application/student/view/st/left.html";i:1523889360;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- bootstrap-select，表单下拉控件 -->
    <!-- bootstrap-select，表单下拉控件 -->
    <link rel="stylesheet" href="/node_modules/bootstrap-select/dist/css/bootstrap-select.min.css">
    <script src="/node_modules/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script>
        $stid = $_GET['stid'];
    </script>

</head>
<body>
<div class="container-fluid" style="background-color: white;">
    <div class="row bg-primary" >
    <p class="text-right" style="font-size: larger">Welcome! &nbsp;<b style="color:yellow;"><?php echo htmlentities((isset($user) && ($user !== '')?$user:'123')); ?></b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a style="color: white;" class="text-right" href="<?php echo url('logout'); ?>">Sign out</a>  &nbsp;&nbsp;   </p>
    <div class="col-md-12 text-center"><h2 style="">China International Student Service System</h2>

    </div>

</div>
<div class="row bg-info" style="height: 55px">
    <nav class="navbar  " style="padding-left: 20px;">
        <a class="navbar-brand" href="<?php echo url('apply'); ?>">Application</a> <a class="navbar-brand" href="#">Application Query</a>
    </nav>
</div>
<style>
    a:hover{
        background-color: #555;
        color: white;
    }
    .btn-primary:hover{
        background-color:#555 !important;
    }
    a.putong:hover{
           color: red;
        background-color: white;


    }
    a.putong{
        color: blue;

    }
    a.putong:link{
        text-decoration:none;
    }
</style>

    <div class="row">
        <div class="col-md-2" style="margin-top: 15px;">
    <div class="col-md-12" style="height: 500px;border:1px solid #7e8795;padding: 10px 3px 10px 3px;">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="<?php echo url('st/fill'); ?>" class="btn btn-primary btn-default " role="button">1、Basci Info</a></li>
            <li role="presentation"><a href="<?php echo url('st/studyplan'); ?>" class="btn btn-primary btn-default " role="button">2、Study Plan</a></li>
            <li role="presentation"><a href="<?php echo url('st/education'); ?>" class="btn btn-primary btn-default " role="button">3.Education & Employment</a></li>
            <li role="presentation"><a href="<?php echo url('st/fill1'); ?>" class="btn btn-primary btn-default " role="button">4.Additional Info</a></li>
            <li role="presentation"><a href="<?php echo url('st/contact'); ?>" class="btn btn-primary btn-default " role="button">5.Contact Info</a></li>
            <li role="presentation"><a href="<?php echo url('st/preview'); ?>" class="btn btn-primary btn-default " role="button">6.Application Form Pre-review</a></li>

        </ul>
    </div>
</div>

        <div class="col-md-10" style="padding: 10px 10px 20px 10px;margin-top: 5px;">

            <form id="otherinfo" action="<?php echo url('insert1'); ?>" type="post">

            <table class="table table-bordered" id="basic">
                <tbody>
                <tr>
                    <td colspan="7" class="active">
                        <div class="col-md-6">家庭情况stid:<?php echo htmlentities($stid); ?> </div>
                        <div class="col-md-6 text-right"><button type="button" class="btn btn-primary btn-sm" id="addtry" onclick="addaaa();">追加</button></div>
                    </td>
                </tr>
               <tr >

                <th>家庭成员</th><th>姓名</th><th>电话</th><th>E-mail</th><th>职务</th><th>工作单位</th><th>操作</th>

               </tr>
                <tr>
                    <td>
                        <select name="gx[]" data-width="100%">
                            <option value="father">父亲</option>
                            <option value="mother">母亲</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="name[]"></td>
                    <td><input type="text" class="form-control" placeholder="" name="mobile[]"></td>
                    <td><input type="text" class="form-control" placeholder="" name="email[]"></td>
                    <td><input type="text" class="form-control" placeholder="" name="zhiwu[]"></td>
                    <td><input type="text" class="form-control" placeholder="" name="company[]"></td>
                    <td><button type="button" class="btn btn-primary btn-sm" onclick="delNew();">删除</button></td>
                </tr>
                <tr>
                    <td>
                        <select name="gx[]" data-width="100%"><option value="father">父亲</option><option value="mother">母亲</option></select>
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="name[]"></td>
                    <td><input type="text" class="form-control" placeholder="" name="mobile[]"></td>
                    <td><input type="text" class="form-control" placeholder="" name="email[]"></td>
                    <td><input type="text" class="form-control" placeholder="" name="zhiwu[]"></td>
                    <td><input type="text" class="form-control" placeholder="" name="company[]"></td>
                    <td><button type="button" class="btn btn-primary btn-sm" onclick="delNew(this);">删除</button></td>
                </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <tr>
                    <td colspan="4" class="active">
                        <div class="col-md-6">经济担保人或机构</div>
                        <div class="col-md-6 text-right"></div>
                    </td>
                </tr>

                <tr>
                    <td class="text-right">
                        担保人姓名
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="dbrname"></td>
                    <td class="text-right"> 担保人地址</td>
                    <td><input type="text" class="form-control" placeholder="" name="dbraddress"></td>
                </tr>
                <tr>
                    <td class="text-right">
                        担保人电话
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="dbrmobile"></td>
                    <td class="text-right"> 与申请人关系</td>
                    <td><input type="text" class="form-control" placeholder="" name="dbrgx"></td>
                </tr>
                <tr>
                    <td class="text-right">
                        工作单位
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="dbrcompany"></td>
                    <td class="text-right"> 电子邮件	</td>
                    <td><input type="text" class="form-control" placeholder="" name="dbremail"></td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <td colspan="4" class="active">
                        <div class="col-md-6">紧急事务联系人</div>
                        <div class="col-md-6 text-right"></div>
                    </td>
                </tr>

                <tr>
                    <td class="text-right">
                        姓名
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="sosname"></td>
                    <td class="text-right"> 手机</td>
                    <td><input type="text" class="form-control" placeholder="" name="sosmobile"></td>
                </tr>
                <tr>
                    <td class="text-right">
                        电话
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="sostel"></td>
                    <td class="text-right"> 电子邮件</td>
                    <td><input type="text" class="form-control" placeholder="" name="sosemail"></td>
                </tr>
                <tr>
                    <td class="text-right">
                        工作单位
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="soscompany"></td>
                    <td class="text-right"> 地址	</td>
                    <td><input type="text" class="form-control" placeholder="" name="sosaddress"></td>
                </tr>
            </table>

                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-primary">上一步</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary">保存并下一步</button>
                </div>
            </form>

        </div>

    </div>

</div>
<script>
    $('select').selectpicker();




    function addaaa() {
        $("#basic tr:last").after(" <tr>\n" +
            "                    <td>\n" +
            "                        <select name=\"gx[]\" data-width=\"100%\"><option value=\"father\">父亲</option><option value=\"mother\">母亲</option></select>\n" +
            "                    </td>\n" +
            "                    <td><input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"name[]\"></td>\n" +
            "                    <td><input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"mobile[]\"></td>\n" +
            "                    <td><input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"email[]\"></td>\n" +
            "                    <td><input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"zhiwu[]\"></td>\n" +
            "                    <td><input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"company[]\"></td>\n" +
            "                    <td><button type=\"button\" class=\"btn btn-primary btn-sm\" onclick=\"delNew(this);\">删除</button></td>\n" +
            "                </tr>")

    }

    function delNew(nowTr) {
        $(nowTr).parent().parent().remove();
    }
</script>
</body>
</html>