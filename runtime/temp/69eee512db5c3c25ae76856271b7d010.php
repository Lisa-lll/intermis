<?php /*a:3:{s:66:"/Users/liuyang/intermis/tp5/application/student/view/st/fill1.html";i:1524559196;s:67:"/Users/liuyang/intermis/tp5/application/student/view/st/header.html";i:1523870820;s:65:"/Users/liuyang/intermis/tp5/application/student/view/st/left.html";i:1523889360;}*/ ?>
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

            <form id="form1">

            <table class="table table-bordered" id="basic">
                <tbody>
                <tr>
                    <td colspan="7" class="active">
                        <div class="col-md-6"><h4>Family Status</h4><input type="hidden" name="user" value="<?php echo htmlentities($user); ?>"> </div>
                        <div class="col-md-6 text-right"><button type="button" class="btn btn-primary btn-sm" id="addtry" onclick="addaaa();">Add</button></div>
                    </td>
                </tr>
               <tr >

                   <th><span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span><strong>Family Members</strong></th><th><span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span><strong>Name</strong></th><th><span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span><strong>Phone Number</strong></th><th><strong>Email</strong></th><th><span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span><strong>Position</strong></th><th><span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span><strong>Work Place</strong></th><th></th>

               </tr>
                <?php if(is_array($dfam) || $dfam instanceof \think\Collection || $dfam instanceof \think\Paginator): $i = 0; $__LIST__ = $dfam;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fam): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td>
<script> $("#gx").selectpicker('val','<?php echo htmlentities($fam['gx']); ?>');</script>
                        <select name="gx[]" data-width="100%" id="gx">
                            <option value="father">Father</option>
                            <option value="mother">Mother</option>
                            <option value="spouse">Spouse</option>

                            <option value="brother">Brother</option>
                            <option value="sister">Sister</option>
                            <option value="others">Others</option>
                            <option value="children">Children</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="name[]" value="<?php echo htmlentities($fam['name']); ?>"></td>
                    <td><input type="text" class="form-control" placeholder="" name="mobile[]" value="<?php echo htmlentities($fam['mobile']); ?>"></td>
                    <td><input type="text" class="form-control" placeholder="" name="email[]" value="<?php echo htmlentities($fam['email']); ?>"></td>
                    <td><input type="text" class="form-control" placeholder="" name="zhiwu[]" value="<?php echo htmlentities($fam['zhiwu']); ?>"></td>
                    <td><input type="text" class="form-control" placeholder="" name="company[]" value="<?php echo htmlentities($fam['company']); ?>"></td>
                    <td><button type="button" class="btn btn-primary btn-sm" onclick="delNew();">Delete</button></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>

                </tbody>
            </table>

            <table class="table table-bordered">
                <tr>
                    <td colspan="4" class="active">
                        <div class="col-md-6"><h4>Financial Supporter</h4></div>
                        <div class="col-md-6 text-right"></div>
                    </td>
                </tr>

                <tr>
                    <td class="text-right">
                        <span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span>  Guarantor name
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="dbrname" value="<?php echo htmlentities($ddb['dbrname']); ?>"></td>
                    <td class="text-right"> The guarantor Addr</td>
                    <td><input type="text" class="form-control" placeholder="" name="dbraddress" value="<?php echo htmlentities($ddb['dbraddress']); ?>"></td>
                </tr>
                <tr>
                    <td class="text-right">
                        <span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span>The guarantor Tel
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="dbrmobile" value="<?php echo htmlentities($ddb['dbrmobile']); ?>"></td>
                    <td class="text-right"> Relationship with applicant	</td>
                    <td><input type="text" class="form-control" placeholder="" name="dbrgx" value="<?php echo htmlentities($ddb['dbrgx']); ?>"></td>
                </tr>
                <tr>
                    <td class="text-right">
                        <span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span> Organization
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="dbrcompany" value="<?php echo htmlentities($ddb['dbrcompany']); ?>"></td>
                    <td class="text-right"> Email</td>
                    <td><input type="text" class="form-control" placeholder="" name="dbremail" value="<?php echo htmlentities($ddb['dbremail']); ?>"></td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <td colspan="4" class="active">
                        <div class="col-md-6"><h4>Emergency Contact</h4></div>
                        <div class="col-md-6 text-right"></div>
                    </td>
                </tr>

                <tr>
                    <td class="text-right">
                        <span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span>Name
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="sosname" value="<?php echo htmlentities($ddb['sosname']); ?>"></td>
                    <td class="text-right"><span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span>Mobile</td>
                    <td><input type="text" class="form-control" placeholder="" name="sosmobile" value="<?php echo htmlentities($ddb['sosmobile']); ?>"></td>
                </tr>
                <tr>
                    <td class="text-right">
                        <span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span> Phone Number
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="sostel" value="<?php echo htmlentities($ddb['sostel']); ?>"></td>
                    <td class="text-right"> <span class="glyphicon glyphicon-star text-danger" aria-hidden="true"></span>Email</td>
                    <td><input type="text" class="form-control" placeholder="" name="sosemail" value="<?php echo htmlentities($ddb['sosemail']); ?>"></td>
                </tr>
                <tr>
                    <td class="text-right">
                        Organization
                    </td>
                    <td><input type="text" class="form-control" placeholder="" name="soscompany" value="<?php echo htmlentities($ddb['soscompany']); ?>"></td>
                    <td class="text-right"> OrganizationAddress	</td>
                    <td><input type="text" class="form-control" placeholder="" name="sosaddress" value="<?php echo htmlentities($ddb['sosaddress']); ?>"></td>
                </tr>
            </table>

                <div class="col-md-12 text-center">
                   <a href="<?php echo url('st/education'); ?>"><button type="button" class="btn btn-primary">Previous</button>&nbsp;&nbsp;</a> &nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-primary" id="submit1">Save and Next</button>
                </div>
            </form>

        </div>

    </div>

</div>
<script>
    $('select').selectpicker();

    $(function () {
        $("#submit1").on('click',function () {

            $.ajax({
                type: 'post',
                url: "<?php echo url('st/insert1'); ?>",
                data: $('#form1').serialize(),
                datatype: 'json',
                success: function (data) {

                    if (data.status == 1) {

                        var url="<?php echo url('student/st/contact'); ?>";

                        window.location.href=url;
                    }else {
                        var url="<?php echo url('student/st/contact'); ?>";

                        window.location.href=url;
                    }
                }



            })

        })

    });


    function addaaa() {
        $("#basic tr:last").after(" <tr>\n" +
            "                    <td>\n" +
            "                        <select name=\"gx[]\" data-width=\"100%\" id=\"gx\">\n" +
            "                            <option value=\"father\">Father</option>\n" +
            "                            <option value=\"mother\">Mother</option>\n" +
            "                            <option value=\"spouse\">Spouse</option>\n" +
            "\n" +
            "                            <option value=\"brother\">Brother</option>\n" +
            "                            <option value=\"sister\">Sister</option>\n" +
            "                            <option value=\"others\">Others</option>\n" +
            "                            <option value=\"children\">Children</option>\n" +
            "                        </select>\n" +
            "                    </td>\n" +
            "                    <td><input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"name[]\"></td>\n" +
            "                    <td><input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"mobile[]\"></td>\n" +
            "                    <td><input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"email[]\"></td>\n" +
            "                    <td><input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"zhiwu[]\"></td>\n" +
            "                    <td><input type=\"text\" class=\"form-control\" placeholder=\"\" name=\"company[]\"></td>\n" +
            "                    <td><button type=\"button\" class=\"btn btn-primary btn-sm\" onclick=\"delNew(this);\">删除</button></td>\n" +
            "                </tr>")

        $('select').selectpicker();

    }

    function delNew(nowTr) {
        $(nowTr).parent().parent().remove();
    }
</script>
</body>
</html>