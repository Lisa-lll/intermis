<?php /*a:1:{s:66:"/Users/liuyang/intermis/tp5/application/student/view/st/fill1.html";i:1523620988;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery-2.1.1.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>

    <!-- bootstrap-select，表单下拉控件 -->
    <link rel="stylesheet" href="/static/css/bootstrap-select.min.css">
    <script src="/static/js/bootstrap-select.min.js"></script>
    <script src="/static/js/i18n/defaults-zh_CN.min.js"></script>
    <script>
        $stid = $_GET['stid'];
    </script>

</head>
<body>
<div class="container" style="background-color: white;">
    <div class="row" style="background-color: #9acfea">
        <div class="col-md-12 text-center">.<h2 style="padding-left: 20px;padding-bottom: 20px">国际学生在线入学申请</h2></div>
    </div>
    <div class="row">
        <div class="col-md-2" style="margin-top: 15px;">
            <div class="col-md-12" style="height: 500px;border:1px solid #7e8795;padding: 10px 10px 10px 10px;">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" ><a href="#">1、基础信息</a></li>
                    <li role="presentation"><a href="#">2、留学计划</a></li>
                    <li role="presentation"><a href="#">3.教育及工作背景</a></li>
                    <li role="presentation" class="active"><a href="#">4.其它信息</a></li>
                    <li role="presentation"><a href="#">5.联系信息</a></li>
                    <li role="presentation"><a href="#">6.申请单预览</a></li>

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